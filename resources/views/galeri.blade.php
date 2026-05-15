@extends('layouts.app')

@section('content')

@php
    $page = $page ?? null;

    $img = function ($path, $default) {
        if (!$path) {
            return asset($default);
        }

        return str_starts_with($path, 'images/')
            ? asset($path)
            : asset('storage/' . $path);
    };
@endphp

<section class="page-hero page-hero-galeri">
    <div class="page-hero-overlay">
        <div class="container">
            <div class="page-hero-content">
                <h1>{{ $page->hero_judul ?? 'Galeri Pantai Pelawan' }}</h1>
                <p>
                    {{ $page->hero_deskripsi ?? 'Dokumentasi keindahan Pantai Pelawan dari berbagai sudut, suasana, dan momen wisata.' }}
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">{{ $page->galeri_label ?? 'Dokumentasi Wisata' }}</span>
            <h2>{{ $page->galeri_judul ?? 'Foto Wisata Pantai Pelawan' }}</h2>
            <p>
                {{ $page->galeri_deskripsi ?? 'Beberapa dokumentasi pemandangan dan suasana wisata Pantai Pelawan.' }}
            </p>
        </div>

        <div class="galeri-masonry">

            @forelse($galeris as $galeri)
                <div class="galeri-card
                    {{ $galeri->tipe_card == 'large' ? 'galeri-large' : '' }}
                    {{ $galeri->tipe_card == 'wide' ? 'galeri-wide' : '' }}
                ">

                    <img src="{{ str_starts_with($galeri->gambar, 'images/') ? asset($galeri->gambar) : asset('storage/' . $galeri->gambar) }}"
                         alt="{{ $galeri->judul }}">

                    <div class="galeri-overlay">
                        <h3>{{ $galeri->judul }}</h3>
                        <p>{{ $galeri->deskripsi }}</p>
                    </div>

                </div>
            @empty
                <p class="text-center">Belum ada foto galeri.</p>
            @endforelse

        </div>

    </div>
</section>

<section class="dt-activity-clean-section">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">{{ $page->aktivitas_label ?? 'Pengalaman Wisata' }}</span>
            <h2>{{ $page->aktivitas_judul ?? 'Aktivitas Menarik di Pantai Pelawan' }}</h2>
            <p>{{ $page->aktivitas_deskripsi ?? 'Nikmati berbagai aktivitas seru yang bisa dilakukan bersama keluarga, pasangan, maupun teman.' }}</p>
        </div>

        <div class="dt-activity-clean-grid">

            <div class="dt-activity-clean-card dt-activity-main">
                <img src="{{ $img($page->aktivitas_1_gambar ?? null, 'images/hero-pantai.jpg') }}" alt="{{ $page->aktivitas_1_judul ?? 'Naik Banana Boat' }}">
                <div class="dt-activity-clean-overlay">
                    <span>{{ $page->aktivitas_1_label ?? '🚤 Aktivitas Favorit' }}</span>
                    <h3>{{ $page->aktivitas_1_judul ?? 'Naik Banana Boat' }}</h3>
                    <p>{{ $page->aktivitas_1_deskripsi ?? 'Rasakan keseruan wahana air bersama teman dan keluarga.' }}</p>
                </div>
            </div>

            <div class="dt-activity-clean-card">
                <img src="{{ $img($page->aktivitas_2_gambar ?? null, 'images/profil_pantai.jpg') }}" alt="{{ $page->aktivitas_2_judul ?? 'Naik Sampan' }}">
                <div class="dt-activity-clean-overlay">
                    <span>{{ $page->aktivitas_2_label ?? '🛶 Santai di Laut' }}</span>
                    <h3>{{ $page->aktivitas_2_judul ?? 'Naik Sampan' }}</h3>
                    <p>{{ $page->aktivitas_2_deskripsi ?? 'Menikmati suasana pantai dari area perairan yang tenang.' }}</p>
                </div>
            </div>

            <div class="dt-activity-clean-card">
                <img src="{{ $img($page->aktivitas_3_gambar ?? null, 'images/hero-pantai.jpg') }}" alt="{{ $page->aktivitas_3_judul ?? 'Spot Foto' }}">
                <div class="dt-activity-clean-overlay">
                    <span>{{ $page->aktivitas_3_label ?? '📸 Dokumentasi' }}</span>
                    <h3>{{ $page->aktivitas_3_judul ?? 'Spot Foto' }}</h3>
                    <p>{{ $page->aktivitas_3_deskripsi ?? 'Abadikan momen dengan latar pantai dan pemandangan alam.' }}</p>
                </div>
            </div>

            <div class="dt-activity-clean-card dt-activity-wide">
                <img src="{{ $img($page->aktivitas_4_gambar ?? null, 'images/profil_pantai.jpg') }}" alt="{{ $page->aktivitas_4_judul ?? 'Bakar-bakar dan Piknik' }}">
                <div class="dt-activity-clean-overlay">
                    <span>{{ $page->aktivitas_4_label ?? '🔥 Bersama Keluarga' }}</span>
                    <h3>{{ $page->aktivitas_4_judul ?? 'Bakar-bakar & Piknik' }}</h3>
                    <p>{{ $page->aktivitas_4_deskripsi ?? 'Menikmati waktu santai sambil makan bersama di sekitar kawasan pantai.' }}</p>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="galeri-cta">
            <div>
                <span>{{ $page->cta_label ?? '📸 Dokumentasi Wisata' }}</span>
                <h2>{{ $page->cta_judul ?? 'Keindahan yang Tak Terlupakan' }}</h2>
                <p>
                    {{ $page->cta_deskripsi ?? 'Pantai Pelawan menawarkan pemandangan alam yang memukau dan cocok untuk diabadikan dalam berbagai momen wisata.' }}
                </p>
            </div>
        </div>
    </div>
</section>

@endsection