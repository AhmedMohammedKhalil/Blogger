<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Follower;
use App\Models\Notification;
use App\Models\Reaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users=User::Auther();
        return view('admin.users.index',compact('users'));
    }

    public function destroy($id)
    {   
        
        $user=User::find($id);

        if($user->followings->count()>0)
        {
            $user->followings()->delete();
        }

        if($user->views->count()>0)
        {
            $user->views()->delete();
        }

        $user_reactions=Reaction::where('by',$user->id);
        if($user_reactions->count()>0)
        {
            foreach($user_reactions as $r){
                $r->delete();
            }
        }
        if($user->comments->count()>0)
        {
            $user->comments()->delete();
        }
        
        $user_posts=$user->posts();
        if($user_posts->count()>0)
        {
            foreach ($user_posts as $p)
            {
                foreach ($p->media as $m) 
                {
                    $m->delete();
                }
                foreach ($p->comments as $c) 
                {
                    foreach ($c->reactions as $r) 
                    {
                        $r->delete();
                    }
                    $c->delete();
                }
                foreach ($p->reactions as $r) 
                {
                    $r->delete();
                }
                $p->delete();
            }
        }
        $followers = Follower::where('following_id',$user->id)->get();
        foreach($followers as $f) {
            $f->delete();
        }
        foreach($user->notifications as $n) {
            $n->delete();
        }
        $notify = Notification::all();
        foreach($notify as $n) {
            if(json_decode($n->data)->user->id == $user->id)
                $n->delete();
        }
        
        if (is_dir(public_path('users/'.$user->id)) == true) {
            File::delete(public_path('users/'.$user->id));
        }
        $user->delete();
        return redirect(route('admin.user.index'));
    }
}
