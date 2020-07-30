<?php

namespace App;

use App\Http\Requests\LocatorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Republic;

class Locator extends Authenticatable

{
    use HasApiTokens;

    public function createLocator (LocatorRequest $request) {
        
        
        $this->name = $request->name;
        $this->password = bcrypt($request->password);       
        $this->email = $request->email;
        $this->cpf = $request->cpf;
        $this->phoneNumber = $request->phoneNumber;
        $this->phoneOpcional = $request->phoneOpcional;
        $this->save();
        return response()->json($this);
    }

    public function Republic(){
        return $this->hasMany('App\Republic');
    }
}
