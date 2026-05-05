@extends('layouts.app')

@section('content')

@php
    $judul = $profil->judul ?? 'Profil Pantai Pelawan';

    $subjudul = $profil->subjudul ?? 'Mengenal lebih dekat Pantai Pelawan sebagai destinasi wisata alam di Kabupaten Karimun.';

    $deskripsiUtama = $profil->deskripsi_utama ?? 'Pantai Pelawan merupakan salah satu objek wisata alam yang berada di Desa Pangke Barat, Kabupaten Karimun, Provinsi Kepulauan Riau. Pantai ini dikenal sebagai kawasan wisata yang memiliki suasana tenang, pemandangan laut yang indah, serta lingkungan yang cocok untuk kegiatan rekreasi dan wisata keluarga.';

    $deskripsiTambahan = $profil->deskripsi_tambahan ?? 'Sebagai destinasi wisata alam, Pantai Pelawan memiliki daya tarik utama berupa panorama pantai, suasana pesisir, dan keindahan alam yang dapat dinikmati oleh wisatawan. Keberadaan Pantai Pelawan juga menjadi bagian dari potensi pariwisata daerah yang dapat terus dikembangkan melalui promosi dan penyajian informasi yang lebih terstruktur.';

    $lokasi = $profil->lokasi ?? 'Desa Pangke Barat, Kabupaten Karimun, Kepulauan Riau';

    $jamOperasional = $profil->jam_operasional ?? '08.00 - 18.00 WIB';

    $hargaTiket = $profil->harga_tiket ?? 'Dewasa Rp5.000, Anak-anak Rp2.000';

    $gambarProfil = $profil && $profil->gambar
        ? asset($profil->gambar)
        : asset('images/profil_pantai.jpg');
@endphp

<section class="page-hero page-hero-fasilitas">
    <div class="page-hero-overlay">
        <div class="container">
            <div class="page-hero-content">
                <h1>Profil Pantai Pelawan</h1>
                <p>
                    Destinasi wisata alam di Kabupaten Karimun
                </p>
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
        <div class="profil-about-label">Tentang Pantai Pelawan</div>

        <h3>Pantai Pelawan sebagai Destinasi Wisata Alam</h3>

        <p>
            Pantai Pelawan merupakan salah satu wisata pantai yang berada di Kabupaten Karimun,
            Kepulauan Riau. Pantai ini dikenal sebagai destinasi wisata alam dengan pemandangan
            laut, hamparan pasir, serta suasana pesisir yang nyaman untuk dikunjungi.
        </p>

        <p>
            Keindahan Pantai Pelawan menjadi daya tarik bagi wisatawan yang ingin menikmati
            suasana alam, bersantai bersama keluarga, maupun sekadar menikmati panorama pantai.
            Karakter alam yang bernuansa pesisir menjadikan Pantai Pelawan memiliki nilai wisata
            yang menarik untuk diperkenalkan kepada masyarakat luas.
        </p>

        <p>
            Selain sebagai tempat rekreasi, Pantai Pelawan juga menjadi bagian dari potensi
            pariwisata daerah yang dapat terus dikembangkan melalui penyajian informasi yang
            lebih lengkap, rapi, dan mudah diakses oleh wisatawan.
        </p>
    </div>

</div>

