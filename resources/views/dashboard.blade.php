@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="hero">
    <div class="hero-overlay">
        <div class="container hero-content">
            <span class="hero-badge">Sistem Informasi Pariwisata</span>
            <h1>Selamat Datang di Pantai Pelawan</h1>
            <p>
                Pantai Pelawan merupakan salah satu destinasi wisata yang memiliki keindahan alam,
                suasana nyaman, serta beragam informasi wisata yang dapat diakses secara digital
                melalui website ini.
            </p>

            <div class="hero-buttons">
                <a href="{{ route('profil.pantai') }}" class="btn btn-primary">Lihat Profil Pantai</a>
                <a href="{{ route('informasi.pantai') }}" class="btn btn-secondary">Informasi Wisata</a>
            </div>
        </div>
    </div>
</section>

<!-- TENTANG -->
<section class="section">
    <div class="container">
        <div class="section-heading">
            <h2>Tentang Pantai Pelawan</h2>
            <p>
                Pantai Pelawan hadir sebagai destinasi wisata alam yang menawarkan keindahan panorama,
                suasana rekreasi keluarga, serta potensi wisata yang menarik untuk dikunjungi.
            </p>
        </div>

        <div class="info-grid">
            <div class="info-card">
                <div class="icon-box">🌊</div>
                <h3>Panorama Alam</h3>
                <p>
                    Pantai Pelawan memiliki pemandangan laut yang indah dengan suasana pantai yang
                    tenang dan menyegarkan.
                </p>
            </div>

            <div class="info-card">
                <div class="icon-box">🌅</div>
                <h3>Sunset Menarik</h3>
                <p>
                    Waktu sore hari menjadi momen yang sangat disukai pengunjung karena dapat menikmati
                    keindahan matahari terbenam.
                </p>
            </div>

            <div class="info-card">
                <div class="icon-box">👨‍👩‍👧‍👦</div>
                <h3>Wisata Keluarga</h3>
                <p>
                    Pantai ini sangat cocok dijadikan tempat rekreasi bersama keluarga karena suasananya
                    nyaman dan mendukung aktivitas santai.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- FITUR INFORMASI -->
<section class="section section-soft">
    <div class="container">
        <div class="section-heading">
            <h2>Informasi yang Tersedia</h2>
            <p>
                Website ini dirancang untuk membantu pengunjung mendapatkan informasi wisata secara
                lebih lengkap, terstruktur, dan mudah diakses.
            </p>
        </div>

        <div class="feature-grid">
            <div class="feature-card">
                <h3>Profil Pantai</h3>
                <p>
                    Menyajikan deskripsi umum, sejarah singkat, visi, misi, dan gambaran mengenai
                    Pantai Pelawan.
                </p>
            </div>

            <div class="feature-card">
                <h3>Daya Tarik Wisata</h3>
                <p>
                    Menampilkan berbagai keunggulan wisata seperti panorama alam, aktivitas rekreasi,
                    dan keunikan yang dimiliki.
                </p>
            </div>

            <div class="feature-card">
                <h3>Fasilitas</h3>
                <p>
                    Pengunjung dapat melihat fasilitas yang tersedia seperti area parkir, gazebo,
                    toilet, warung kuliner, dan fasilitas pendukung lainnya.
                </p>
            </div>

            <div class="feature-card">
                <h3>Galeri</h3>
                <p>
                    Menyediakan dokumentasi visual Pantai Pelawan sehingga pengguna dapat melihat
                    suasana wisata secara langsung melalui foto.
                </p>
            </div>

            <div class="feature-card">
                <h3>Informasi Pantai</h3>
                <p>
                    Berisi informasi umum, tips berkunjung, keamanan, jam operasional, serta lokasi
                    wisata melalui Google Maps.
                </p>
            </div>

            <div class="feature-card">
                <h3>Kuliner</h3>
                <p>
                    Menampilkan rekomendasi warung di sekitar Pantai Pelawan beserta detail menu,
                    foto makanan, dan harga.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- KEUNGGULAN -->
<section class="section">
    <div class="container">
        <div class="section-heading">
            <h2>Keunggulan Website</h2>
            <p>
                Website ini tidak hanya berfungsi sebagai media informasi, tetapi juga sebagai media
                promosi digital untuk mendukung pengembangan wisata Pantai Pelawan.
            </p>
        </div>

        <div class="content-box">
            <p>
                Melalui website ini, informasi mengenai Pantai Pelawan dapat disajikan dalam satu
                platform yang terintegrasi. Pengunjung tidak perlu lagi mencari informasi secara
                terpisah melalui berbagai media yang berbeda, karena seluruh informasi penting telah
                dirangkum secara sistematis dalam website.
            </p>

            <p>
                Selain itu, website ini juga mendukung promosi wisata secara digital dengan tampilan
                yang lebih menarik, modern, dan mudah dipahami. Hal ini diharapkan dapat meningkatkan
                minat wisatawan untuk berkunjung serta memperluas jangkauan promosi objek wisata
                Pantai Pelawan.
            </p>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section">
    <div class="container">
        <div class="highlight-box">
            <div class="highlight-text">
                <h2>Jelajahi Pantai Pelawan Sekarang</h2>
                <p>
                    Temukan informasi wisata, fasilitas, galeri, lokasi, dan rekomendasi kuliner
                    hanya dalam satu website.
                </p>
            </div>

            <div class="highlight-action">
                <a href="{{ route('galeri') }}" class="btn btn-primary">Lihat Galeri</a>
            </div>
        </div>
    </div>
</section>

@endsection