<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubmitSignal extends Model
{
    protected $table = 'submit_signals';

    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
