@extends('layout.res')

@section('content')
<div class="container-detail">

    <div class="status-text status-selesai">
        Status: {{ $aspirasi->umpanbalik->status ?? 'Belum diproses' }}
    </div>

    <div class="detail-card">
        <h3 class="detail-title">
            {{ $aspirasi->siswa->nama ?? 'Siswa' }}
        </h3>

        <p class="detail-desc">
            {{ $aspirasi->keterangan }}
        </p>

        <div class="detail-meta">
            <span>Kategori: {{ $aspirasi->kategori->ket_kategori }}</span>
            <span>Tanggal: {{ $aspirasi->created_at->format('Y-m-d') }}</span>
        </div>
    </div>

</div>


@if($aspirasi->umpanbalik)
<div class="container-detail">
    <h3 class="detail-title">Feedback</h3>
    <div class="status-text status-selesai">
        Rating : Bintang {{ $aspirasi->umpanbalik->feedback }}
    </div>

    <div class="detail-card">
        <h3 class="detail-title">
            Admin
        </h3>

        <p class="detail-desc">
            {{ $aspirasi->umpanbalik->komentar }}
        </p>
    </div>
    @endif


    <a href="{{ route('aspirasi.index') }}" class="btn-back"> Kembali</a>

</div>
@endsection