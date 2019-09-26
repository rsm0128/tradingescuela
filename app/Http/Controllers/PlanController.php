<?php

namespace App\Http\Controllers;

use App\Page;
use App\PagePlan;
use App\PaymentMethod;
use App\Plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Session;
use File;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create()
    {
        $data['page_title'] = "Create New Plan";
        $data['pages']      = Page::all()->where('active', 1);
        return view('plan.create',$data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:plans,name',
            'price' => 'nullable|numeric',
            'duration' => 'numeric',
            'support' => 'required',
        ]);
        
        $in = Input::except('_method', '_token', 'pages');
        $in['forex_course'] = $request->telegram_status == 'on' ? '1' : '0';
        $in['telegram_status'] = $request->telegram_status == 'on' ? '1' : '0';
        $in['email_status'] = $request->email_status == 'on' ? '1' : '0';
        $in['call_status'] = $request->call_status == 'on' ? '1' : '0';
        $in['coaching_status'] = $request->coaching_status == 'on' ? '1' : '0';
        $in['sms_status'] = $request->sms_status == 'on' ? '1' : '0';
        $in['status'] = $request->status == 'on' ? '1' : '0';
        $in['subtitle'] = $request->subtitle;
        $in['description'] = $request->description;
        $in['high_price'] = $request->high_price;
        $in['telegram_visible'] = filter_var($request->telegram_visible, FILTER_VALIDATE_BOOLEAN);
        $in['sms_visible'] = filter_var($request->sms_visible, FILTER_VALIDATE_BOOLEAN);
        $in['seminars_visible'] = filter_var($request->seminars_visible, FILTER_VALIDATE_BOOLEAN);
        $in['forex_course_visible'] = filter_var($request->forex_course_visible, FILTER_VALIDATE_BOOLEAN);
        $in['telegram_group_visible'] = filter_var($request->telegram_group_visible, FILTER_VALIDATE_BOOLEAN);
        $in['support_visible'] = filter_var($request->support_visible, FILTER_VALIDATE_BOOLEAN);
        
        $in['seminar_status'] = $request->seminar_status == 'on' ? '1' : '0';
        $in['telegram_group_status'] = $request->telegram_group_status == 'on' ? '1' : '0';
        $in['seminar_status'] = $request->seminar_status == 'on' ? '1' : '0';
        $in['has_promo'] = $request->has_promo == 'on' ? '1' : '0';
        $in['promo_duration'] = Carbon::parse($request->promo_duration)->format('Y-m-d H:i:s');

        $plan = Plan::create($in);

        if(!empty($request->pages)) {
            foreach ($request->pages as $key => $pageId) {
                $pagePlan = new PagePlan;
                $pagePlan->plan_id = $plan->id;
                $pagePlan->page_id = $pageId;
                $pagePlan->save();
            }
        }

        session()->flash('message', 'Plan Created Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    public function index()
    {
        $data['page_title'] = "All Plan";
        $data['plan'] = Plan::orderBy('duration')->get();
        return view('plan.index',$data);
    }
    public function edit($id)
    {
        $data['page_title'] = "Edit Plan";
        $data['plan']       = Plan::findOrFail($id);
        $data['pages']      = Page::all()->where('active', 1);
        $pagesSelected      = [];
        foreach ($data['plan']->pages as $key => $page)
            $pagesSelected[] = $page->id;
        $data['pages_selected'] = $pagesSelected;
        return view('plan.edit',$data);
    }

    public function update(Request $request)
    {
        $r = Plan::find($request->id);
    	$request->validate([
           'name' => 'required|unique:plans,name,'.$r->id,
           'price' => 'nullable|numeric',
        //   'duration' => 'sometimes|numeric',
           'support' => 'required',
        ]);
        $in = Input::except('_method', '_token', 'id', 'pages');
        $in['forex_course'] = $request->forex_course == 'on' ? '1' : '0';
        $in['telegram_status'] = $request->telegram_status == 'on' ? '1' : '0';
        $in['email_status'] = $request->email_status == 'on' ? '1' : '0';
        $in['call_status'] = $request->call_status == 'on' ? '1' : '0';
        $in['coaching_status'] = $request->coaching_status == 'on' ? '1' : '0';
        $in['sms_status'] = $request->sms_status == 'on' ? '1' : '0';
        $in['status'] = $request->status == 'on' ? '1' : '0';
        $in['subtitle'] = $request->subtitle;
        $in['description'] = $request->description;
        $in['high_price'] = $request->high_price;
        $in['telegram_visible'] = filter_var($request->telegram_visible, FILTER_VALIDATE_BOOLEAN);
        $in['sms_visible'] = filter_var($request->sms_visible, FILTER_VALIDATE_BOOLEAN);
        $in['seminars_visible'] = filter_var($request->seminars_visible, FILTER_VALIDATE_BOOLEAN);
        $in['forex_course_visible'] = filter_var($request->forex_course_visible, FILTER_VALIDATE_BOOLEAN);
        $in['telegram_group_visible'] = filter_var($request->telegram_group_visible, FILTER_VALIDATE_BOOLEAN);
        $in['support_visible'] = filter_var($request->support_visible, FILTER_VALIDATE_BOOLEAN);
        $in['email_alert_visible'] = filter_var($request->email_alert_visible, FILTER_VALIDATE_BOOLEAN);
    
        $in['seminar_status'] = $request->seminar_status == 'on' ? '1' : '0';
        $in['telegram_group_status'] = $request->telegram_group_status == 'on' ? '1' : '0';
        $in['has_promo'] = $request->has_promo == 'on' ? '1' : '0';
        $in['promo_duration'] = Carbon::parse($request->promo_duration)->format('Y-m-d H:i:s');

        $r->update($in);
        
        if(!empty($request->pages)) {
            $plan = Plan::find($request->id);
            PagePlan::where('plan_id', $plan->id)->delete();
            foreach ($request->pages as $key => $pageId) {
                $pagePlan = new PagePlan;
                $pagePlan->plan_id = $plan->id;
                $pagePlan->page_id = $pageId;
                $pagePlan->save();
            }
        }
        session()->flash('message', 'Plan Update Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $testimonial = Plan::findOrFail($request->id);
        $testimonial->delete();
        session()->flash('message', 'Plan Deleted Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }


}
