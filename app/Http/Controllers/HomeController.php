<?php

namespace App\Http\Controllers;

use App\AdPlan;
use App\Ads;
use App\BasicSetting;
use App\BasicSetting2;
use App\Category;
use App\Coupon;
use App\Member;
use App\Menu;
use App\Partner;
use App\Plan;
use App\Post;
use App\Signal;
use App\Slider;
use App\Social;
use App\Speciality;
use App\Subscribe;
use App\Testimonial;
use App\TraitsFolder\CommonTrait;
use App\User;
use App\UserAds;
use App\UserSignal;
use Authy\AuthyApi;
use App\Faq;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Twilio\Rest\Client;
use App\Mail\EmailSender;
use Illuminate\Support\Facades\Log;
use App\Section;

class HomeController extends Controller
{
    use CommonTrait;
    public function getIndex()
    {
        
        $data['page_title'] = "Home Page";
        $data['slider'] = Slider::where('welcome_slider', 0)->get();
        $data['category'] = Category::all();
        $data['testimonial'] = Testimonial::all();
        $data['member'] = Member::all();
        $data['speciality'] = Speciality::all();
        //$data['plan'] = Plan::orderBy('duration')->where('onlyAdmin',0)->whereStatus(1)->get();
        $data['plan']           = [];
        $params                 = ['status' => 1, 'order_by' => ['column' => 'plans.duration', 'direction' => 'asc']];
        $data['plan_promos']    = Plan::get(array_merge($params, ['only_promo' => 1, 'valid_expiration' => true]));
        $data['plan']           = Plan::get(array_merge($params, ['pages' => ['frontend'], 'only_promo' => 0]));
        $data['promos']         = [];
        foreach ($data['plan_promos'] as $key => $promo) {
            $timeout            = Carbon::parse($promo->promo_duration)->timestamp - Carbon::now()->timestamp;
            $p['id']            = $promo->id;
            $p['timeout']       = $timeout > 0 ? $timeout : 0;
            $data['promos'][]   = $p;
        }
        $data['total_user'] = User::all()->count();
        $data['total_category'] = Category::all()->count();
        $data['total_blog'] = Post::all()->count();
        $data['total_signal'] = Signal::all()->count();
        $data['social'] = Social::all();
        $data['partner'] = Partner::all();
        $data['blog'] = Post::latest()->take(6)->get();
        $data['menus'] = Menu::all();
        $data['footer_category'] = Category::take(7)->get();
        $data['footer_blog'] = Post::orderBy('views','desc')->take(7)->get();
        $data['phone_contact'] = BasicSetting::first()->phone;
        $data['about_demo_link'] = Section::first()->about_demo_link;
        $data['slider_video'] = Section::first()->slider_video;
        $data['slider_image'] = Section::first()->slider_image;
        $data['slider_is_video'] = Section::first()->slider_is_video;
        return view('home.home',$data);
    }

    public function getMenu($id,$slug)
    {
        $data['men'] = Menu::whereId($id)->first();
        $data['page_title'] = $data['men']->name;
        $data['menus'] = Menu::all();
        $data['social'] = Social::all();
        $data['category'] = Category::all();
        $data['footer_category'] = Category::take(7)->get();
        $data['footer_blog'] = Post::orderBy('views','desc')->take(7)->get();
        return view('home.menus',$data);
    }

    public function getAbout()
    {
        $data['page_title'] = 'About Us';
        $data['menus'] = Menu::all();
        $data['social'] = Social::all();
        $data['category'] = Category::all();
        $data['footer_category'] = Category::take(7)->get();
        $data['team'] = Member::all();
        $data['plan'] = Plan::orderBy('duration')->whereStatus(1)->get();
        $data['total_user'] = User::all()->count();
        $data['total_category'] = Category::all()->count();
        $data['total_blog'] = Post::all()->count();
        $data['total_signal'] = Signal::all()->count();
        $data['testimonial'] = Testimonial::all();
        $data['footer_blog'] = Post::orderBy('views','desc')->take(7)->get();
        return view('home.about-us',$data);
    }

    public function getContact()
    {
        $data['page_title'] = 'Contact Us';
        $data['menus'] = Menu::all();
        $data['social'] = Social::all();
        $data['category'] = Category::all();
        $data['footer_category'] = Category::take(7)->get();
        $data['footer_blog'] = Post::orderBy('views','desc')->take(7)->get();
        $data['phone_contact'] = BasicSetting::first()->phone;
        return view('home.contact-us',$data);
    }

    public function submitContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);
        $this->sendContact($request->email,$request->name,$request->subject,$request->message,$request->phone);
        session()->flash('message','Contact Message Successfully Send.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function submitSubscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribes,email'
        ]);
        $in = Input::except('_method','_token');
        Subscribe::create($in);
        session()->flash('message','Suscripción Completada.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function getBlog()
    {
        $data['page_title'] = 'Blog Page';
        $data['blog'] = Post::latest()->paginate(3);
        $data['category'] = Category::all();
        $data['social'] = Social::all();
        $data['popular'] = Post::orderBy('views','desc')->take(15)->get();
        $data['menus'] = Menu::all();
        $data['footer_category'] = Category::take(7)->get();
        $data['footer_blog'] = Post::orderBy('views','desc')->take(7)->get();
        $data['phone_contact'] = BasicSetting::first()->phone;
        return view('home.blog',$data);
    }

    public function detailsBlog($slug)
    {
        $data['page_title'] = 'Blog Details';
        $data['blog'] = Post::whereSlug($slug)->first();
        $data['blog']->views = $data['blog']->views +1;
        $data['category'] = Category::all();
        $data['social'] = Social::all();
        $data['popular'] = Post::orderBy('views','desc')->take(10)->get();
        $data['blog']->save();
        $data['menus'] = Menu::all();
        $data['footer_category'] = Category::take(7)->get();
        $data['footer_blog'] = Post::orderBy('views','desc')->take(7)->get();
        $data['meta'] = 2;
        $data['phone_contact'] = BasicSetting::first()->phone;
        return view('home.blog-details',$data);
    }

    public function categoryBlog($slug)
    {
        $category = Category::whereSlug($slug)->first();
        $data['page_title'] = $category->name.' - Blog';
        $data['blog'] = Post::whereCategory_id($category->id)->latest()->paginate(3);
        $data['category'] = Category::all();
        $data['social'] = Social::all();
        $data['popular'] = Post::orderBy('views','desc')->take(15)->get();
        $data['menus'] = Menu::all();
        $data['footer_category'] = Category::take(7)->get();
        $data['footer_blog'] = Post::orderBy('views','desc')->take(7)->get();
        $data['phone_contact'] = BasicSetting::first()->phone;
        return view('home.blog',$data);
    }

    public function getFAQ()
    {
        $data['page_title'] = "Preguntas Frecuentes";
        $data['social'] = Social::all();
        $data['menus'] = Menu::all();
        $data['category'] = Category::all();
        $data['footer_category'] = Category::take(7)->get();
        $data['footer_blog'] = Post::orderBy('views','desc')->take(7)->get();
        $data['phone_contact'] = BasicSetting::first()->phone;
        $data['faqs'] = Faq::get();
        return view('home.faq',$data);
    }

    public function getTermCondition()
    {
        $data['page_title'] = "Term And Condition";
        $data['social'] = Social::all();
        $data['menus'] = Menu::all();
        $data['category'] = Category::all();
        $data['footer_category'] = Category::take(7)->get();
        $data['footer_blog'] = Post::orderBy('views','desc')->take(7)->get();
        $data['phone_contact'] = BasicSetting::first()->phone;
        $data['terms'] = BasicSetting::first()->terms;
        return view('home.term-condition',$data);
    }
    
    public function getWarning()
    {
        $data['page_title'] = "Aviso Legal";
        $data['social'] = Social::all();
        $data['menus'] = Menu::all();
        $data['category'] = Category::all();
        $data['footer_category'] = Category::take(7)->get();
        $data['footer_blog'] = Post::orderBy('views','desc')->take(7)->get();
        $data['phone_contact'] = BasicSetting::first()->phone;
        $data['warning'] = BasicSetting::first()->warning;
        return view('home.warning',$data);
    }
    
    public function getCookies()
    {
        $data['page_title'] = "Cookies";
        $data['social'] = Social::all();
        $data['menus'] = Menu::all();
        $data['category'] = Category::all();
        $data['footer_category'] = Category::take(7)->get();
        $data['footer_blog'] = Post::orderBy('views','desc')->take(7)->get();
        $data['phone_contact'] = BasicSetting::first()->phone;
        $data['cookies'] = BasicSetting2::first()->cookies;
        return view('home.cookies',$data);
    }

    public function getPrivacyPolicy()
    {
        $data['page_title'] = "Privacy And Policy";
        $data['social'] = Social::all();
        $data['menus'] = Menu::all();
        $data['category'] = Category::all();
        $data['footer_category'] = Category::take(7)->get();
        $data['footer_blog'] = Post::orderBy('views','desc')->take(7)->get();
        $data['phone_contact'] = BasicSetting::first()->phone;
        return view('home.privacy-policy',$data);
    }

    public function welcome()
    {
        $data['page_title'] = 'Welcome';
        $data['menus'] = Menu::all();
        $data['social'] = Social::all();
        $data['category'] = Category::all();
        $data['footer_category'] = Category::take(7)->get();
        $data['footer_blog'] = Post::orderBy('views','desc')->take(7)->get();
        $data['country'] = json_decode(file_get_contents(storage_path('json/country.json')), true);
        $data['social'] = Social::all();
        //$data['plan'] = Plan::orderBy('duration')->where('onlyAdmin',0)->whereStatus(1)->get();
        $data['plan']       = [];
        $plans              = Plan::orderBy('duration')->whereStatus(1)->get();
        foreach ($plans as $key => $plan)
            if ($plan->has('frontend'))
                $data['plan'][] = $plan;
        $data['menus'] = Menu::all();
        $data['category'] = Category::all();
        $data['slider'] = Slider::where('welcome_slider', 1)->get();
        $data['phone_contact'] = BasicSetting::first()->phone;
        return view('home.welcome', $data);
    }

    public function bienvenido()
    {
        $data['page_title'] = 'Welcome';
        $data['menus'] = Menu::all();
        $data['social'] = Social::all();
        $data['category'] = Category::all();
        $data['footer_category'] = Category::take(7)->get();
        $data['footer_blog'] = Post::orderBy('views','desc')->take(7)->get();
        $data['country'] = json_decode(file_get_contents(storage_path('json/country.json')), true);
        $data['social'] = Social::all();
        //$data['plan'] = Plan::orderBy('duration')->where('onlyAdmin',0)->whereStatus(1)->get();
        $data['plan']       = [];
        $plans              = Plan::orderBy('duration')->whereStatus(1)->get();
        foreach ($plans as $key => $plan)
            if ($plan->has('frontend'))
                $data['plan'][] = $plan;
        $data['menus'] = Menu::all();
        $data['category'] = Category::all();
        $data['slider'] = Slider::where('welcome_slider', 1)->get();
        $data['phone_contact'] = BasicSetting::first()->phone;
        return view('home.bienvenido', $data);
    }

    public function submitCronJob()
    {
        // $pendingSignal = Signal::whereStatus(0)->wherePublish_status(1)->where('publish_date','<',Carbon::now())->get();
        // foreach ($pendingSignal as $sig){
        //     $signalPlan = explode(';', $sig->plan_ids);
        //     $basic = BasicSetting::first();

        //     foreach ($signalPlan as $key => $value) {
        //         $pp = Plan::findOrFail($value);
        //         $users = User::whereEmail_status(1)->wherePhone_status(1)->wherePlan_status(1)->wherePlan_id($value)->get();

        //         foreach ($users as $user) {
        //             $uu['user_id'] = $user->id;
        //             $uu['signal_id'] = $sig->id;
        //             $uu['plan_id'] = $value;
        //             UserSignal::create($uu);

        //             if ($pp->email_status == 1) {
        //                 $this->sendSignalMail($user->id, $sig->id);
        //             }
        //             if ($pp->sms_status == 1) {
        //                 $this->sendSignalSMS($user->id);
        //             }
        //             if ($basic->telegram_status == 1) {
        //                 if ($pp->telegram_status == 1) {
        //                     if ($user->telegram_id != null) {
        //                         $botToken = $basic->telegram_token;
        //                         $web = 'https://api.telegram.org/bot' . $botToken;
        //                         $text = $sig->telegram;
        //                         file_get_contents($web . "/sendMessage?chat_id=" . $user->telegram_id . "&text=" . $text);
        //                     }
        //                 }
        //             }
        //         }
        //     }
        //     $sig->status = 1;
        //     $sig->save();
        // }

        // $user = User::wherePlan_status(1)->where('expire_time','!=',1)->get();
        // foreach ($user as $u){
        //     if ($u->expire_time < Carbon::now()){
        //         $u->plan_status = 0;
        //         $u->save();
        //     }
        // }
    }
    
    public function submitExpireNotification()
    {
        $basic = BasicSetting::first();
        $users = User::whereDate('expire_time','<', Carbon::now())->where('payment_type','!=',null)->where('plan_status', 1)->get();
        foreach($users as $user)
        {
            $user->plan_status = 0;
            $user->save();
        }
        
        $users = User::whereDate('expire_time','=', date('Y-m-d', strtotime('+10 days')))->where('payment_type','!=', null)->where('plan_status', 1)->get();
        // $users = \App\User::where('email', 'scar20181228@gmail.com')->get();
        for ( $i = 0; $i < count($users); $i++ )
        {
            $user = $users[$i];
            try {
                $this->sendMail($user->email, $user->name, $basic->expire_email_subject, $basic->expire_email_text, $basic->expire_email_title);
            }catch(\Swift_TransportException $r){
                $i--;
                sleep(2);
            } catch(\Exception $e) {
            }
        }
    }
    
    public function testEmail()
    {
        $basic = BasicSetting::first();
        $name = 'Hasan Rahman';
        $email = 'hellomrhasan@gmail.com';
        $mail_val = [
            'email' => $email,
            'name' => $name,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => 'Signel Test Email',
        ];
        $text = 'This a Test Mail';
        $body = $basic->email_body;
        $body = str_replace("{{name}}",$name,$body);
        $body = str_replace("{{message}}",$text,$body);
        $body = str_replace("{{site_title}}","Softwarezon",$body);

        Mail::send('emails.email', ['body'=>$body], function ($m) use ($mail_val) {
            $m->from($mail_val['g_email'], $mail_val['g_title']);
            $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
        });

        if (Mail::failures()) {
            echo "Mail Not Send";
        }else{
            echo "Successfully Send";
        }
    }

}
