@extends('layout.res')

@section('content')
<div class="container-detail">

    <div class="status-text status-selesai">
        Status: {{ ucfirst($aspirasi->status) }}
    </div>

    <div class="detail-card">
        <h3 class="detail-title">
            {{ $aspirasi->nama_pelapor ?? 'Siswa' }}
        </h3>

        <p class="detail-desc">
            {{ $aspirasi->keterangan }}
        </p>

        <div class="detail-meta">
            <span>Kategori: {{ $aspirasi->kategori->ket_kategori }}</span>
            <span>Tanggal: {{ $aspirasi->created_at->format('Y-m-d') }}</span>
        </div>
    </div>

    @if($aspirasi->feedback)
    <div class="detail-card">
        <h3 class="detail-title">Feedback</h3>

        <p class="detail-desc">
            {{ $aspirasi->feedback->isi_feedback }}
        </p>

        <p class="detail-from">
            Dari: {{ $aspirasi->feedback->admin->nama ?? 'Admin Sekolah' }}
        </p>
    </div>
    @endif

    <a href="{{ route('aspirasi.index') }}" class="btn-back"> Kembali</a>

</div>
@endsection
