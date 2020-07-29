<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LocatorRequest;
use App\Locator;
use App\Republic;


class LocatorController extends Controller
{
    
    public function createLocator (LocatorRequest $request) {
        
        $locator = new Locator;
        $locator->name = $request->name;
        $locator->password = $request->password;
        $locator->email = $request->email;
        $locator->cpf = $request->cpf;
        $locator->phoneNumber = $request->phoneNumber;
        $locator->phoneOpcional = $request->phoneOpcional;
        $locator->save();
        return response()->json($locator);

    }

    public function showLocator ($id){
        $locator= Locator::findOrFail($id);
        return response()->json($locator);
    }

    public function listLocator (){
        $locator = Locator::all();
        return response()->json([$locator]);
    }

    public function updateLocator( LocatorRequest $request,$id ){
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

    public function anunciar($locator_id, $republic_id){
        $republic = Republic::findOrFail($republic_id);
        $republic->anunciar($locator_id);
        return response()->json($republic);
    }
    //Locador anuncia
    public function addRepublic($locator_id, $republic_id){
        $locator= Locator::findOrFail($locator_id);
        $republic = Republic::findOrFail($republic_id);
        $republic->locator_id =$locator_id;
        $republic->save();
        return response()->json($republic);
    }

    //Locador remove anúncio
    public function removeRepublic($locator_id, $republic_id){
        $locator= Locator::findOrFail($locator_id);
        $republic = Republic::findOrFail($republic_id);
        $republic = new RepublicController;
        return $republic->deleteRepublic($republic_id);
    }
   

}
