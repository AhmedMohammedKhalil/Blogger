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
                        break;
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
        $data = [];
        $users = [];
        
            if($r->username != null && $r->username != Auth::user()->name) {
                $search = User::where('name','like','%'.$r->username.'%')
                        ->where('name','!=',Auth::user()->name)->get();
                
                if(count($search) > 0) {
                    $flag = true;
                    foreach ($search as $s) {
                        foreach(Auth::user()->followings as $f) {
                            if($s->id == $f->id)
                            {
                                $flag = false;
                                break;
                            }
                        }
                        if($flag == true)
                            array_push($users,$s);
                    }
                }
    
            }
        
        
        $unfollowers = $users;
        return response()->json(['foll' => $unfollowers]);

        $view = view('Common.searchfollowers',compact('unfollowers'))->render();
        return response()->json(['html' => $view]);
        
    } 

}
