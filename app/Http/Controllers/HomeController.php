<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $posts = Post::with('user','comments','media','reactions','views')->latest()->get();
        return view('home',compact('posts'));
    }

    public function search(Request $r) {
        $user_name = $r->username;    
        $data = [];
        $target_users=User::where('name','like','%'.$user_name.'%')->get();
        foreach ($target_users as $user) {
            if($user->count() > 0 ) {
                
                    foreach($user->posts as $post) {
                        array_push($data,$post);
                    }
                
            }
        }
        $posts = array_reverse($data);
            $view = view('Common.Posts-comments',compact('posts'))->render();
            return response()->json(['html' => $view]);
        
    }

    public function readAllNotification () {
        foreach(Auth::user()->notifications as $notification) {
            if($notification->read_at == null) {
                $notification->read_at = Carbon::now();
                $notification->save();
            }  
        }
        return response()->json(['messages' => 'success']);
    }
}
