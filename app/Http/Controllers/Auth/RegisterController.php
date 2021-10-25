<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    


    public function createUser(Request $request){



            //return response()->json(['data' => "ahmed"]);
            
            $data = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email_register' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
                'password_register' => ['required', 'string', 'min:8'],
                'password_repeat_register' => ['required','string','min:8', 'same:password_register']
            ]);
            if($data->fails()) {
                return response()->json([
                    'errors'=> $data->errors()
                ]);
            } else {
                User::create([
                    'name' => $request['name'],
                    'email' => $request['email_register'],                
                    'password' => Hash::make($request['password_register']), 
                ]);
                Auth::attempt(['email' => $request['email_register'], 'password' => $request['password_register']]);
            }
            
        
        
    }
}
