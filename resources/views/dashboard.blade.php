@extends('layouts.app')

@section('content')

@php
    $page = $page ?? null;

    $aboutImage = $page && $page->about_gambar
        ? (str_starts_with($page->about_gambar, 'images/') ? asset($page->about_gambar) : asset('storage/' . $page->about_gambar))
        : asset('images/profil_pantai.jpg');
@endphp

<section class="hero hero-home">
    <div class="hero-overlay">
        <div class="container">
            <div class="hero-content hero-content-wide">
                <div class="hero-badge">
                    {{ $page->hero_badge ?? '🌴 Sistem Informasi Pariwisata Pantai Pelawan' }}
                </div>

                <h1>{{ $page->hero_judul ?? 'Jelajahi Keindahan Pantai Pelawan dengan Mudah' }}</h1>

                <p>
                    {{ $page->hero_deskripsi ?? 'Temukan informasi wisata, fasilitas, daya tarik, galeri, rekomendasi kuliner, kontak pengelola, hingga layanan pemesanan tiket online dalam satu website yang praktis dan mudah diakses.' }}
                </p>

                <div class="hero-buttons">
                    <a href="{{ route('tiket') }}" class="btn btn-primary">
                        {{ $page->hero_tombol_1 ?? 'Pesan Tiket Sekarang' }}
                    </a>

                    <a href="{{ route('informasi.pantai') }}" class="btn btn-secondary">
                        {{ $page->hero_tombol_2 ?? 'Lihat Informasi Pantai' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">{{ $page->layanan_label ?? 'Layanan Website' }}</span>
            <h2>{{ $page->layanan_judul ?? 'Layanan Wisata Digital' }}</h2>
            <p>{{ $page->layanan_deskripsi ?? 'Website ini membantu wisatawan memperoleh informasi Pantai Pelawan secara lebih praktis, terstruktur, dan mudah digunakan sebelum melakukan kunjungan.' }}</p>
        </div>

        <div class="info-grid">
            @foreach($layanan as $item)
                <div class="info-card">
                    <div class="icon-box">{{ $item->icon }}</div>
                    <h3>{{ $item->judul }}</h3>
                    <p>{{ $item->deskripsi }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div class="home-about-grid">
            <div class="home-about-image">
                <img src="{{ $aboutImage }}" alt="Pantai Pelawan">
            </div>

            <div class="home-about-text">
                <span class="section-label">{{ $page->about_label ?? 'Tentang Destinasi' }}</span>
                <h2>{{ $page->about_judul ?? 'Pantai Pelawan sebagai Destinasi Wisata Alam' }}</h2>
                <p>{{ $page->about_deskripsi_1 ?? '' }}</p>
                <p>{{ $page->about_deskripsi_2 ?? '' }}</p>

                <a href="{{ route('profil.pantai') }}" class="btn btn-primary">
                    {{ $page->about_tombol ?? 'Lihat Profil Pantai' }}
                </a>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">{{ $page->keunggulan_label ?? 'Daya Tarik' }}</span>
            <h2>{{ $page->keunggulan_judul ?? 'Kenapa Memilih Pantai Pelawan?' }}</h2>
            <p>{{ $page->keunggulan_deskripsi ?? '' }}</p>
        </div>

        <div class="feature-grid">
            @foreach($keunggulan as $item)
                <div class="feature-card">
                    <h3>{{ $item->icon }} {{ $item->judul }}</h3>
                    <p>{{ $item->deskripsi }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">{{ $page->info_label ?? 'Informasi Website' }}</span>
            <h2>{{ $page->info_judul ?? 'Informasi yang Tersedia di Website' }}</h2>
            <p>{{ $page->info_deskripsi ?? '' }}</p>
        </div>

        <div class="profil-card-grid profil-card-grid-six">
            @foreach($informasi as $item)
                <div class="profil-card-item">
                    <div class="profil-card-icon">{{ $item->icon }}</div>
                    <h3>{{ $item->judul }}</h3>
                    <p>{{ $item->deskripsi }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">{{ $page->alur_label ?? 'Cara Pesan' }}</span>
            <h2>{{ $page->alur_judul ?? 'Alur Pemesanan Tiket Online' }}</h2>
            <p>{{ $page->alur_deskripsi ?? '' }}</p>
        </div>

        <div class="step-grid">
            @foreach($alur as $item)
                <div class="step-card">
                    <div class="step-number">{{ $item->nomor }}</div>
                    <h3><strong>{{ $item->judul }}</strong></h3>
                    <p>{{ $item->deskripsi }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="home-cta">
            <div>
                <span class="section-label label-light">{{ $page->cta_label ?? 'Ayo Berkunjung' }}</span>
                <h2><strong>{{ $page->cta_judul ?? 'Rencanakan Kunjunganmu ke Pantai Pelawan' }}</strong></h2>
                <p>{{ $page->cta_deskripsi ?? '' }}</p>
            </div>

            <div class="home-cta-action">
                <a href="{{ route('tiket') }}" class="btn btn-primary">
                    {{ $page->cta_tombol_1 ?? 'Mulai Pesan Tiket' }}
                </a>

                <a href="{{ $page->cta_wa_link ?? '#' }}" target="_blank" class="btn btn-secondary">
                    {{ $page->cta_tombol_2 ?? 'Hubungi Pengelola' }}
                </a>
            </div>
        </div>
    </div>
</section>

@endsection