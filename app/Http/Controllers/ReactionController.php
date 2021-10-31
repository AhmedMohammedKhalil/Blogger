<?php

namespace App\Http\Controllers;

use App\Models\View;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller
{
    public function store(Request $request)
    {
        if($request->reactionable_type=="post")
        {
            $id = Auth::id();
            $post_id =$request->post_id;
            $reaction = Reaction::where(['by'=>$id,'reactionable_id'=>$post_id,'reactionable_type'=>"post"])->get();
            if(count($reaction) > 0) {
                $flag = 0;
                $delete = Reaction::where(['by'=>$id,'reactionable_id'=>$post_id])->delete();
            }else {
                $reaction = new Reaction ;
                $reaction->by = $id;                                       
                $reaction->reactionable_id = $post_id;
                $reaction->reactionable_type=$request->reactionable_type;
                $reaction->save();
                $flag = 1 ;
            }
            $post = Post::find($post_id);
            $count = count($post->reactions);
            return response()->json(['post_reactions_count'=>$count,'flag'=>$flag]);
        }
        else if($request->reactionable_type=="comment")
        {
                $id = Auth::id();
                $comment_id =$request->comment_id;
                $reaction = Reaction::where(['by'=>$id,'reactionable_id'=>$comment_id,'reactionable_type'=>"comment"])->get();
                if(count($reaction) > 0) {
                    $flag = 0;
                    $delete = Reaction::where(['by'=>$id,'reactionable_id'=>$comment_id,'reactionable_type'=>"comment"])->delete();
                }else {
                $reaction = new Reaction ;
                $reaction->by = $id;                                       
                $reaction->reactionable_id = $comment_id;
                $reaction->reactionable_type=$request->reactionable_type;
                $reaction->save();
                $flag = 1 ;
                }
                $comment = Comment::find($comment_id);
                $count = count($comment->reactions);
                return response()->json(['comment_reactions_count'=>$count,'flag'=>$flag]);
        }
        

    }
}
