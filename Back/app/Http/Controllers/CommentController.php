<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
class CommentController extends Controller
{
    public function createComment (Request $request) {
        $comment = new Comment;
        $comment->text = $request->text;
        $comment->rating = $request->rating;
        $comment->tenant_id = $request->tenant_id;
        $comment->republic_id = $request->republic_id;        
        $comment->save();
    }

    public function showComment ($id){
        $comment= Comment::findOrFail($id);
        return response()->json($comment);
    }
    
    public function listComment (){
        $comment = Comment::all();
        return response()->json([$comment]);
    }

    public function updateComment( Request $request,$id ){
        $comment= Comment::findOrFail($id);
        if($request->text){
            $comment->text = $comment->text;
        }
        if ($request->rating){
            $comment->rating = $comment->rating;
        }
        if ($request->tenant_id){
            $comment->tenant_id = $comment->tenant_id;
        }   
        if ($request->republic_id){
            $comment->republic_id = $comment->republic_id;
        }        

        $comment->save();
        return response()->json($comment);
    }

    public function deleteComment($id){
        Comment::destroy($id);
        return response()->json(['Comentário deletado']);

    }
}
