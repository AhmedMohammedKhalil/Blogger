<?php

namespace App\Http\Controllers;

use App\Events\CommentNotification;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Notification;
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
        //here we get post owner to make sure that commented user is not post owner
        $user=Auth::user();
        $post_owner_id=Post::find($request->post_id)->user_id;
        $is_viewer=View::where(['by'=>$user->id ,'post_id'=>$request->post_id])->count();
        if($is_viewer==0)
        {
            if($user->id != $post_owner_id )
            {
                $view= new View;
                $view->post_id=$request->post_id;
                $view->by=$user->id;
                $view->save();
            }
        }
        $vcount = Post::find($request->post_id)->views->count();
        if(Auth::user()->id != $post_owner_id) {
            $notify = new Notification();
            $notify->user_id = $post_owner_id;
            $notify->type = 'comment';
            $array = [
                'user' => Auth::user(),
                'comment' => $comment
            ];
            $notify->data = json_encode($array);
            $notify->save();
    
            $data = [
                'n_id' => $notify->id,
                'owner_id' => $post_owner_id,
                'post_id' => $request->post_id,
                'type' => 'comment',
                'user' => Auth::user(),
                //'created_at' => $comment->created_at->diffForHumans()
            ];
            broadcast(new CommentNotification($data))->toOthers();
        } else {
            foreach(Post::find($request->post_id)->comments as $c) {
                if($c->user_id != $post_owner_id) {
                    $notify = new Notification();
                    $notify->user_id = $c->user_id;
                    $notify->type = 'comment';
                    $array = [
                        'user' => Auth::user(),
                        'comment' => $c
                    ];
                    $notify->data = json_encode($array);
                    $notify->save();
            
                    $data = [
                        'n_id' => $notify->id,
                        'owner_id' => $c->user_id,
                        'post_id' => $request->post_id,
                        'type' => 'comment',
                        'user' => Auth::user(),
                        //'created_at' => $comment->created_at->diffForHumans()
                    ];
                    broadcast(new CommentNotification($data))->toOthers();
                }

            }
        }
       

        $view = view('Common.comments',compact('comment','user'))->render();
        return response()->json(['html'=>$view,'ccounter'=>$commcount,'vcounter' => $vcount]);

    }

    public function edit(Request $request)
    {
         if($request->ajax()) {
            $comment = Comment::find($request->comment_id);
            return response()->json(['comment'=>$comment]);
         }
    }

    public function update(Request $request)
    {
         if($request->ajax()) {
            $comment = Comment::find($request->comment_id);
            $comment->comment = $request->comment;
            $comment->save();
            //$view = View('Common.comments',compact('comment'))->render();
            return response()->json(['comment'=>$comment]);
         }
    }

    public function destroy(Request $request)
    {
        if($request->ajax()) {
            $comment = Comment::find($request->comment_id);
            foreach($comment->reactions as $r) {
                $reaction = Reaction::find($r->id);
                $reaction->delete();
            }
            $post = Post::find($comment->post_id);
            $post_id = $post->id;
            $comment->delete();
            $ccounter = $post->comments->count();
            return response()->json(['ccounter' => $ccounter , 'post_id' => $post_id]);
        }
        
    }


}
