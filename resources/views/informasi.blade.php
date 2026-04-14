@extends('layouts.app')

@section('content')

<!-- HEADER -->
<section class="page-header">
    <div class="container">
        <h1>Informasi Pantai Pelawan</h1>
        <p class="page-subtitle">
            Informasi penting yang perlu diketahui sebelum berkunjung ke Pantai Pelawan.
        </p>
    </div>
</section>

<!-- INFORMASI UMUM -->
<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <h2>Informasi Umum</h2>
            <p>Berikut adalah informasi dasar mengenai Pantai Pelawan.</p>
        </div>

        <div class="info-grid">

            <div class="info-card">
                <div class="icon-box">📍</div>
                <h3>Lokasi</h3>
                <p>
                    Pantai Pelawan terletak di Desa Pangke Barat, Kabupaten Karimun,
                    Provinsi Kepulauan Riau.
                </p>
            </div>

            <div class="info-card">
                <div class="icon-box">🕒</div>
                <h3>Jam Operasional</h3>
                <p>
                    Pantai buka setiap hari mulai pukul 08.00 hingga 18.00 WIB.
                </p>
            </div>

            <div class="info-card">
                <div class="icon-box">💰</div>
                <h3>Tiket Masuk</h3>
                <p>
                    Harga tiket masuk terjangkau dan dapat berubah sesuai kebijakan pengelola.
                </p>
            </div>

            <div class="info-card">
                <div class="icon-box">🚗</div>
                <h3>Akses Transportasi</h3>
                <p>
                    Pantai mudah diakses menggunakan kendaraan pribadi maupun transportasi umum.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- KEAMANAN -->
<section class="section">
    <div class="container">

        <div class="section-heading">
            <h2>Keamanan & Keselamatan</h2>
            <p>Hal-hal yang perlu diperhatikan demi keselamatan selama berwisata.</p>
        </div>

        <div class="feature-grid">

            <div class="feature-card">
                <h3>🌊 Kondisi Ombak</h3>
                <p>
                    Pantai memiliki ombak yang relatif tenang, namun tetap disarankan
                    berhati-hati saat bermain air.
                </p>
            </div>

            <div class="feature-card">
                <h3>⚠️ Cuaca Ekstrem</h3>
                <p>
                    Saat terjadi cuaca buruk seperti angin kencang atau gelombang tinggi,
                    pengunjung dihimbau untuk tidak berenang.
                </p>
            </div>

            <div class="feature-card">
                <h3>👮 Petugas Pantai</h3>
                <p>
                    Tersedia petugas yang siap memberikan informasi dan menjaga keamanan pengunjung.
                </p>
            </div>

            <div class="feature-card">
                <h3>🚫 Aturan Pengunjung</h3>
                <p>
                    Pengunjung wajib menjaga kebersihan, tidak merusak fasilitas,
                    dan mengikuti aturan yang berlaku.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- TIPS -->
<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <h2>Tips Berkunjung</h2>
            <p>Beberapa tips agar pengalaman wisata kamu lebih maksimal.</p>
        </div>

        <div class="content-box">
            <p>✔ Datang di sore hari untuk menikmati sunset terbaik.</p>
            <p>✔ Gunakan pakaian yang nyaman dan sesuai untuk aktivitas pantai.</p>
            <p>✔ Bawa perlengkapan pribadi seperti sunscreen dan air minum.</p>
            <p>✔ Jaga kebersihan dengan tidak membuang sampah sembarangan.</p>
            <p>✔ Ikuti arahan petugas demi keselamatan bersama.</p>
        </div>

    </div>
</section>

<!-- PENUTUP -->
<section class="section">
    <div class="container">
        <div class="highlight-box">
            <div class="highlight-text">
                <h2>Siap Liburan ke Pantai Pelawan?</h2>
                <p>
                    Pastikan kamu sudah mengetahui informasi penting agar perjalanan wisata
                    menjadi lebih aman, nyaman, dan menyenangkan.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- GOOGLE MAP -->
<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <h2>Lokasi Pantai Pelawan</h2>
            <p>Temukan lokasi Pantai Pelawan secara langsung melalui Google Maps.</p>
        </div>

        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps?q=Pantai+Pelawan&output=embed"
                width="100%" 
                height="420" 
                style="border:0; border-radius: 20px;"
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>

        <!-- Tombol buka maps -->
        <div style="text-align:center; margin-top:20px;">
            <a href="https://maps.app.goo.gl/2tJ9cM3Yuk1bNfTr7" 
               target="_blank" 
               class="btn btn-primary">
               Lihat di Google Maps
            </a>
        </div>

    </div>
</section>

@endsection