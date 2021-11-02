<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Auth::user()->posts()->with('user','comments','media','tags','reactions','views')->latest()->get();
        if(Auth::user()->role->id == "1")
            return view('admin.profile',compact('posts'));
        else
            return view('auther.profile',compact('posts'));

    }
}
