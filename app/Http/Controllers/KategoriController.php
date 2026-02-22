<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function adminkategori()
    {
        $kategori = Kategori::all();
        return view('Admin/listkategori', compact('kategori'));
    }

    public function tambahkategori()
    {
        return view('Admin/tambahkategori');
    }
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'ket_kategori' => 'required|string|max:255',
        ]);

        Kategori::create($validatedData);

        return redirect()->route('admin.kategori');
    }

    public function destroy($id_kategori)
    {
        $kategori = Kategori::findOrFail($id_kategori);
        $kategori->delete();

        return redirect()->route('admin.kategori'); 
    }
}
