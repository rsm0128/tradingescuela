<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SignalComment extends Model
{
    protected $table = 'signal_comments';

    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
