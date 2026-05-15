@extends('layouts.app')

@section('content')

@php
    $get = function ($field, $default = '') use ($informasi) {
        return $informasi && !empty($informasi->{$field}) ? $informasi->{$field} : $default;
    };

    $nl2p = function ($text) {
        return nl2br(e($text));
    };
@endphp

<!-- HEADER -->
<section class="page-header">
    <div class="container">
        <h1>{{ $get('header_judul', 'Informasi Pantai Pelawan') }}</h1>
        <p class="page-subtitle">
            {{ $get('header_subjudul', 'Informasi penting yang perlu diketahui sebelum berkunjung ke Pantai Pelawan.') }}
        </p>
    </div>
</section>

@php
    $kondisi = $weather['kondisi'] ?? 'Cerah Berawan';
    $deskripsi = $weather['deskripsi'] ?? 'Data cuaca sedang diperbarui.';
    $ikon = $weather['ikon'] ?? '⛅';

    $ombak = $weather['ombak'] ?? 'Relatif Tenang';
    $ombakDeskripsi = $weather['ombak_deskripsi'] ?? 'Kondisi ombak disesuaikan berdasarkan perkiraan cuaca terkini di sekitar Pantai Pelawan.';

    $angin = $weather['angin'] ?? 'Normal';
    $anginDeskripsi = $weather['angin_deskripsi'] ?? 'Informasi angin diperbarui otomatis berdasarkan data cuaca saat ini.';

    $status = $weather['status'] ?? 'Aman Dikunjungi';
    $statusDeskripsi = $weather['status_deskripsi'] ?? 'Status ini dihitung otomatis berdasarkan kondisi cuaca dan angin.';

    $catatanJudul = $weather['catatan_judul'] ?? 'Cuaca Mendukung';
    $catatan = $weather['catatan'] ?? 'Tetap waspada terhadap perubahan cuaca.';

    $sceneJudul = $weather['scene_judul'] ?? 'Siap Berwisata Hari Ini?';
    $sceneDeskripsi = $weather['scene_deskripsi'] ?? 'Kondisi Pantai Pelawan saat ini cukup baik untuk aktivitas wisata.';
@endphp

<!-- CUACA & OMBAK HARI INI -->
<section class="section weather-beach-section">
    <div class="container">

        <div class="weather-beach-card">

            <div class="weather-beach-left">
                <span class="weather-label">Informasi Hari Ini</span>

                <h2> Perkiraan Cuaca & Kondisi Ombak Pantai Pelawan</h2>

                <p>
                    Informasi ini membantu wisatawan mengetahui perkiraan kondisi pantai sebelum berkunjung, sehingga perjalanan wisata menjadi lebih aman dan nyaman.
                </p>

                <div class="weather-update">
                    <span>📅</span>
                    <strong>Diperbarui Otomatis</strong>
                </div>

                <div class="weather-scene">
                    <div class="weather-big-icon">🏖️</div>
                    <h3>{{ $sceneJudul }}</h3>
                    <p>{{ $sceneDeskripsi }}</p>
                </div>
            </div>

            <div class="weather-beach-right">

                <div class="weather-main-box">
                    <div class="weather-icon">{{ $ikon }}</div>

                    <div>
                        <span>Cuaca Pantai</span>
                        <h3>{{ $kondisi }}</h3>
                        <p>{{ $deskripsi }}</p>
                    </div>
                </div>

                <div class="weather-info-grid">

                    <div class="weather-small-card">
                        <div class="small-icon">🌊</div>
                        <span>Kondisi Ombak</span>
                        <h4>{{ $ombak }}</h4>
                        <p>{{ $ombakDeskripsi }}</p>
                    </div>

                    <div class="weather-small-card">
                        <div class="small-icon">💨</div>
                        <span>Angin</span>
                        <h4>{{ $angin }}</h4>
                        <p>{{ $anginDeskripsi }}</p>
                    </div>

                    <div class="weather-small-card">
                        <div class="small-icon">✅</div>
                        <span>Status Kunjungan</span>
                        <h4>{{ $status }}</h4>
                        <p>{{ $statusDeskripsi }}</p>
                    </div>

                    <div class="weather-small-card warning-card">
                        <div class="small-icon">⚠️</div>
                        <span>Catatan</span>
                        <h4>{{ $catatanJudul }}</h4>
                        <p>{{ $catatan }}</p>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

