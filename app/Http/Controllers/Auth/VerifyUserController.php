<?php

namespace App\Http\Controllers\Auth;

use App\BasicSetting;
use App\Category;
use App\Menu;
use App\Post;
use App\Social;
use App\TraitsFolder\CommonTrait;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VerifyUserController extends Controller
{
    use CommonTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function emailVerify()
    {
        if (Auth::user()->email_status == 0){
            $data['page_title'] = 'Email Verify';
            $data['social'] = Social::all();
            $data['menus'] = Menu::all();
            $data['category'] = Category::all();
            $data['footer_category'] = Category::take(7)->get();
            $data['footer_blog'] = Post::orderBy('views','desc')->take(7)->get();
            return view('auth.verify-email',$data);
        }else{
            return redirect()->route('user-dashboard');
        }
    }

    public function phoneVerify()
    {
        if (Auth::user()->phone_status == 0){
            $data['page_title'] = 'Phone Verify';
            $data['social'] = Social::all();
            $data['menus'] = Menu::all();
            $data['category'] = Category::all();
            $data['footer_category'] = Category::take(7)->get();
            $data['footer_blog'] = Post::orderBy('views','desc')->take(7)->get();
            return view('auth.verify-phone',$data);
        }else{
            return redirect()->route('user-dashboard');
        }

    }

    public function submitPhoneVerify(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);
        if (Auth::check()){
            $user = User::findOrFail(Auth::user()->id);
            if ($user->phone_code == $request->code){
                $user->phone_status = 1;
                $user->save();
                return redirect()->route('user-dashboard');
            }else{
                session()->flash('message','Verification Code In Invalid');
                return redirect()->back();
            }
        }else{
            return redirect()->route('home');
        }
    }

    public function submitVerify(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);
        if (Auth::check()){
            $user = User::findOrFail(Auth::user()->id);
            if ($user->email_code == $request->code){
                $user->email_status = 1;
                $user->save();
                return redirect()->route('user-dashboard');
            }else{
                session()->flash('message','Verification Code In Invalid');
                return redirect()->back();
            }
        }else{
            return redirect()->route('home');
        }
    }

    public function emailResubmit(Request $request)
    {

        if (Auth::check()){
            $user = User::findOrFail(Auth::user()->id);
            if ($user->email_expire > Carbon::now()){
                session()->flash('message',"Please try again after ". Carbon::parse($user->email_expire)->diffInSeconds().' second.');
                return redirect()->route('email-verify');
            }else{
                $code = strtoupper(Str::random(6));
                $user->email_code = $code;
                $user->email_expire = Carbon::parse()->addMinutes(3);
                $user->save();
                $this->verificationSend($user->id);
                session()->flash('message','Verificación de correo electrónico reenviada con éxito.');
                return redirect()->route('email-verify');
            }
        }else{
            return redirect()->route('home');
        }
    }

    public function phoneResubmit(Request $request)
    {
        if (Auth::check()){
            $user = User::findOrFail(Auth::user()->id);
            if ($user->phone_expire > Carbon::now()){
                session()->flash('message',"Please try again after ". Carbon::parse($user->phone_expire)->diffInSeconds().' second.');
                return redirect()->route('phone-verify');
            }else{
                $user->phone_code = rand(11111,99999);
                $user->phone_expire = Carbon::parse()->addMinutes(3);
                $user->save();
                $this->phoneVerification($user->id);
                session()->flash('message','Verificación telefónica reenviada con éxito.');
                return redirect()->route('phone-verify');
            }
        }else{
            return redirect()->route('home');
        }
    }
}
