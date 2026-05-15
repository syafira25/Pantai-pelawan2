@extends('layouts.app')

@section('content')

@php
    $profil = $profil ?? null;

    $image = $profil && $profil->gambar
        ? (str_starts_with($profil->gambar, 'images/') ? asset($profil->gambar) : asset('storage/' . $profil->gambar))
        : asset('images/profil_pantai.jpg');

    $defaultIcons = ['🌊', '🌤️', '🏝️', '📸'];

    $defaultJudul = [
        'Pemandangan Laut',
        'Suasana Tenang',
        'Nuansa Pesisir',
        'Daya Tarik Visual'
    ];

    $defaultDeskripsi = [
        'Pantai Pelawan memiliki pemandangan laut yang menjadi daya tarik utama bagi wisatawan yang ingin menikmati suasana alam pesisir.',
        'Suasana pantai yang nyaman membuat Pantai Pelawan cocok untuk melepas penat dan menikmati waktu santai.',
        'Lingkungan pesisir memberikan pengalaman wisata alam yang berbeda dan menjadi identitas khas Pantai Pelawan.',
        'Keindahan alam pantai dapat menjadi daya tarik visual yang mendukung dokumentasi dan promosi wisata.'
    ];
@endphp

<section class="page-hero page-hero-fasilitas">
    <div class="page-hero-overlay">
        <div class="container">
            <div class="page-hero-content">
                <h1>{{ $profil->hero_judul ?? 'Profil Pantai Pelawan' }}</h1>
                <p>{{ $profil->hero_subjudul ?? 'Destinasi wisata alam di Kabupaten Karimun' }}</p>
            </div>
        </div>
    </div>
</section>

<div class="profil-about-box profil-about-premium">
    <div class="profil-about-decor"></div>

    <div class="profil-about-side">
        <div class="profil-about-icon">🏝️</div>
        <span>Profil Wisata</span>
    </div>

    <div class="profil-about-content">
        <div class="profil-about-label">
            {{ $profil->tentang_label ?? 'Tentang Pantai Pelawan' }}
        </div>

        <h3>{{ $profil->tentang_judul ?? 'Pantai Pelawan sebagai Destinasi Wisata Alam' }}</h3>

        <p>{{ $profil->tentang_paragraf_1 ?? 'Pantai Pelawan merupakan salah satu wisata pantai yang berada di Kabupaten Karimun, Kepulauan Riau.' }}</p>

        <p>{{ $profil->tentang_paragraf_2 ?? 'Keindahan Pantai Pelawan menjadi daya tarik bagi wisatawan.' }}</p>

        <p>{{ $profil->tentang_paragraf_3 ?? 'Pantai Pelawan memiliki potensi untuk dikembangkan sebagai destinasi wisata daerah.' }}</p>
    </div>
</div>

