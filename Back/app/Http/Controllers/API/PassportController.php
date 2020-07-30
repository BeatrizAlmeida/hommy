<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Locator;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\HasApiTokens;
use Auth;


class PassportController extends Controller
{
    use HasApiTokens;

    public function register(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|email|unique:Users,email',
            'password'=>'required'
        ]);

        if($validator->fails())
        {
            return response()->json(['Error' => $validator->errors(), 'status' => 401]);
        }
        if($request->cpf){
            $newuser = new Locator;
            $newuser->createLocator($request);
            $success['token']=$newuser->createToken('MyApp')->acessToken;
            return response()->json(['Success' => $success, 'locator'=>$newuser],200);
        }else{

        }
        
    }

    public function login()
    {
        if(Auth::atempt(['email'=>request('email'), 'password'=>request('password')]))
        {
            $user = Auth::user();
            $sucess['token']=$user->createToken('MyApp')->accessToken;
            return response()->json(['Error'=>'Unauthorized', 'status' => 401]);
        }
        else
        {
            return response()->json(['error'=>'Unauthorized', 'status' => 401]);
        }
    }

    
}
