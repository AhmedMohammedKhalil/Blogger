<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users=User::auther();
        return view('admin.users.index',compact('users'));
    }

    public function destroy($id)
    {   
        $comments=User::find($id)->comments()->delete(); //not complete  need to delete reactions and views followers
        $posts=User::find($id)->posts()->delete();
        $user=User::find($id)->delete();
        return redirect(route('admin.user.index'));
    }
}
