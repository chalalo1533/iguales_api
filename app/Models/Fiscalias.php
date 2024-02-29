<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fiscalias extends Model
{
    protected $table = 'fiscalias';
//    public $timestamps = false;
    protected $fillable = ['nombre','direccion','ciudad','covertura','lat','lon','fono','fono_fax','estado'];   
}



