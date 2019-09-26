<?php

namespace App\Http\Controllers;

use App\BasicSetting;
use App\Plan;
use App\User;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Token;
use App\PaymentLog;
use App\PaymentMethod;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\TraitsFolder\CommonTrait;

class PaymentIPNController extends Controller
{
    use CommonTrait;

    public function paypalSubmit(Request $request)
    {
        $request->validate([
            'custom' => 'required'
        ]);
        
        $log        = PaymentLog::whereOrder_number($request->custom)->firstOrFail();
        $plan       = Plan::findOrFail($log->new_plan_id);

        $basic = BasicSetting::first();
        $method = PaymentMethod::first();
        $apiContext = new ApiContext(new OAuthTokenCredential($method->val1, $method->val2));
        $apiContext->setConfig([
            'mode' => $method->val3,
            'http.ConnectionTimeOut' => 3000,
            'log.LongEnabled' => true,
            'log.FileName' => storage_path().'/logs/paypal.log',
            'log.LogLevel' => 'DEBUG'
        ]);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item = new Item();
        $item->setName('Plan - '.$plan->name) //('Plan - '.$log->user->plan->name)
            ->setCurrency($basic->currency)
            ->setQuantity(1)
            ->setPrice($log->usd);

        $itemList = new ItemList();
        $itemList->setItems(array($item));

        $amount = new Amount();
        $amount->setTotal($log->usd);
        $amount->setCurrency($basic->currency);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setCustom($request->custom)
            ->setItemList($itemList)
            ->setDescription('Subscription Charge - '.$basic->title);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('paypal-ipn'))
            ->setCancelUrl(route('chose-payment-method'));

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($apiContext);
        }
        catch (PayPalConnectionException $ex) {
            session()->flash('message','Payment Not Completed');
            //session()->flash('message',$ex->getMessage());
            session()->flash('type','warning');
            return redirect()->route('chose-payment-method');
        }

        $approvalUrl = $payment->getApprovalLink();

        return redirect($approvalUrl);

    }
    public function paypalIpn(Request $request)
    {

        if (empty($request->input('PayerID')) || empty($request->input('token'))){
            session()->flash('message','Payment Not Completed');
            session()->flash('type','warning');
            return redirect()->route('chose-payment-method');
        }

        $method = PaymentMethod::first();
        $apiContext = new ApiContext(new OAuthTokenCredential($method->val1, $method->val2));
        $apiContext->setConfig([
            'mode' => $method->val3,
            'http.ConnectionTimeOut' => 3000,
            'log.LongEnabled' => true,
            'log.FileName' => storage_path().'/logs/paypal.log',
            'log.LogLevel' => 'DEBUG'
        ]);

        $paymentId = $_GET['paymentId'];
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);

        $result = $payment->execute($execution, $apiContext);
        $custom = $result->transactions[0]->custom;

        $data = PaymentLog::where('order_number' , $custom)->wherePayment_id(1)->first();

        if ($result->getState() == 'approved' and $result->transactions[0]->amount->total == $data->usd){
            $user       = User::findOrFail($data->user_id);
            $plan       = Plan::findOrFail($data->new_plan_id);
            //$plan = Plan::findOrFail($user->plan_id);

            if ($plan->plan_type == 1) {
                $user->expire_time  = 1;
            } else {
                if ($user->plan_status == 0)
                    $user->expire_time = Carbon::parse()->addDays($plan->duration);
                else
                    $user->expire_time = Carbon::parse($user->expire_time)->addDays($plan->duration);
                $user->last_payment = Carbon::now();
                $user->payment_type = 'PayPal';
            }
            
            $user->plan_id = $data->new_plan_id;
            $user->plan_status = 1;
            $user->save();

            $data->status = 1;
            $data->save();

            $this->paymentConfirm($user->id,$data->usd,$custom,"Paypal");
            session()->flash('message','Payment Successfully Completed.');
            session()->flash('type','success');
            return redirect()->route('user-dashboard');

        }else{
            session()->flash('message','Payment Not Completed');
            session()->flash('type','warning');
            return redirect()->route('chose-payment-method');
        }

    }

    public function perfectIPN()
    {
        $pay = PaymentMethod::whereId(2)->first();
        $passphrase=strtoupper(md5($pay->val2));

        define('ALTERNATE_PHRASE_HASH',  $passphrase);
        define('PATH_TO_LOG',  '/somewhere/out/of/document_root/');
        $string=
            $_POST['PAYMENT_ID'].':'.$_POST['PAYEE_ACCOUNT'].':'.
            $_POST['PAYMENT_AMOUNT'].':'.$_POST['PAYMENT_UNITS'].':'.
            $_POST['PAYMENT_BATCH_NUM'].':'.
            $_POST['PAYER_ACCOUNT'].':'.ALTERNATE_PHRASE_HASH.':'.
            $_POST['TIMESTAMPGMT'];
        $hash=strtoupper(md5($string));
        $hash2 = $_POST['V2_HASH'];
        if($hash==$hash2){

            $amo = $_POST['PAYMENT_AMOUNT'];
            $unit = $_POST['PAYMENT_UNITS'];
            $custom = $_POST['PAYMENT_ID'];
            $data = PaymentLog::where('order_number' , $custom)->wherePayment_id(2)->first();
            if($_POST['PAYEE_ACCOUNT']=="$pay->val1" && $unit=="USD" && $amo == $data->usd){

                $user = User::findOrFail($data->user_id);
                $plan = Plan::findOrFail($user->plan_id);


                if ($plan->plan_type == 1){
                    $user->expire_time  = 1;
                }else{
                    $user->expire_time  = Carbon::parse()->addDays($plan->duration);
                    $user->last_payment = Carbon::now();
                }

                $user->plan_status = 1;
                $user->save();

                $data->status = 1;
                $data->save();

                $this->paymentConfirm($user->id,$amo,$custom,"Perfect Money");
                session()->flash('message','Payment Successfully Completed.');
                session()->flash('type','success');
                return redirect()->route('home');

            }else{
                session()->flash('message', 'Something error In Payment');
                session()->flash('type', 'warning');
                return redirect()->route('chose-payment-method');
            }
        }
    }
    public function btcIPN(){

        $depoistTrack = $_GET['invoice_id'];
        $secret = $_GET['secret'];
        $address = $_GET['address'];
        $value = $_GET['value'];
        $confirmations = $_GET['confirmations'];
        $value_in_btc = $_GET['value'] / 100000000;
        $trx_hash = $_GET['transaction_hash'];
        $data = PaymentLog::whereOrder_number($depoistTrack)->wherePayment_id(3)->first();
        if($data->status == 0){

            if ($data->btc_amo == $value_in_btc && $data->btc_acc == $address && $secret=="bitcoin_secret" && $confirmations>2){

                $user = User::findOrFail($data->user_id);
                $plan = Plan::findOrFail($user->plan_id);


                if ($plan->plan_type == 1){
                    $user->expire_time  = 1;
                }else{
                    $user->expire_time  = Carbon::parse()->addDays($plan->duration);
                    $user->last_payment = Carbon::now();
                }
                $user->plan_status = 1;
                $user->save();

                $data->status = 1;
                $data->save();

                $this->paymentConfirm($user->id,$data->usd,$depoistTrack,"Bitcoin Payment");
                session()->flash('message','Payment Successfully Completed.');
                session()->flash('type','success');
                return redirect()->route('user-dashboard');
            }
        }
    }
    public function submitStripe(Request $request)
    {
        $this->validate($request,[
            'amount' => 'required',
            'custom' => 'required',
            'cardNumber' => 'required|numeric',
            'cardExpiryMonth' => 'required|numeric|digits:2',
            'cardExpiryYear' => 'required|numeric|digits:4',
            'cardCVC' => 'required|numeric',
        ]);
        $data = PaymentLog::whereOrder_number($request->custom)->wherePayment_id(4)->first();
        $amm = $data->usd;
        $cc = $request->cardNumber;
        $emo = $request->cardExpiryMonth;
        $eyr = $request->cardExpiryYear;
        $cvc = $request->cardCVC;
        $basic = PaymentMethod::whereId(4)->first();
        Stripe::setApiKey($basic->val1);
        try{
            $token = Token::create(array(
                "card" => array(
                    "number" => $cc,
                    "exp_month" => $emo,
                    "exp_year" => $eyr,
                    "cvc" => $cvc
                )
            ));
            if (!isset($token['id'])) {
                session()->flash('message','Stripe Token not generated.');
                session()->flash('type','danger');
                return redirect()->route('chose-payment-method');
            }
            $charge = Charge::create(array(
                'card' => $token['id'],
                'currency' => 'USD',
                'amount' => $amm * 100,
                'description' => 'Multi item',
            ));
            if ($charge['status'] == 'succeeded' ) {

                $user = User::findOrFail($data->user_id);
                $plan = Plan::findOrFail($user->plan_id);

                if ($plan->plan_type == 1){
                    $user->expire_time  = '1';
                }else{
                    $user->expire_time  = Carbon::parse()->addDays($plan->duration);
                    $user->last_payment = Carbon::now();
                }
                $user->plan_status = 1;
                $user->save();

                $data->status = 1;
                $data->save();

                $this->paymentConfirm($user->id,$data->usd,$request->custom,"Stripe Card");
                session()->flash('message','Payment Successfully Completed.');
                session()->flash('type','success');
                return redirect()->route('user-dashboard');
            }else{
                session()->flash('message','Something Wrong With Card.');
                session()->flash('type','warning');
                return redirect()->route('chose-payment-method');
            }

        }catch (\Exception $e){
            session()->flash('message',$e->getMessage());
            session()->flash('type','warning');
            return redirect()->route('chose-payment-method');
        }
    }

    public function skrillIPN()
    {
        $payment = PaymentMethod::whereId(5)->first();
        $concatFields = $_POST['merchant_id']
            .$_POST['transaction_id']
            .strtoupper(md5($payment->val2))
            .$_POST['mb_amount']
            .$_POST['mb_currency']
            .$_POST['status'];
        $MBEmail = $payment->val1;
        // Ensure the signature is valid, the status code == 2,
        // and that the money is going to you
        $custom = $_POST['transaction_id'];
        $data = PaymentLog::whereOrder_number($custom)->wherePayment_id(5)->first();
        if (strtoupper(md5($concatFields)) == $_POST['md5sig']
            && $_POST['status'] == 2
            && $_POST['pay_to_email'] == $MBEmail)
        {
            $user = User::findOrFail($data->user_id);
            $plan = Plan::findOrFail($user->plan_id);

            if ($plan->plan_type == 1){
                $user->expire_time  = 1;
            }else{
                $user->expire_time  = Carbon::parse()->addDays($plan->duration);
                $user->last_payment = Carbon::now();
            }
            $user->plan_status = 1;
            $user->save();

            $data->status = 1;
            $data->save();

            $this->paymentConfirm($user->id,$data->usd,$custom,"Skrill");
            session()->flash('message','Payment Successfully Completed.');
            session()->flash('type','success');
            return redirect()->route('user-dashboard');
        }
        else
        {
            session()->flash('message','Something Wrong With Skrill.');
            session()->flash('type','warning');
            return redirect()->route('chose-payment-method');
        }
    }

    public function coinPaymentIPN(Request $request)
    {
        $custom = $request->custom;
        $status = $request->status;
        $amount1 = floatval($request->amount1);
        $currency1 = $request->currency1;

        $data = PaymentLog::where('order_number' ,$custom)->wherePayment_id(6)->whereStatus(0)->first();
        //dd($data->new_plan_id);
        if ($currency1 == "USD" && $data->status == '0')
        {
            if($status>=100 || $status==2)
            {
                // payment is complete or queued for nightly payout, success
                $user       = User::findOrFail($data->user_id);
                $plan       = Plan::findOrFail($data->new_plan_id);
                //$plan = Plan::findOrFail($user->plan_id);

                if ($plan->plan_type == 1){
                    $user->expire_time  = 1;
                }else{
                    if ($user->plan_status == 0)
                        $user->expire_time = Carbon::parse()->addDays($plan->duration);
                    else
                        $user->expire_time  = Carbon::parse($user->expire_time)->addDays($plan->duration);
                    $user->last_payment = Carbon::now();
                    $user->payment_type = 'CoinPayments';
                }

                $user->plan_id = $data->new_plan_id;
                $user->plan_status = 1;
                $user->save();

                $data->status = 1;
                $data->save();

                $this->paymentConfirm($user->id,$data->usd,$custom,"Coin Payment");
                session()->flash('message','Payment Successfully Completed.');
                session()->flash('type','success');
                return redirect()->route('user-dashboard');
            }
        }
    }
}
