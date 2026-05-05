@extends('layouts.app')

@section('content')

<!-- HERO -->
<section class="hero hero-home">
    <div class="hero-overlay">
        <div class="container">
            <div class="hero-content hero-content-wide">
                <div class="hero-badge">
                    🌴 Sistem Informasi Pariwisata Pantai Pelawan
                </div>

                <h1>Jelajahi Keindahan Pantai Pelawan dengan Mudah</h1>

                <p>
                    Temukan informasi wisata, fasilitas, daya tarik, galeri, rekomendasi kuliner,
                    kontak pengelola, hingga layanan pemesanan tiket online dalam satu website
                    yang praktis dan mudah diakses.
                </p>

                <div class="hero-buttons">
                    <a href="{{ route('tiket') }}" class="btn btn-primary">
                        Pesan Tiket Sekarang
                    </a>

                    <a href="{{ route('informasi.pantai') }}" class="btn btn-secondary">
                        Lihat Informasi Pantai
                    </a>
                </div>

                
            </div>
        </div>
    </div>
</section>

<!-- INFORMASI UTAMA -->
<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">Layanan Website</span>
            <h2>Layanan Wisata Digital</h2>
            <p>
                Website ini membantu wisatawan memperoleh informasi Pantai Pelawan secara lebih
                praktis, terstruktur, dan mudah digunakan sebelum melakukan kunjungan.
            </p>
        </div>

        <div class="info-grid">
            <div class="info-card">
                <div class="icon-box">🎫</div>
                <h3>Pemesanan Tiket</h3>
                <p>
                    Wisatawan dapat melakukan pemesanan tiket secara online sebelum datang ke lokasi.
                </p>
            </div>

            <div class="info-card">
                <div class="icon-box">📍</div>
                <h3>Informasi Pantai</h3>
                <p>
                    Menampilkan lokasi, harga tiket, kondisi pantai, aturan pengunjung, dan kontak pengelola.
                </p>
            </div>

            <div class="info-card">
                <div class="icon-box">🍽️</div>
                <h3>Rekomendasi Kuliner</h3>
                <p>
                    Menyediakan informasi kuliner sekitar Pantai Pelawan sebagai referensi wisatawan.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- TENTANG SINGKAT -->
<section class="section section-soft">
    <div class="container">
        <div class="home-about-grid">
            <div class="home-about-image">
                <img src="{{ asset('images/profil_pantai.jpg') }}" alt="Pantai Pelawan">
            </div>

            <div class="home-about-text">
                <span class="section-label">Tentang Destinasi</span>
                <h2>Pantai Pelawan sebagai Destinasi Wisata Alam</h2>
                <p>
                    Pantai Pelawan merupakan salah satu destinasi wisata alam yang berada di
                    Kabupaten Karimun, Kepulauan Riau. Pantai ini memiliki suasana yang nyaman,
                    pemandangan laut yang indah, serta lingkungan yang cocok untuk rekreasi keluarga.
                </p>
                <p>
                    Melalui website ini, informasi wisata Pantai Pelawan disajikan secara lebih
                    lengkap dan terpusat, sehingga wisatawan dapat mengetahui daya tarik, fasilitas,
                    kondisi pantai, lokasi, kuliner sekitar, hingga melakukan pemesanan tiket secara online.
                </p>

                <a href="{{ route('profil.pantai') }}" class="btn btn-primary">
                    Lihat Profil Pantai
                </a>
            </div>
        </div>
    </div>
</section>

