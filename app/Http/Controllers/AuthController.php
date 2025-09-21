<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\WelcomeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    //

    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        try {
            //code...
            Mail::to($user->email)->queue(new WelcomeMail($user));
        } catch (\Exception $th) {
            //throw $th;
            Log::error($th->getMessage());
        }

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
    
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
