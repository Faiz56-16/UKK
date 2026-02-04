<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {   
        return view('Aspirasi.login');
    }

    public function loginPost(Request $request)
    {
       
        $credentials = $request->only('nis', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/Home')->with('success', 'Berhasil login!');
        }
        return back()->with('error', 'NIS atau password salah')->onlyInput('nis');
    }

     public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }

}
