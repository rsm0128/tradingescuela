<?php

namespace App\Http\Controllers;

use App\BasicSetting;
use App\Coupon;
use App\Lib\coinPayments;
use App\PaymentLog;
use App\PaymentMethod;
use App\Plan;
use App\Material;
use App\Signal;
use App\SignalComment;
use App\SignalRating;
use App\StaffRequest;
use App\SubmitSignal;
use App\TransactionLog;
use App\User;
use App\UserSignal;
use App\WithdrawLog;
use App\WithdrawMethod;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\TraitsFolder\CommonTrait;

class UserController extends Controller
{
    use CommonTrait;
    public function __construct()
    {
        $this->middleware('verifyUser');
        $this->middleware('auth');
    }
    public function checkDiscord(){
        if(Auth::user()->plan_status && (Auth::user()->discord_username == "" || Auth::user()->discord_id == ""))
            return true;
        else
            return false;
    }
    public function submitDiscordForm(Request $request){
        $request->validate([
            'username' => 'required',
            'discord_id' => 'required',
        ]);
        $user = Auth::user();
        $user->discord_username = $request->username;
        $user->discord_id = $request->discord_id;
        $user->level = $request->level;
        $user->save();
        
        session()->flash('message','Success.');
        session()->flash('title','Success');
        session()->flash('type','success');
        return redirect()->route('user-dashboard');
    }
    public function getDashboard()
    {
        if($this->checkDiscord())
            return view('user.discord-form')->with('level', Auth::user()->level);
        $data['page_title'] = "Panel";
        $data['user'] = User::findOrFail(Auth::user()->id);
        $data['new_signal'] = UserSignal::whereUser_id(Auth::user()->id)->whereStatus(0)->count();
        $data['all_signal'] = UserSignal::whereUser_id(Auth::user()->id)->count();
        //$x = Carbon::parse($data['user']->expire_time)->addDays(90);
        //session()->forget('new_plan_id');
        session(['new_plan_id' => Auth::user()->plan_id]);
        
        
        $start = Carbon::parse()->subDays(19);
        $end = Carbon::now();
        $stack = [];
        $date = $start;
        while ($date <= $end) {
            $stack[] = $date->copy();
            $date->addDays(1);
        }
        $dL = [];
        $dV = [];
        foreach (array_reverse($stack) as $d){
            $dL[] .= Carbon::parse($d)->format('dS M');

        }
        foreach (array_reverse($stack) as $d){
            $date = Carbon::parse($d)->format('Y-m-d');
            $start = $date.' '.'00:00:00';
            $end = $date.' '.'23:59:59';
            $dC= UserSignal::whereUser_id(Auth::user()->id)->whereBetween('created_at',[$start,$end])->get();
            $dV[] .= count($dC);
        }
        $data['dV'] = $dV;
        $data['dL'] = $dL;


        return view('user.dashboard',$data);
    }

    public function editProfile()
    {
        if($this->checkDiscord())
            return view('user.discord-form')->with('level', Auth::user()->level);
        $data['page_title'] = "Editar Perfil";
        $data['admin'] = User::findOrFail(Auth::user()->id);
        return view('user.edit-profile',$data);
    }

