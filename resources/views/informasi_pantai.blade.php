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

<!-- INFORMASI UMUM -->
<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <h2>{{ $get('umum_judul', 'Informasi Umum') }}</h2>
            <p>{{ $get('umum_deskripsi', 'Informasi dasar yang perlu diketahui wisatawan sebelum berkunjung ke Pantai Pelawan.') }}</p>
        </div>

        <div class="info-premium-grid">
            @for($i = 1; $i <= 4; $i++)
                <div class="info-premium-card">
                    <div class="info-premium-icon">{{ $get('umum_'.$i.'_icon', '📍') }}</div>
                    <h3>{{ $get('umum_'.$i.'_judul', 'Informasi Pantai') }}</h3>
                    <p>{!! $nl2p($get('umum_'.$i.'_deskripsi', 'Informasi belum tersedia.')) !!}</p>
                </div>
            @endfor
        </div>

    </div>
</section>

<!-- KEAMANAN -->
<section class="section">
    <div class="container">

        <div class="section-heading">
            <h2>{{ $get('keamanan_judul', 'Keamanan & Keselamatan') }}</h2>
            <p>{{ $get('keamanan_deskripsi', 'Hal-hal penting yang perlu diperhatikan agar wisata tetap aman dan nyaman.') }}</p>
        </div>

        <div class="safety-card">
            <span>🩹</span>
            <div>
                <h3>Kesiapsiagaan Keselamatan</h3>
                <p>Pengunjung diimbau untuk selalu memperhatikan kondisi sekitar dan mengutamakan keselamatan selama melakukan aktivitas di area wisata.</p>
            </div>
        </div>

        <div class="safety-card">
            <span>⚠️</span>
            <div>
                <h3>Cuaca Ekstrem</h3>
                <p>Jika terjadi angin kencang atau gelombang tinggi, pengunjung sebaiknya tidak melakukan aktivitas di area perairan.</p>
            </div>
        </div>

        <div class="safety-card">
            <span>📢</span>
            <div>
                <h3>Informasi & Panduan Wisata</h3>
                <p>Pengunjung disarankan mengikuti informasi, arahan, serta ketentuan yang berlaku demi menjaga keamanan dan kenyamanan bersama.</p>
            </div>
        </div>

        <div class="safety-card">
            <span>🚫</span>
            <div>
                <h3>Aturan Pengunjung</h3>
                <p>Pengunjung wajib menjaga kebersihan, ketertiban, dan tidak merusak fasilitas yang tersedia.</p>
            </div>
        </div>

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
                    <div class="tips-premium-number">{{ $get('tips_'.$i.'_nomor', str_pad($i, 2, '0', STR_PAD_LEFT)) }}</div>
                    <div class="tips-premium-icon">{{ $get('tips_'.$i.'_icon', '🌴') }}</div>
                    <h3>{{ $get('tips_'.$i.'_judul', 'Tips Berkunjung') }}</h3>
                    <p>{{ $get('tips_'.$i.'_deskripsi', 'Informasi tips belum tersedia.') }}</p>
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

            <a href="{{ $get('whatsapp_link', '#') }}" target="_blank" class="contact-premium-card whatsapp-card">
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

            <a href="{{ $get('instagram_link', '#') }}" target="_blank" class="contact-premium-card instagram-card">
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

            <a href="{{ $get('tiktok_link', '#') }}" target="_blank" class="contact-premium-card tiktok-card">
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

<!-- ULASAN PENGUNJUNG -->
<section class="section section-soft review-section">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">Ulasan Pengunjung</span>
            <h2>Bagikan Pengalaman Anda</h2>
            <p>
                Wisatawan dapat memberikan penilaian, kesan, dan pesan setelah berkunjung ke Pantai Pelawan.
            </p>
        </div>

        @auth
            <div class="review-layout">

                <div class="review-form-box">
                    <div class="review-form-header">
                        <span>✍️ Form Ulasan</span>
                        <h3>Tulis Ulasan Anda</h3>
                        <p>
                            Isi pengalaman berkunjung Anda agar dapat menjadi referensi bagi wisatawan lain.
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
                                <input type="radio" name="rating" id="star5" value="5">
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
                    <h3>Ulasan Pengunjung</h3>
                    <p>
                        Ulasan membantu pengelola mengetahui pengalaman wisatawan dan membantu pengunjung lain
                        memperoleh gambaran mengenai Pantai Pelawan.
                    </p>

                    <div class="review-point">✅ Berikan penilaian sesuai pengalaman</div>
                    <div class="review-point">✅ Tulis kesan dan saran dengan sopan</div>
                    <div class="review-point">✅ Bantu wisatawan lain mengenal Pantai Pelawan</div>
                </div>

            </div>
        @else
            <div class="review-locked-box">

                <div class="review-locked-icon">
                    🔐
                </div>

                <div class="review-locked-content">
                    <span>Khusus Wisatawan</span>
                    <h3>Login untuk Menulis Ulasan</h3>
                    <p>
                        Pengunjung tetap dapat melihat ulasan dari wisatawan lain. Namun, untuk menulis ulasan
                        dan memberikan rating, silakan login atau daftar akun terlebih dahulu.
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
            <span class="section-label">Pengalaman Wisatawan</span>
            <h2>Ulasan dari Pengunjung</h2>
            <p>Beberapa pendapat pengunjung mengenai pengalaman mereka saat berwisata ke Pantai Pelawan.</p>
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
                    @if($i <= $ulasan->rating)
                        ★
                    @else
                        ☆
                    @endif
                @endfor
            </div>

            <p>
                {{ $ulasan->pesan }}
            </p>
        </div>
    @empty
        <div class="review-card">
            <div class="review-top">
                <div class="review-avatar">?</div>
                <div>
                    <h3>Belum Ada Ulasan</h3>
                    <span>Pengunjung</span>
                </div>
            </div>

            <div class="review-stars">☆☆☆☆☆</div>

            <p>
                Belum ada ulasan yang ditampilkan. Jadilah pengunjung pertama yang memberikan ulasan.
            </p>
        </div>
    @endforelse

</div>

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
            <a href="{{ $get('map_link', '#') }}" 
               target="_blank" 
               class="btn btn-primary">
               {{ $get('map_tombol', 'Lihat di Google Maps') }}
            </a>
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