<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('users.login');
    }

    public function login(Request $request){
        $credentials = $request->only('username', 'password');        
        if(Auth::attempt($credentials, $request->input('remember'))){
            if($request->has('prev')){
                return redirect($request->get('prev'));
            }
            return redirect()->intended(route('homepage'));
        }else{
            return redirect()->back()->withInput()->with('error', 'Username/Password Combo Wrong!');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login-form');
    }
}
