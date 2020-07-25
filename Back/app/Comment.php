<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tenant;
use App\Republic;

class Comment extends Model
{
    public function Tenant(){
        return $this->belongsTo('App\Tenant');
    }

    public function Republic(){
        return $this->belongsTo('App\Republic');
    }
}
