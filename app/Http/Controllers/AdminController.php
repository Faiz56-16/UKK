<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {   
//         dd(
//     session()->all(),
//     auth('admin')->check(),
//     auth('admin')->user()
// );

        return view('Admin/dashboard');
    }
}
