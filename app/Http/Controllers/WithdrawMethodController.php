<?php

namespace App\Http\Controllers;

use App\WithdrawMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class WithdrawMethodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function createMethod()
    {
        $data['page_title'] = "Create New Withdraw Method";
        return view('withdraw.create',$data);
    }

    public function storeMethod(Request $request)
    {
        $request->validate([
           'name' => 'required',
           'image' => 'required|mimes:png,jpeg,jpg',
           'charge' => 'required|numeric',
           'withdraw_min' => 'required|numeric',
           'withdraw_max' => 'required|numeric',
           'duration' => 'required|numeric',
        ]);
        $in = Input::except('_method','_token');
        $in['status'] = $request->status == 'on' ? '1' : '0';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'withdraw_method'.time().'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/withdraw/' . $filename;
            Image::make($image)->resize(290,190)->save($location);
            $in['image'] = $filename;
        }
        WithdrawMethod::create($in);
        session()->flash('message','Withdraw method Created Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function allMethod()
    {
        $data['page_title'] = 'All Method';
        $data['withdraw'] = WithdrawMethod::all();
        return view('withdraw.index',$data);
    }

    public function editMethod($id)
    {
        $data['page_title'] = "Edit Withdraw Method";
        $data['withdraw'] = WithdrawMethod::findOrFail($id);
        return view('withdraw.edit',$data);
    }

    public function updateMethod(Request $request,$id)
    {
        $withdraw = WithdrawMethod::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'image' => 'mimes:png,jpeg,jpg',
            'charge' => 'required|numeric',
            'withdraw_min' => 'required|numeric',
            'withdraw_max' => 'required|numeric',
            'duration' => 'required|numeric',
        ]);
        $in = Input::except('_method','_token');
        $in['status'] = $request->status == 'on' ? '1' : '0';
        if($request->hasFile('image')){
            $image = $request->file('image');
            $filename = 'withdraw_method'.time().'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/withdraw/' . $filename;
            Image::make($image)->resize(290,190)->save($location);
            $in['image'] = $filename;

            $oldImage = './assets/images/withdraw/'.$withdraw->image;
            File::delete($oldImage);
        }

        $withdraw->update($in);

        session()->flash('message','Withdraw method Update Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

}
