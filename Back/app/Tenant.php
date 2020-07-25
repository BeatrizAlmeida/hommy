<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Republic;
use App\Comment;


class Tenant extends Model
{
    public function Republic(){
        return $this->hasMany('App\Republic');
    }

    public function Comment(){
        return $this->hasMany('App\Comment');
    }
}
