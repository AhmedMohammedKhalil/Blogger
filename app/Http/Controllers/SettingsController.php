<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index() {

        $auth = Auth::user()->role->name;
        if(Auth::user()->role->id == "1")
            return view('Admin.settings',compact('auth'));
        else 
            return view('Auther.settings',compact('auth'));
    }

    

    public function edit (Request $r) {

        $Validator = Validator::make($r->all(),[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        if($Validator->fails()){
            return Redirect::back()->withErrors($Validator)->withInput($r->all());
        }

        

        if($r->password != null || $r->confirm_password != null)
        {
            $validate = Validator::make($r->all(),[
                'password' => ['required','string', 'min:8'],
                'confirm_password' => ['required','string','min:8', 'same:password']
            ]);
            if($validate->fails()){
                return Redirect::back()->withErrors($validate)->withInput($r->all());
            }


        }

        if($r->hasFile('image')) {
            $valid = Validator::make($r->all(),[
                'image' => ['required','image','mimes:jpeg,png,jpg,svg','max:2048','dimensions:width=300,height=300']
            ]);
            if($valid->fails()){
                //dd($valid->errors());
                return Redirect::back()->withErrors($valid)->withInput($r->all());
            }
            $userId = Auth::user()->id;
            $file = $r->file('image');
            if (is_dir(public_path('storage\users\\' . $userId . '\images')) == false) {
                mkdir(public_path('storage\users\\' . $userId  . '\images'));
            }
            $file_path = public_path('storage\users\\' . $userId . '\images');
            $old_file = $file_path . '\\' . Auth::user()->image;
            $file_name = str_replace([' ','#','&','=','?'],'-',$file->getClientOriginalName());
            $file->move($file_path, $file_name);
            $user = User::find($userId);
            $user->image = $file_name;
            $user->save();
            if (file_exists($old_file)) {
                File::delete($old_file);
            }
        }

        $user = User::find(Auth::user()->id);
        $user->email = $r->email;
        $user->name = $r->name;
        if($r->password != null )
            $user->password = Hash::make($r->password);
        $user->save();
        if(Auth::user()->role->id == '1')
            return redirect()->route('admin.dashboard');
        else 
            return redirect()->route('auther.profile');

        
    }
}
