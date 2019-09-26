<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffRequest extends Model
{
    protected $table = 'staff_requests';

    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
