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


    public function adminaspirasi(Request $request)
    {
        $kategori = Kategori::all();
        // 1. Ambil SEMUA data dulu
        $query = Aspirasi::with(['kategori', 'umpanbalik']);

        // 2. Kalau ADA status → baru filter
        if ($request->filled('status')) {
            $query->whereHas('umpanbalik', function ($q) use ($request) {
                $q->where('status', $request->status);
            });
        }

        if ($request->filled('kategori')) {
            $query->where('id_kategori', $request->kategori);
        }

        // FILTER TANGGAL (created_at)
        if ($request->filled('tanggal')) {
            $query->whereDate('created_at', $request->tanggal);
        }


        // 3. Eksekusi query
        $aspirasi = $query->get();
        return view('Admin/listaspirasi', compact('aspirasi', 'kategori'));
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
