<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        $posts = Post::with('user','comments','media','tags','reactions','views')->latest()->get();
        return view('home',compact('posts'));
    }

    public function search() {
        $posts = Post::with('user','comments','media','tags','reactions','views')->latest()->get();
        $view = view('Common.Posts-comments',compact('posts'))->render();
        return response()->json(['html' => $view]);
    }
}
