@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <h1>Profil Pantai Pelawan</h1>
        <p class="page-subtitle">
            Mengenal lebih dekat Pantai Pelawan sebagai destinasi wisata alam yang indah,
            nyaman, dan memiliki potensi besar dalam pengembangan pariwisata daerah.
        </p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="profil-grid">
            <div class="profil-image">
                <img src="{{ asset('images/profil_pantai.jpg') }}" alt="Profil Pantai Pelawan">
            </div>

            <div class="profil-text">
                <div class="mini-title">Tentang Pantai</div>
                <h2>Deskripsi Pantai Pelawan</h2>
                <p>
                    Pantai Pelawan merupakan salah satu destinasi wisata yang berada di Desa Pangke Barat,
                    Kabupaten Karimun, Provinsi Kepulauan Riau. Pantai ini dikenal memiliki suasana yang
                    nyaman, pemandangan laut yang indah, serta lingkungan yang cocok untuk kegiatan rekreasi
                    bersama keluarga maupun teman.
                </p>
                <p>
                    Keindahan Pantai Pelawan terletak pada hamparan pantainya yang menarik, udara yang segar,
                    dan suasana alam yang mampu memberikan rasa tenang bagi para pengunjung. Selain menjadi
                    tempat wisata, pantai ini juga memiliki potensi besar sebagai media promosi wisata daerah
                    melalui pemanfaatan teknologi informasi berbasis web.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div class="section-heading">
            <h2>Sejarah Singkat Pantai Pelawan</h2>
            <p>
                Pantai Pelawan berkembang sebagai salah satu tujuan wisata yang dikenal masyarakat karena
                keindahan alamnya dan menjadi tempat rekreasi yang sering dikunjungi pada hari libur.
            </p>
        </div>

        <div class="content-box profil-box">
            <p>
                Seiring berjalannya waktu, Pantai Pelawan mulai dikenal lebih luas oleh masyarakat sekitar
                maupun pengunjung dari luar daerah. Keberadaannya sebagai kawasan wisata memberikan manfaat
                bagi masyarakat setempat, baik dari sisi sosial maupun ekonomi. Aktivitas wisata yang terus
                berkembang menjadikan Pantai Pelawan sebagai salah satu aset wisata yang layak untuk
                dipromosikan secara lebih luas melalui media digital.
            </p>
            <p>
                Dalam perkembangannya, penyampaian informasi mengenai Pantai Pelawan masih banyak dilakukan
                secara sederhana, sehingga diperlukan sebuah sistem informasi pariwisata berbasis web yang
                dapat membantu memberikan informasi yang lebih lengkap, menarik, dan mudah diakses oleh
                masyarakat.
            </p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="vm-grid">
            <div class="vm-card">
                <div class="vm-badge">Visi</div>
                <h3>Menjadi Destinasi Wisata Unggulan</h3>
                <p>
                    Menjadikan Pantai Pelawan sebagai destinasi wisata unggulan yang informatif, menarik,
                    dan mudah diakses melalui sistem informasi berbasis web.
                </p>
            </div>

            <div class="vm-card">
                <div class="vm-badge">Misi</div>
                <h3>Mendukung Informasi dan Promosi Digital</h3>
                <p>
                    Menyediakan informasi wisata yang lengkap, mendukung promosi destinasi secara digital,
                    dan membantu pengunjung memperoleh informasi yang cepat serta mudah dipahami.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div class="section-heading">
            <h2>Keunggulan Pantai Pelawan</h2>
            <p>
                Beberapa hal yang membuat Pantai Pelawan layak diperkenalkan lebih luas kepada wisatawan.
            </p>
        </div>

        <div class="profil-feature-grid">
            <div class="profil-feature-card">
                <h3>Panorama Alam</h3>
                <p>
                    Menawarkan pemandangan pantai yang indah dan suasana alam yang menenangkan.
                </p>
            </div>

            <div class="profil-feature-card">
                <h3>Lokasi Rekreasi</h3>
                <p>
                    Cocok dijadikan tempat wisata keluarga untuk bersantai dan menikmati waktu libur.
                </p>
            </div>

            <div class="profil-feature-card">
                <h3>Potensi Wisata Daerah</h3>
                <p>
                    Memiliki peluang besar untuk dikembangkan sebagai salah satu ikon wisata di Kabupaten Karimun.
                </p>
            </div>

            <div class="profil-feature-card">
                <h3>Dukungan Promosi Digital</h3>
                <p>
                    Dapat dipromosikan lebih luas melalui website agar informasi wisata lebih mudah dijangkau.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection