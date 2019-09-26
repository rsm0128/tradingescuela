<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function getSpecialitySection()
    {
        $data['page_title'] = 'Speciality Section';
        return view('section.speciality',$data);
    }

    public function submitSpecialitySection(Request $request)
    {
        $section = Section::first();
        $section->speciality_title = $request->speciality_title;
        $section->speciality_description = $request->speciality_description;
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function getCurrencySection()
    {
        $data['page_title'] = 'Currency Section';
        return view('section.currency',$data);
    }

    public function submitCurrencySection(Request $request)
    {
        $section = Section::first();
        $section->currency_title = $request->currency_title;
        $section->currency_description = $request->currency_description;
        $section->currency_cal = $request->currency_cal;
        $section->currency_live = $request->currency_live;
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function getTradingSection()
    {
        $data['page_title'] = 'Live Trading Section';
        return view('section.trading',$data);
    }

    public function submitTradingSection(Request $request)
    {
        $section = Section::first();
        $section->trading_title = $request->trading_title;
        $section->trading_description = $request->trading_description;
        $section->trading_script = $request->trading_script;
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function getAdvertiseSection()
    {
        $data['page_title'] = 'Advertise Section';
        return view('section.advertise',$data);
    }

    public function submitAdvertiseSection(Request $request)
    {
        $section = Section::first();
        $section->advertise_title = $request->advertise_title;
        $section->advertise_description = $request->advertise_description;
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function getSubscriberSection()
    {
        $data['page_title'] = 'Subscriber Section';
        return view('section.subscriber',$data);
    }

    public function submitSubscriberSection(Request $request)
    {
        $section = Section::first();
        $section->subscriber_title = $request->subscriber_title;
        $section->subscriber_description = $request->subscriber_description;
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function getPlanSection()
    {
        $data['page_title'] = 'Plan Section';
        return view('section.plan',$data);
    }

    public function submitPlanSection(Request $request)
    {
        $section = Section::first();
        $section->price_title = $request->price_title;
        $section->price_description = $request->price_description;
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function getAboutSection()
    {
        $data['page_title'] = 'About Section';
        return view('section.about',$data);
    }

    public function submitAboutSection(Request $request)
    {
        $request->validate([
            'about_demo_link' => 'required',
            'about_title' => 'required',
            'about_description' => 'required',
        ]);
        $section = Section::first();
        $section->about_demo_link = $request->about_demo_link;
        $section->about_title = $request->about_title;
        $section->about_description = $request->about_description;
        $section->about_video = $request->about_video;
        $section->about_is_video = filter_var($request->about_is_video, FILTER_VALIDATE_BOOLEAN);
        if($request->hasFile('about_image')){
            $image = $request->file('about_image');
            $filename = 'about_image'.'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            $path = './assets/images/'.$section->about_image;
            File::delete($path);
            Image::make($image)->resize(620,585)->save($location);
            $section->about_image = $filename;
        }

        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function submitAboutSection2(Request $request)
    {
        $request->validate([
            'about_demo_link2' => 'required',
            'about2_title' => 'required',
            'about2_description' => 'required',
        ]);
        $section = Section::first();
        $section->about_demo_link2 = $request->about_demo_link2;
        $section->about2_title = $request->about2_title;
        $section->about2_description = $request->about2_description;
        if($request->hasFile('about_image')){
            $image = $request->file('about_image');
            $filename = 'about2_image'.'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            $path = './assets/images/'.$section->abou2_image;
            File::delete($path);
            Image::make($image)->resize(620,585)->save($location);
            $section->about2_image = $filename;
        }

        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    
    public function submitAboutSection3(Request $request)
    {
        $request->validate([
            'about_demo_link3' => 'required',
            'about3_title' => 'required',
            'about3_description' => 'required',
        ]);
        $section = Section::first();
        $section->about_demo_link3 = $request->about_demo_link3;
        $section->about3_title = $request->about3_title;
        $section->about3_description = $request->about3_description;
        if($request->hasFile('about_image')){
            $image = $request->file('about_image');
            $filename = 'about3_image'.'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            $path = './assets/images/'.$section->about3_image;
            File::delete($path);
            Image::make($image)->resize(620,585)->save($location);
            $section->about3_image = $filename;
        }

        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    
    public function submitAboutSection4(Request $request)
    {
        $request->validate([
            'about_demo_link4' => 'required',
            'about4_title' => 'required',
            'about4_description' => 'required',
        ]);
        $section = Section::first();
        $section->about_demo_link4 = $request->about_demo_link4;
        $section->about4_title = $request->about4_title;
        $section->about4_description = $request->about4_description;
        if($request->hasFile('about_image')){
            $image = $request->file('about_image');
            $filename = 'about4_image'.'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            $path = './assets/images/'.$section->about4_image;
            File::delete($path);
            Image::make($image)->resize(620,585)->save($location);
            $section->about4_image = $filename;
        }

        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    
    public function getCouponSection()
    {
        $data['page_title'] = 'Coupon Section';
        return view('section.coupon',$data);
    }

    public function submitCouponSection(Request $request)
    {
        $section = Section::first();
        $section->coupon_title = $request->coupon_title;
        $section->coupon_description = $request->coupon_description;
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function getCounterSection()
    {
        $data['page_title'] = 'Counter Section';
        return view('section.counter',$data);
    }

    public function submitCounterSection(Request $request)
    {
        $section = Section::first();
        if($request->hasFile('counter_image')){
            $image = $request->file('counter_image');
            $filename = 'counter_image'.'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            $path = './assets/images/'.$section->counter_image;
            File::delete($path);
            Image::make($image)->resize(1920,420)->save($location);
            $section->counter_image = $filename;
            $section->save();
        }
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function getTestimonialSection()
    {
        $data['page_title'] = 'Testimonial Section';
        return view('section.testimonial',$data);
    }

    public function submitTestimonialSection(Request $request)
    {
        $section = Section::first();
        $section->testimonial_title = $request->testimonial_title;
        $section->testimonial_description = $request->testimonial_description;
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function getBlogSection()
    {
        $data['page_title'] = 'Blog Section';
        return view('section.blog',$data);
    }

    public function submitBlogSection(Request $request)
    {
        $section = Section::first();
        $section->blog_title = $request->blog_title;
        $section->blog_description = $request->blog_description;
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function getTeamSection()
    {
        $data['page_title'] = 'Team Section';
        return view('section.team',$data);
    }

    public function submitTeamSection(Request $request)
    {
        $section = Section::first();
        $section->team_title = $request->team_title;
        $section->team_description = $request->team_description;
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function getRegisterSection()
    {
        $data['page_title'] = 'Register Section';
        return view('section.register',$data);
    }

    public function submitRegisterSection(Request $request)
    {
        $section = Section::first();
        $section->register_title = $request->register_title;
        $section->register_description = $request->register_description;
        if($request->hasFile('register_image')){
            $image = $request->file('register_image');
            $filename = 'register_image'.'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            $path = './assets/images/'.$section->register_image;
            File::delete($path);
            Image::make($image)->resize(755,736)->save($location);
            $section->register_image = $filename;
        }
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function getLoginSection()
    {
        $data['page_title'] = 'Login Section';
        return view('section.login',$data);
    }

    public function submitLoginSection(Request $request)
    {
        $section = Section::first();
        $section->login_title = $request->login_title;
        $section->login_description = $request->login_description;
        if($request->hasFile('login_image')){
            $image = $request->file('login_image');
            $filename = 'register_image'.'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            $path = './assets/images/'.$section->login_image;
            File::delete($path);
            Image::make($image)->resize(755,736)->save($location);
            $section->login_image = $filename;
        }
        $section->save();
        session()->flash('message','Section Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

}