<section class="section section-soft">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">Identitas Pantai</span>
            <h2><strong>Gambaran Umum Pantai Pelawan</strong></h2>
            <p>
                Profil Pantai Pelawan disajikan untuk memberikan gambaran mengenai lokasi,
                karakter wisata, dan nilai destinasi yang dimiliki.
            </p>
        </div>

        <div class="profil-overview-grid">
            <div class="overview-card">
                <div class="overview-icon">📍</div>
                <h3><strong>Lokasi Pantai</strong></h3>
                <p>
                    {{ $lokasi }}. Lokasi ini menjadi salah satu kawasan wisata alam yang dikenal masyarakat sekitar
                    sebagai tempat rekreasi dan menikmati suasana pantai.
                </p>
            </div>

            <div class="overview-card">
                <div class="overview-icon">🏖️</div>
                <h3><strong>Karakter Destinasi</strong></h3>
                <p>
                    Pantai ini memiliki karakter wisata alam berupa pemandangan laut, suasana pesisir,
                    dan lingkungan yang nyaman. Karakter tersebut menjadikan Pantai Pelawan memiliki
                    daya tarik sebagai tempat wisata santai.
                </p>
            </div>

            <div class="overview-card">
                <div class="overview-icon">🌿</div>
                <h3><strong>Nilai Alam</strong></h3>
                <p>
                    Keindahan alam Pantai Pelawan menjadi nilai utama yang dapat dikenalkan kepada wisatawan.
                    Suasana pantai yang terbuka dan alami membuat destinasi ini memiliki potensi untuk
                    terus dikembangkan.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="profil-grid profil-hero-box profil-story-new">

            <div class="profil-image">
                <img src="{{ $gambarProfil }}" alt="Perkembangan Pantai Pelawan">
            </div>

            <div class="profil-text">
                <div class="mini-title">Perkembangan</div>

                <h2><strong>Perkembangan Pantai Pelawan</strong></h2>

                <p>
                    Pantai Pelawan mulai dikenal sebagai salah satu tujuan wisata masyarakat karena
                    memiliki suasana alam yang menarik dan cocok untuk kegiatan rekreasi.
                </p>

                <p>
                    Seiring meningkatnya minat masyarakat terhadap wisata lokal, Pantai Pelawan menjadi
                    salah satu destinasi yang memiliki peluang untuk dipromosikan secara lebih luas.
                </p>

                <p>
                    Oleh karena itu, penyajian profil Pantai Pelawan melalui website menjadi salah satu
                    cara untuk memperkenalkan identitas destinasi secara lebih rapi, modern, dan mudah
                    diakses oleh masyarakat.
                </p>
            </div>

        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">Karakteristik</span>
            <h2><strong>Karakteristik Pantai Pelawan</strong></h2>
            <p>
                Karakteristik ini menggambarkan ciri khas Pantai Pelawan sebagai destinasi wisata alam.
            </p>
        </div>

        <div class="profil-card-grid">
            <div class="profil-card-item">
                <div class="profil-card-icon">🌊</div>
                <h3><strong>Pemandangan Laut</strong></h3>
                <p>
                    Pantai Pelawan memiliki pemandangan laut yang menjadi daya tarik utama bagi wisatawan
                    yang ingin menikmati suasana alam pesisir.
                </p>
            </div>

            <div class="profil-card-item">
                <div class="profil-card-icon">🌤️</div>
                <h3><strong>Suasana Tenang</strong></h3>
                <p>
                    Suasana pantai yang nyaman membuat Pantai Pelawan cocok untuk melepas penat dan menikmati
                    waktu santai.
                </p>
            </div>

            <div class="profil-card-item">
                <div class="profil-card-icon">🏝️</div>
                <h3><strong>Nuansa Pesisir</strong></h3>
                <p>
                    Lingkungan pesisir memberikan pengalaman wisata alam yang berbeda dan menjadi identitas
                    khas Pantai Pelawan.
                </p>
            </div>

            <div class="profil-card-item">
                <div class="profil-card-icon">📸</div>
                <h3><strong>Daya Tarik Visual</strong></h3>
                <p>
                    Keindahan alam pantai dapat menjadi daya tarik visual yang mendukung dokumentasi dan
                    promosi wisata.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">Arah Pengembangan</span>
            <h2><strong>Visi dan Misi Pantai Pelawan</strong></h2>
            <p>
                Visi dan misi disusun untuk menggambarkan arah pengembangan Pantai Pelawan sebagai destinasi
                wisata yang informatif, menarik, dan mudah dijangkau melalui media digital.
            </p>
        </div>

        <div class="vm-grid">
            <div class="vm-card">
                <div class="vm-badge">Visi</div>
                <h3><strong>Menjadi Destinasi Wisata Unggulan</strong></h3>
                <p>
                    Menjadikan Pantai Pelawan sebagai destinasi wisata alam yang unggul, informatif,
                    ramah pengunjung, serta mudah dikenal oleh masyarakat melalui penyajian profil dan
                    informasi wisata berbasis web.
                </p>
            </div>

            <div class="vm-card">
                <div class="vm-badge">Misi</div>
                <h3><strong>Mendukung Pengenalan Profil Wisata</strong></h3>
                <p>
                    Menyajikan profil Pantai Pelawan secara lengkap, memperkenalkan potensi wisata daerah,
                    membantu wisatawan memahami karakter destinasi, dan mendukung promosi wisata secara digital.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="profil-cta">
            <h2><strong>Kenali Pantai Pelawan Lebih Dekat</strong></h2>
            <p>
                Pantai Pelawan memiliki potensi wisata alam yang menarik untuk diperkenalkan lebih luas.
                Melalui profil digital ini, wisatawan dapat memahami gambaran umum, karakteristik,
                dan nilai destinasi Pantai Pelawan.
            </p>

            <div class="profil-cta-actions">
                <a href="{{ route('informasi.pantai') }}" class="btn btn-secondary">
                    Lihat Informasi Pantai
                </a>

                <a href="{{ route('tiket') }}" class="btn btn-primary">
                    Pesan Tiket Sekarang
                </a>
            </div>
        </div>
    </div>
</section>

@endsection