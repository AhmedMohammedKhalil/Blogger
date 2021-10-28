<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FollowingController extends Controller
{
    public function index()
    {   $followings = [];
        foreach(Auth::user()->followings as $f) {
            array_push($followings,User::where('id',$f->following_id)->first());
        }
        if(Auth::user()->role->id == '2')
            return view('Auther.followings',compact('followings'));
        else 
            return view('Admin.followings',compact('followings'));    
    }

    public function unfollow(Request $r) {
        $following = Auth::user()->followings->where('following_id',$r->id)->first();
        $count = Auth::user()->followings->count() - 1 ;
        Follower::destroy($following->id);
        return response()->json(['count' => $count]);
    }

}
