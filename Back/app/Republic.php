<?php
namespace App;

use App\Locator;
use App\Tenant;
use App\Comment;

use Illuminate\Database\Eloquent\Model;

class Republic extends Model
{

    //Relação com o locador
    public function Locator(){
        return $this->belongsTo('App\Locator');

    }

    //Relação com o Locatário 
    public function Tenant(){
        return $this->belongsTo('App\Tenant'); 
    }

    //Relação com os comentários
    public function Comment(){
        return $this->hasMany('App\Comment'); 
    }
}
