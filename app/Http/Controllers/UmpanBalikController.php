<?php

namespace App\Http\Controllers;
use App\Models\Aspirasi;
use App\Models\UmpanBalik;
use Illuminate\Http\Request;

class UmpanBalikController extends Controller
{
     public function feedback(Aspirasi $aspirasi)
    {
         $aspirasi->load(['kategori', 'umpanbalik']);

        return view('admin.feedback', compact('aspirasi'));
    }

      public function feedbackstore(Request $request, $id_pelaporan)
    {
        $request->validate([
            'status'   => 'required',
            'feedback'   => 'nullable|integer|min:1|max:5',
            'komentar' => 'nullable|string'
        ]);

        UmpanBalik::updateOrCreate(
            ['id_pelaporan' => $id_pelaporan],
            [
                'status'   => $request->status,
                'feedback'   => $request->feedback,
                'komentar' => $request->komentar
            ]
        );

        return redirect()->route('admin.aspirasi')->with('success', 'Umpan balik berhasil disimpan');
    }
   
}
