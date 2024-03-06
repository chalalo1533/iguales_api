<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceToken extends Model
{
    public $timestamps = false;
    protected $table = 'devices_token';
//    public $timestamps = false;
    protected $fillable = ['token','SO'];   
}



