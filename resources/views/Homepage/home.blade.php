@extends('layout.res')

@section('content')
<div class="home-hero">
    <div class="hero-content">
        <h1 class="hero-title">
            Sistem Aspirasi Sekolah
        </h1>

        <p class="hero-subtitle">
            Sampaikan pendapat dan masukan Anda dengan mudah dan aman
        </p>

        <a href="{{ route('aspirasi.index') }}" class="hero-button">
            List Aspirasi
        </a>
    </div>
</div>
@endsection
