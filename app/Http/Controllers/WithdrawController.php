<?php

namespace App\Http\Controllers;

use App\TraitsFolder\CommonTrait;
use App\TransactionLog;
use App\User;
use App\WithdrawLog;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function allRequest()
    {
        $data['page_title'] = 'All Withdraw Request';
        $data['log'] = WithdrawLog::latest()->paginate(15);
        return view('withdraw.withdraw-all',$data);
    }

    public function requestView($custom)
    {
        $data['page_title'] = $custom.' - Withdraw Request';
        $data['withdraw'] = WithdrawLog::whereCustom($custom)->first();
        return view('withdraw.withdraw-view',$data);
    }

    public function WithdrawRefund(Request $request)
    {
        $request->validate([
           'id' => 'required'
        ]);
        $withdraw = WithdrawLog::findOrFail($request->id);
        $user = User::findOrFail($withdraw->user_id);
        $tr['custom'] = $withdraw->custom;
        $tr['user_id'] = $withdraw->user_id;
        $tr['type'] = 5 ;
        $tr['balance'] = $withdraw->amount.' USD '.' - '.$withdraw->amountBTC;
        $tr['post_balance'] = CommonTrait::roundBTC($user->balance + $withdraw->amountBTC);
        $tr['details'] = 'Withdraw Refund For '.$withdraw->withdrawMethod->name;
        TransactionLog::create($tr);

        $tr['custom'] = $tr['custom'] = $withdraw->custom;;
        $tr['user_id'] = $user->id;
        $tr['type'] = 6 ;
        $tr['balance'] = $withdraw->charge.' USD '.' - '.$withdraw->chargeBTC;
        $tr['post_balance'] = CommonTrait::roundBTC($user->balance + ($withdraw->amountBTC + $withdraw->chargeBTC));
        $tr['details'] = 'Withdraw Charge Refund '.$withdraw->withdrawMethod->name;
        TransactionLog::create($tr);

        $user->balance = CommonTrait::roundBTC($user->balance + $withdraw->amountBTC + $withdraw->chargeBTC);
        $user->save();

        $withdraw->status = 2;
        $withdraw->save();
        session()->flash('message','Withdraw Refund Accept.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function WithdrawConfirm(Request $request)
    {
        $request->validate([
           'id' => 'required'
        ]);
        $withdraw = WithdrawLog::findOrFail($request->id);
        $withdraw->status = 1;
        $withdraw->save();
        session()->flash('message','Withdraw Confirmed Successfully.');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function getRequestRefund()
    {
        $data['page_title'] = 'All Withdraw Refund';
        $data['log'] = WithdrawLog::whereStatus(2)->latest()->paginate(15);
        return view('withdraw.withdraw-all',$data);
    }
    public function getRequestSuccess()
    {
        $data['page_title'] = 'All Withdraw Success';
        $data['log'] = WithdrawLog::whereStatus(1)->latest()->paginate(15);
        return view('withdraw.withdraw-all',$data);
    }
    public function getRequestPending()
    {
        $data['page_title'] = 'All Withdraw Pending';
        $data['log'] = WithdrawLog::whereStatus(0)->latest()->paginate(15);
        return view('withdraw.withdraw-all',$data);
    }
}
