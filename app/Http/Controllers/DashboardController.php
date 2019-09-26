<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

use App\BasicSetting;
use App\Category;
use App\Material;
use App\Plan;
use App\RegCode;
use App\Post;
use App\Section;
use Session;
use App\Signal;
use App\SignalComment;
use App\SignalRating;
use App\StaffRequest;
use App\Subscribe;
use App\TraitsFolder\CommonTrait;
use App\TransactionLog;
use App\User;
use App\UserSignal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    use CommonTrait;
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function getUsersByPayment($paymentOption){
        
    }

    public function getDashboard()
    {

        $data['page_title'] = "Dashboard";
        $data['signal'] = Signal::all()->count();
        $data['blog'] = Post::all()->count();
        $data['category'] = Category::all()->count();
        $data['user'] = User::all()->count();

        $start = Carbon::parse()->subDays(19);
        $end = Carbon::now();
        $stack = [];
        $date = $start;
        while ($date <= $end) {
            $stack[] = $date->copy();
            $date->addDays(1);
        }
        $dL = [];
        $dV = [];
        foreach (array_reverse($stack) as $d){
            $dL[] .= Carbon::parse($d)->format('dS M');

        }
        foreach (array_reverse($stack) as $d){
            $date = Carbon::parse($d)->format('Y-m-d');
            $start = $date.' '.'00:00:00';
            $end = $date.' '.'23:59:59';
            $dC= Signal::whereBetween('created_at',[$start,$end])->get();
            $dV[] .= count($dC);
        }
        $data['dV'] = $dV;
        $data['dL'] = $dL;


        return view('dashboard.dashboard',$data);
    }

    public function manageMaterials(){
        $data['page_title'] = "Administrar Materiales";
        $data['materials'] = Material::orderBy('created_at', 'ASC')->where('is_monthly', 0)->paginate(6);
        $data['mmaterials'] = Material::orderBy('created_at', 'ASC')->where('is_monthly', 1)->paginate(6);
        return view('materials.manage-materials',$data);
    }
    
    public function addMaterialView(){
         $data['page_title'] = "Añadir Material";
        //  $data['plan'] = Plan::get();
         $data['plan'] = Plan::all();
        return view('materials.add-material',$data);
    }

    public function editMaterialView($id){
        $data['page_title'] = "Editar material";
        $data['material'] = Material::findOrFail($id);
        $data['plan'] = Plan::all();
        // $data['plan'] = Plan::whereStatus(1)->get();
        $data['materialPlan'] = explode(';',$data['material']->plans);
        return view('materials.edit-material',$data);
    }

    public function addMaterial(Request $request){
        ini_set('max_execution_time', 900);
		
        $request->validate([
           'title' => 'required',
           'service_id' => 'required',
           'url' => 'required',
        ]);
        $data['title'] = $request->title;
        $data['url'] = $request->url;
        $data['description'] = $request->description;
        $data['plans'] = implode(";", $request->service_id);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/material/' . $filename;
            Image::make($image)->resize(512, 512)->save($location);
            $data['picture'] = $filename;
        }
        $data['is_video'] = filter_var($request->is_video, FILTER_VALIDATE_BOOLEAN);
        $data['active_plan_only'] = (int)$request->active_plan_only;
        $material =  $sig = Material::create($data);
        $material->save();

        session()->flash('message', 'Material añadido.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->route('manage-materials');
    }
    public function updateMaterial(Request $request)
    {
        $material = Material::findOrFail($request->material_id);
        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'service_id' => 'required'
        ]);
        $material->title = $request->title;
        $material->url = $request->url;
        $material->description = $request->description;
        $material['plans'] = implode(";", $request->service_id);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/material/' . $filename;
            Image::make($image)->resize(512, 512)->save($location);
            if ($material->picture != null){
                $path = './assets/images/material/';
                $link = $path.$material->picture;
                if (file_exists($link)){
                    unlink($link);
                }
            }
            $material->picture = $filename;
        }
        $material->is_video = filter_var($request->is_video, FILTER_VALIDATE_BOOLEAN);
        $material->active_plan_only = (int)$request->active_plan_only;
        $material->save();
        session()->flash('message','User Updated Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function materialDelete(Request $request){
        $material = Material::findOrFail($request->id);
        $material->delete();
        session()->flash('message','Material eliminado exitosamente');
        session()->flash('type','success');
        return redirect()->route('manage-materials');
    }
    
    public function addMmaterialView(){
         $data['page_title'] = "Añadir Monthly Material";
        //  $data['plan'] = Plan::get();
        $data['plan'] = Plan::all();
        return view('materials.add-mmaterial',$data);
    }
    public function addMmaterial(Request $request){
        ini_set('max_execution_time', 900);
		
        $request->validate([
           'title' => 'required',
           'service_id' => 'required',
           'doc' => 'required',
        ]);
        
        $data['title'] = $request->title;
        // $data['url'] = $request->url;
        $data['description'] = $request->description;
        $data['plans'] = implode(";", $request->service_id);
        if($request->hasFile('doc')){
            $doc = $request->file('doc');
            $filename = time().'.'.$doc->getClientOriginalExtension();
            $request->file('doc')->move("files", $filename);
            $data['url'] = url('/').'/files/'.$filename;
        }
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/material/' . $filename;
            Image::make($image)->resize(512, 512)->save($location);
            $data['picture'] = $filename;
        }
        $data['is_video'] = filter_var($request->is_video, FILTER_VALIDATE_BOOLEAN);
        $data['active_plan_only'] = (int)$request->active_plan_only;
        $data['is_monthly'] = 1;
        $material =  $sig = Material::create($data);
        $material->save();

        session()->flash('message', 'Material añadido.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->route('manage-materials');
    }
    public function mmaterialDelete(Request $request){
        $material = Material::findOrFail($request->id);
        $material->delete();
        session()->flash('message','Material eliminado exitosamente');
        session()->flash('type','success');
        return redirect()->route('manage-materials');
    }
    public function editMmaterialView($id){
        $data['page_title'] = "Editar material";
        $data['material'] = Material::findOrFail($id);
        // $data['plan'] = Plan::whereStatus(1)->get();
        $data['plan'] = Plan::all();
        $data['materialPlan'] = explode(';',$data['material']->plans);
        return view('materials.edit-mmaterial',$data);
    }
    public function updateMmaterial(Request $request)
    {
        $material = Material::findOrFail($request->material_id);
        $request->validate([
            'title' => 'required',
            // 'doc' => 'required',
            'service_id' => 'required'
        ]);
        $material->title = $request->title;
        // $material->url = $request->url;
        $material->description = $request->description;
        $material['plans'] = implode(";", $request->service_id);
        if($request->hasFile('doc'))
        {
            $doc = $request->file('doc');
            $filename = time().'.'.$doc->getClientOriginalExtension();
            $request->file('doc')->move("files", $filename);
            if ($material->url != null)
            {
                $url = $material->url;
                $pos = strpos($url, "/files/");
                $link = "./files/".substr($url, $pos + 7);
                if (file_exists($link)){
                    unlink($link);
                }
            }
            $material->url = url('/').'/files/'.$filename;
        }
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/material/' . $filename;
            Image::make($image)->resize(512, 512)->save($location);
            if ($material->picture != null){
                $path = './assets/images/material/';
                $link = $path.$material->picture;
                // var_dump($link);
                // exit();
                if (file_exists($link)){
                    unlink($link);
                }
            }
            $material->picture = $filename;
        }
        $material->is_video = filter_var($request->is_video, FILTER_VALIDATE_BOOLEAN);
        $material->active_plan_only = (int)$request->active_plan_only;
        $material->save();
        session()->flash('message','User Updated Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function manageUser()
    {
        $data['page_title'] = "Administrar Usuarios - Todos";
        $data['user'] = User::latest()->paginate(6);
        $data['option'] = 1;
        return view('dashboard.manage-user',$data);
    }
    
    public function manageExpiredMemberships() 
    {
        $data['page_title'] = "Membresias Vencidas - Todos";
        $data['user'] = User::whereDate('expire_time','<=', date('Y-m-d H:i:s', strtotime('+10 days')))->where('payment_type','!=',null)->where('plan_status', 1)->latest()->paginate(6);
        $data['option'] = 1;
        return view('dashboard.manage-user-expired-membership',$data);
    }

    public function manageUserPaid()
    {
        $data['page_title'] = "Administrar Usuarios - Pagado";
        $data['user'] =  User::where('plan_status', 1)->latest()->paginate(10);
        $data['option'] = 2;
        return view('dashboard.manage-user',$data);
    }
    
    public function manageUserNotPaid()
    {
        $data['page_title'] = "Administrar Usuarios - Sin Pagar";
        $data['user'] =  User::where('plan_status', 0)->latest()->paginate(10);
        $data['option'] = 3;
        return view('dashboard.manage-user',$data);
    }
    
    public function generateReportView()
    {
         $data['page_title'] = "Generar Reporte";
         return view('dashboard.generate-report',$data);
    }
    
    public function createReport(Request $request){
        $result = User::get();
        
        //SECCIÓN DE TIPOS DE USUARIOS
        switch($request->user_type_select){
            case "1" : 
                break;
            case "2" :
                $result->where('plan_status', 1);
                break;
            case "3" :
                $result->where('plan_status', 0);
                break;
            default:
                break;
        }
        
        //SECCIÓN DE MÉTODO DE PAGO
        switch($request->payment_type_select){
            case "1" : 
                break;
            case "2" :
                $result->where('payment_type', 'PayPal');
                break;
            case "3" :
                $result->where('payment_type', 'CoinPayments');
                break;
            case "4" :
                $result->where('payment_type', 'Manual');
                break;
            default:
                break;
        }
        
        //SECCIÓN DE FECHA
        if($request->inlineRadioOptions == "1"){
            switch($request->date_since_select){
                case "1" : 
                    break;
                case "2" :
                    $result->where('created_at', '>=', Carbon::now()->subMonth(6));
                    break;
                case "3" :
                    $result->where('created_at', '>=', Carbon::now()->subMonth(3));
                    break;
                case "4" :
                    $result->where('created_at', '>=', Carbon::now()->subMonth(1));
                    break;
                default:
                    break;    
            }
        }
        
        if($request->inlineRadioOptions == "2"){
           $result->where('created_at', '>=', $request-> date_A)->where('created_at', '>=', $request-> date_B);
        }
        
        
        
    }
    
    public function manageUserByEmail($email){
        $data['page_title'] = "Administrar Usuarios - Búsqueda: ".$email;
        $users = User::where('email', 'like', '%' . $email . '%')
                ->orwhere('name', 'like', '%' . $email . '%')
                ->orwhere('phone', 'like', '%' . $email . '%')
                ->orwhere('discord_id', 'like', '%' . $email . '%')
                ->orwhere('discord_username', 'like', '%' . $email . '%')
                ->latest()->paginate(10);
        $data['user'] = $users;
        $data['option'] = 4;
        return view('dashboard.manage-user',$data);
    }
    
    public function blockUser(Request $request)
    {
        $request->validate([
            'block_id' => 'required',
        ]);
        $user = User::findOrFail($request->block_id);
        if ($user->status == 1){
            $user->status = 0;
            $user->save();
        }else{
            $user->status = 1;
            $user->save();
        }
        session()->flash('message','Successfully Done');
        session()->flash('type','success');
        return back();
    }

    public function blockEmail(Request $request)
    {
        $request->validate([
            'email_id' => 'required',
        ]);
        $user = User::findOrFail($request->email_id);
        if ($user->email_status == 1){
            $user->email_status = 0;
            $user->save();
        }else{
            $user->email_status = 1;
            $user->save();
        }
        session()->flash('message','Successfully Done');
        session()->flash('type','success');
        return back(); 
    }

    public function blockPhone(Request $request)
    {
        $request->validate([
            'phone_id' => 'required',
        ]);
        $user = User::findOrFail($request->phone_id);
        if ($user->phone_status == 1){
            $user->phone_status = 0;
            $user->save();
        }else{
            $user->phone_status = 1;
            $user->save();
        }
        session()->flash('message','Successfully Done');
        session()->flash('type','success');
        return redirect()->back();
    }
    
    public function googleRecaptcha()
    {
        $data['page_title'] = 'Google Recaptcha';
        return view('dashboard.google-recaptcha',$data);
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

    public function createUser()
    {
        $data['page_title'] = 'Add new User';
        $data['plan'] = Plan::whereStatus(1)->get();
        $data['country'] = json_decode(file_get_contents(storage_path('json/country.json')), true);
        return view('dashboard.user-create',$data);
    }

    public function submitUser(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'country_code' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'plan_id' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);
        $plan = Plan::findOrFail($request->plan_id);
        $in = Input::except('_method','_token','password_confirmation');
        $in['password'] = Hash::make($request->password);
        $in['email_code'] = strtoupper(Str::random('6'));
        $in['telegram_token'] = strtoupper(Str::random('32'));
        if ($plan->plan_type == 1){
            $in['expire_time']  = 1;
        }else{
            $in['expire_time']  = Carbon::parse()->addDays($plan->duration);
        }
        $in['email_status'] = 1;
        $in['phone_code']= rand(11111,99999);
        $in['phone_status'] = 1;
        $in['plan_status'] = 1;
        $in['plan_status'] = $request->plan_status == 'on' ? '1' : '0';

        User::create($in);
        session()->flash('message','User Added Successfully');
        session()->flash('type','success');
        return redirect()->back();

    }

    public function editUser($id)
    {
        $data['page_title'] = 'Edit User';
        $data['user'] = User::findOrFail($id);
        
        if($data['user']->plan->plan_type != 1){
            if($data['user']->plan_status == 1){
                $today = Carbon::now();
                $end_date = Carbon::parse($data['user']->expire_time);
                $diff = $end_date->diffInDays($today);
            } else {
                $diff = 0;
            }
            
        }
        else{
            $diff = 'Ilimitado';
        }
        
        
        $data['time_left'] = $diff;
        // $data['plan'] = Plan::whereStatus(1)->get();
        $data['plan'] = Plan::all();
        $data['codes'] = RegCode::all();
        $data['country'] = json_decode(file_get_contents(storage_path('json/country.json')), true);
        return view('dashboard.user-edit',$data);
    }

    public function updateUser(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $request->validate([
            'name' => 'required',
            'country_code' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required|unique:users,phone,'.$user->id,
            'password' => 'nullable|min:6',
            // 'plan_id' => 'required'
            'level' => 'required'
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->country_code = $request->country_code;
        $user->phone = $request->phone;
        $user->level = $request->level;
        $user->telegram_id = $request->telegram_id;
        $user->expire_time = date('Y-m-d', strtotime(Carbon::now() . ' + ' . ((int)$request->expire_time + 1) . ' days'));
        $user->plan_status = $request->plan_status == 'on' ? '1' : '0';
        if($request->password != ""){
            $password = Hash::make($request->password);
            $user->password = $password;
        }
        $user->code = $request->reg_code;
        $user->discord_username = $request->discord_username;
        $user->discord_id = $request->discord_id;
        if($request->payment_type == "Manual"){
            $user->last_payment = Carbon::now();
            $user->payment_type ='Manual';
        }else{
        }
        if($request->plan_id)
        {
            $user->payment_type = $request->payment_type;
            if ($user->plan_id != $request->plan_id){
                $plan = Plan::findOrFail($request->plan_id);
                if ($plan->plan_type == 1){
                    $user->expire_time  = 1;
                }else{
                    $user->expire_time  = Carbon::parse()->addDays($plan->duration);
                }
                $user->plan_id = $request->plan_id;
            }
        }
        $user->save();
        session()->flash('message','User Updated Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function deleteUser(Request $request)
    {
        $user = User::findOrFail($request->id);
        UserSignal::whereUser_id($user->id)->delete();
        $user->delete();
        session()->flash('message','User Deleted Successfully');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function manageSubscriber()
    {
        $data['page_title'] = 'All Subscriber';
        $data['subscriber'] = Subscribe::latest()->paginate(15);
        return view('dashboard.subscriber',$data);
    }

    public function getCurrencyWidget()
    {
        $data['page_title'] = 'Currency Widget';
        return view('dashboard.currency-widget',$data);
    }

    public function submitCurrencyWidget(Request $request)
    {
        $section = Section::first();
        $section->currency_live = $request->currency_live;
        $section->currency_cal = $request->currency_cal;
        $section->save();
        session()->flash('message','Currency Widget Updated Successfully');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function staffRequest()
    {
        $data['page_title'] = "Staff Request";
        $data['user'] = StaffRequest::latest()->paginate(10);
        return view('dashboard.staff-request',$data);
    }

    public function staffrequestApprove(Request $request)
    {
        $request->validate([
           'confirm_id' => 'required'
        ]);
        $stff = StaffRequest::whereUser_id($request->confirm_id)->first();
        $stff->status = 1;
        $stff->save();

        $user = User::findOrFail($request->confirm_id);
        $user->signal_status = 1;
        $user->save();

        session()->flash('message','Staff request Approve.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function staffrequestReject(Request $request)
    {
        $request->validate([
            'reject_id' => 'required'
        ]);
        $stff = StaffRequest::whereUser_id($request->reject_id)->first();
        $stff->status = 2;
        $stff->save();

        $user = User::findOrFail($request->reject_id);
        $user->signal_status = 3;
        $user->save();

        session()->flash('message','Staff request Reject.');
        session()->flash('type','success');
        return redirect()->back();
    }


    public function getTransactionLog()
    {
        $data['page_title'] = "Transaction Log";
        $data['log'] = TransactionLog::latest()->paginate(20);
        return view('dashboard.transaction-log',$data);
    }
    public function commentSubmit(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'signal_id' => 'required'
        ]);
        $in = Input::except('_method','_token');
        $in['user_id'] = 0;
        SignalComment::create($in);
        \session()->flash('message','Comment Submitted Successfully.');
        \session()->flash('type','success');
        return redirect()->back();
    }

    public function ratingSubmit(Request $request)
    {
        $request->validate([
            'comment' => 'required',
            'signal_id' => 'required',
            'rating' => 'required'
        ]);

        $in = Input::except('_method','_token');
        $in['user_id'] = 0;
        SignalRating::create($in);
        \session()->flash('message','Rating Submitted Successfully.');
        \session()->flash('type','success');
        return redirect()->back();
    }

}
