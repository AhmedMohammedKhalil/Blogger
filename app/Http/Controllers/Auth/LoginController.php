<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\File;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;


    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email_login'   => 'required|email|exists:Users,email',
            'password_login' => 'required|min:8'
        ]);
        if($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $user = User::where('email',$request['email_login'])->first();

        if($user) {
            if (is_dir(public_path('users/' . $user->id . '/images')) == false) {
                File::makeDirectory(public_path('users/'.$user->id ));
                File::makeDirectory(public_path('users/'.$user->id .'/images'));

                File::copy(public_path('images/user_default.png'), public_path('users/' .$user->id . '/images/user_default.png'));
            }
        }
        $check = Auth::attempt(['email' => $request['email_login'], 'password' => $request['password_login']]);
        if($check == false) {
            return response()->json(['errors' => ['invalid' => ['Email or Passwored is Invalid']]]);
        } 
    }

    public function ChangePassword (Request $request) {
    
        $validator = Validator::make($request->all(), [
            'email_reset'   => 'required|email|exists:Users,email',
            'password_reset' => ['required', 'string', 'min:8'],
            'password_repeat_reset' => ['required', 'string', 'min:8','same:password_reset']

        ]);
        if($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }
        User::where('email',$request['email_reset'])->update(['password'=>Hash::make($request['password_reset'])]);
    }


    public function Logout(Request $request){

        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('welcome');
    }
}
