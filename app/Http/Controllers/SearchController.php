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
        $unf_req=$r->unfollowers;    
        $user_name = $r->username;  
        $array=[];
        $unf=[];
        $data = [];
        // if(Auth::user()->followings->count()>0){
        //     foreach (Auth::user()->followings as $f) {
        //         array_push($array,$f->id);
        //     }
        // }  
        $target_users=User::where('name','like','%'.$user_name.'%')->get();
            if($target_users->count() > 0 ) {

                foreach($target_users as $user) {
                    foreach( $unf_req as $u_r) {
                        if($user->id == $u_r[0]['id'])
                            array_push($data, $u_r);

                    }
                }
                $unfollowers = $data;

            } 

        $view = view('Common.search',compact('unfollowers'))->render();
        return response()->json(['html' => $view]);
        
    } 

}
