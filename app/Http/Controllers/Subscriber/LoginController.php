<?php

namespace App\Http\Controllers\Subscriber;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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

    protected $redirectTo = '/subscriber/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest:subscriber')->except('logout');
    }

    public $maxAttempts = 3;

    public $decayMinutes = 3;

    public function showLoginForm()
    {
        return view('subscriber.login');
    }

    public function guard()
    {
        return Auth::guard('subscriber');
    }

    public function username()
    {
        return 'email';
    }

    public function logout()
    {
        $this->guard('admin')->logout();
        session()->flash('message', 'Just Logged Out!');
        return redirect('/subscriber');
    }

}
