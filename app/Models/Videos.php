<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $table = 'videos';
//    public $timestamps = false;
    protected $fillable = ['nombre','duracion',
    'url_video','autor','descripcion','url_caratula','estado'];   
}
