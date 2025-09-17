<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        return back()->with('message', 'Register successfully');
    }

    public function login ()
    {
        return view('auth.login');
    }

    public function postLogin (LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials))
        {
            //login thành công
            $request->session()->regenerate(); 
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email' => 'Tài khoản không tồn tại'
        ]);
    }
}
