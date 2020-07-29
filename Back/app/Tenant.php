<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Republic;
use App\Comment;


class Tenant extends Model
{
    public function rent( $republic_id){
        $republic = Republic::findOrFail($republic_id);
        $this->republic_id = $republic_id;
        $this->save();
    }

    public function Republic(){
        return $this->belongsTo('App\Republic');
    }

    public function Comment(){
        return $this->hasMany('App\Comment');
    }
    
    public function favorites(){
        return $this->belongsToMany('App\Republic');
    }
}
