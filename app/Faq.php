<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faqs';
    public $timestamps = false;
    protected $guarded = [''];
}
