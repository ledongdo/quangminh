<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function login()
    {
       
        return view('login');
    }
    public function postLogin(Request $request)
    {
        $check = [
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(Auth::attempt($check))
        {
            return redirect()->route('home');
        }else{
            return redirect()->route('get-login')->with('error','email hoac mat khau khong chinh xac');
        }
        
            
    }
    public function register()
    {
        return view('register');
    }
    public function postRegister(LoginRequest $request)
    {
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        return redirect()->route('get-register')->with('success','Đăng kí thành công');
    }
    public function home()
    {
        if(auth::check())
        {
            return view('home');
        }
        return redirect()->route('get-login');
        
    }
    public function logout()
    {
        auth::logout();
        return redirect()->route('get-login');
    }
    
}
