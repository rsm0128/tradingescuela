<?php

namespace App\Http\Controllers;
use App\RegCode;
use Session;

use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function createCodeView()
    {
        $data['page_title'] = "Create New Register Code";
        return view('Code.create',$data);
    }
    public function createCode(Request $request)
    {
        $request->validate([
            'value' => 'required|unique:reg_codes,value',
        ]);
        
        $data['value'] = $request->value;
        
        RegCode::create($data);
        session()->flash('message', 'Register Code Created Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    public function getCodes()
    {
        $data['page_title'] = "Register Codes";
        $data['codes'] = RegCode::all();
        return view('Code.codes', $data);
    }
    public function deleteCode(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $code = RegCode::findOrFail($request->id);
        $code->delete();
        session()->flash('message', 'Regist Code Deleted Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
}