<!-- KEUNGGULAN -->
<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">Daya Tarik</span>
            <h2>Kenapa Memilih Pantai Pelawan?</h2>
            <p>
                Pantai Pelawan memiliki daya tarik alam dan potensi wisata yang dapat dinikmati
                oleh berbagai kalangan pengunjung.
            </p>
        </div>

        <div class="feature-grid">
            <div class="feature-card">
                <h3>🌊 Panorama Indah</h3>
                <p>
                    Menawarkan suasana pantai yang nyaman, udara segar, dan pemandangan laut yang menarik.
                </p>
            </div>

            <div class="feature-card">
                <h3>👨‍👩‍👧 Wisata Keluarga</h3>
                <p>
                    Cocok untuk rekreasi bersama keluarga, teman, maupun kegiatan santai di akhir pekan.
                </p>
            </div>

            <div class="feature-card">
                <h3>📸 Spot Foto</h3>
                <p>
                    Memiliki berbagai sudut menarik yang dapat digunakan untuk dokumentasi dan promosi wisata.
                </p>
            </div>

            <div class="feature-card">
                <h3>💻 Layanan Digital</h3>
                <p>
                    Informasi dan layanan wisata disajikan melalui website agar lebih mudah diakses.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">Informasi Website</span>
            <h2>Informasi yang Tersedia di Website</h2>
            <p>
                Website ini menyajikan berbagai informasi penting agar wisatawan lebih mudah merencanakan kunjungan.
            </p>
        </div>

        <div class="profil-card-grid profil-card-grid-six">
            <div class="profil-card-item">
                <div class="profil-card-icon">📌</div>
                <h3>Profil Pantai</h3>
                <p>Menampilkan gambaran umum mengenai Pantai Pelawan sebagai objek wisata alam.</p>
            </div>

            <div class="profil-card-item">
                <div class="profil-card-icon">🌊</div>
                <h3>Daya Tarik</h3>
                <p>Berisi informasi mengenai keindahan, suasana, dan potensi wisata Pantai Pelawan.</p>
            </div>

            <div class="profil-card-item">
                <div class="profil-card-icon">🛖</div>
                <h3>Fasilitas</h3>
                <p>Menjelaskan fasilitas pendukung yang tersedia untuk kenyamanan pengunjung.</p>
            </div>

            <div class="profil-card-item">
                <div class="profil-card-icon">🗺️</div>
                <h3>Lokasi</h3>
                <p>Membantu wisatawan mengetahui letak Pantai Pelawan dengan lebih mudah.</p>
            </div>

            <div class="profil-card-item">
                <div class="profil-card-icon">🎫</div>
                <h3>Pemesanan Tiket</h3>
                <p>Mendukung proses pemesanan tiket secara online melalui website.</p>
            </div>

            <div class="profil-card-item">
                <div class="profil-card-icon">☎️</div>
                <h3>Kontak Pengelola</h3>
                <p>Memudahkan wisatawan menghubungi pengelola untuk informasi tambahan.</p>
            </div>
        </div>
    </div>
</section>

<!-- ALUR PEMESANAN -->
<section class="section section-soft">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">Cara Pesan</span>
            <h2>Alur Pemesanan Tiket Online</h2>
            <p>
                Pemesanan tiket dibuat sederhana agar wisatawan dapat melakukan proses pemesanan
                dengan lebih cepat dan mudah.
            </p>
        </div>

        <div class="step-grid">
            <div class="step-card">
                <div class="step-number">01</div>
                <h3><strong>Pilih Tanggal</strong></h3>
                <p>Wisatawan memilih tanggal kunjungan dan jumlah tiket yang ingin dipesan.</p>
            </div>

            <div class="step-card">
                <div class="step-number">02</div>
                <h3><strong>Isi Data Pemesan</strong></h3>
                <p>Lengkapi data pemesan agar tiket dapat tercatat di dalam sistem.</p>
            </div>

            <div class="step-card">
                <div class="step-number">03</div>
                <h3><strong>Lakukan Pembayaran</strong></h3>
                <p>Pembayaran dapat dilakukan menggunakan metode digital seperti QRIS.</p>
            </div>

            <div class="step-card">
                <div class="step-number">04</div>
                <h3><strong>Dapatkan E-Ticket</strong></h3>
                <p>Setelah pembayaran berhasil, wisatawan dapat melihat dan menyimpan e-ticket.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section">
    <div class="container">
        <div class="home-cta">
            <div>
                <span class="section-label label-light">Ayo Berkunjung</span>
                <h2><strong>Rencanakan Kunjunganmu ke Pantai Pelawan</strong></h2>
                <p>
                    Dapatkan informasi lengkap dan lakukan pemesanan tiket secara online
                    melalui website Sistem Informasi Pariwisata Pantai Pelawan.
                </p>
            </div>

            <div class="home-cta-action">
                <a href="{{ route('tiket') }}" class="btn btn-primary">
                    Mulai Pesan Tiket
                </a>

                <a href="https://wa.me/6281268005708" target="_blank" class="btn btn-secondary">
                    Hubungi Pengelola
                </a>
                </a>
            </div>
        </div>
    </div>
</section>

@endsection