@extends('layout.res')

@section('content')
<div class="form-container">
    <form action="{{ route('aspirasi.store') }}" method="POST" class="aspirasi-form">
        @csrf

        <div class="form-group">
            <label for="id_kategori">Kategori</label>
            <select name="id_kategori" id="id_kategori" class="form-control">
                <option value="">Pilih Kategori</option>
                @foreach($kategori as $kat)
                    <option value="{{ $kat->id_kategori }}">
                        {{ $kat->ket_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input required
                type="text" 
                name="lokasi" 
                id="lokasi"
                class="form-control"
                placeholder="Lokasi"
            >
        </div>

        <div class="form-group">
            <label for="keterangan">Isi Aspirasi</label>
            <textarea required
                name="keterangan" 
                id="keterangan" 
                class="form-textarea"
                placeholder="Masukkan isi aspirasi Anda di sini..."
            ></textarea>
        </div>

        <div class="form-action-right">
            <a href="{{ route('aspirasi.index') }}" class="btn-cancel">
                Batal
            </a>
            <button type="submit" class="btn-submit">
                Kirim Aspirasi
            </button>
        </div>
    </form>
</div>
@endsection
