@extends('layouts.app')

@section('content')

<section class="page-hero page-hero-fasilitas">
    <div class="page-hero-overlay">
        <div class="container">
            <div class="page-hero-content">
                <h1>Fasilitas Pantai Pelawan</h1>
                <p>
                    Berbagai fasilitas tersedia untuk memberikan kenyamanan, keamanan,
                    dan pengalaman wisata yang menyenangkan bagi pengunjung.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">Fasilitas Utama</span>
            <h2>Fasilitas yang Tersedia</h2>
            <p>
                Pantai Pelawan menyediakan fasilitas penunjang agar wisatawan dapat berkunjung
                dengan lebih nyaman.
            </p>
        </div>

        <div class="facility-premium-grid">

            <div class="facility-premium-card">
                <div class="facility-icon">🏖️</div>
                <h3>Gazebo & Tempat Duduk</h3>
                <p>Pengunjung dapat bersantai di gazebo yang tersedia di sekitar area pantai.</p>
            </div>

            <div class="facility-premium-card">
                <div class="facility-icon">🚻</div>
                <h3>Toilet Umum</h3>
                <p>Fasilitas toilet umum tersedia untuk mendukung kenyamanan pengunjung.</p>
            </div>

            <div class="facility-premium-card">
                <div class="facility-icon">🅿️</div>
                <h3>Area Parkir</h3>
                <p>Tersedia area parkir untuk kendaraan roda dua maupun roda empat.</p>
            </div>

            <div class="facility-premium-card">
                <div class="facility-icon">🍽️</div>
                <h3>Warung Kuliner</h3>
                <p>Pengunjung dapat menikmati makanan dan minuman di sekitar kawasan pantai.</p>
            </div>

        </div>

    </div>
</section>

<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">Fasilitas Pendukung</span>
            <h2>Penunjang Pengalaman Wisata</h2>
            <p>
                Fasilitas berikut membantu wisatawan menikmati kunjungan dengan lebih mudah dan nyaman.
            </p>
        </div>

        <div class="facility-support-grid">

            <div class="facility-support-card">
                <span>🎡</span>
                <div>
                    <h3>Area Bermain</h3>
                    <p>Area bermain dapat digunakan anak-anak untuk menikmati waktu bersama keluarga.</p>
                </div>
            </div>

            <div class="facility-support-card">
                <span>🛟</span>
                <div>
                    <h3>Keamanan Pantai</h3>
                    <p>Pengawasan membantu menjaga keselamatan pengunjung selama berada di kawasan pantai.</p>
                </div>
            </div>

            <div class="facility-support-card">
                <span>📍</span>
                <div>
                    <h3>Pusat Informasi</h3>
                    <p>Pengunjung dapat memperoleh informasi terkait lokasi, fasilitas, dan layanan wisata.</p>
                </div>
            </div>

            <div class="facility-support-card">
                <span>📸</span>
                <div>
                    <h3>Spot Foto</h3>
                    <p>Beberapa sudut pantai dapat digunakan untuk mengabadikan momen liburan.</p>
                </div>
            </div>

        </div>

    </div>
</section>

<section class="section">
    <div class="container">
        <div class="facility-cta">
            <div>
                <span>🌴 Kenyamanan Pengunjung</span>
                <h2>Nyaman & Lengkap</h2>
                <p>
                    Dengan fasilitas yang tersedia, Pantai Pelawan siap memberikan pengalaman wisata
                    yang lebih nyaman bagi setiap pengunjung.
                </p>
            </div>

            <a href="{{ route('tiket') }}" class="btn btn-primary">
                Pesan Tiket
            </a>
        </div>
    </div>
</section>

@endsection