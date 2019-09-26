<?php

namespace App\Http\Controllers\Auth;

use App\BasicSetting;
use App\Category;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Post;
use App\Social;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user-dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public $maxAttempts = 5;
    public $decayMinutes = 3;


    public function showLoginForm()
    {
        $basic = BasicSetting::first();

        Config::set('captcha.secret',$basic->captcha_secret);
        Config::set('captcha.sitekey',$basic->captcha_site);

        $data['page_title'] = "Log In";
        $data['social'] = Social::all();
        $data['menus'] = Menu::all();
        $data['category'] = Category::all();
        $data['footer_category'] = Category::take(7)->get();
        $data['footer_blog'] = Post::orderBy('views','desc')->take(7)->get();
        $data['phone_contact'] = BasicSetting::first()->phone;
        return view('auth.login',$data);
    }
    protected function guard()
    {
        return Auth::guard();
    }
    public function authenticated(Request $request, $user)
    {
        if ($user->expire_time != 1){
            if ($user->expire_time < Carbon::now()){
                $user->plan_status = 0;
                $user->save();
            }
        }

    }
    public function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
            'g-recaptcha-response' => 'captcha'
        ]);
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
        session()->flash('message','Logout Successfully Completed.');
        session()->flash('type','success');
        return redirect('/login');
    }
}
