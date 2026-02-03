@extends('layout.res')
@section('content')

<div class="container-list">
    <h1 class="page-title">Daftar Aspirasi</h1>

    <div class="list-wrapper">
        @forelse ($aspirasi as $as)
        <div class="list-card">

            <h3 class="list-name">
                {{ $as->nis }}
            </h3>

            <p class="list-desc">
                {{ $as->keterangan }}
            </p>

            <div class="list-footer">
                <span class="list-date">
                    Tanggal: {{ $as->created_at->format('Y-m-d') }}
                </span>

                <a href="{{ route('aspirasi.show', $as->id_pelaporan) }}" class="list-detail">
                    Lihat Detail
                </a>
            </div>

        </div>
        @empty
        <p class="empty">Belum ada data aspirasi.</p>
        @endforelse
    </div>

    <div class="bottom-action">
         <a href="{{ route('home') }}" class="btn-back-home">
            Kembali
        </a>
        <a href="{{ route('aspirasi.create') }}" class="btn-add-center">
            Tambah Aspirasi Baru
        </a>
       
    </div>
</div>

@endsection
