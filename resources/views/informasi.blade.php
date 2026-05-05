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
            <p>Informasi dasar yang perlu diketahui wisatawan sebelum berkunjung ke Pantai Pelawan.</p>
        </div>

        <div class="info-premium-grid">
            <div class="info-premium-card">
                <div class="info-premium-icon">📍</div>
                <h3>Lokasi Pantai</h3>
                <p>Pantai Pelawan terletak di Desa Pangke Barat, Kabupaten Karimun, Provinsi Kepulauan Riau. Lokasinya strategis dan mudah dijangkau oleh wisatawan lokal maupun luar daerah, dengan akses jalan yang cukup baik menuju kawasan wisata.</p>
            </div>

            <div class="info-premium-card">
                <div class="info-premium-icon">🕒</div>
                <h3>Jam Operasional</h3>
                <p>Senin – Jumat: 06.00 – 18.00 WIB<br></p>
                <p>Sabtu – Minggu: 06.00 – 19.00 WIB</p><br>

               <p> Waktu terbaik untuk berkunjung adalah pada pagi dan sore hari untuk menikmati suasana pantai yang lebih nyaman.</p>
            </div>

            <div class="info-premium-card">
                <div class="info-premium-icon">🎫</div>
                <h3>Tiket Masuk</h3>
                <p>Harga tiket masuk terjangkau dan dapat berubah sesuai kebijakan pengelola.</p><br>
                <p>Dewasa = RP. 5000.00.</p>
                <p>Dibawah umur 10th = RP. 2000.00.</p>
            </div>

            <div class="info-premium-card">
                <div class="info-premium-icon">🚗</div>
                <h3>Akses Transportasi</h3>
                <p>Lokasi pantai dapat dijangkau menggunakan kendaraan pribadi maupun transportasi umum. Area parkir tersedia untuk kendaraan roda dua, roda empat, serta kendaraan wisata rombongan.</p>
            </div>
        </div>

    </div>
</section>

<!-- KEAMANAN -->
<section class="section">
    <div class="container">

        <div class="section-heading">
            <h2>Keamanan & Keselamatan</h2>
            <p>Hal-hal penting yang perlu diperhatikan agar wisata tetap aman dan nyaman.</p>
        </div>

        <div class="safety-grid">
            <div class="safety-card">
                <span>🌊</span>
                <div>
                    <h3>Kondisi Ombak</h3>
                    <p>Ombak relatif tenang, namun pengunjung tetap disarankan berhati-hati saat bermain air.</p>
                </div>
            </div>

            <div class="safety-card">
                <span>⚠️</span>
                <div>
                    <h3>Cuaca Ekstrem</h3>
                    <p>Jika terjadi angin kencang atau gelombang tinggi, pengunjung sebaiknya tidak berenang.</p>
                </div>
            </div>

            <div class="safety-card">
                <span>👮</span>
                <div>
                    <h3>Petugas Pantai</h3>
                    <p>Petugas dapat memberikan informasi dan arahan kepada pengunjung saat berada di area wisata.</p>
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
            <h2>Tips Berkunjung</h2>
            <p>Beberapa tips agar pengalaman wisata di Pantai Pelawan lebih maksimal.</p>
        </div>
<div class="tips-premium-grid">

    <div class="tips-premium-card">
        <div class="tips-premium-number">01</div>
        <div class="tips-premium-icon">🌅</div>
        <h3>Waktu Terbaik Berkunjung</h3>
        <p>Datang di sore hari untuk menikmati suasana pantai dan pemandangan sunset.</p>
    </div>

    <div class="tips-premium-card">
        <div class="tips-premium-number">02</div>
        <div class="tips-premium-icon">👕</div>
        <h3>Pakaian Nyaman</h3>
        <p>Gunakan pakaian yang nyaman agar aktivitas di area pantai lebih menyenangkan.</p>
    </div>

    <div class="tips-premium-card">
        <div class="tips-premium-number">03</div>
        <div class="tips-premium-icon">🧴</div>
        <h3>Perlengkapan Pribadi</h3>
        <p>Bawa sunscreen, air minum, dan perlengkapan lain untuk kenyamanan.</p>
    </div>

    <div class="tips-premium-card">
        <div class="tips-premium-number">04</div>
        <div class="tips-premium-icon">🗑️</div>
        <h3>Jaga Kebersihan</h3>
        <p>Tidak membuang sampah sembarangan agar lingkungan pantai tetap bersih.</p>
    </div>

    <div class="tips-premium-card">
        <div class="tips-premium-number">05</div>
        <div class="tips-premium-icon">⚠️</div>
        <h3>Perhatikan Cuaca</h3>
        <p>Perhatikan kondisi cuaca sebelum bermain air untuk keselamatan.</p>
    </div>

    <div class="tips-premium-card">
        <div class="tips-premium-number">06</div>
        <div class="tips-premium-icon">📢</div>
        <h3>Ikuti Arahan</h3>
        <p>Ikuti arahan petugas demi keselamatan dan kenyamanan bersama.</p>
    </div>

</div>

    </div>
</section>