{{-- GAMBARAN UMUM --}}
<section class="section section-soft">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">
                {{ $profil->gambaran_label ?? 'Gambaran Umum' }}
            </span>

            <h2>
                {{ $profil->gambaran_judul ?? 'Gambaran Umum Pantai Pelawan' }}
            </h2>

            <p>
                {{ $profil->gambaran_deskripsi ?? 'Profil Pantai Pelawan disajikan untuk memberikan gambaran mengenai lokasi, karakter wisata, dan nilai destinasi yang dimiliki.' }}
            </p>
        </div>

        <div class="unique-premium-wrapper">

            <div class="unique-big-card">
                <h3>
                    {{ $profil->gambaran_big_judul ?? '🌊 Pesona Pantai Pelawan yang Menenangkan' }}
                </h3>

                <p>
                    {{ $profil->gambaran_big_deskripsi ?? 'Pantai Pelawan menghadirkan suasana pesisir yang nyaman dengan hamparan pantai yang indah, menjadikannya tempat ideal untuk bersantai, menikmati pemandangan laut, dan melepas penat bersama keluarga maupun teman.' }}
                </p>
            </div>

            <div class="unique-small-grid">

                <div class="unique-small-card">
                    <span>📍</span>
                    <h3>{{ $profil->lokasi_judul ?? 'Lokasi Pantai' }}</h3>
                    <p>{{ $profil->lokasi_deskripsi ?? 'Pantai Pelawan berada di kawasan wisata alam yang dikenal masyarakat sebagai destinasi rekreasi untuk menikmati suasana pantai dan keindahan pesisir.' }}</p>
                </div>

                <div class="unique-small-card">
                    <span>🏖️</span>
                    <h3>{{ $profil->karakter_destinasi_judul ?? 'Karakter Destinasi' }}</h3>
                    <p>{{ $profil->karakter_destinasi_deskripsi ?? 'Pantai Pelawan memiliki karakter wisata alam dengan panorama laut, area pesisir yang nyaman, serta suasana yang mendukung aktivitas santai bagi pengunjung.' }}</p>
                </div>

                <div class="unique-small-card">
                    <span>🌿</span>
                    <h3>{{ $profil->nilai_alam_judul ?? 'Nilai Alam' }}</h3>
                    <p>{{ $profil->nilai_alam_deskripsi ?? 'Keindahan alam Pantai Pelawan menjadi daya tarik utama yang memberikan pengalaman wisata alami dan menyegarkan bagi wisatawan.' }}</p>
                </div>

                <div class="unique-small-card">
                    <span>👨‍👩‍👧</span>
                    <h3>{{ $profil->semua_kalangan_judul ?? 'Wisata untuk Semua Kalangan' }}</h3>
                    <p>{{ $profil->semua_kalangan_deskripsi ?? 'Pantai Pelawan dapat dinikmati oleh berbagai kalangan, baik keluarga, pasangan, maupun wisatawan yang ingin menikmati suasana pantai dengan nyaman.' }}</p>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- KARAKTERISTIK --}}
<section class="section section-soft">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">
                {{ $profil->karakteristik_label ?? 'Karakteristik' }}
            </span>

            <h2>
                <strong>{{ $profil->karakteristik_judul ?? 'Karakteristik Pantai Pelawan' }}</strong>
            </h2>

            <p>
                {{ $profil->karakteristik_deskripsi ?? 'Karakteristik ini menggambarkan ciri khas Pantai Pelawan sebagai destinasi wisata alam.' }}
            </p>
        </div>

        <div class="profil-card-grid">

            @for($i = 1; $i <= 4; $i++)
                @php
                    $iconField = 'karakter_'.$i.'_icon';
                    $judulField = 'karakter_'.$i.'_judul';
                    $deskripsiField = 'karakter_'.$i.'_deskripsi';
                @endphp

                <div class="profil-card-item">
                    <div class="profil-card-icon">
                        {{ !empty($profil->$iconField) ? $profil->$iconField : $defaultIcons[$i - 1] }}
                    </div>

                    <h3>
                        <strong>
                            {{ !empty($profil->$judulField) ? $profil->$judulField : $defaultJudul[$i - 1] }}
                        </strong>
                    </h3>

                    <p>
                        {{ !empty($profil->$deskripsiField) ? $profil->$deskripsiField : $defaultDeskripsi[$i - 1] }}
                    </p>
                </div>
            @endfor

        </div>
    </div>
</section>