<!-- INFORMASI UMUM PREMIUM -->
<section class="section section-soft info-general-section">
    <div class="container">

        <div class="section-heading info-general-heading">
            <span class="section-label">Panduan Wisata</span>
            <h2>{{ $get('umum_judul', 'Informasi Umum') }}</h2>
            <p>{{ $get('umum_deskripsi', 'Informasi dasar yang perlu diketahui wisatawan sebelum berkunjung ke Pantai Pelawan.') }}</p>
        </div>

        <div class="info-general-grid">
            @for($i = 1; $i <= 4; $i++)
                <div class="info-general-card">

                    <div class="info-general-icon">
                        {{ $get('umum_'.$i.'_icon', ['📍','🕒','🎫','🚗'][$i - 1]) }}
                    </div>

                    <div class="info-general-content">
                        <h3>
                            {{ $get('umum_'.$i.'_judul', [
                                'Lokasi Pantai',
                                'Jam Operasional',
                                'Tiket Masuk',
                                'Akses Transportasi'
                            ][$i - 1]) }}
                        </h3>

                        <p>
                            {!! $nl2p($get('umum_'.$i.'_deskripsi', [
                                'Pantai Pelawan terletak di Desa Pangke Barat, Kabupaten Karimun, Provinsi Kepulauan Riau. Lokasinya strategis dan mudah dijangkau oleh wisatawan lokal maupun luar daerah, dengan akses jalan yang cukup baik menuju kawasan wisata.',
                                "Senin – Jumat: 06.00 – 18.00 WIB\nSabtu – Minggu: 06.00 – 19.00 WIB\n\nWaktu terbaik untuk berkunjung adalah pada pagi dan sore hari untuk menikmati suasana pantai yang lebih nyaman.",
                                "Harga tiket masuk terjangkau dan dapat berubah sesuai kebijakan pengelola.\n\nDewasa = RP. 5.000\nDibawah umur 10th = RP. 2.000",
                                'Lokasi pantai dapat dijangkau menggunakan kendaraan pribadi maupun transportasi umum. Area parkir tersedia untuk kendaraan roda dua, roda empat, serta kendaraan wisata rombongan.'
                            ][$i - 1])) !!}
                        </p>
                    </div>
                </div>
            @endfor
        </div>

    </div>
</section>

<!-- KEAMANAN HORIZONTAL CARD -->
<section class="section safety-strip-section">
    <div class="container">

        <div class="section-heading">
            <span class="section-label safety-label">Panduan Aman</span>
            <h2>{{ $get('keamanan_judul', 'Keamanan & Keselamatan') }}</h2>
            <p>{{ $get('keamanan_deskripsi', 'Hal-hal penting yang perlu diperhatikan agar wisata tetap aman dan nyaman.') }}</p>
        </div>

        <div class="safety-strip-grid">
            @for($i = 1; $i <= 4; $i++)
                <div class="safety-strip-card">
                    <div class="safety-strip-icon">
                        {{ $get('keamanan_'.$i.'_icon', ['🩹','⚠️','📢','🚫'][$i - 1]) }}
                    </div>

                    <span>Panduan 0{{ $i }}</span>

                    <h3>
                        {{ $get('keamanan_'.$i.'_judul', [
                            'Kesiapsiagaan Keselamatan',
                            'Cuaca Ekstrem',
                            'Informasi & Panduan Wisata',
                            'Aturan Pengunjung'
                        ][$i - 1]) }}
                    </h3>

                    <p>
                        {{ $get('keamanan_'.$i.'_deskripsi', [
                            'Pengunjung diimbau untuk selalu memperhatikan kondisi sekitar dan mengutamakan keselamatan selama melakukan aktivitas di area wisata.',
                            'Jika terjadi angin kencang, gelombang tinggi, atau perubahan cuaca yang kurang mendukung, pengunjung disarankan untuk membatasi aktivitas di area pantai demi menjaga keselamatan bersama.',
                            'Pengunjung disarankan mengikuti informasi, arahan, serta ketentuan yang berlaku demi menjaga keamanan dan kenyamanan bersama.',
                            'Pengunjung diharapkan menjaga kebersihan, ketertiban, serta menggunakan fasilitas wisata dengan baik agar kenyamanan, keamanan, dan kelestarian lingkungan pantai tetap terjaga.'
                        ][$i - 1]) }}
                    </p>
                </div>
            @endfor
        </div>

    </div>
