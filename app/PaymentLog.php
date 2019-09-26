<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    protected $table = 'payment_logs';

    protected $guarded = [''];

    public function paymentMethod()
    {
    	return $this->belongsTo(PaymentMethod::class, 'payment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
