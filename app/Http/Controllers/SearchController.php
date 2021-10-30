<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index() 
    {
        $unfollowers = [];
        $data = Auth::user()->followings;
        $flag = true;
        if(count($data) > 0) {
            $users = User::where('id','!=',Auth::user()->id)->get();
            foreach($users as $user) {
                $flag = true;
                foreach($data as $following) {
                    if($user->id == $following->id) {
                        $flag = false;
                    }
                } 
                if($flag == true) {
                    $fCount = Follower::where('following_id',$user->id)->count();
                    array_push($unfollowers,[$user,$fCount]);
                }
            }
        } else {
            $user = User::where('id','!=',Auth::user()->id)->get();
            foreach($user as $u) {
                $fCount = Follower::where('following_id',$u->id)->count();
                array_push($unfollowers,[$u,$fCount]);
            } 
        }
        //dd($unfollowers);
        return view ('search',compact('unfollowers'));
    } 
    
    public function search(Request $r) 
    {
        dd($r->all());
    } 

}