{{-- PERKEMBANGAN --}}
<section class="profile-story-final-section">
    <div class="container">
        <div class="profile-story-final-grid">

            <div class="profile-story-final-text">
                <span class="profile-story-final-label">
                    {{ $profil->perkembangan_label ?? 'Perkembangan' }}
                </span>

                <h2>{{ $profil->perkembangan_judul ?? 'Perkembangan Pantai Pelawan' }}</h2>

                <div class="profile-story-final-list">
                    <div class="profile-story-final-item">
                        <b>01</b>
                        <p>{{ $profil->perkembangan_paragraf_1 ?? 'Pantai Pelawan mulai dikenal sebagai salah satu tujuan wisata masyarakat karena memiliki suasana alam yang menarik dan cocok untuk kegiatan rekreasi.' }}</p>
                    </div>

                    <div class="profile-story-final-item">
                        <b>02</b>
                        <p>{{ $profil->perkembangan_paragraf_2 ?? 'Seiring meningkatnya minat masyarakat terhadap wisata lokal, Pantai Pelawan menjadi salah satu destinasi yang memiliki peluang untuk dipromosikan secara lebih luas.' }}</p>
                    </div>

                    <div class="profile-story-final-item">
                        <b>03</b>
                        <p>{{ $profil->perkembangan_paragraf_3 ?? 'Penyajian profil Pantai Pelawan melalui website menjadi salah satu cara untuk memperkenalkan identitas destinasi secara lebih rapi, modern, dan mudah diakses.' }}</p>
                    </div>
                </div>
            </div>

            <div class="profile-story-gallery-grid">
                <div class="gallery-box">
                    <img src="{{ $image }}" alt="Pantai Pelawan">
                </div>

                <div class="gallery-box">
                    <img src="{{ $image }}" alt="Pantai Pelawan">
                </div>

                <div class="gallery-box">
                    <img src="{{ $image }}" alt="Pantai Pelawan">
                </div>

                <div class="gallery-box">
                    <img src="{{ $image }}" alt="Pantai Pelawan">
                </div>
            </div>

        </div>
    </div>
</section>

{{-- VISI MISI --}}
<section class="section section-soft">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">
                {{ $profil->visi_misi_label ?? 'Arah Pengembangan' }}
            </span>

            <h2>
                <strong>{{ $profil->visi_misi_judul ?? 'Visi dan Misi Pantai Pelawan' }}</strong>
            </h2>

            <p>
                {{ $profil->visi_misi_deskripsi ?? 'Visi dan misi disusun untuk menggambarkan arah pengembangan Pantai Pelawan sebagai destinasi wisata yang informatif, menarik, dan mudah dijangkau melalui media digital.' }}
            </p>
        </div>

        <div class="vm-grid">
            <div class="vm-card">
                <div class="vm-badge">Visi</div>
                <h3><strong>{{ $profil->visi_judul ?? 'Menjadi Destinasi Wisata Unggulan' }}</strong></h3>
                <p>{{ $profil->visi_deskripsi ?? 'Menjadikan Pantai Pelawan sebagai destinasi wisata alam yang unggul, informatif, ramah pengunjung, serta mudah dikenal oleh masyarakat melalui penyajian profil dan informasi wisata berbasis web.' }}</p>
            </div>

            <div class="vm-card">
                <div class="vm-badge">Misi</div>
                <h3><strong>{{ $profil->misi_judul ?? 'Mendukung Pengenalan Profil Wisata' }}</strong></h3>
                <p>{{ $profil->misi_deskripsi ?? 'Menyajikan profil Pantai Pelawan secara lengkap, memperkenalkan potensi wisata daerah, membantu wisatawan memahami karakter destinasi, dan mendukung promosi wisata secara digital.' }}</p>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="section">
    <div class="container">
        <div class="profil-cta">
            <h2>
                <strong>{{ $profil->cta_judul ?? 'Kenali Pantai Pelawan Lebih Dekat' }}</strong>
            </h2>

            <p>
                {{ $profil->cta_deskripsi ?? 'Pantai Pelawan memiliki potensi wisata alam yang menarik untuk diperkenalkan lebih luas. Melalui profil digital ini, wisatawan dapat memahami gambaran umum, karakteristik, dan nilai destinasi Pantai Pelawan.' }}
            </p>

            <div class="profil-cta-actions">
                <a href="{{ route('informasi.pantai') }}" class="btn btn-secondary">
                    {{ $profil->cta_tombol_1 ?? 'Lihat Informasi Pantai' }}
                </a>

                <a href="{{ route('tiket') }}" class="btn btn-primary">
                    {{ $profil->cta_tombol_2 ?? 'Pesan Tiket Sekarang' }}
                </a>
            </div>
        </div>
    </div>
</section>

@endsection