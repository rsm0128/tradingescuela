<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagePlan extends Model
{
    protected $table 	= 'page_plan';
    protected $guarded 	= ['id'];
    public $timestamps  = false;
}
