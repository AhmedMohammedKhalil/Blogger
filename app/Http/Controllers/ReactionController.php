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
        // $id = Auth::id();
        // $post_id =$request->post_id;
        // //dd(Like::where(['user_id'=>$id,'post_id'=>$post_id])->get());
        // $like = Like::where(['user_id'=>$id,'post_id'=>$post_id])->get();
        // if(count($like) > 0) {
        //     $flag = 0;
        //     $delete = Like::where(['user_id'=>$id,'post_id'=>$post_id])->delete();
        // }else {
        //     $like = new Like ;
        //     $like->user_id = $id;
        //     $like->post_id = $post_id;
        //     $like->save();
        //     $flag = 1 ;
        // }
        // $post = Post::find($post_id);
        // $count = count($post->likes);
        // return response()->json(['count'=>$count,'flag'=>$flag]);

    }
}
