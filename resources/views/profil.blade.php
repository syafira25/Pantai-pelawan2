@extends('layouts.app')

@section('content')

@php
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

        <p>{{ $profil->tentang_paragraf_1 ?? 'Pantai Pelawan merupakan salah satu wisata pantai yang berada di Kabupaten Karimun, Kepulauan Riau. Pantai ini dikenal sebagai destinasi wisata alam dengan pemandangan laut, hamparan pasir, serta suasana pesisir yang nyaman untuk dikunjungi.' }}</p>

        <p>{{ $profil->tentang_paragraf_2 ?? 'Keindahan Pantai Pelawan menjadi daya tarik bagi wisatawan yang ingin menikmati suasana alam, bersantai bersama keluarga, maupun sekadar menikmati panorama pantai.' }}</p>

        <p>{{ $profil->tentang_paragraf_3 ?? 'Selain sebagai tempat rekreasi, Pantai Pelawan juga menjadi bagian dari potensi pariwisata daerah yang dapat terus dikembangkan melalui penyajian informasi yang lebih lengkap, rapi, dan mudah diakses oleh wisatawan.' }}</p>
    </div>
</div>

<section class="section section-soft">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">
                {{ $profil->gambaran_label ?? 'Identitas Pantai' }}
            </span>

            <h2>
                <strong>{{ $profil->gambaran_judul ?? 'Gambaran Umum Pantai Pelawan' }}</strong>
            </h2>

            <p>
                {{ $profil->gambaran_deskripsi ?? 'Profil Pantai Pelawan disajikan untuk memberikan gambaran mengenai lokasi, karakter wisata, dan nilai destinasi yang dimiliki.' }}
            </p>
        </div>

        <div class="profil-overview-grid">
            <div class="overview-card">
                <div class="overview-icon">📍</div>
                <h3><strong>{{ $profil->lokasi_judul ?? 'Lokasi Pantai' }}</strong></h3>
                <p>{{ $profil->lokasi_deskripsi ?? 'Pantai Pelawan berada di kawasan wisata alam yang dikenal masyarakat sekitar sebagai tempat rekreasi dan menikmati suasana pantai.' }}</p>
            </div>

            <div class="overview-card">
                <div class="overview-icon">🏖️</div>
                <h3><strong>{{ $profil->karakter_destinasi_judul ?? 'Karakter Destinasi' }}</strong></h3>
                <p>{{ $profil->karakter_destinasi_deskripsi ?? 'Pantai ini memiliki karakter wisata alam berupa pemandangan laut, suasana pesisir, dan lingkungan yang nyaman.' }}</p>
            </div>

            <div class="overview-card">
                <div class="overview-icon">🌿</div>
                <h3><strong>{{ $profil->nilai_alam_judul ?? 'Nilai Alam' }}</strong></h3>
                <p>{{ $profil->nilai_alam_deskripsi ?? 'Keindahan alam Pantai Pelawan menjadi nilai utama yang dapat dikenalkan kepada wisatawan.' }}</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="profil-grid profil-hero-box profil-story-new">

            <div class="profil-image">
                <img src="{{ $image }}" alt="Perkembangan Pantai Pelawan">
            </div>

            <div class="profil-text">
                <div class="mini-title">
                    {{ $profil->perkembangan_label ?? 'Perkembangan' }}
                </div>

                <h2>
                    <strong>{{ $profil->perkembangan_judul ?? 'Perkembangan Pantai Pelawan' }}</strong>
                </h2>

                <p>{{ $profil->perkembangan_paragraf_1 ?? 'Pantai Pelawan mulai dikenal sebagai salah satu tujuan wisata masyarakat karena memiliki suasana alam yang menarik dan cocok untuk kegiatan rekreasi.' }}</p>

                <p>{{ $profil->perkembangan_paragraf_2 ?? 'Seiring meningkatnya minat masyarakat terhadap wisata lokal, Pantai Pelawan menjadi salah satu destinasi yang memiliki peluang untuk dipromosikan secara lebih luas.' }}</p>

                <p>{{ $profil->perkembangan_paragraf_3 ?? 'Penyajian profil Pantai Pelawan melalui website menjadi salah satu cara untuk memperkenalkan identitas destinasi secara lebih rapi, modern, dan mudah diakses oleh masyarakat.' }}</p>
            </div>

        </div>
    </div>
</section>

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