</section>

<!-- TIPS -->
<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <h2>{{ $get('tips_judul', 'Tips Berkunjung') }}</h2>
            <p>{{ $get('tips_deskripsi', 'Beberapa tips agar pengalaman wisata di Pantai Pelawan lebih maksimal.') }}</p>
        </div>

        <div class="tips-premium-grid">
            @for($i = 1; $i <= 6; $i++)
                <div class="tips-premium-card">
                    <div class="tips-premium-number">
                        {{ $get('tips_'.$i.'_nomor', str_pad($i, 2, '0', STR_PAD_LEFT)) }}
                    </div>

                    <div class="tips-premium-icon">
                        {{ $get('tips_'.$i.'_icon', ['🌅','👕','🧴','🗑️','⚠️','📢'][$i - 1]) }}
                    </div>

                    <h3>
                        {{ $get('tips_'.$i.'_judul', [
                            'Waktu Terbaik Berkunjung',
                            'Pakaian Nyaman',
                            'Perlengkapan Pribadi',
                            'Jaga Kebersihan',
                            'Perhatikan Cuaca',
                            'Ikuti Arahan'
                        ][$i - 1]) }}
                    </h3>

                    <p>
                        {{ $get('tips_'.$i.'_deskripsi', [
                            'Datang di sore hari untuk menikmati suasana pantai dan pemandangan sunset.',
                            'Gunakan pakaian yang nyaman agar aktivitas di area pantai lebih menyenangkan.',
                            'Bawa sunscreen, air minum, dan perlengkapan lain untuk kenyamanan.',
                            'Tidak membuang sampah sembarangan agar lingkungan pantai tetap bersih.',
                            'Perhatikan kondisi cuaca sebelum bermain air untuk keselamatan.',
                            'Ikuti arahan petugas demi keselamatan dan kenyamanan bersama.'
                        ][$i - 1]) }}
                    </p>
                </div>
            @endfor
        </div>

    </div>
</section>

<!-- KONTAK PENGELOLA -->
<section class="section kontak-pengelola-section">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">{{ $get('kontak_label', 'Kontak') }}</span>
            <h2>{{ $get('kontak_judul', 'Kontak Pengelola') }}</h2>
            <p>{{ $get('kontak_deskripsi', 'Hubungi pengelola Pantai Pelawan melalui WhatsApp dan media sosial.') }}</p>
        </div>

        <div class="contact-premium-grid">

            <a href="{{ $get('whatsapp_link', 'https://wa.me/6285282770935?text=Halo%20saya%20ingin%20bertanya%20tentang%20Pantai%20Pelawan') }}"
               target="_blank"
               class="contact-premium-card whatsapp-card">

                <div class="contact-premium-icon">
                    <img src="{{ asset('images/whatsapp.png') }}" alt="WhatsApp">
                </div>

                <div class="contact-premium-text">
                    <span>{{ $get('whatsapp_label', 'Layanan Informasi') }}</span>
                    <h3>{{ $get('whatsapp_judul', 'WhatsApp') }}</h3>
                    <p>{{ $get('whatsapp_deskripsi', 'Hubungi pengelola untuk informasi tiket, fasilitas, kondisi pantai, dan layanan wisata.') }}</p>
                    <strong>{{ $get('whatsapp_tombol', 'Chat Sekarang') }}</strong>
                </div>
            </a>

            <a href="{{ $get('instagram_link', 'https://www.instagram.com/r.syfira_?igsh=MXJ5ejBvbnFvNjBobg==') }}"
               target="_blank"
               class="contact-premium-card instagram-card">

                <div class="contact-premium-icon">
                    <img src="{{ asset('images/instagram.png') }}" alt="Instagram">
                </div>

                <div class="contact-premium-text">
                    <span>{{ $get('instagram_label', 'Media Promosi') }}</span>
                    <h3>{{ $get('instagram_judul', 'Instagram') }}</h3>
                    <p>{{ $get('instagram_deskripsi', 'Lihat dokumentasi, informasi terbaru, dan aktivitas wisata Pantai Pelawan.') }}</p>
                    <strong>{{ $get('instagram_tombol', 'Kunjungi Instagram') }}</strong>
                </div>
            </a>

            <a href="{{ $get('tiktok_link', 'https://www.tiktok.com/@raaaaajz?_r=1&_t=ZS-95o7KMxW2J0') }}"
               target="_blank"
               class="contact-premium-card tiktok-card">

                <div class="contact-premium-icon">
                    <img src="{{ asset('images/tiktok.png') }}" alt="TikTok">
                </div>

                <div class="contact-premium-text">
                    <span>{{ $get('tiktok_label', 'Video Wisata') }}</span>
                    <h3>{{ $get('tiktok_judul', 'TikTok') }}</h3>
                    <p>{{ $get('tiktok_deskripsi', 'Tonton video singkat tentang suasana, daya tarik, dan pengalaman wisata.') }}</p>
                    <strong>{{ $get('tiktok_tombol', 'Kunjungi TikTok') }}</strong>
                </div>
            </a>

        </div>

    </div>
