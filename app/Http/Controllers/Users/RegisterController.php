<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function index(){
        return view('users.register');
    }

    public function register(Request $request){
        $request->validate([
            'username'=>'required|unique:users',
            'email' => 'required|email|unique:users',
            'first_name'=>'required',
            'last_name'=>'required',
            'password'=>'required|min:6'
        ]);
        $newUser = User::create([
            'username'=>$request->input('username'),
            'password'=>bcrypt($request->input('password')),
            'email'=>$request->input('email'),
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
        ]);
        return redirect()->route('login-form')->with('message', 'Registration Successfull! Login');
    }
}
