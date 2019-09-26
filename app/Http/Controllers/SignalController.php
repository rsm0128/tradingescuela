<?php

namespace App\Http\Controllers;

use App\SignalComment;
use App\SignalRating;
use App\Telegram;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Session;
use File;
use App\Signal;
use App\Plan;
use App\User;
use App\UserPlan;
use Carbon\Carbon;
use App\BasicSetting;
use DB;
use App\UserSignal;
use App\TraitsFolder\CommonTrait;
class SignalController extends Controller
{
    use CommonTrait;

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create()
    {
        // 	$data['plan'] = Plan::whereStatus(1)->get();
        $data['plan'] = Plan::all();
        $data['page_title'] = "Create New Signal";
        return view('signal.create',$data);
    }
    public function store(Request $request)
    {
		ini_set('max_execution_time', 900);
		
        $request->validate([
           'title' => 'required',
           'service_id' => 'required',
           'description' => 'required',
        //   'sms_tem' => 'required',
           //'telegram' => 'required',
        ]);
        
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['sms_body'] = $request->sms_tem;
        //$data['telegram'] = $request->telegram;
        $data['publish_status'] = $request->publish_status;
        $data['publish_date'] = $request->publish_date;
        $data['plan_ids'] = implode(";", $request->service_id);
        $data['sms_enabled'] = filter_var($request->sms_enabled, FILTER_VALIDATE_BOOLEAN);
        $data['email_enabled'] = filter_var($request->email_enabled, FILTER_VALIDATE_BOOLEAN);

        $sig = Signal::create($data);

        if ($sig->publish_status == 0) {
            $signalPlan = explode(';', $sig->plan_ids);
            $basic = BasicSetting::first();
            
            foreach ($signalPlan as $key => $value) {
                $pp = Plan::findOrFail($value);
                $users = User::where('email_status', 1)
                        ->where('phone_status', 1)
                        ->where('plan_status', 1)
                        ->where('plan_id', $value)
                        ->get();
                $count = 0;
                for ( $i = 0; $i < count($users); $i++ ) {
                    $user = $users[$i];
                    $uu['user_id'] = $user->id;
                    $uu['signal_id'] = $sig->id;
                    $uu['plan_id'] = $value;
                    UserSignal::create($uu);
                    try {
                        if ($pp->email_status == 1) {
                            if($sig->email_enabled)
                                $this->sendSignalMailInfobip($user->id, $sig->id);
                        }
                    }catch(\Swift_TransportException $r){
                        $i--;
                        sleep(2);
                    } catch(\Exception $e) {
                    }
                }
            }
            foreach ($signalPlan as $key => $value) {
                $pp = Plan::findOrFail($value);
                $users = User::where('email_status', 1)
                        ->where('phone_status', 1)
                        ->where('plan_status', 1)
                        ->where('plan_id', $value)
                        ->get();
                $count = 0;
                for ( $i = 0; $i < count($users); $i++ ) {
                    $user = $users[$i];
                    $uu['user_id'] = $user->id;
                    $uu['signal_id'] = $sig->id;
                    $uu['plan_id'] = $value;
                    UserSignal::create($uu);
                    if($sig->sms_enabled)
                    {
                        try{
                            if ($pp->sms_status == 1) {
                                $this->sendSignalCustomSMS($user->id, $request->sms_tem);
                            }
                        }catch(\Exception $e){
                            $i--;
                            sleep(2);
                        }
                    }
                    /*if ($basic->telegram_status == 1) {
                        if ($pp->telegram_status == 1) {
                            if ($user->telegram_id != null) {
                                $botToken = $basic->telegram_token;
                                $web = 'https://api.telegram.org/bot'.$botToken;
                                $text = $sig->telegram;
                                file_get_contents($web."/sendMessage?chat_id=".$user->telegram_id."&text=".$text);
                            }
                        }
                    }*/
                }
            }
            
            $sig->status = 1;
            $sig->save();

            session()->flash('message', 'Signal Created Successfully.');
            Session::flash('type', 'success');
            Session::flash('title', 'Success');
            return back();
        }else{
            session()->flash('message', 'Signal Posted Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        }
    }
    public function index()
    {
        $data['page_title'] = "Todas las Señales";
        $data['signal'] = Signal::orderBy('id','desc')->paginate(20);
        return view('signal.index',$data);
    }
    public function show($id)
    {
       $data['page_title'] = "Ver Señal";
        $data['signal'] = Signal::findOrFail($id);
        $signalDetails = $data['signal'];
        $data['total_comment'] = SignalComment::whereSignal_id($signalDetails->id)->count();
        $data['comments'] = SignalComment::whereSignal_id($signalDetails->id)->get();
        $data['total_rating'] = SignalRating::whereSignal_id($signalDetails->id)->count();
        $data['sum_rating'] = SignalRating::whereSignal_id($signalDetails->id)->sum('rating');
        if ($data['total_rating'] == 0){
            $data['final_rating'] = 0;
        }else{
            $data['final_rating'] = round($data['sum_rating'] / $data['total_rating']);
        }
        $data['rating'] = SignalRating::whereSignal_id($signalDetails->id)->get();
        $data['user_rating'] = SignalRating::whereSignal_id($signalDetails->id)->whereUser_id(0)->first();
        return view('signal.view',$data);
    }

    public function edit($id)
    {
        $data['page_title'] = "Editar Señal";
        $data['signal'] = Signal::findOrFail($id);
        // $data['plan'] = Plan::whereStatus(1)->get();
        $data['plan'] = Plan::all();
        $ss = $data['signal']->plan_ids;
        $data['signalPlan'] = explode(';',$ss);
        return view('signal.edit',$data);
    }

    public function update(Request $request)
    {
        $signal = Signal::findOrFail($request->signal_id);

        $request->validate([
            'title' => 'required',
            'service_id' => 'required',
            'description' => 'required',
            // 'sms_body' => 'required',
           //'telegram' => 'required',
        ]);

        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['sms_body'] = $request->sms_body;
        //$data['telegram'] = $request->telegram;
        $data['publish_status'] = $request->publish_status;
        $data['publish_date'] = $request->publish_date;
        $data['plan_ids'] = implode(";", $request->service_id);
        $data['sms_enabled'] = filter_var($request->sms_enabled, FILTER_VALIDATE_BOOLEAN);
        $data['email_enabled'] = filter_var($request->email_enabled, FILTER_VALIDATE_BOOLEAN);
        $signal->update($data);
        $sig = Signal::findOrFail($signal->id);

        if ($sig->publish_status == 0) {

            $signalPlan = explode(';', $sig->plan_ids);
            $basic = BasicSetting::first();

            foreach ($signalPlan as $key => $value) {
                $pp = Plan::findOrFail($value);
                $users = User::whereEmail_status(1)->wherePhone_status(1)->wherePlan_status(1)->wherePlan_id($value)->get();

                foreach ($users as $user) {
                    $uu['user_id'] = $user->id;
                    $uu['signal_id'] = $sig->id;
                    $uu['plan_id'] = $value;
                    // UserSignal::create($uu);

                    // if ($pp->email_status == 1) {
                    //     $this->sendSignalMail($user->id, $sig->id);
                    // }
                    // if ($pp->sms_status == 1) {
                    //     $this->sendSignalSMS($user->id);
                    // }
                    if($sig->email_enabled)
                    {
                        try {
                            if ($pp->email_status == 1) {
                                $this->sendSignalMail($user->id, $sig->id);
                            }
                        }catch(\Swift_TransportException $r){
                            $i--;
                            sleep(2);
                        } catch(\Exception $e) {
                        }
                    }
                    if($sig->sms_enabled)
                    {
                        try{
                            if ($pp->sms_status == 1) {
                                $this->sendSignalCustomSMS($user->id, $request->sms_tem);
                            }
                        }catch(\Exception $e){
                            $i--;
                            sleep(2);
                        }
                    }
                    /*if ($basic->telegram_status == 1) {
                        if ($pp->telegram_status == 1) {
                            if ($user->telegram_id != null) {
                                $botToken = $basic->telegram_token;
                                $web = 'https://api.telegram.org/bot'.$botToken;
                                $text = $sig->telegram;
                                file_get_contents($web."/sendMessage?chat_id=".$user->telegram_id."&text=".$text);
                            }
                        }
                    }*/
                }
            }
            $sig->status = 1;
            $sig->save();
            session()->flash('message', 'Signal Update Successfully.');
            Session::flash('type', 'success');
            Session::flash('title', 'Success');
            return redirect()->back();
        }else{
            session()->flash('message', 'Signal Update Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $testimonial = Signal::findOrFail($request->id);
        $testimonial->delete();
        UserSignal::whereSignal_id($request->id)->delete();
        session()->flash('message', 'Signal Deleted Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
}
