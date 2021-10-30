<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Reaction;
use App\Models\View;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        $comment = new Comment;
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        $commcount=Post::find($request->post_id)->comments->count();
        $user = Auth::user();
        //here we get post owner to make shure that commented user is not post owner
        $post_owner_id=Post::find($request->post_id)->user_id;
        if($user->id != $post_owner_id )
        {
            $view= new View;
            $view->post_id=$request->post_id;
            $view->by=$user->id;
            $view->save();
        }
        
        return response()->json(['comment'=>$comment,'ccounter'=>$commcount,'user'=>$user]);

    }



    public function update(Request $request)
    {
         if($request->ajax()) {
            $comment = Comment::find($request->id);
            $comment->comment = $request->comment;
            $comment->save();
            return response()->json(['comment'=>$comment],200);
         }
    }

    public function destroy(Request $request)
    {
        if($request->ajax()) {
            $comment = Comment::find($request->id);
            foreach($comment->reactions as $r) {
                $reaction = Reaction::find($r->id);
                $reaction->delete();
            }
            $comment->delete();
            return response()->json(['msg'=>"success"],200);
        }
        
    }


}
