<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tags=Tag::all();
        return view('admin.tags.index',compact('tags'));
    }

    public function destroy($id)
    {
        $tag=Tag::find($id)->delete();
        return redirect(route('admin.tags.index'));
    }
}
