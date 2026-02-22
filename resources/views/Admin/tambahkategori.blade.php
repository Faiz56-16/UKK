@extends('admin.layout')

@section('content')
<div class="form-container">
    <form action="{{ route('kategori.store') }}" method="POST" class="aspirasi-form">
        @csrf

        <div class="form-group">
            <label for="ket_kategori">Keterangan Kategori</label>
            <input required
                type="text" 
                name="ket_kategori" 
                id="ket_kategori"
                class="form-control"
                placeholder="ket_kategori"
            >
        </div>

        <div class="form-action-right">
            <a href="{{ route('admin.kategori') }}" class="btn-cancel">
                Batal
            </a>
            <button type="submit" class="btn-submit">
                Kirim Aspirasi
            </button>
        </div>
    </form>
</div>
@endsection
