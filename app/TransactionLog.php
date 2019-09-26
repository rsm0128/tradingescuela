<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model
{
    protected $table = 'transaction_logs';

    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
