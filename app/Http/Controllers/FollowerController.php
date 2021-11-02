<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follower;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FollowerController extends Controller
{
    public function index()
    {
        $followers = [];
        $follow = false;
        $data = Follower::where('following_id',Auth::user()->id)->get();
        foreach($data as $follower) {
            foreach(Auth::user()->followings as $f) { 
                $follow = false;
                if($f->following_id == $follower->user_id) {
                    $follow = true;
                    break;
                } 
            }
            array_push($followers,[User::find($follower->user_id),$follow]);
        }
        if(Auth::user()->role->id == '2')
            return view('auther.followers',compact('followers'));
        else 
            return view('admin.followers',compact('followers'));

    }

    public function follow(Request $r) {
        $count = Auth::user()->followings->count() + 1 ;
        Follower::create([
            'user_id' => Auth::user()->id,
            'following_id' => $r->id
        ]);
        return response()->json(['count' => $count]);
    }

}
