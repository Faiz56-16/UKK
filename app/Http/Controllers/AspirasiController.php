<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use App\Models\Kategori;
use App\Models\umpanbalik;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    public function index()
    {
        $aspirasi = Aspirasi::all();
        return view('Aspirasi/index', compact('aspirasi'));
    }

  public function filter(Request $request)
    {
        $query = Aspirasi::query();

        // Filter search keyword di kolom 'name'
        if ($request->search) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }

        $users = $query->get();

        return view('users.index', compact('users'));
    }

    public function adminaspirasi()
    {
        $aspirasi = Aspirasi::all();
        return view('Admin/listaspirasi', compact('aspirasi'));
    }
    public function create()
    {
        $kategori = Kategori::with('aspirasi')->get();

        return view('Aspirasi/create', compact('kategori'));
    }
    public function store(Request $request)
    {
     
        $request->validate([
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'keterangan'  => 'required|max:255',
            'lokasi'      => 'required',
        ]);

        Aspirasi::create([
            'nis'         => auth()->user()->nis,
            'id_kategori' => $request->id_kategori,
            'keterangan'  => $request->keterangan,
            'lokasi'      => $request->lokasi,
        ]);

        return redirect()->route('aspirasi.index')->with('success', 'Aspirasi submitted successfully!');
    }

    public function show($id_pelaporan)
    {

        $aspirasi = Aspirasi::find($id_pelaporan);
        return view('Aspirasi/detail', compact('aspirasi'));
    }
}
