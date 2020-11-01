<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded =[];
//    protected $fillable=['title', 'user_id','post_image', 'body'];
    use HasFactory;


    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}