<?php

namespace App\Http\Controllers;

use App\Events\FollowingNotification;
use Illuminate\Http\Request;
use App\Models\Follower;
use App\Models\Notification;
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
        $follower = Follower::where([
            ['user_id','==',Auth::user()->id],
            ['following_id','==', $r->id]
        ])->first();
        $user_id = $r->id;
        $notify = new Notification();
        $notify->user_id = $user_id;
        $notify->type = 'follow';
        $array = [
            'user' => Auth::user(),
            'follower' => $follower
        ];
        $notify->data = json_encode($array);
        $notify->save();

        $data = [
            'n_id' => $notify->id,
            'following_id' => $user_id,
            'type' => 'follow',
            'user' => Auth::user(),
            //'created_at' => $follower->created_at->diffForHumans()
        ];
        broadcast(new FollowingNotification($data))->toOthers();
        return response()->json(['count' => $count]);
    }

}