<!-- KONTAK PENGELOLA -->
<section class="section kontak-pengelola-section">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">Kontak</span>
            <h2>Kontak Pengelola</h2>
            <p>Hubungi pengelola Pantai Pelawan melalui WhatsApp dan media sosial.</p>
        </div>

        <div class="contact-premium-grid">

            <a href="https://wa.me/6285282770935?text=Halo%20saya%20ingin%20bertanya%20tentang%20Pantai%20Pelawan"
               target="_blank"
               class="contact-premium-card whatsapp-card">

                <div class="contact-premium-icon">
                    <img src="{{ asset('images/whatsapp.png') }}" alt="WhatsApp">
                </div>

                <div class="contact-premium-text">
                    <span>Layanan Informasi</span>
                    <h3>WhatsApp</h3>
                    <p>Hubungi pengelola untuk informasi tiket, fasilitas, kondisi pantai, dan layanan wisata.</p>
                    <strong>Chat Sekarang</strong>
                </div>
            </a>

            <a href="https://www.instagram.com/r.syfira_?igsh=MXJ5ejBvbnFvNjBobg=="
               target="_blank"
               class="contact-premium-card instagram-card">

                <div class="contact-premium-icon">
                    <img src="{{ asset('images/instagram.png') }}" alt="Instagram">
                </div>

                <div class="contact-premium-text">
                    <span>Media Promosi</span>
                    <h3>Instagram</h3>
                    <p>Lihat dokumentasi, informasi terbaru, dan aktivitas wisata Pantai Pelawan.</p>
                    <strong>Kunjungi Instagram</strong>
                </div>
            </a>

            <a href="https://www.tiktok.com/@raaaaajz?_r=1&_t=ZS-95o7KMxW2J0"
               target="_blank"
               class="contact-premium-card tiktok-card">

                <div class="contact-premium-icon">
                    <img src="{{ asset('images/tiktok.png') }}" alt="TikTok">
                </div>

                <div class="contact-premium-text">
                    <span>Video Wisata</span>
                    <h3>TikTok</h3>
                    <p>Tonton video singkat tentang suasana, daya tarik, dan pengalaman wisata.</p>
                    <strong>Kunjungi TikTok</strong>
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

                <!-- FORM ULASAN -->
                <div class="review-form-box">
                    <div class="review-form-header">
                        <span>✍️ Form Ulasan</span>
                        <h3>Tulis Ulasan Anda</h3>
                        <p>
                            Isi pengalaman berkunjung Anda agar dapat menjadi referensi bagi wisatawan lain.
                        </p>
                    </div>

                    <form action="#" method="POST">
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
                                <select name="status" required>
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

                <!-- INFO SAMPING -->
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

            <div class="review-card">
                <div class="review-top">
                    <div class="review-avatar">A</div>
                    <div>
                        <h3>Andi Saputra</h3>
                        <span>Wisatawan Lokal</span>
                    </div>
                </div>

                <div class="review-stars">★★★★★</div>

                <p>
                    Pantainya nyaman untuk bersantai bersama keluarga. Suasananya tenang dan cocok
                    untuk menikmati waktu libur di sore hari.
                </p>
            </div>

            <div class="review-card">
                <div class="review-top">
                    <div class="review-avatar">S</div>
                    <div>
                        <h3>Siti Rahma</h3>
                        <span>Pengunjung</span>
                    </div>
                </div>

                <div class="review-stars">★★★★★</div>

                <p>
                    Pemandangan pantainya bagus dan banyak spot yang cocok untuk foto.
                    Informasi melalui website juga membantu sebelum datang ke lokasi.
                </p>
            </div>

            <div class="review-card">
                <div class="review-top">
                    <div class="review-avatar">R</div>
                    <div>
                        <h3>Rizky Pratama</h3>
                        <span>Wisatawan</span>
                    </div>
                </div>

                <div class="review-stars">★★★★☆</div>

                <p>
                    Tempatnya cocok untuk rekreasi keluarga. Akan lebih baik jika informasi tiket,
                    lokasi, dan kontak pengelola terus diperbarui melalui website.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- GOOGLE MAP -->
<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">Lokasi</span>
            <h2>Lokasi Pantai Pelawan</h2>
            <p>Temukan lokasi Pantai Pelawan secara langsung melalui Google Maps.</p>
        </div>

        <div class="map-card">
            <iframe 
                src="https://www.google.com/maps?q=Pantai+Pelawan&output=embed"
                width="100%" 
                height="420"
                style="border:0;"
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>

        <div style="text-align:center; margin-top:24px;">
            <a href="https://maps.app.goo.gl/2tJ9cM3Yuk1bNfTr7" 
               target="_blank" 
               class="btn btn-primary">
               Lihat di Google Maps
            </a>
        </div>

    </div>
</section>

<!-- PENUTUP -->
<section class="section">
    <div class="container">
        <div class="info-highlight">
            <div>
                <span>🌴 Informasi Kunjungan</span>
                <h2>Siap Liburan ke Pantai Pelawan?</h2>
                <p>
                    Pastikan kamu sudah mengetahui informasi penting agar perjalanan wisata
                    menjadi lebih aman, nyaman, dan menyenangkan.
                </p>
            </div>

            <a href="{{ route('tiket') }}" class="btn btn-primary">
                Pesan Tiket
            </a>
        </div>
    </div>
</section>

@endsection