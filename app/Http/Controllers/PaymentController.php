<?php

namespace App\Http\Controllers;

use App\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function paymentMethod()
    {
        $data['page_title'] = 'Payment Gateway';
        $data['payment'] = PaymentMethod::get();
        $data['paypal'] = PaymentMethod::whereId(1)->first();
        $data['perfect'] = PaymentMethod::whereId(2)->first();
        $data['btc'] = PaymentMethod::whereId(3)->first();
        $data['stripe'] = PaymentMethod::whereId(4)->first();
        $data['skrill'] = PaymentMethod::whereId(5)->first();
        $data['coin'] = PaymentMethod::whereId(6)->first();
        return view('payment.index',$data);
    }

    public function updatePaymentMethod(Request $request)
    {

        $method_id = $request->method_id;

        if ($method_id == 1){
            $request->validate([
                'paypal_name' => 'required',
                'paypal_rate' => 'required',
                'paypal_image' => 'mimes:png,jpeg,jpg',
                'paypal_client' => 'required',
                'paypal_secret' => 'required',
            ]);
            $paypal = PaymentMethod::whereId(1)->first();
            $paypal->name = $request->paypal_name;
            $paypal->val1 = $request->paypal_client;
            $paypal->val2 = $request->paypal_secret;
            $paypal->val3 = $request->paypal_mode == 'on' ? 'sandbox' : 'live';
            $paypal->status = $request->paypal_status == 'on' ? '1' : '0';
            $paypal->rate = $request->paypal_rate;
            if($request->hasFile('paypal_image')){
                $image3 = $request->file('paypal_image');
                $filename3 = 'paypal_'.time().'h3'.'.'.$image3->getClientOriginalExtension();
                $location = ('assets/images/payment'). '/' . $filename3;
                Image::make($image3)->resize(290,190)->save($location);
                File::delete(('assets/images/payment'). '/' .$paypal->image);
                $paypal->image = $filename3;
            }
            $paypal->save();
            session()->flash('message','Paypal Gateway Updated Successfully.');
            session()->flash('type','success');
            return redirect()->back();
        }

        if ($method_id == 2){
            $request->validate([
                'perfect_name' => 'required',
                'perfect_rate' => 'required',
                'perfect_image' => 'mimes:png,jpeg,jpg',
                'perfect_account' => 'required',
                'perfect_alternate' => 'required',
            ]);
            $perfect = PaymentMethod::whereId(2)->first();
            $perfect->name = $request->perfect_name;
            $perfect->val1 = $request->perfect_account;
            $perfect->val2 = $request->perfect_alternate;
            $perfect->status = $request->perfect_status == 'on' ? '1' : '0';
            $perfect->rate = $request->perfect_rate;
            if($request->hasFile('perfect_image')){
                $image3 = $request->file('perfect_image');
                $filename3 = 'perfect_'.time().'h4'.'.'.$image3->getClientOriginalExtension();
                $location = ('assets/images/payment'). '/' . $filename3;
                Image::make($image3)->resize(290,190)->save($location);
                File::delete(('assets/images/payment'). '/' .$perfect->image);
                $perfect->image = $filename3;
            }
            $perfect->save();
            session()->flash('message','Perfect Money Gateway Updated Successfully.');
            session()->flash('type','success');
            return redirect()->back();
        }

        if ($method_id == 3){
            $request->validate([
                'btc_name' => 'required',
                'btc_rate' => 'required',
                'btc_image' => 'mimes:png,jpeg,jpg',
                'btc_api' => 'required',
                'btc_xpub' => 'required',
            ]);
            $btc = PaymentMethod::whereId(3)->first();
            $btc->name = $request->btc_name;
            $btc->val1 = $request->btc_api;
            $btc->val2 = $request->btc_xpub;
            $btc->status = $request->btc_status == 'on' ? '1' : '0';
            $btc->rate = $request->btc_rate;
            if($request->hasFile('btc_image')){
                $image3 = $request->file('btc_image');
                $filename3 = 'btc_'.time().'h5'.'.'.$image3->getClientOriginalExtension();
                $location = ('assets/images/payment'). '/' . $filename3;
                Image::make($image3)->resize(290,190)->save($location);
                File::delete(('assets/images/payment'). '/' .$btc->image);
                $btc->image = $filename3;
            }
            $btc->save();
            session()->flash('message','BTC Gateway Updated Successfully.');
            session()->flash('type','success');
            return redirect()->back();
        }

        if ($method_id == 4){
            $request->validate([
                'stripe_name' => 'required',
                'stripe_rate' => 'required',
                'stripe_image' => 'mimes:png,jpeg,jpg',
                'stripe_secret' => 'required',
                'stripe_publishable' => 'required',
            ]);
            $stripe = PaymentMethod::whereId(4)->first();
            $stripe->name = $request->stripe_name;
            $stripe->val1 = $request->stripe_secret;
            $stripe->val2 = $request->stripe_publishable;
            $stripe->status = $request->stripe_status == 'on' ? '1' : '0';
            $stripe->rate = $request->stripe_rate;
            if($request->hasFile('stripe_image')){
                $image3 = $request->file('stripe_image');
                $filename3 = 'stripe_'.time().'h6'.'.'.$image3->getClientOriginalExtension();
                $location = ('assets/images/payment'). '/' . $filename3;
                Image::make($image3)->resize(290,190)->save($location);
                File::delete(('assets/images/payment'). '/' .$stripe->image);
                $stripe->image = $filename3;
            }
            $stripe->save();
            session()->flash('message','Stripe Gateway Updated Successfully.');
            session()->flash('type','success');
            return redirect()->back();
        }

        if ($method_id == 5){
            $request->validate([
                'skrill_name' => 'required',
                'skrill_rate' => 'required',
                'skrill_image' => 'mimes:png,jpeg,jpg',
                'skrill_email' => 'required',
                'skrill_secret' => 'required',
            ]);
            $skrill = PaymentMethod::whereId(5)->first();
            $skrill->name = $request->skrill_name;
            $skrill->val1 = $request->skrill_email;
            $skrill->val2 = $request->skrill_secret;
            $skrill->status = $request->skrill_status == 'on' ? '1' : '0';
            $skrill->rate = $request->skrill_rate;
            if($request->hasFile('skrill_image')){
                $image3 = $request->file('skrill_image');
                $filename3 = 'skrill_'.time().'h7'.'.'.$image3->getClientOriginalExtension();
                $location = ('assets/images/payment'). '/' . $filename3;
                Image::make($image3)->resize(290,190)->save($location);
                File::delete(('assets/images/payment'). '/' .$skrill->image);
                $skrill->image = $filename3;
            }
            $skrill->save();
            session()->flash('message','Skrill Gateway Updated Successfully.');
            session()->flash('type','success');
            return redirect()->back();
        }
        if ($method_id == 6){
            $request->validate([
                'coin_name' => 'required',
                'coin_rate' => 'required',
                'coin_image' => 'mimes:png,jpeg,jpg',
                'coin_merchant' => 'required',
                'coin_ipn' => 'required',
            ]);
            $coin = PaymentMethod::whereId(6)->first();
            $coin->name = $request->coin_name;
            $coin->val1 = $request->coin_merchant;
            $coin->val2 = $request->coin_ipn;
            $coin->status = $request->coin_status == 'on' ? '1' : '0';
            $coin->rate = $request->coin_rate;
            if($request->hasFile('coin_image')){
                $image3 = $request->file('coin_image');
                $filename3 = 'coin_'.time().'h7'.'.'.$image3->getClientOriginalExtension();
                $location = ('assets/images/payment'). '/' . $filename3;
                Image::make($image3)->resize(290,190)->save($location);
                File::delete(('assets/images/payment'). '/' .$coin->image);
                $coin->image = $filename3;
            }
            $coin->save();
            session()->flash('message','Coin Payment Gateway Updated Successfully.');
            session()->flash('type','success');
            return redirect()->back();
        }

    }
}
