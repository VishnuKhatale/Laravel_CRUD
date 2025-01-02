<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class users extends Model
{
    protected $table = "tbl_users";

    protected $fillable = ['name','email'];

    public function posts(){

        return $this->hasMany(posts::class,'user_id');
    }
}
