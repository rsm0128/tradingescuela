<?php

namespace App\Http\Controllers;

use App\SubAdmin;
use App\Subscriber;
use App\BasicSetting;
use App\DatabaseBackup;
use App\EmailSetting;
use App\TraitsFolder\DatabaseBackupTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class SubscriberBasicSettingController extends Controller
{
    use DatabaseBackupTrait;
    public function __construct()
    {
        // $this->middleware('auth:admin');
    }
    // public function getBasicSetting()
    // {
    //     $data['page_title'] = "Basic Setting";
    //     return view('basic.basic-setting',$data);
    // }
    // protected function putBasicSetting(Request $request,$id)
    // {
    //     $basic = BasicSetting::findOrFail($id);
    //     $this->validate($request,[
    //       'title' => 'required',
    //         'phone' => 'required',
    //         'email' => 'required',
    //         'address' => 'required',
    //     ]);
    //     $in = Input::except('_method','_token');
    //     $in['email_verify'] = $request->email_verify == 'on' ? '1' : '0';
    //     $in['phone_verify'] = $request->phone_verify == 'on' ? '1' : '0';
    //     $in['telegram_status'] = $request->telegram_status == 'on' ? '1' : '0';
    //     $basic->fill($in)->save();
    //     session()->flash('message', 'Basic Setting Updated Successfully.');
    //     Session::flash('type', 'success');
    //     Session::flash('title', 'Success');
    //     return redirect()->back();
    // }
    public function getChangePass()
    {
        $data['page_title'] = "Change Password";
        return view('dashboard.subscriber-change-password',$data);
    }
    public function postChangePass(Request $request)
    {
        $this->validate($request, [
            'current_password' =>'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {
            $c_password = Auth::guard('subscriber')->user()->password;
            $c_id = Auth::guard('subscriber')->user()->id;

            $user = Subscriber::findOrFail($c_id);

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
    public function editProfile()
    {
        $data['page_title'] = "Edit Subscriber Profile";
        $data['admin'] = Subscriber::findOrFail(Auth::guard('subscriber')->user()->id);
        return view('dashboard.subscriber-edit-profile',$data);
    }

    public function updateProfile(Request $request)
    {
        $subscriber = Subscriber::findOrFail(Auth::guard('subscriber')->user()->id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:subadmins,email,'.$subscriber->id,
            'username' => 'required|min:3|unique:subadmins,username,'.$subscriber->id,
            'image' => 'mimes:png,jpg,jpeg'
        ]);
        $in = Input::except('_method','_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            Image::make($image)->resize(215,215)->save($location);
            if ($subscriber->image != 'admin-default.png'){
                $path = './assets/images/';
                $link = $path.$subscriber->image;
                if (file_exists($link)){
                    unlink($link);
                }
            }
            $subscriber->image = $filename;
        }
        $subscriber->name = $request->name;
        $subscriber->email = $request->email;
        $subscriber->username = $request->username;
        $subscriber->save();
        session()->flash('message','Profile Updated Successfully.');
        session()->flash('title','Success');
        session()->flash('type','success');
        return redirect()->back();
    }
}
