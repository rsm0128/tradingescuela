<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WithdrawLog extends Model
{
    protected $table = 'withdraw_logs';

    protected $guarded = [''];

    public function withdrawMethod()
    {
        return $this->belongsTo(WithdrawMethod::class,'method_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
