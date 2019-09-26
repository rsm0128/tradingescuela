<?php

namespace App\Http\Controllers\Auth;

use App\BasicSetting;
use App\Category;
use App\Menu;
use App\Plan;
use App\Post;
use App\RegCode;
use App\Social;
use App\TraitsFolder\CommonTrait;
use App\User;
use App\Http\Controllers\Controller;
use Authy\AuthyApi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use CommonTrait;
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user-dashboard';
    protected $password = "";
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function showRegistrationForm()
    {
        // $this->sendWelcomeMail(565);
        $basic = BasicSetting::first();

        $data['page_title'] = "Register Now";
        $data['social'] = Social::all();
        //$data['plan'] = Plan::orderBy('duration')->where('onlyAdmin',0)->whereStatus(1)->get();
        $data['plan']       = [];
        $plans              = Plan::orderBy('duration')->whereStatus(1)->get();
        foreach ($plans as $key => $plan)
            if ($plan->has('frontend'))
                $data['plan'][] = $plan;
        $data['menus'] = Menu::all();
        $data['codes'] = RegCode::all();
        $data['category'] = Category::all();
        $data['footer_category'] = Category::take(7)->get();
        $data['footer_blog'] = Post::orderBy('views','desc')->take(7)->get();
        $data['phone_contact'] = BasicSetting::first()->phone;
        $data['country'] = json_decode(file_get_contents(storage_path('json/country.json')), true);

        return view('auth.register',$data);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'plan_id' => 'required',
            'country_code' => 'required',
            'reg_code' => 'sometimes|nullable|exists:reg_codes,value',
            'level' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $basic = BasicSetting::first();
        $plan = Plan::findOrFail($data['plan_id']);
        if ($plan->price == 0){
            $planStatus = 1;
        }else{
            $planStatus = 0;
        }
        $code = strtoupper(Str::random(6));
        $expireTime = Carbon::parse()->addDays($plan->duration);

        if ($basic->email_verify == 1){
            $emailVerify = 0;
        }else{
            $emailVerify = 1;
        }
        $pCode = rand(11111,99999);
        if ($basic->phone_verify == 1){
            $phoneVerify = 0;
        }else{
            $phoneVerify = 1;
        }
        $telegramToken = strtoupper(Str::random(32));
        $this->password = $data['password'];
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'country_code' => $data['country_code'],
            'plan_id' => $data['plan_id'],
            'level' => $data['level'],
            'code' => $data['reg_code'],
            'plan_status' => $planStatus,
            'telegram_token' => $telegramToken,
            'email_code' => $code,
            'email_status' => $emailVerify,
            'phone_code' => $pCode,
            'phone_status' => $phoneVerify,
            'expire_time' => $expireTime,
            'password' => bcrypt($data['password']),
        ]);
    }
    public function registered(Request $request, $user)
    {
        $basic = BasicSetting::first();
        if ($basic->email_verify == 1){
            session()->flash('message','We Have Sent a Verification Code to the Email : '.$user->email.' Please Enter that Code below to Verify your Account');
            $user->email_expire = Carbon::parse()->addMinutes(3);
            $user->save();
            $this->verificationSend($user->id);
        }
        if ($basic->phone_verify == 1){

            $user->phone_expire = Carbon::parse()->addMinutes(3);
            $user->save();

            $this->phoneVerification($user->id);
        }
        $this->sendWelcomeMail($user->id, $this->password);
        if($user->plan_id == 9) {
            return redirect()->route('chose-payment-method');
        } else {
            return redirect()->route('user-dashboard');
        }
    }
}
