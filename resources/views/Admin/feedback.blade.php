@extends('Admin.layout')
@section('content')

<div class="page">

    <div class="container-detail">
        <div class="status-text status-selesai">
            Status:
            {{ optional($aspirasi->umpanbalik)->status ?? 'Belum diproses' }}
        </div>

        <div class="detail-card">
            <h3 class="detail-title">
                {{ $aspirasi->nama_pelapor ?? 'Siswa' }}
            </h3>

            <h3 class="detail-title">
                {{ $aspirasi->keterangan }}
            </h3>

            <div class="detail-meta">
                <span>Kategori: {{ $aspirasi->kategori->ket_kategori }}</span>
                <span>Lokasi: {{ $aspirasi->lokasi }}</span>
                <span>Tanggal: {{ $aspirasi->created_at->format('Y-m-d') }}</span>
            </div>
        </div>
    </div>

    <div class="feedback-card">
        <div class="feedback-header">
            <span class="bar"></span>
            <h4>Balas Aspirasi</h4>
        </div>

        <form method="POST"
            action="{{ route('admin.feedbackstore', $aspirasi->id_pelaporan) }}">
            @csrf


            {{-- STATUS --}}
            <select name="status" required>
                <option value="Menunggu"
                    @selected(optional($aspirasi->umpanbalik)->status == 'Menunggu')>
                    Menunggu
                </option>
                <option value="Selesai"
                    @selected(optional($aspirasi->umpanbalik)->status == 'Selesai')>
                    Selesai
                </option>
            </select>

            {{-- RATING --}}
            <select name="feedback">
                <option value="">feedback</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}"
                    @selected(optional($aspirasi->umpanbalik)->feedback == $i)>
                    {{ $i }} ⭐
                    </option>
                    @endfor
            </select>

            {{-- KOMENTAR --}}
            <textarea
                name="komentar"
                placeholder="Tulis umpan balik Anda..."
                required>{{ optional($aspirasi->umpanbalik)->komentar }}</textarea>

            <div class="feedback-actions">
                <a href="{{ route('admin.aspirasi') }}" class="btn-back-feed">Kembali</a>
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>

</div>

@endsection