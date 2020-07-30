<?php

namespace App;

use App\Http\Requests\LocatorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Republic;

class Locator extends Model
{
    use HasApiTokens;

    public function createLocator (Request $request) {
        $validator=Validator::make($request->all(), [
            'name'=>'required|string|alpha',
                'email'=>'required|email|unique:locators,email',
                'phoneNumber'=>'required|numeric|celular_com_ddd',
                'password'=>'required',
                'cpf'=>'required|unique:locators,cpf|formato_cpf',
                'phoneOpcional'=>'numeric|telefone_com_ddd',
        ]);

        if($validator->fails())
        {
            return response()->json(['Error' => $validator->errors(), 'status' => 401]);
        }
        
        $this->name = $request->name;
        $this->password = $request->password;
        $this->email = $request->email;
        $this->cpf = $request->cpf;
        $this->phoneNumber = $request->phoneNumber;
        $this->phoneOpcional = $request->phoneOpcional;
        $this->save();
    }

    public function Republic(){
        return $this->hasMany('App\Republic');
    }
}
