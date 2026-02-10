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
        $request->validate([
            'nis' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('nis', 'password');

        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home')
                ->with('success', 'Berhasil login!');
        }

        return back()
            ->with('error', 'NIS atau password salah')
            ->onlyInput('nis');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }

    public function adminlogin()
    {
        return view('Admin.login');
    }

    public function adminloginpost(Request $request)
    {
//     dd(
//     session()->getId(),
//     session()->all()
// );

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        // dd(
        //     Auth::guard('admin')->attempt([
        //         'username' => $request->username,
        //         'password' => $request->password
        //     ])
        // );

    

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard')
                ->with('success', 'Berhasil login!');
        }

        return back()
            ->with('error', 'Username atau password salah')
            ->onlyInput('username');
    }

    public function adminlogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'Berhasil logout!');
    }
}
