@extends('layouts.app')

@section('content')

<section class="page-hero page-hero-daya-tarik">
    <div class="page-hero-overlay">
        <div class="container">
            <div class="page-hero-content">
                <h1>Daya Tarik Pantai Pelawan</h1>
                <p>
                    Beragam keindahan alam, suasana pantai, dan aktivitas menarik yang dapat
                    dinikmati wisatawan di Pantai Pelawan.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">

        <div class="daya-highlight daya-highlight-upgrade">
            <div class="daya-highlight-img">
                <img src="{{ asset('images/profil_pantai.jpg') }}" alt="Pantai Pelawan">

                <div class="daya-img-badge">
                    <strong>🌴 Pantai Pelawan</strong>
                    <span>Destinasi wisata alam Kabupaten Karimun</span>
                </div>
            </div>

            <div class="daya-highlight-text">
                <span class="section-label">Keunggulan Wisata</span>

                <h2>Pesona Alam Pantai Pelawan</h2>

                <p>
                    Pantai Pelawan memiliki panorama alam yang indah dengan suasana pesisir
                    yang nyaman. Keindahan pantai, udara segar, dan pemandangan laut menjadi
                    daya tarik utama bagi wisatawan yang ingin menikmati suasana santai.
                </p>

                <div class="daya-stats">
                    <div>
                        <strong>🌊</strong>
                        <span>Panorama Laut</span>
                    </div>
                    <div>
                        <strong>🌅</strong>
                        <span>Suasana Sunset</span>
                    </div>
                    <div>
                        <strong>🏖️</strong>
                        <span>Wisata Alam</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- NILAI DESTINASI -->
<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">Nilai Destinasi</span>
            <h2>Nilai dan Potensi Pantai Pelawan</h2>
            <p>
                Pantai Pelawan memiliki nilai destinasi yang dapat mendukung pengembangan pariwisata daerah.
            </p>
        </div>

        <div class="potensi-grid">
            <div class="potensi-card">
                <div>🌿</div>
                <h3>Potensi Wisata Alam</h3>
                <p>Keindahan alam pantai menjadi potensi utama yang dapat dikembangkan sebagai daya tarik wisata daerah.</p>
            </div>

            <div class="potensi-card">
                <div>🏖️</div>
                <h3>Identitas Lokal</h3>
                <p>Pantai Pelawan dapat menjadi bagian dari identitas wisata lokal Kabupaten Karimun.</p>
            </div>

            <div class="potensi-card">
                <div>🧭</div>
                <h3>Tujuan Kunjungan</h3>
                <p>Destinasi ini dapat menjadi pilihan wisata bagi masyarakat lokal maupun wisatawan luar daerah.</p>
            </div>

            <div class="potensi-card">
                <div>📢</div>
                <h3>Peluang Promosi</h3>
                <p>Pantai Pelawan dapat dipromosikan melalui media digital agar lebih mudah ditemukan wisatawan.</p>
            </div>
        </div>
    </div>
</section>

<!-- KEUNIKAN -->
<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">Keunikan Pantai</span>
            <h2>Keunikan Pantai Pelawan</h2>
            <p>
                Keunikan Pantai Pelawan terletak pada karakter pantai, suasana alam, dan nilai wisata
                sebagai destinasi pesisir.
            </p>
        </div>

        <div class="unique-premium-wrapper">

            <div class="unique-big-card">
                <h3>🌊 Karakter Pantai yang Landai</h3>
                <p>
                    Pantai Pelawan memiliki karakter pantai yang nyaman untuk dinikmati oleh berbagai kalangan
                    pengunjung. Suasana pantai yang terbuka membuat wisatawan dapat menikmati area pesisir
                    dengan lebih leluasa.
                </p>
            </div>

            <div class="unique-small-grid">
                <div class="unique-small-card">
                    <span>🌤️</span>
                    <h3>Suasana Tenang</h3>
                    <p>Lingkungan pantai memberikan kesan santai dan menenangkan bagi wisatawan.</p>
                </div>

                <div class="unique-small-card">
                    <span>🏝️</span>
                    <h3>Nuansa Pesisir</h3>
                    <p>Suasana pesisir menjadi identitas yang membedakan Pantai Pelawan.</p>
                </div>

                <div class="unique-small-card">
                    <span>📍</span>
                    <h3>Identitas Wisata Karimun</h3>
                    <p>Pantai Pelawan memiliki potensi sebagai ikon wisata alam Kabupaten Karimun.</p>
                </div>

                <div class="unique-small-card">
                    <span>📸</span>
                    <h3>Daya Tarik Visual</h3>
                    <p>Pemandangan pantai mendukung dokumentasi dan promosi wisata daerah.</p>
                </div>
            </div>

        </div>

    </div>
