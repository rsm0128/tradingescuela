<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignalRating extends Model
{
    protected $table = 'signal_ratings';

    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
