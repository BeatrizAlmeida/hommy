<?php

namespace App\Http\Controllers\API;
use App\Http\Requests\LocatorRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Locator;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\HasApiTokens;
use Auth;
use DB;


class PassportController extends Controller
{
    use HasApiTokens;

    public function register(LocatorRequest $request)
    {
        
        if($request->cpf){ //Vai registrar o usuário locador
            $newuser = new Locator;
            $newuser->createLocator($request);
            $success['token']=$newuser->createToken('MyApp')->accessToken;
            return response()->json(['Success' => $success, 'locator'=>$newuser],200);
        }else{

        }
        
    }

    public function login()
    {
        if(Auth::attempt(['email'=>request('email'), 'password'=>request('password')]))
        {
            $user = Auth::user();
            $success['token']=$user->createToken('MyApp')->accessToken;
            return response()->json(['Success'=>$success, 'user' => $user],200);
        }
        else
        {
            return response()->json(['error'=>'Unauthorized', 'status' => 401]);
        }
    }

    public function getDetails()
    {
        $user = Auth::user();
        return response()->json(['Success'=>$user],200);
    }

    public function logout()
    {
        $acessToken = Auth::user()->token();
        DB::table('oauth_refresh_tokens')->where('access_token_id', $acessToken->id)->update(['revoked'=>true]);
        $acessToken->revoke();
        return response()->json(['Usuário logged out.'], 200);
    }

    
}
