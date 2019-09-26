<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

use App\BasicSetting;
use App\Category;
use App\Material;
use App\Plan;
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
use App\RegCode;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class SubscriberDashboardController extends Controller
{
    use CommonTrait;
    public function __construct()
    {
        // $this->middleware('auth:subadmin');
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


        return view('dashboard.subscriberdashboard',$data);
    }
    
    public function manageUser()
    {
        $data['page_title'] = "Administrar Usuarios - Todos";
        $data['user'] = User::latest()->paginate(6);
        $data['option'] = 1;
        return view('dashboard.subscriber-manage-user',$data);
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
        return view('dashboard.subscriber-user-edit',$data);
    }
    public function manageUserPaid()
    {
        $data['page_title'] = "Subscriber Usuarios - Pagado";
        $data['user'] =  User::where('plan_status', 1)->latest()->paginate(10);
        $data['option'] = 2;
        return view('dashboard.subscriber-manage-user',$data);
    }
    public function manageUserNotPaid()
    {
        $data['page_title'] = "Subscriber Usuarios - Sin Pagar";
        $data['user'] =  User::where('plan_status', 0)->latest()->paginate(10);
        $data['option'] = 3;
        return view('dashboard.subscriber-manage-user',$data);
    }
    public function manageUserByEmail($email){
        $data['page_title'] = "Subscriber Usuarios - Búsqueda: ".$email;
        $users = User::where('email', 'like', '%' . $email . '%')
                ->orwhere('name', 'like', '%' . $email . '%')
                ->orwhere('phone', 'like', '%' . $email . '%')
                ->orwhere('discord_id', 'like', '%' . $email . '%')
                ->orwhere('discord_username', 'like', '%' . $email . '%')
                ->latest()->paginate(10);
        $data['user'] = $users;
        $data['option'] = 4;
        return view('dashboard.subscriber-manage-user',$data);
    }
    public function manageExpiredMemberships() 
    {
        $data['page_title'] = "Membresias Vencidas - Todos";
        $data['user'] = User::whereDate('expire_time','<=', date('Y-m-d H:i:s', strtotime('+10 days')))->where('payment_type','!=',null)->where('plan_status', 1)->latest()->paginate(6);
        $data['option'] = 1;
        return view('dashboard.subscriber-manage-user-expired-membership',$data);
    }
}
