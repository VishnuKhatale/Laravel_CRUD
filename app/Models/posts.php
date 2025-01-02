<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    protected $table = "posts";

    protected $fillable = ['title','description', 'user_id'];


    public function user(){
        return $this->belongsTo(users::class,'user_id');
    }
}
