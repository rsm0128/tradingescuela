<?php

namespace App\Http\Controllers\Auth;

use App\BasicSetting;
use App\Category;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Post;
use App\Social;
use App\TraitsFolder\CommonTrait;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use CommonTrait;

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showLinkRequestForm()
    {
        $data['page_title'] = "Reset Password";
        $data['social'] = Social::all();
        $data['menus'] = Menu::all();
        $data['category'] = Category::all();
        $data['phone_contact'] = BasicSetting::first()->phone_contact;
        $data['footer_category'] = Category::take(7)->get();
        $data['footer_blog'] = Post::orderBy('views','desc')->take(7)->get();
        return view('auth.passwords.email',$data);
    }
    protected function validateEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'g-recaptcha-response' => 'captcha'
        ]);
    }
    public function sendResetLinkEmail(Request $request)
    {

        $this->validateEmail($request);

        $us = User::whereEmail($request->email)->count();
        if ($us == 0)
        {
            session()->flash('message','We can\'t find a user with that e-mail address.');
            session()->flash('type','danger');
            return redirect()->back();
        }else{
            $user1 = User::whereEmail($request->email)->first();
            $route = 'password.reset';
            $this->userPasswordReset($user1->email,$user1->name,$route);
            session()->flash('message','Password Reset Link Send Your E-mail');
            session()->flash('type','success');
            return redirect()->back();
        }

    }
}
