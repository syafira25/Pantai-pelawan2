@extends('layouts.app')

@section('content')

<!-- PAGE HEADER -->
<section class="page-header">
    <div class="container">
        <h1>Daya Tarik Pantai Pelawan</h1>
        <p class="page-subtitle">
            Beragam keindahan dan aktivitas menarik yang dapat dinikmati di Pantai Pelawan,
            menjadikannya destinasi wisata unggulan di Kabupaten Karimun.
        </p>
    </div>
</section>

<!-- SECTION UTAMA -->
<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <h2>Keunggulan Wisata</h2>
            <p>Pantai Pelawan memiliki berbagai daya tarik yang mampu memberikan pengalaman wisata yang menyenangkan dan berkesan.</p>
        </div>

        <div class="feature-grid">

            <div class="feature-card">
                <h3>🌊 Pantai Pasir Putih</h3>
                <p>
                    Hamparan pasir putih yang luas dan bersih menjadi daya tarik utama Pantai Pelawan. 
                    Area ini sangat cocok untuk berjalan santai, bermain pasir, maupun bersantai menikmati suasana pantai.
                </p>
            </div>

            <div class="feature-card">
                <h3>🌅 Pemandangan Sunset</h3>
                <p>
                    Pantai Pelawan dikenal sebagai salah satu spot terbaik untuk menikmati matahari terbenam.
                    Perpaduan warna langit dan laut menciptakan panorama yang sangat indah dan instagramable.
                </p>
            </div>

            <div class="feature-card">
                <h3>🚤 Wahana Banana Boat</h3>
                <p>
                    Pengunjung dapat menikmati wahana air seperti banana boat yang memberikan pengalaman seru dan menantang.
                    Aktivitas ini cocok untuk wisata keluarga maupun kelompok.
                </p>
            </div>

            <div class="feature-card">
                <h3>📸 Spot Foto Menarik</h3>
                <p>
                    Banyak tersedia spot foto menarik dengan latar belakang laut, gazebo, dan dekorasi wisata
                    yang cocok untuk mengabadikan momen liburan.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- SECTION AKTIVITAS -->
<section class="section">
    <div class="container">

        <div class="section-heading">
            <h2>Aktivitas Wisata</h2>
            <p>Pengunjung dapat melakukan berbagai aktivitas menarik yang membuat liburan semakin menyenangkan.</p>
        </div>

        <div class="info-grid">

            <div class="info-card">
                <div class="icon-box">🏖️</div>
                <h3>Bersantai di Pantai</h3>
                <p>
                    Pengunjung dapat menikmati suasana pantai yang tenang dengan duduk di gazebo atau tikar sambil menikmati angin laut.
                </p>
            </div>

            <div class="info-card">
                <div class="icon-box">🏊</div>
                <h3>Bermain Air</h3>
                <p>
                    Ombak yang relatif tenang memungkinkan pengunjung bermain air dengan aman, terutama untuk anak-anak.
                </p>
            </div>

            <div class="info-card">
                <div class="icon-box">🍽️</div>
                <h3>Wisata Kuliner</h3>
                <p>
                    Tersedia berbagai makanan dan minuman khas yang dapat dinikmati sambil melihat pemandangan laut.
                </p>
            </div>

            <div class="info-card">
                <div class="icon-box">👨‍👩‍👧‍👦</div>
                <h3>Wisata Keluarga</h3>
                <p>
                    Pantai ini sangat cocok untuk liburan keluarga karena suasana yang aman, nyaman, dan fasilitas yang memadai.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- SECTION KEUNIKAN -->
<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <h2>Keunikan Pantai Pelawan</h2>
            <p>Beberapa hal yang menjadikan Pantai Pelawan berbeda dari pantai lainnya.</p>
        </div>

        <div class="content-box">
            <p>
                Pantai Pelawan memiliki karakteristik pantai yang landai dengan ombak yang relatif tenang,
                sehingga sangat aman untuk berbagai kalangan pengunjung. Selain itu, lokasi pantai yang strategis
                menjadikannya mudah diakses oleh wisatawan lokal maupun luar daerah.
            </p>

            <p>
                Keunikan lainnya adalah adanya kombinasi antara wisata alam dan fasilitas buatan yang saling melengkapi.
                Pengunjung tidak hanya menikmati keindahan alam, tetapi juga mendapatkan kenyamanan melalui fasilitas yang tersedia.
            </p>

            <p>
                Pantai ini juga sering digunakan sebagai tempat kegiatan sosial dan rekreasi masyarakat,
                sehingga memiliki nilai sebagai ruang publik yang aktif dan bermanfaat bagi masyarakat sekitar.
            </p>
        </div>

    </div>
</section>

<!-- SECTION AJAKAN -->
<section class="section">
    <div class="container">

        <div class="highlight-box">
            <div class="highlight-text">
                <h2>Yuk Kunjungi Pantai Pelawan!</h2>
                <p>
                    Nikmati keindahan alam, berbagai aktivitas menarik, serta suasana pantai yang menenangkan
                    bersama keluarga dan teman-teman.
                </p>
            </div>

            <div class="highlight-action">
                <a href="{{ route('kontak') }}" class="btn btn-primary">
                    Hubungi Kami
                </a>
            </div>
        </div>

    </div>
</section>

@endsection