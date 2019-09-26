<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TelegramSpam extends Model
{
    protected $table = 'telegram_spam_words';
    public $timestamps = false;
    protected $fillable = [
        'keyword', 'description'
    ];
}
