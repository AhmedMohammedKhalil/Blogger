<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
                $p->delete();
            }
        }
        if (is_dir(public_path('storage\users\\'.$user->id)) == true) {
            File::delete(public_path('users/'.$user->id));
        }
        $user->delete();
        return redirect(route('admin.user.index'));
    }
}
