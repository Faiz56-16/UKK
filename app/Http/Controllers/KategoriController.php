<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function adminkategori()
    {
        return view('Admin/listkategori');
    }
}
