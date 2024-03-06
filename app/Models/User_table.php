<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_table extends Model
{
    public $table = 'users';
    public $primaryKey ='id';
    public $incrementing = true;
    public $timestamp = false;
}