</section>


<!-- AKTIVITAS WISATA -->
<section class="section">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">Aktivitas Wisata</span>
            <h2>Aktivitas yang Dapat Dinikmati</h2>
            <p>
                Berbagai aktivitas ringan dapat dilakukan wisatawan untuk menikmati keindahan dan suasana
                Pantai Pelawan.
            </p>
        </div>

        <div class="activity-premium-grid">

            <div class="activity-premium-card">
                <div class="activity-top">
                    <span>01</span>
                    <div class="activity-icon">🏖️</div>
                </div>
                <h3>Bersantai Menikmati Suasana Pantai</h3>
                <p>
                    Pengunjung dapat menikmati udara pantai, suara ombak, dan suasana pesisir yang tenang.
                </p>
            </div>

            <div class="activity-premium-card">
                <div class="activity-top">
                    <span>02</span>
                    <div class="activity-icon">🚶</div>
                </div>
                <h3>Berjalan Santai di Tepi Pantai</h3>
                <p>
                    Area pantai dapat digunakan untuk berjalan santai sambil menikmati pemandangan laut.
                </p>
            </div>

            <div class="activity-premium-card">
                <div class="activity-top">
                    <span>03</span>
                    <div class="activity-icon">🌅</div>
                </div>
                <h3>Menikmati Pemandangan Sunset</h3>
                <p>
                    Suasana sore hari menjadi daya tarik bagi pengunjung yang ingin menikmati matahari terbenam.
                </p>
            </div>

            <div class="activity-premium-card">
                <div class="activity-top">
                    <span>04</span>
                    <div class="activity-icon">📸</div>
                </div>
                <h3>Berfoto dengan Latar Pantai</h3>
                <p>
                    Keindahan pantai dapat dimanfaatkan sebagai latar dokumentasi dan foto liburan.
                </p>
            </div>

            <div class="activity-premium-card">
                <div class="activity-top">
                    <span>05</span>
                    <div class="activity-icon">👨‍👩‍👧</div>
                </div>
                <h3>Rekreasi Bersama Keluarga</h3>
                <p>
                    Pantai Pelawan cocok untuk kegiatan rekreasi ringan bersama keluarga maupun teman.
                </p>
            </div>

            <div class="activity-premium-card">
                <div class="activity-top">
                    <span>06</span>
                    <div class="activity-icon">🌿</div>
                </div>
                <h3>Menikmati Suasana Alam Pesisir</h3>
                <p>
                    Pengunjung dapat merasakan nuansa alam pesisir yang menjadi ciri khas Pantai Pelawan.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- CTA -->
<section class="section">
    <div class="container">
        <div class="daya-cta">
            <div>
                <span>🌴 Ayo Berkunjung</span>
                <h2>Yuk Kunjungi Pantai Pelawan!</h2>
                <p>
                    Nikmati keindahan alam, aktivitas menarik, dan suasana pantai yang menenangkan
                    bersama keluarga maupun teman-teman.
                </p>
            </div>

            <a href="{{ route('kontak') }}" class="btn btn-primary">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

@endsection