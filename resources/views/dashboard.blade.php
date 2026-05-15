@extends('layouts.app')

@section('content')

@php
    $page = $page ?? null;

    $aboutImage = $page && $page->about_gambar
        ? (str_starts_with($page->about_gambar, 'images/') ? asset($page->about_gambar) : asset('storage/' . $page->about_gambar))
        : asset('images/profil_pantai.jpg');

    $fallbackImg1 = asset('images/profil_pantai.jpg');
    $fallbackImg2 = asset('images/hero-pantai.jpg');
@endphp

<section class="hero hero-home">
    <div class="hero-overlay">
        <div class="container">
            <div class="hero-content hero-content-wide">
                <div class="hero-badge">
                    {{ $page->hero_badge ?? '🌴 Pantai Pelawan Karimun' }}
                </div>

                <h1>{{ $page->hero_judul ?? 'Jelajahi Keindahan Pantai Pelawan' }}</h1>

                <p>
                    {{ $page->hero_deskripsi ?? 'Temukan informasi wisata, fasilitas, galeri, kuliner, dan pemesanan tiket Pantai Pelawan dalam satu website.' }}
                </p>

                <div class="hero-buttons">
                    <a href="{{ route('tiket') }}" class="btn btn-primary">
                        {{ $page->hero_tombol_1 ?? 'Pesan Tiket' }}
                    </a>

                    <a href="{{ route('informasi.pantai') }}" class="btn btn-secondary">
                        {{ $page->hero_tombol_2 ?? 'Lihat Informasi' }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@php
    $weather = $weather ?? [];

    $ikon = $weather['ikon'] ?? '⛅';
    $kondisi = $weather['kondisi'] ?? 'Cerah Berawan';
    $ombak = $weather['ombak'] ?? 'Relatif Tenang';
    $angin = $weather['angin'] ?? 'Normal';
    $status = $weather['status'] ?? 'Aman Dikunjungi';
@endphp

<section class="home-weather-wrapper">
    <div class="container">
        <div class="weather-layout">

            <div class="travel-ready-card">
                <div class="travel-ready-icon">🏖️</div>

                <div class="travel-ready-content">
                    <h2>Siap Berwisata Hari Ini?</h2>
                    <p>
                        Cuaca berawan, tetap pantau perubahan cuaca
                        sebelum menikmati wisata Pantai Pelawan.
                    </p>
                </div>
            </div>

            <div class="home-weather-card">
                <div class="home-weather-main">
                    <div class="home-weather-icon">{{ $ikon }}</div>

                    <div>
                        <span>INFO CUACA HARI INI</span>
                        <h2>{{ $kondisi }}</h2>
                        <p>
                            Pantau kondisi singkat sebelum
                            berkunjung ke Pantai Pelawan.
                        </p>
                    </div>
                </div>

                <div class="home-weather-items">
                    <div class="home-weather-item">
                        <span>🌊 Ombak</span>
                        <strong>{{ $ombak }}</strong>
                    </div>

                    <div class="home-weather-item">
                        <span>💨 Angin</span>
                        <strong>{{ $angin }}</strong>
                    </div>

                    <div class="home-weather-item">
                        <span>✅ Status</span>
                        <strong>{{ $status }}</strong>
                    </div>
                </div>

                <a href="{{ route('informasi.pantai') }}" class="home-weather-btn">
                    Lihat Detail
                </a>
            </div>

        </div>
    </div>
</section>

{{-- INTRO PREMIUM --}}
<section class="section home-intro-beauty-section">
    <div class="home-beauty-leaf-left">🌿</div>
    <div class="home-beauty-leaf-right">🌿</div>
    <div class="home-beauty-circle"></div>
    <div class="home-beauty-dots"></div>

    <div class="container">
        <div class="home-beauty-layout">

            <div class="home-beauty-text">
                <span class="home-beauty-label">
                    {{ $page->about_label ?? '🍃 Destinasi Wisata Alam' }}
                </span>

                <h2>
                    {!! nl2br(e($page->about_judul ?? "Pantai Pelawan,\ntempat menikmati\nsuasana pantai yang\ntenang dan indah.")) !!}
                </h2>

                <div class="home-beauty-line">
                    <span></span>
                    <i>🍃</i>
                    <span></span>
                </div>

                <p>
                    {{ $page->about_deskripsi_1 ?? 'Pantai Pelawan menjadi pilihan wisata untuk bersantai, menikmati pemandangan, berfoto, mencoba kuliner sekitar pantai, dan menghabiskan waktu bersama keluarga.' }}
                </p>

                <div class="home-beauty-mini-grid">
                    @foreach($keunggulan->take(2) as $item)
                        <div class="home-beauty-mini-card">
                            <div class="home-beauty-mini-icon">{{ $item->icon }}</div>
                            <div>
                                <h3>{{ $item->judul }}</h3>
                                <p>{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <a href="{{ route('profil.pantai') }}" class="home-beauty-btn">
                    {{ $page->about_tombol ?? 'Lihat Profil Pantai' }}
                    <span>→</span>
                </a>
            </div>

            <div class="home-beauty-image-wrap">
                <div class="home-beauty-bird">⌁ ⌁ ⌁</div>

                <div class="home-beauty-image-card">
                    <img src="{{ $aboutImage }}" alt="Pantai Pelawan">

                    <div class="home-beauty-floating">
                        <div class="home-beauty-star">★</div>

                        <div>
                            <h3>Keindahan alami yang memanjakan mata</h3>
                            <p>Cocok untuk liburan keluarga, pasangan, dan teman.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="home-beauty-bottom">
            @foreach($keunggulan as $item)
                <div class="home-beauty-bottom-item">
                    <div class="home-beauty-bottom-icon">{{ $item->icon }}</div>
                    <div>
                        <h3>{{ $item->judul }}</h3>
                        <p>{{ $item->deskripsi }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

{{-- AKTIVITAS SERU --}}
<section class="section aktivitas-seru-section">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">
                {{ $page->aktivitas_label ?? 'Aktivitas Seru' }}
            </span>

            <h2>
                {{ $page->aktivitas_judul ?? 'Hal Menarik yang Bisa Dilakukan di Pantai Pelawan' }}
            </h2>

            <p>
                {{ $page->aktivitas_deskripsi ?? 'Nikmati berbagai aktivitas wisata yang membuat kunjungan ke Pantai Pelawan lebih menyenangkan bersama keluarga, teman, maupun pasangan.' }}
            </p>
        </div>

        <div class="aktivitas-seru-grid">

            @forelse($aktivitas as $index => $item)
                @php
                    $gambarAktivitas = $item->gambar
                        ? (str_starts_with($item->gambar, 'images/') ? asset($item->gambar) : asset('storage/' . $item->gambar))
                        : $fallbackImg1;
                @endphp

                <div class="aktivitas-seru-card {{ $index == 0 ? 'aktivitas-large' : '' }} {{ $index == 3 ? 'aktivitas-wide' : '' }}">
                    <img src="{{ $gambarAktivitas }}" alt="{{ $item->judul }}">

                    <div class="aktivitas-seru-content">
                        <span>{{ $item->icon }} Aktivitas Wisata</span>
                        <h3><strong>{{ $item->judul }}</strong></h3>
                        <p>{{ $item->deskripsi }}</p>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada aktivitas wisata.</p>
            @endforelse

        </div>
    </div>
</section>

{{-- GALERI COMPACT --}}
<section class="pp-gallery-section">
    <div class="container">
        <div class="pp-gallery-grid">

            <div class="pp-gallery-text">
                <span class="pp-section-label">
                    {{ $page->galeri_label ?? '📸 Galeri Pantai' }}
                </span>

                <h2>
                    {{ $page->galeri_judul ?? 'Lihat suasana Pantai Pelawan sebelum berkunjung.' }}
                </h2>

                <p>
                    {{ $page->galeri_deskripsi ?? 'Galeri menampilkan suasana pantai, aktivitas wisata, panorama sunset, dan beberapa sudut menarik yang dapat dinikmati pengunjung.' }}
                </p>

                <div class="pp-gallery-tags">
                    <span>🌅 Sunset Pantai</span>
                    <span>🚤 Aktivitas Wisata</span>
                    <span>📷 Spot Foto</span>
                </div>

                <a href="{{ route('galeri') }}" class="pp-green-btn">
                    Lihat Galeri <b>→</b>
                </a>
            </div>

            <div class="pp-gallery-images">
                @php
                    $galeri1 = $galeri->get(0);
                    $galeri2 = $galeri->get(1);
                    $galeri3 = $galeri->get(2);

                    $gambarGaleri1 = $galeri1 && $galeri1->gambar
                        ? (str_starts_with($galeri1->gambar, 'images/') ? asset($galeri1->gambar) : asset('storage/' . $galeri1->gambar))
                        : $fallbackImg1;

                    $gambarGaleri2 = $galeri2 && $galeri2->gambar
                        ? (str_starts_with($galeri2->gambar, 'images/') ? asset($galeri2->gambar) : asset('storage/' . $galeri2->gambar))
                        : $fallbackImg2;

                    $gambarGaleri3 = $galeri3 && $galeri3->gambar
                        ? (str_starts_with($galeri3->gambar, 'images/') ? asset($galeri3->gambar) : asset('storage/' . $galeri3->gambar))
                        : $aboutImage;
                @endphp

                <div class="pp-gallery-big">
                    <img src="{{ $gambarGaleri1 }}" alt="{{ $galeri1->judul ?? 'Galeri Pantai Pelawan' }}">
                </div>

                <div class="pp-gallery-small">
                    <img src="{{ $gambarGaleri2 }}" alt="{{ $galeri2->judul ?? 'Galeri Pantai Pelawan' }}">
                    <img src="{{ $gambarGaleri3 }}" alt="{{ $galeri3->judul ?? 'Galeri Pantai Pelawan' }}">
                </div>
            </div>

        </div>
    </div>
</section>

{{-- KULINER DAN FASILITAS COMPACT --}}
<section class="pp-feature-section">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">
                {{ $page->fitur_label ?? 'Kuliner & Fasilitas' }}
            </span>

            <h2>
                {{ $page->fitur_judul ?? 'Kuliner dan Fasilitas Pantai Pelawan' }}
            </h2>

            <p>
                {{ $page->fitur_deskripsi ?? 'Temukan informasi kuliner dan fasilitas yang tersedia di sekitar kawasan Pantai Pelawan.' }}
            </p>
        </div>

        <div class="pp-feature-grid">

            @forelse($fitur as $item)
                @php
                    $gambarFitur = $item->gambar
                        ? (str_starts_with($item->gambar, 'images/') ? asset($item->gambar) : asset('storage/' . $item->gambar))
                        : $fallbackImg1;
                @endphp

                <div class="pp-feature-card">
                    <img src="{{ $gambarFitur }}" alt="{{ $item->judul }}">

                    <div class="pp-feature-body">
                        <span>{{ $item->icon }}</span>
                        <h3>{{ $item->judul }}</h3>
                        <p>{{ $item->deskripsi }}</p>

                        @if($item->link)
                            <a href="{{ $item->link }}">Lihat Detail →</a>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada data kuliner dan fasilitas.</p>
            @endforelse

        </div>
    </div>
</section>

{{-- INFORMASI WEBSITE --}}
<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">{{ $page->info_label ?? 'Informasi Website' }}</span>
            <h2>{{ $page->info_judul ?? 'Informasi yang Tersedia di Website' }}</h2>
            <p>{{ $page->info_deskripsi ?? '' }}</p>
        </div>

        <div class="home-info-photo-grid">
            @foreach($informasi as $item)
                @php
                    $gambarInformasi = $item->gambar
                        ? (str_starts_with($item->gambar, 'images/') ? asset($item->gambar) : asset('storage/' . $item->gambar))
                        : $fallbackImg2;
                @endphp

                <div class="home-info-photo-card">
                    <img src="{{ $gambarInformasi }}" alt="{{ $item->judul }}">

                    <div class="home-info-overlay"></div>

                    <div class="home-info-content">
                        <div class="home-info-icon">
                            {{ $item->icon }}
                        </div>

                        <h3><strong>{{ $item->judul }}</strong></h3>
                        <p>{{ $item->deskripsi }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ALUR --}}
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

{{-- CTA --}}
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