    public function updateProfile(Request $request)
    {
        $admin = User::findOrFail(Auth::user()->id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$admin->id,
            'phone' => 'required|min:5|unique:users,phone,'.$admin->id,
            'image' => 'mimes:png,jpg,jpeg'
        ]);
        $in = Input::except('_method','_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            Image::make($image)->resize(215,215)->save($location);
            if ($admin->image != null){
                $path = './assets/images/';
                $link = $path.$admin->image;
                if (file_exists($link)){
                    unlink($link);
                }
            }
            $in['image'] = $filename;
        }
        $admin->fill($in)->save();
        session()->flash('message','Profile Updated Successfully.');
        session()->flash('title','Success');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function youtube_parser($url)
    {
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=embed/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches);
        if($matches)
            return true;
        else
            return false;
    }
    public function getMaterials()
    {
        if($this->checkDiscord())
            return view('user.discord-form')->with('level', Auth::user()->level);
        $materials = Material::orderBy('created_at', 'ASC')->where('is_monthly', 0)->get();
        $userMaterials = [];
        $size = 0;
        $user = User::findOrFail(Auth::user()->id);
        
        foreach($materials as $m)
        {
            $var1 = [];
            foreach(Plan::all() as $plan)
            {
                if($m->active_plan_only == 3)
                    array_push($var1, $plan->id);
                else if($m->active_plan_only == 1 && $plan->status == 1)
                {
                    array_push($var1, $plan->id);
                }
                else if($m->active_plan_only == 0 && $plan->status == 0)
                {
                    array_push($var1, $plan->id);
                }
            }
            $var = explode(";", $m->plans);
            if(in_array($user->plan_id,$var) && in_array($user->plan_id,$var1)){
                array_push($userMaterials, $m);
                $size++;
            }else{
                
            }
        }
        $data['page_title'] = "Materiales y Recursos";
        $data['materials'] = $userMaterials;
        $data['size'] = $size;
        return view('user.materials',$data);
    }
    
    public function getMmaterials()
    {
        if($this->checkDiscord())
            return view('user.discord-form')->with('level', Auth::user()->level);
        $materials = Material::orderBy('created_at', 'ASC')->where('is_monthly', 1)->get();
        $userMaterials = [];
        $size = 0;
        $user = User::findOrFail(Auth::user()->id);
        
        foreach($materials as $m)
        {
            $var1 = [];
            foreach(Plan::all() as $plan)
            {
                if($m->active_plan_only == 3)
                    array_push($var1, $plan->id);
                else if($m->active_plan_only == 1 && $plan->status == 1)
                {
                    array_push($var1, $plan->id);
                }
                else if($m->active_plan_only == 0 && $plan->status == 0)
                {
                    array_push($var1, $plan->id);
                }
            }
            // var_dump($var1);
            // exit();
            $var = explode(";", $m->plans);
            if(in_array($user->plan_id,$var) && in_array($user->plan_id,$var1)){
                array_push($userMaterials, $m);
                $size++;
            }else{
                
            }
        }
        $data['page_title'] = "Resumen Mensual";
        $data['materials'] = $userMaterials;
        $data['size'] = $size;
        return view('user.mmaterials',$data);
    }
    
    public function getChangePass()
    {
        if($this->checkDiscord())
            return view('user.discord-form')->with('level', Auth::user()->level);
        $data['page_title'] = "Cambiar Contraseña";
        return view('user.change-password',$data);
    }
    public function postChangePass(Request $request)
    {
        $this->validate($request, [
            'current_password' =>'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {
            $c_password = Auth::user()->password;
            $c_id = Auth::user()->id;

            $user = User::findOrFail($c_id);

            if(Hash::check($request->current_password, $c_password)){

                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                session()->flash('message', 'Password Changes Successfully.');
                session()->flash('title','Success');
                Session::flash('type', 'success');
                return redirect()->back();
            }else{
                session()->flash('message', 'Current Password Not Match');
                Session::flash('type', 'warning');
                session()->flash('title','Opps');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', $e->getMessage());
            Session::flash('type', 'warning');
            session()->flash('title','Opps');
            return redirect()->back();
        }

    }

    public function newSignal()
    {
        if($this->checkDiscord())
            return view('user.discord-form')->with('level', Auth::user()->level);
        $data['page_title'] = 'Nueva';
        $data['signal'] = UserSignal::orderBy('id','desc')->whereUser_id(Auth::user()->id)->whereStatus(0)->get();
        return view('user.signal-new',$data);
    }

    public function AllSignal()
    {
        if($this->checkDiscord())
            return view('user.discord-form')->with('level', Auth::user()->level);
        $data['page_title'] = 'Todas';
        $uerId = Auth::user()->id;
        $data['signal'] = UserSignal::whereUser_id($uerId)->orderBy('id','desc')->paginate(10);
        return view('user.signal-all',$data);
    }

    public function signalView($id)
    {
        if($this->checkDiscord())
            return view('user.discord-form')->with('level', Auth::user()->level);
        $signal = UserSignal::findOrFail($id);
        if ($signal->user_id == Auth::user()->id and $signal->id == $id){
            $signal->status = 1;
            $signal->save();
            $signalDetails = Signal::findOrFail($signal->signal_id);
            $data['page_title'] = $signalDetails->title;
            $data['signal'] = $signalDetails;
            $data['total_comment'] = SignalComment::whereSignal_id($signalDetails->id)->count();
            $data['comments'] = SignalComment::whereSignal_id($signalDetails->id)->get();
            $data['total_rating'] = SignalRating::whereSignal_id($signalDetails->id)->count();
            $data['sum_rating'] = SignalRating::whereSignal_id($signalDetails->id)->sum('rating');
            if ($data['total_rating'] == 0){
                $data['final_rating'] = 0;
            }else{
                $data['final_rating'] = round($data['sum_rating'] / $data['total_rating']);
            }
            $data['rating'] = SignalRating::whereSignal_id($signalDetails->id)->get();
            $data['user_rating'] = SignalRating::whereSignal_id($signalDetails->id)->whereUser_id(Auth::user()->id)->first();
            return view('user.signal-view',$data);
        }else{
            session()->flash('message','Something is Wrong.');
            session()->flash('type','warning');
            return redirect()->back();
        }
    }

    public function chosePayment()
    {
        if($this->checkDiscord())
            return view('user.discord-form')->with('level', Auth::user()->level);
        $data['page_title'] = 'Elegir método de pago';
        $data['payment'] = PaymentMethod::whereStatus(1)->get();
        return view('user.payment-chose',$data);
    }

    public function submitPaymentMethod(Request $request)
    {
        $newPlanId = session('new_plan_id');
        if ($newPlanId) {
            $id = $request->id;

            //$plan = Plan::findOrFail(Auth::user()->plan_id);
            $plan = Plan::findOrFail($newPlanId);
            $payment = PaymentMethod::findOrFail($id);

            $pL = PaymentLog::whereUser_id(Auth::user()->id)->whereStatus(0)->count();

            if ($pL == 0) {
                $paymentLog['user_id'] = Auth::user()->id;
                $paymentLog['payment_id'] = $id;
                $paymentLog['new_plan_id'] = $newPlanId;
                $paymentLog['order_number'] = Str::random('16');
                $paymentLog['amount'] = $plan->price;
                $paymentLog['usd'] = round(($plan->price) / $payment->rate,2);
                if ($id == 3){
                    $blockchain_receive_root = "https://api.blockchain.info/";
                    $secret = "bitcoin_secret";
                    $my_xpub = $payment->val2;
                    $my_api_key = $payment->val1;
                    $invoice_id = $paymentLog['order_number'];
                    $callback_url = route('btc_ipn',['invoice_id'=>$invoice_id,'secret'=>$secret]);
                    $url = $blockchain_receive_root."v2/receive?key=".$my_api_key."&callback=".urlencode($callback_url)."&xpub=".$my_xpub;
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $resp = curl_exec($ch);
                    curl_close($ch);
                    $response = json_decode($resp);

                    $responseKey = key($response);
                    if ($responseKey == 'message'){
                        session()->flash('message','Error In BTC Payment. Contact with Admin.');
                        session()->flash('type','warning');
                        return redirect()->back();
                    }

                    $sendto = $response->address;
                    if ($sendto!="") {
                        $api = "https://blockchain.info/tobtc?currency=USD&value=".$paymentLog['usd'];
                        $usd = file_get_contents($api);
                        $paymentLog['btc_amo'] = $usd;
                        $paymentLog['btc_acc'] = $sendto;
                        $var = "bitcoin:$sendto?amount=$usd";
                        $data['usd'] = $usd;
                        $data['add'] = $sendto;
                        $data['code'] =  "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$var&choe=UTF-8\" title='' style='width:300px;' />";
                    }else{
                        session()->flash('message', "SOME ISSUE WITH API");
                        session()->flash('type', 'warning');
                        return redirect()->back();
                    }
                }
                if($id == 6){

                    $callbackUrl = route('coinpayment-ipn');
                    $CP = new coinPayments();
                    $CP->setMerchantId($payment->val1);
                    $CP->setSecretKey($payment->val2);
                    $custom = $paymentLog['order_number'];
                    $form = $CP->createPayment('Subscription Charge', 'USD', $paymentLog['usd'], $custom, $callbackUrl);
                    $data['form'] = $form;

                }
                $data['payment']    = PaymentLog::create($paymentLog);
                $data['page_title'] = 'Payment OverView';
                $data['plan']       = $plan;
                return view('user.payment-overview',$data);
            }else{

                $pay = PaymentLog::whereUser_id(Auth::user()->id)->whereStatus(0)->first();
                $paymentLog['amount'] = $plan->price;
                $paymentLog['usd'] = round(($plan->price) / $payment->rate,2);
                $paymentLog['payment_id'] = $id;
                $paymentLog['new_plan_id'] = $newPlanId;
                $usd = $paymentLog['usd'];
                if ($id == 3){
                    $blockchain_receive_root = "https://api.blockchain.info/";
                    $secret = "bitcoin_secret";
                    $my_xpub = $payment->val2;
                    $my_api_key = $payment->val1;
                    $invoice_id = $pay->order_number;

                    $callback_url = route('btc_ipn',['invoice_id'=>$invoice_id,'secret'=>$secret]);

                    if ($pay->btc_acc == null){

                        $url = $blockchain_receive_root."v2/receive?key=".$my_api_key."&callback=".urlencode($callback_url)."&xpub=".$my_xpub;
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13");
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $resp = curl_exec($ch);
                        curl_close($ch);
                        $response = json_decode($resp,true);

                        $responseKey = key($response);
                        if ($responseKey == 'message'){
                            session()->flash('message','Error In BTC Payment. Contact with Admin.');
                            session()->flash('type','warning');
                            return redirect()->back();
                        }

                        $sendto = $response->address;
                        if ($sendto!="") {
                            $api = "https://blockchain.info/tobtc?currency=USD&value=".$usd;
                            $usd = file_get_contents($api);
                            $paymentLog['btc_amo'] = $usd;
                            $paymentLog['btc_acc'] = $sendto;
                            $var = "bitcoin:$sendto?amount=$usd";
                            $data['usd'] = $usd;
                            $data['add'] = $sendto;
                            $data['code'] =  "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$var&choe=UTF-8\" title='' style='width:300px;' />";
                        }else{
                            session()->flash('message', "SOME ISSUE WITH API");
                            session()->flash('type', 'warning');
                            return redirect()->back();
                        }
                    }else{
                        $api = "https://blockchain.info/tobtc?currency=USD&value=".$usd;
                        $usd = file_get_contents($api);
                        $sendto = $pay->btc_acc;
                        $var = "bitcoin:$sendto?amount=$usd";
                        $data['usd'] = $usd;
                        $data['add'] = $sendto;
                        $data['code'] =  "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$var&choe=UTF-8\" title='' style='width:300px;' />";
                    }

                }
                if($id == 6){

                    $callbackUrl = route('coinpayment-ipn');
                    $CP = new coinPayments();
                    $CP->setMerchantId($payment->val1);
                    $CP->setSecretKey($payment->val2);
                    $custom = $pay->order_number;
                    $form = $CP->createPayment('Subscription Charge', 'USD', $paymentLog['usd'], $custom, $callbackUrl);
                    $data['form'] = $form;

                }

                $pay->fill($paymentLog)->save();
                $data['payment']    = PaymentLog::findOrFail($pay->id);
                $data['page_title'] = 'Payment OverView';
                $data['plan']       = $plan;
                return view('user.payment-overview',$data);
            }
        } else {
            return redirect()->back();
        }
    }

    public function getUpgradePlan()
    {
        if($this->checkDiscord())
            return view('user.discord-form')->with('level', Auth::user()->level);
        $data['page_title']     = 'Mejorar Plan';
        //$plans                = Plan::orderBy('duration')->whereStatus(1)->get();
        $params                 = ['status' => 1, 'order_by' => ['column' => 'plans.duration', 'direction' => 'asc']];
        $paramsResults          = array_merge($params, ['has_promo' => true]);
        if (Auth::user()->email == 'balamcontact@gmail.com')
            $data['plan']       = Plan::get(array_merge($paramsResults, ['pages' => ['user-panel', 'testing']]));
        else
            $data['plan']       = Plan::get(array_merge($paramsResults, ['pages' => ['user-panel']]));
        
        //$plansPromo = Plan::orderBy('duration')->whereStatus(1)->where('has_promo', 1)->where('promo_duration', '>', date('Y-m-d H:i:s'))->get();
        $plansPromo             = Plan::get(array_merge($params, ['only_promo' => 1, 'valid_expiration' => true]));
        //dd($plansPromo);
        $data['promos']         = [];
        foreach ($plansPromo as $key => $promo) {
            $timeout            = Carbon::parse($promo->promo_duration)->timestamp - Carbon::now()->timestamp;
            $p['id']            = $promo->id;
            $p['timeout']       = $timeout > 0 ? $timeout : 0;
            $data['promos'][]   = $p;
        }
        
        # User Test - Admin
        /*if (Auth::user()->email == 'balamcontact@gmail.com')
            $data['plan'] = Plan::orderBy('duration')->where('onlyAdmin',0)->whereStatus(1)->orWhere('id', 10)->get();
        else
            $data['plan'] = Plan::orderBy('duration')->where('onlyAdmin',0)->whereStatus(1)->get();*/
        return view('user.upgrade-plan',$data);
    }

    public function updatePlanSubmit(Request $request)
    {
        if ($request->delete_id) {
            session(['new_plan_id' => $request->delete_id]);
            return redirect()->route('plan-upgrade-payment');
        } else {
            return redirect()->back();
        }
        /*$plan = Plan::findOrFail($request->delete_id);
        if ($plan->price == 0){
            $user  = User::findOrFail(Auth::user()->id);
            $user->plan_status = 1;
            $user->plan_id = $request->delete_id;
            $user->save();
            session()->flash('message','Plan Upgrade Successfully');
            session()->flash('type','success');
            return redirect()->back();
        }else{
            $user  = User::findOrFail(Auth::user()->id);
            $user->plan_status = 0;
            $user->plan_id = $request->delete_id;
            $user->save();
            return redirect()->route('plan-upgrade-payment');
        }*/
    }

    public function planUpgradePayment()
    {
        $newPlanId = session('new_plan_id');
        if ($newPlanId) {
            $data['page_title'] = 'Plan Upgrade Payment';
            //$data['plan']       = Plan::findOrFail(Auth::user()->plan_id);
            $data['plan']       = Plan::findOrFail($newPlanId);
            $data['payment']    = PaymentMethod::whereStatus(1)->get();
            return view('user.plan-update-payment',$data);
        } else {
            return redirect()->back();
        }
    }

    public function activeTelegram()
    {
        if($this->checkDiscord())
            return view('user.discord-form')->with('level', Auth::user()->level);
        $data['page_title'] = "Activar Telegram";
        return view('user.active-telegram',$data);
    }

    public function activeDiscord()
    {
        if($this->checkDiscord())
            return view('user.discord-form')->with('level', Auth::user()->level);
        $data['page_title'] = "Activar Discord";
        $data['user'] = Auth::user();
        return view('user.active-discord',$data);
    }
    public function saveDiscord(Request $request)
    {
        // $request->validate([
        //   'discord_id' => 'required',
        // ]);
        // $user = Auth::user();
        // $user->discord_id = $request->discord_id;
        // $user->save();
        // \session()->flash('message','Discord ID Saved Successfully.');
        // \session()->flash('type','success');
        // return redirect()->back();
    }
    public function submitActiveTelegram(Request $request)
    {
        $basic = BasicSetting::first();

        $username = Auth::user()->telegram_token;
        $user = User::findOrFail(Auth::user()->id);
        $telegram_text = $username;
        $botToken = $basic->telegram_token;
        $web = 'https://api.telegram.org/bot'.$botToken;
        $update = file_get_contents($web."/getUpdates");
        $updateArray = json_decode($update,true);
        $chatId = null;
        foreach ($updateArray['result'] as $arr){
            if ($arr["message"]['text'] = $telegram_text){
                $chatId = $arr["message"]['chat']['id'];
            }
        }
        if ($chatId != null){
            $user->telegram_id = $chatId;
            $user->save();
            file_get_contents($web."/sendMessage?chat_id=".$chatId."&text=".$username." - Telegram Notification Activated Successfully");
            session()->flash('message','Telegram Signal Is Activated.');
            session()->flash('type','success');
            return redirect()->back();
        }else{
            session()->flash('message','Error In Telegram Token.');
            session()->flash('type','warning');
            return redirect()->back();
        }

    }

    public function commentSubmit(Request $request)
    {
        $request->validate([
           'comment' => 'required',
           'signal_id' => 'required'
        ]);
        $in = Input::except('_method','_token');
        $in['user_id'] = Auth::user()->id;
        SignalComment::create($in);
        \session()->flash('message','Comment Submitted Successfully.');
        \session()->flash('type','success');
        return redirect()->back();
    }

    public function ratingSubmit(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'signal_id' => 'required',
            'rating' => 'required'
        ]);

        $in = Input::except('_method','_token');
        $in['user_id'] = Auth::user()->id;
        SignalRating::create($in);
        \session()->flash('message','Rating Submitted Successfully.');
        \session()->flash('type','success');
        return redirect()->back();
    }
    
    public function showWelcome()
    {
        if($this->checkDiscord())
            return view('user.discord-form')->with('level', Auth::user()->level);
        $basic = BasicSetting::first();
        return view('user.welcome', ['welcome_body' => $basic->welcome, 'page_title' => 'welcome']);
    }
    


}
