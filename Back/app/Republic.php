<?php
namespace App;

use App\Locator;
use App\Tenant;
use App\Comment;

use App\Http\Requests\RepublicRequest;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
Use Illuminate\Database\Eloquent\SoftDeletes;

class Republic extends Model
{
    public function createRepublic(RepublicRequest $request ){
        $this->name = $request->name;
        $this->price = $request->price;
        $this->description = $request->description;
        $this->bedrooms = $request->bedrooms;
        $this->bathrooms = $request->bathrooms;
        $this->numberResidents = $request->numberResidents;
        $this->street = $request->street;
        $this->houseNumber = $request->houseNumber;
        $this->neighborhood = $request->neighborhood;
        $this->city = $request->city;
        $this->tenant_id = $request->tenant_id;
        $this->locator_id = $request->locator_id;
        $this->save();
    }

    public function updateRepublic(RepublicRequest $request){
        if($request->name){
            $this->name = $request->name;
        }
        if ($request->price){
            $this->price = $request->price;
        }
        if ($request->description){
            $this->description = $request->description;
        }
        if ($request->bedrooms){
            $this->bedrooms = $request->bedrooms;
        }
        if ($request->bathrooms){
            $this->bathrooms = $request->bathrooms;
        }
        if ($request->numberResidents){
            $this->numberResidents = $request->numberResidents;
        }
        if ($request->street){
            $this->street = $request->street;
        }
        if ($request->houseNumber){
            $this->houseNumber = $request->houseNumber;
        }
        if ($request->neighborhood){
            $this->neighborhood = $request->neighborhood;
        }
        if ($request->city){
            $this->city = $request->city;
        }
        if ($request->tenant_id){
            $this->tenant_id = $request->tenant_id;
        }
        if ($request->locator_id){
            $this->locator_id = $request->locator_id;
        }

        $this->save();
    }

    //Relação com o locador
    public function Locator(){
        return $this->belongsTo('App\Locator');

    }

    //Relação com o Locatário 
    public function Tenant(){
        return $this->hasOne('App\Tenant'); 
    }

    //Relação com os comentários
    public function Comment(){
        return $this->hasMany('App\Comment'); 
    }

    public function tenantFavorites(){
        return $this->belongsToMany('App\Tenant');
    }

    public function anunciar($locator_id){
        $locator = Locator::findOrFail($locator_id);
        $this->locator_id= $locator_id;
        $this->save();
    }
    use SoftDeletes;

}
