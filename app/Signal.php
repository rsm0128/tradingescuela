<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signal extends Model
{
    protected $table = 'signals';

    protected $guarded = [''];

    public function comments()
    {
    	return $this->hasMany(Comment::class,'signal_id');
    }

}
