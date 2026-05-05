@extends('layouts.app')

@section('content')

<section class="page-hero page-hero-kuliner">
    <div class="page-hero-overlay">
        <div class="container">
            <div class="page-hero-content">
                <h1>Wisata Kuliner Pantai Pelawan</h1>
                <p>
                    Temukan pilihan warung makan di sekitar Pantai Pelawan, lengkap dengan
                    informasi menu, harga, foto makanan, dan lokasi warung.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">Kuliner Sekitar Pantai</span>
            <h2>Rekomendasi Warung Kuliner</h2>
            <p>
                Pilih warung yang ingin kamu lihat untuk mengetahui daftar menu,
                harga, foto makanan, dan alamat warung di sekitar Pantai Pelawan.
            </p>
        </div>

        <div class="warung-grid">
            @foreach($warungs as $warung)

                @php
                    $gambarUtama = $warung['gambar'] ?? 'images/hero-pantai.jpg';
                    $gambarProfil = 'images/profil_pantai.jpg';
                    $gambarFallback = 'images/hero-pantai.jpg';
                @endphp

                <a href="{{ route('kuliner.detail', $warung['slug']) }}" class="warung-card">

                    <div class="warung-img-box">
                        <img
                            class="warung-main-img"
                            src="{{ asset($gambarUtama) }}"
                            alt="{{ $warung['nama'] }}"
                            onerror="this.src='{{ asset('images/hero-pantai.jpg') }}'"
                        >

                        <div class="warung-img-overlay"></div>

                        <span class="warung-badge">Kuliner Pantai</span>

                        <div class="warung-mini-gallery">
                            <img src="{{ asset($gambarUtama) }}" alt="{{ $warung['nama'] }}"
                                 onerror="this.src='{{ asset('images/hero-pantai.jpg') }}'">

                            <img src="{{ asset($gambarProfil) }}" alt="Pantai Pelawan"
                                 onerror="this.src='{{ asset('images/hero-pantai.jpg') }}'">

                            <img src="{{ asset($gambarFallback) }}" alt="Pantai Pelawan"
                                 onerror="this.src='{{ asset('images/hero-pantai.jpg') }}'">
                        </div>
                    </div>

                    <div class="warung-card-body">
                        <span class="warung-category">Warung sekitar Pantai Pelawan</span>

                        <h3>{{ $warung['nama'] }}</h3>

                        <p>{{ $warung['deskripsi'] }}</p>

                        <div class="warung-address">
                            <strong>📍 Alamat Warung</strong>
                            <span>
                                {{ $warung['alamat'] ?? 'Area kuliner sekitar Pantai Pelawan, Desa Pangke Barat, Kabupaten Karimun' }}
                            </span>
                        </div>

                        <span class="lihat-menu">Lihat Menu →</span>
                    </div>

                </a>
            @endforeach
        </div>

    </div>
</section>

@endsection