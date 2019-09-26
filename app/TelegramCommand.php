<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TelegramCommand extends Model
{
    protected $table = 'telegram_commands';
    protected $fillable = [
        'name', 'description', 'message'
    ];
}
