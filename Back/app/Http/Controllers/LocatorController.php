<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Locator;
use App\Republic;

class LocatorController extends Controller
{
    public function createLocator (Request $request) {
        $locator = new Locator;
        $locator->name = $request->name;
        $locator->password = $request->password;
        $locator->email = $request->email;
        $locator->cpf = $request->cpf;
        $locator->phoneNumber = $request->phoneNumber;
        $locator->phoneOpcional = $request->phoneOpcional;
        $locator->save();
    }

    public function showLocator ($id){
        $locator= Locator::findOrFail($id);
        return response()->json($locator);
    }

    public function listLocator (){
        $locator = Locator::all();
        return response()->json([$locator]);
    }

    public function updateLocator( Request $request,$id ){
        $locator= Locator::findOrFail($id);
        if($request->name){
            $locator->name = $request->name;
        }
        if ($request->password){
            $locator->password = $request->password;
        }
        if ($request->email){
            $locator->email = $request->email;
        }
        if ($request->cpf){
            $locator->cpf = $request->cpf;
        }
        if ($request->phoneNumber){
            $locator->phoneNumber = $request->phoneNumber;
        }
        if ($request->phoneOpcional){
            $locator->phoneOpcional = $request->phoneOpcional;
        }
        

        $locator->save();
        return response()->json($locator);
    }

    public function deleteLocator($id){
        Locator::destroy($id);
        return response()->json(['Usuário Locador deletado']);

    }

    
   

}
