<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

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
    public function index()
    {
        $tags = Tag::all();
        $posts = Post::with('user','comments','media','tags','reactions','views')->latest()->get();
        return view('home',compact('posts','tags'));
    }

    public function search(Request $r) {
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
                        if($p->id == $post->id) {
                            $flag = false;
                            break;
                        }
                    }
                    if($flag == true)
                        array_push($posts,$p);
                }
                

            }
        }

        //return response()->json(['data' => $posts]);
        // $posts = Post::with('user','comments','media','tags','reactions','views')->latest()->get();
        $view = view('Common.Posts-comments',compact('posts'))->render();
        return response()->json(['html' => $view]);
    }
}
