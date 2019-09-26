<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatabaseBackup extends Model
{
    protected $table = 'database_backups';

    protected $guarded = [''];
}
