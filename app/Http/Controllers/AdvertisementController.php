<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class AdvertisementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function createAdvertisement()
    {
        $data['page_title'] = 'Create New Advertisement';
        return view('advertisement.create',$data);
    }
    public function storeAdvertisement(Request $request)
    {
        $this->validate($request,[
            'advert_type' => 'required',
            'advert_size' => 'required',
            'title' => 'required',
            'val1' => 'mimes:png,jpg,jpeg,gif'
        ]);
        $in  = Input::except('_method','_token');
        $in['status'] = $request->status == 'on' ? '1' : '0';
        if($request->hasFile('val1')){
            $image = $request->file('val1');
            $filename = 'advertise_'.time().'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/advertise/' . $filename;
            Image::make($image)->save($location);
            $in['val1'] = $filename;
        }
        Advertisement::create($in);
        session()->flash('message','Advertisement Added Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
    public function allAdvertisement()
    {
        $data['page_title'] = "All Advertisement";
        $data['advert'] = Advertisement::orderBy('id','desc')->get();
        return view('advertisement.index', $data);
    }
    public function editAdvertisement($id)
    {
        $data['page_title'] = "Edit Advertisement";
        $data['advert'] = Advertisement::findOrFail($id);
        return view('advertisement.edit', $data);
    }
    public function updateAdvertisement(Request $request,$id)
    {
        $ad = Advertisement::findOrFail($id);
        $this->validate($request,[
            'advert_size' => 'required',
            'title' => 'required',
            'val1' => 'mimes:png,jpg,jpeg,gif'
        ]);
        $in  = Input::except('_method','_token');
        $in['status'] = $request->status == 'on' ? '1' : '0';
        if($request->hasFile('val1')){
            $image = $request->file('val1');
            $filename = 'advertise_'.time().'.'.$image->getClientOriginalExtension();
            $location = 'assets/images/advertise/' . $filename;
            Image::make($image)->save($location);
            $in['val1'] = $filename;
            $oldImage = './assets/images/advertise/'.$ad->val1;
            File::delete($oldImage);
        }
        $ad->fill($in)->save();
        session()->flash('message','Advertisement Updated Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }
}
