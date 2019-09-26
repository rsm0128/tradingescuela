<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegCode extends Model
{
    protected $table 	= 'reg_codes';
    public $timestamps = false;
    
    protected $fillable = [
        'value'
    ];
}