</section>

<!-- GOOGLE MAP -->
<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">{{ $get('map_label', 'Lokasi') }}</span>
            <h2>{{ $get('map_judul', 'Lokasi Pantai Pelawan') }}</h2>
            <p>{{ $get('map_deskripsi', 'Temukan lokasi Pantai Pelawan secara langsung melalui Google Maps.') }}</p>
        </div>

        <div class="map-card">
            <iframe 
                src="{{ $get('map_embed_url', 'https://www.google.com/maps?q=Pantai+Pelawan&output=embed') }}"
                width="100%" 
                height="420"
                style="border:0;"
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>

        <div style="text-align:center; margin-top:24px;">
            <a href="{{ $get('map_link', 'https://maps.app.goo.gl/2tJ9cM3Yuk1bNfTr7') }}" 
               target="_blank" 
               class="btn btn-primary">
               {{ $get('map_tombol', 'Lihat di Google Maps') }}
            </a>
        </div>

    </div>
</section>

<!-- ULASAN PENGUNJUNG -->
<section id="ulasan" class="section section-soft review-section">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">{{ $get('ulasan_label', 'Ulasan Pengunjung') }}</span>
            <h2>{{ $get('ulasan_judul', 'Bagikan Pengalaman Anda') }}</h2>
            <p>
                {{ $get('ulasan_deskripsi', 'Wisatawan dapat memberikan penilaian, kesan, dan pesan setelah berkunjung ke Pantai Pelawan.') }}
            </p>
        </div>

        @auth

            @if(session('success'))
                <div style="
                    background:#d4edda;
                    color:#155724;
                    padding:15px;
                    border-radius:12px;
                    margin-bottom:20px;
                    font-weight:600;
                ">
                    {{ session('success') }}
                </div>
            @endif

            <div class="review-layout">

                <div class="review-form-box">
                    <div class="review-form-header">
                        <span>{{ $get('ulasan_form_label', '✍️ Form Ulasan') }}</span>
                        <h3>{{ $get('ulasan_form_judul', 'Tulis Ulasan Anda') }}</h3>
                        <p>
                            {{ $get('ulasan_form_deskripsi', 'Isi pengalaman berkunjung Anda agar dapat menjadi referensi bagi wisatawan lain.') }}
                        </p>
                    </div>

                    <form action="{{ route('ulasan.store') }}" method="POST">
                        @csrf

                        <div class="review-form-grid">
                            <div class="form-group">
                                <label>Nama</label>
                                <input 
                                    type="text" 
                                    name="nama" 
                                    value="{{ Auth::user()->name }}" 
                                    readonly
                                >
                            </div>

                            <div class="form-group">
                                <label>Status Pengunjung</label>
                                <select name="status_pengunjung" required>
                                    <option value="">Pilih status</option>
                                    <option>Wisatawan Lokal</option>
                                    <option>Wisatawan Luar Daerah</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Rating</label>
                            <div class="rating-input">
                                <input type="radio" name="rating" id="star5" value="5" required>
                                <label for="star5">★</label>

                                <input type="radio" name="rating" id="star4" value="4">
                                <label for="star4">★</label>

                                <input type="radio" name="rating" id="star3" value="3">
                                <label for="star3">★</label>

                                <input type="radio" name="rating" id="star2" value="2">
                                <label for="star2">★</label>

                                <input type="radio" name="rating" id="star1" value="1">
                                <label for="star1">★</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Kesan & Pesan</label>
                            <textarea 
                                name="pesan" 
                                rows="5" 
                                placeholder="Tulis pengalaman Anda setelah berkunjung ke Pantai Pelawan..." 
                                required
                            ></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary review-submit">
                            Kirim Ulasan
                        </button>
                    </form>
                </div>

                <div class="review-side-card">
                    <div class="review-side-icon">⭐</div>
                    <h3>{{ $get('ulasan_side_judul', 'Ulasan Pengunjung') }}</h3>
                    <p>
                        {{ $get('ulasan_side_deskripsi', 'Ulasan membantu pengelola mengetahui pengalaman wisatawan dan membantu pengunjung lain memperoleh gambaran mengenai Pantai Pelawan.') }}
                    </p>

                    <div class="review-point">✅ {{ $get('ulasan_point_1', 'Berikan penilaian sesuai pengalaman') }}</div>
                    <div class="review-point">✅ {{ $get('ulasan_point_2', 'Tulis kesan dan saran dengan sopan') }}</div>
                    <div class="review-point">✅ {{ $get('ulasan_point_3', 'Bantu wisatawan lain mengenal Pantai Pelawan') }}</div>
                </div>

            </div>
        @else
            <div class="review-locked-box">

                <div class="review-locked-icon">
                    🔐
                </div>

                <div class="review-locked-content">
                    <span>{{ $get('ulasan_login_label', 'Khusus Wisatawan') }}</span>
                    <h3>{{ $get('ulasan_login_judul', 'Login untuk Menulis Ulasan') }}</h3>
                    <p>
                        {{ $get('ulasan_login_deskripsi', 'Pengunjung tetap dapat melihat ulasan dari wisatawan lain. Namun, untuk menulis ulasan dan memberikan rating, silakan login atau daftar akun terlebih dahulu.') }}
                    </p>

                    <div class="review-locked-actions">
                        <a href="{{ route('login') }}" class="btn-login-review">
                            Login Sekarang
                        </a>

                        <a href="{{ route('register') }}" class="btn-register-review">
                            Daftar Akun
                        </a>
                    </div>
                </div>

            </div>
        @endauth

        <div class="section-heading review-list-heading">
            <span class="section-label">{{ $get('ulasan_list_label', 'Pengalaman Wisatawan') }}</span>
            <h2>{{ $get('ulasan_list_judul', 'Ulasan dari Pengunjung') }}</h2>
            <p>{{ $get('ulasan_list_deskripsi', 'Beberapa pendapat pengunjung mengenai pengalaman mereka saat berwisata ke Pantai Pelawan.') }}</p>
        </div>

        <div class="review-grid">

            @forelse($ulasans as $ulasan)

                <div class="review-card">

                    <div class="review-top">
                        <div class="review-avatar">
                            {{ strtoupper(substr($ulasan->nama, 0, 1)) }}
                        </div>

                        <div>
                            <h3>{{ $ulasan->nama }}</h3>
                            <span>{{ $ulasan->status_pengunjung }}</span>
                        </div>
                    </div>

                    <div class="review-stars">
                        @for($i = 1; $i <= 5; $i++)
                            {{ $i <= $ulasan->rating ? '★' : '☆' }}
                        @endfor
                    </div>

                    <p>
                        {{ $ulasan->pesan }}
                    </p>

                </div>

            @empty

                <div class="review-empty">
                    <p>{{ $get('ulasan_empty', 'Belum ada ulasan dari pengunjung.') }}</p>
                </div>

            @endforelse

        </div>

    </div>
</section>

<!-- PENUTUP -->
<section class="section">
    <div class="container">
        <div class="info-highlight">
            <div>
                <span>{{ $get('cta_label', '🌴 Informasi Kunjungan') }}</span>
                <h2>{{ $get('cta_judul', 'Siap Liburan ke Pantai Pelawan?') }}</h2>
                <p>
                    {{ $get('cta_deskripsi', 'Pastikan kamu sudah mengetahui informasi penting agar perjalanan wisata menjadi lebih aman, nyaman, dan menyenangkan.') }}
                </p>
            </div>

            <a href="{{ route('tiket') }}" class="btn btn-primary">
                {{ $get('cta_tombol', 'Pesan Tiket') }}
            </a>
        </div>
    </div>
</section>

@endsection