@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <h1>Wisata Kuliner Pantai Pelawan</h1>
        <p class="page-subtitle">
            Temukan berbagai warung makan yang tersedia di sekitar Pantai Pelawan.
        </p>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div class="section-heading">
            <h2>Rekomendasi Warung Kuliner</h2>
            <p>Pilih warung yang ingin kamu lihat untuk mengetahui daftar menu, harga, dan foto makanan.</p>
        </div>

        <div class="warung-grid">
            @foreach($warungs as $warung)
                <a href="{{ route('kuliner.detail', $warung['slug']) }}" class="warung-card">
                    <img src="{{ asset($warung['gambar']) }}" alt="{{ $warung['nama'] }}">
                    <div class="warung-card-body">
                        <h3>{{ $warung['nama'] }}</h3>
                        <p>{{ $warung['deskripsi'] }}</p>
                        <span class="lihat-menu">Lihat Menu</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

@endsection