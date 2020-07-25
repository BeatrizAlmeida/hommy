<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Republic;

class Locator extends Model
{
    public function Republic(){
        return $this->hasMany('App\Republic');
    }

}
