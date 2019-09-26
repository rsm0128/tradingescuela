<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSignal extends Model
{
    protected $table = 'user_signals';

    protected $guarded = [''];

    public function signal()
    {
        return $this->belongsTo(Signal::class,'signal_id');
    }

}
