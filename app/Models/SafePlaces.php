<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SafePlaces extends Model
{
    protected $table = 'safeplaces';
//    public $timestamps = false;
    protected $fillable = ['nombre_lugar','direccion','comuna','horario1','horario2','lat','long','email','cell',];   
}
