<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Follower;
use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $posts = $user->posts()->with('user','comments','media','tags','reactions','views')->latest()->get();
        if($user->role->id == "1")
            return view('admin.profile',compact('posts'));
        else
            return view('auther.profile',compact('posts'));

    }

    public function userprofile(Request $r) {
        if($r->n_id != null) {
            $notify = Notification::find($r->n_id);
            if($notify->read_at == null) {
                $notify->read_at = Carbon::now();
                $notify->save();
            } 
        }
           
        $user = User::find($r->id);
        $following = Follower::where([
            ['user_id', Auth::user()->id],
            ['following_id',$user->id]
        ])->first();
        $posts = $user->posts()->with('user','comments','media','tags','reactions','views')->latest()->get();
        return view('Common.guestprofile',compact('user','posts','following'));
    }
}
