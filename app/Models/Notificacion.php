<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $table = 'notifications';
//    public $timestamps = false;
    protected $fillable = ['fecha','hito','descripcion','estado','url'];   
}



