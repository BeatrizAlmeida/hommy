<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Republic;
use App\Locator;

class RepublicController extends Controller
{
    public function createRepublic (Request $request) {
        $republic = new Republic;
        $republic->name = $request->name;
        $republic->price = $request->price;
        $republic->description = $request->description;
        $republic->bedrooms = $request->bedrooms;
        $republic->bathrooms = $request->bathrooms;
        $republic->numberResidents = $request->numberResidents;
        $republic->street = $request->street;
        $republic->houseNumber = $request->houseNumber;
        $republic->neighborhood = $request->neighborhood;
        $republic->city = $request->city;
        $republic->tenant_id = $request->tenant_id;
        $republic->locator_id = $request->locator_id;
        $republic->save();

    }

    public function showRepublic ($id){
        $republic= Republic::findOrFail($id);
        return response()->json($republic);
    }
    
    public function listRepublic (){
        $republic = Republic::all();
        return response()->json([$republic]);
    }

    public function updateRepublic( Request $request,$id ){
        $republic= Republic::findOrFail($id);
        if($request->name){
            $republic->name = $request->name;
        }
        if ($request->price){
            $republic->price = $request->price;
        }
        if ($request->description){
            $republic->description = $request->description;
        }
        if ($request->bedrooms){
            $republic->bedrooms = $request->bedrooms;
        }
        if ($request->bathrooms){
            $republic->bathrooms = $request->bathrooms;
        }
        if ($request->numberResidents){
            $republic->numberResidents = $request->numberResidents;
        }
        if ($request->street){
            $republic->street = $request->street;
        }
        if ($request->houseNumber){
            $republic->houseNumber = $request->houseNumber;
        }
        if ($request->neighborhood){
            $republic->neighborhood = $request->neighborhood;
        }
        if ($request->city){
            $republic->city = $request->city;
        }
        if ($request->tenant_id){
            $republic->tenant_id = $request->tenant_id;
        }
        if ($request->locator_id){
            $republic->locator_id = $request->locator_id;
        }

        $republic->save();
        return response()->json($republic);
    }

    public function deleteRepublic($id){
        Republic::destroy($id);
        return response()->json(['República deletada']);

    }
    public function addRepublic($locator_id, $republic_id){
        $locator= Locator::findOrFail($locator_id);
        $republic = Republic::findOrFail($republic_id);
        $republic->locator_id =$locator_id;
        $republic->save();
        return response()->json($republic);
    }

    public function removeRepublic($locator_id, $republic_id){
        $locator= Locator::findOrFail($locator_id);
        $republic = Republic::findOrFail($republic_id);
        $republic = new RepublicController;
        return $republic->deleteRepublic($republic_id);
    }
}

