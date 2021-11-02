<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follower;
use App\Models\Tag;
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
        $tags = Tag::all();
        //dd($unfollowers);
        return view ('search',compact('unfollowers','tags'));
    } 
    
    public function search(Request $r) 
    {       
        $data = [];
        if($r->tags != null) {
            foreach($r->tags as $tagId) {
                $tag = Tag::find($tagId);
                array_push($data,$tag->posts);
            }
        }
        $posts = [];
        $flag = true;
        foreach ($data as $d) {
            if(count($d) > 0 ) {
                $flag = true;
                foreach ($d as $p) {
                    foreach($posts as $post) {
                        if($p->user_id == $post->user_id) {
                            $flag = false;
                            break;
                        }
                    }
                    if($flag == true)
                        array_push($posts,$p);
                }
                

            }
        }
        $users = [];
        foreach($posts as $post) {
            array_push($users,User::find($post->user_id));
        }

        if($r->username != null && $r->username != Auth::user()->name) {
            $user = User::where('name',$r->username)->get();
            if(count($user) > 0) {
                $flag = true;
                foreach($users as $u) {
                    if($user->id == $u->id)
                    {
                        $flag = false;
                        break;
                    }
                }
                if($flag == true)
                    array_push($users,$user);

            }
        }
        $unfollowers = [];
        $data = Auth::user()->followings;
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
    
        
        $view = view('Common.searchfollowers',compact('unfollowers'))->render();
        return response()->json(['html' => $view]);
        
    } 

}
