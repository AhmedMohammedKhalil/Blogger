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
        if(count($data) > 0) {
            foreach($data as $following) {
                $userUnf = User::where('id','!=',$following->id)->first();
                $fCount = Follower::where('following_id',$userUnf->id)->count();
                array_push($unfollowers,[$userUnf,$fCount]);
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
