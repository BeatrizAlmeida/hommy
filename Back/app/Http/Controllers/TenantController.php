<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenant;
use App\Comment;

class TenantController extends Controller
{
    public function createTenant (Request $request) {
        $tenant = new Tenant;
        $tenant->name = $request->name;
        $tenant->password = $request->password;
        $tenant->email = $request->email;
        $tenant->save();

    }
    public function showTenant ($id){
        $tenant= Tenant::findOrFail($id);
        return response()->json($tenant);
    }
    
    public function listTenant (){
        $tenant = Tenant::all();
        return response()->json([$tenant]);
    }

    public function updateTenant( Request $request,$id ){
        $tenant= Tenant::findOrFail($id);
        if($request->name){
            $tenant->name = $tenant->name;
        }
        if ($request->password){
            $tenant->password = $tenant->password;
        }
        if ($request->email){
            $tenant->email = $tenant->email;
        }        

        $tenant->save();
        return response()->json($tenant);
    }

    public function deleteTenant($id){
        Tenant::destroy($id);
        return response()->json(['Usuário Locatário deletado']);

    }



    public function addComment($id, $comment_id){
        $tenant= Tenant::findOrFail($id);
        $comment = Comment::findOrFail($comment_id);
        $comment->tenant_id =$id;
        $comment->save();
        return response()->json($comment);
    }

    public function removeComment($id, $comment_id){
        $tenant= Tenant::findOrFail($id);
        $comment = Comment::findOrFail($comment_id);
        $comment->tenant_id =NULL;
        $comment->save();
        return response()->json($comment);
    }

}
