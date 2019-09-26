<?php

namespace App\Http\Controllers;

use App\BasicSetting;
use App\Member;
use App\Menu;
use App\Partner;
use App\Slider;
use App\Social;
use App\Speciality;
use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class SubscriberWebSettingController extends Controller
{
    public function manageWelcome()
    {
        $data['page_title'] = "Manage Welcome";
        return view('webControl.subscriber-welcome',$data);
    }
    public function updateWelcome(Request $request)
    {
        $this->validate($request,[
            'welcome' => 'required'
        ]);
        $basic = BasicSetting::first();
        $basic->welcome = $request->welcome;
        $basic->save();
        session()->flash('message', 'Welcome Updated Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    
    public function manageWelcomeMessage()
    {
        $data['page_title'] = "Manage Welcome Message";
        return view('webControl.subscriber-welcome-message',$data);
    }
    public function updateWelcomeMessage(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            // 'youtube_url' => 'required',
            'body' => 'required'
        ]);
        $basic = BasicSetting::first();
        $basic->welcome_message_title = $request->title;
        $basic->welcome_message_youtube = $request->youtube_url;
        $basic->welcome_message_body = $request->body;
        $basic->save();
        session()->flash('message', 'Welcome Message Updated Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
}
