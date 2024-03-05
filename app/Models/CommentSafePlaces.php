<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CommentSafePlaces extends Model
{
    protected $table = 'comment_safe_places';
    protected $fillable = ['id','id_safe_place', 'name', 'email','comment','created_at'];
}
?>