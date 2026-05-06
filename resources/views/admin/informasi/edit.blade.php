@extends('admin.layouts.app')

@section('title', 'Kelola Informasi Pantai')

@section('content')

@php
    $get = function ($field, $default = '') use ($informasi) {
        return $informasi && !empty($informasi->{$field}) ? $informasi->{$field} : $default;
    };

    $nl2p = function ($text) {
        return nl2br(e($text));
    };
@endphp

<div class="admin-user-preview-page">

    <div class="admin-floating-title">
        <div>
            <h1>Kelola Informasi Pantai</h1>
            <p>Tampilan di bawah ini dibuat seperti halaman user. Klik tombol edit pada bagian yang ingin diubah.</p>
        </div>

        <a href="{{ route('informasi.pantai') }}" target="_blank" class="admin-view-user-btn">
            Lihat Halaman User
        </a>
    </div>

    @if(session('success'))
        <div class="admin-alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- HEADER --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalHeaderInformasi')">
            ✏️ Edit Header
        </button>

        <section class="page-header">
            <div class="container">
                <h1>{{ $get('header_judul', 'Informasi Pantai Pelawan') }}</h1>
                <p class="page-subtitle">
                    {{ $get('header_subjudul', 'Informasi penting yang perlu diketahui sebelum berkunjung ke Pantai Pelawan.') }}
                </p>
            </div>
        </section>
    </div>

    {{-- INFORMASI UMUM --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalUmumInformasi')">
            ✏️ Edit Informasi Umum
        </button>

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
    </div>

    {{-- KEAMANAN --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalKeamananInformasi')">
            ✏️ Edit Keamanan
        </button>

        <section class="section">
            <div class="container">

                <div class="section-heading">
                    <h2>{{ $get('keamanan_judul', 'Keamanan & Keselamatan') }}</h2>
                    <p>{{ $get('keamanan_deskripsi', 'Hal-hal penting yang perlu diperhatikan agar wisata tetap aman dan nyaman.') }}</p>
                </div>

                <div class="safety-grid">
                    @for($i = 1; $i <= 4; $i++)
                        <div class="safety-card">
                            <span>{{ $get('keamanan_'.$i.'_icon', '⚠️') }}</span>
                            <div>
                                <h3>{{ $get('keamanan_'.$i.'_judul', 'Keamanan Wisata') }}</h3>
                                <p>{{ $get('keamanan_'.$i.'_deskripsi', 'Informasi keamanan belum tersedia.') }}</p>
                            </div>
                        </div>
                    @endfor
                </div>

            </div>
        </section>
    </div>

    {{-- TIPS --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalTipsInformasi')">
            ✏️ Edit Tips
        </button>

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
                                {{ $get('tips_'.$i.'_icon', '🌴') }}
                            </div>
                            <h3>{{ $get('tips_'.$i.'_judul', 'Tips Berkunjung') }}</h3>
                            <p>{{ $get('tips_'.$i.'_deskripsi', 'Informasi tips belum tersedia.') }}</p>
                        </div>
                    @endfor
                </div>

            </div>
        </section>
    </div>

    {{-- KONTAK --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalKontakInformasi')">
            ✏️ Edit Kontak
        </button>

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
    </div>

    {{-- ULASAN PENGUNJUNG --}}
<div class="admin-editable-section">
    <a href="{{ route('admin.ulasan.index') }}" class="admin-section-edit-btn admin-section-link-btn">
        👁️ Kelola Ulasan
    </a>

    <section class="section section-soft review-section">
        <div class="container">

            <div class="section-heading">
                <span class="section-label">Ulasan Pengunjung</span>
                <h2>Bagikan Pengalaman Anda</h2>
                <p>
                    Wisatawan dapat memberikan penilaian, kesan, dan pesan setelah berkunjung ke Pantai Pelawan.
                </p>
            </div>

            <div class="review-layout">

                <div class="review-form-box">
                    <div class="review-form-header">
                        <span>✍️ Form Ulasan</span>
                        <h3>Tulis Ulasan Anda</h3>
                        <p>
                            Bagian ini adalah tampilan form ulasan yang akan dilihat oleh wisatawan
                            ketika mereka sudah login.
                        </p>
                    </div>

                    <form>
                        <div class="review-form-grid">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" value="Nama wisatawan otomatis dari akun" readonly>
                            </div>

                            <div class="form-group">
                                <label>Status Pengunjung</label>
                                <select disabled>
                                    <option>Wisatawan Lokal</option>
                                    <option>Wisatawan Luar Daerah</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Rating</label>
                            <div class="rating-input">
                                <label>★</label>
                                <label>★</label>
                                <label>★</label>
                                <label>★</label>
                                <label>★</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Kesan & Pesan</label>
                            <textarea rows="5" readonly>Contoh isi ulasan dari wisatawan...</textarea>
                        </div>

                        <button type="button" class="btn btn-primary review-submit">
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
</div>

    {{-- GOOGLE MAPS --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalMapInformasi')">
            ✏️ Edit Google Maps
        </button>

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
    </div>

    {{-- CTA --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalCtaInformasi')">
            ✏️ Edit Penutup
        </button>

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

                    <a href="#" class="btn btn-primary">
                        {{ $get('cta_tombol', 'Pesan Tiket') }}
                    </a>
                </div>
            </div>
        </section>
    </div>

</div>

{{-- MODAL HEADER --}}
<div class="admin-modal" id="modalHeaderInformasi">
    <div class="admin-modal-box">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalHeaderInformasi')">×</button>

        <h2>Edit Header Informasi</h2>

        <form action="{{ route('admin.informasi.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label>Judul Header</label>
                <input type="text" name="header_judul" value="{{ old('header_judul', $get('header_judul', 'Informasi Pantai Pelawan')) }}">
            </div>

            <div class="admin-form-group">
                <label>Subjudul Header</label>
                <textarea name="header_subjudul" rows="4">{{ old('header_subjudul', $get('header_subjudul', 'Informasi penting yang perlu diketahui sebelum berkunjung ke Pantai Pelawan.')) }}</textarea>
            </div>

            <button type="submit" class="btn-admin-save">Simpan Header</button>
        </form>
    </div>
</div>

{{-- MODAL INFORMASI UMUM --}}
<div class="admin-modal" id="modalUmumInformasi">
    <div class="admin-modal-box modal-large">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalUmumInformasi')">×</button>

        <h2>Edit Informasi Umum</h2>

        <form action="{{ route('admin.informasi.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-grid">
                <div class="admin-form-group">
                    <label>Judul Section</label>
                    <input type="text" name="umum_judul" value="{{ old('umum_judul', $get('umum_judul', 'Informasi Umum')) }}">
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi Section</label>
                    <textarea name="umum_deskripsi" rows="3">{{ old('umum_deskripsi', $get('umum_deskripsi', 'Informasi dasar yang perlu diketahui wisatawan sebelum berkunjung ke Pantai Pelawan.')) }}</textarea>
                </div>

                @for($i = 1; $i <= 4; $i++)
                    <div class="admin-form-subtitle full">
                        <strong>Card Informasi Umum {{ $i }}</strong>
                    </div>

                    <div class="admin-form-group">
                        <label>Icon</label>
                        <input type="text" name="umum_{{ $i }}_icon" value="{{ old('umum_'.$i.'_icon', $get('umum_'.$i.'_icon', '📍')) }}">
                    </div>

                    <div class="admin-form-group">
                        <label>Judul</label>
                        <input type="text" name="umum_{{ $i }}_judul" value="{{ old('umum_'.$i.'_judul', $get('umum_'.$i.'_judul', 'Informasi Pantai')) }}">
                    </div>

                    <div class="admin-form-group full">
                        <label>Deskripsi</label>
                        <textarea name="umum_{{ $i }}_deskripsi" rows="4">{{ old('umum_'.$i.'_deskripsi', $get('umum_'.$i.'_deskripsi', 'Informasi belum tersedia.')) }}</textarea>
                    </div>
                @endfor
            </div>

            <button type="submit" class="btn-admin-save">Simpan Informasi Umum</button>
        </form>
    </div>
</div>

{{-- MODAL KEAMANAN --}}
<div class="admin-modal" id="modalKeamananInformasi">
    <div class="admin-modal-box modal-large">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalKeamananInformasi')">×</button>

        <h2>Edit Keamanan & Keselamatan</h2>

        <form action="{{ route('admin.informasi.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-grid">
                <div class="admin-form-group">
                    <label>Judul Section</label>
                    <input type="text" name="keamanan_judul" value="{{ old('keamanan_judul', $get('keamanan_judul', 'Keamanan & Keselamatan')) }}">
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi Section</label>
                    <textarea name="keamanan_deskripsi" rows="3">{{ old('keamanan_deskripsi', $get('keamanan_deskripsi', 'Hal-hal penting yang perlu diperhatikan agar wisata tetap aman dan nyaman.')) }}</textarea>
                </div>

                @for($i = 1; $i <= 4; $i++)
                    <div class="admin-form-subtitle full">
                        <strong>Card Keamanan {{ $i }}</strong>
                    </div>

                    <div class="admin-form-group">
                        <label>Icon</label>
                        <input type="text" name="keamanan_{{ $i }}_icon" value="{{ old('keamanan_'.$i.'_icon', $get('keamanan_'.$i.'_icon', '⚠️')) }}">
                    </div>

                    <div class="admin-form-group">
                        <label>Judul</label>
                        <input type="text" name="keamanan_{{ $i }}_judul" value="{{ old('keamanan_'.$i.'_judul', $get('keamanan_'.$i.'_judul', 'Keamanan Wisata')) }}">
                    </div>

                    <div class="admin-form-group full">
                        <label>Deskripsi</label>
                        <textarea name="keamanan_{{ $i }}_deskripsi" rows="3">{{ old('keamanan_'.$i.'_deskripsi', $get('keamanan_'.$i.'_deskripsi', 'Informasi keamanan belum tersedia.')) }}</textarea>
                    </div>
                @endfor
            </div>

            <button type="submit" class="btn-admin-save">Simpan Keamanan</button>
        </form>
    </div>
</div>

{{-- MODAL TIPS --}}
<div class="admin-modal" id="modalTipsInformasi">
    <div class="admin-modal-box modal-large">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalTipsInformasi')">×</button>

        <h2>Edit Tips Berkunjung</h2>

        <form action="{{ route('admin.informasi.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-grid">
                <div class="admin-form-group">
                    <label>Judul Section</label>
                    <input type="text" name="tips_judul" value="{{ old('tips_judul', $get('tips_judul', 'Tips Berkunjung')) }}">
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi Section</label>
                    <textarea name="tips_deskripsi" rows="3">{{ old('tips_deskripsi', $get('tips_deskripsi', 'Beberapa tips agar pengalaman wisata di Pantai Pelawan lebih maksimal.')) }}</textarea>
                </div>

                @for($i = 1; $i <= 6; $i++)
                    <div class="admin-form-subtitle full">
                        <strong>Tips {{ $i }}</strong>
                    </div>

                    <div class="admin-form-group">
                        <label>Nomor</label>
                        <input type="text" name="tips_{{ $i }}_nomor" value="{{ old('tips_'.$i.'_nomor', $get('tips_'.$i.'_nomor', str_pad($i, 2, '0', STR_PAD_LEFT))) }}">
                    </div>

                    <div class="admin-form-group">
                        <label>Icon</label>
                        <input type="text" name="tips_{{ $i }}_icon" value="{{ old('tips_'.$i.'_icon', $get('tips_'.$i.'_icon', '🌴')) }}">
                    </div>

                    <div class="admin-form-group">
                        <label>Judul</label>
                        <input type="text" name="tips_{{ $i }}_judul" value="{{ old('tips_'.$i.'_judul', $get('tips_'.$i.'_judul', 'Tips Berkunjung')) }}">
                    </div>

                    <div class="admin-form-group full">
                        <label>Deskripsi</label>
                        <textarea name="tips_{{ $i }}_deskripsi" rows="3">{{ old('tips_'.$i.'_deskripsi', $get('tips_'.$i.'_deskripsi', 'Informasi tips belum tersedia.')) }}</textarea>
                    </div>
                @endfor
            </div>

            <button type="submit" class="btn-admin-save">Simpan Tips</button>
        </form>
    </div>
</div>

{{-- MODAL KONTAK --}}
<div class="admin-modal" id="modalKontakInformasi">
    <div class="admin-modal-box modal-large">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalKontakInformasi')">×</button>

        <h2>Edit Kontak Pengelola</h2>

        <form action="{{ route('admin.informasi.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-grid">
                <div class="admin-form-group">
                    <label>Label Kontak</label>
                    <input type="text" name="kontak_label" value="{{ old('kontak_label', $get('kontak_label', 'Kontak')) }}">
                </div>

                <div class="admin-form-group">
                    <label>Judul Kontak</label>
                    <input type="text" name="kontak_judul" value="{{ old('kontak_judul', $get('kontak_judul', 'Kontak Pengelola')) }}">
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi Kontak</label>
                    <textarea name="kontak_deskripsi" rows="3">{{ old('kontak_deskripsi', $get('kontak_deskripsi', 'Hubungi pengelola Pantai Pelawan melalui WhatsApp dan media sosial.')) }}</textarea>
                </div>

                @foreach(['whatsapp' => 'WhatsApp', 'instagram' => 'Instagram', 'tiktok' => 'TikTok'] as $key => $label)
                    <div class="admin-form-subtitle full">
                        <strong>{{ $label }}</strong>
                    </div>

                    <div class="admin-form-group full">
                        <label>Link {{ $label }}</label>
                        <input type="text" name="{{ $key }}_link" value="{{ old($key.'_link', $get($key.'_link', '#')) }}">
                    </div>

                    <div class="admin-form-group">
                        <label>Label {{ $label }}</label>
                        <input type="text" name="{{ $key }}_label" value="{{ old($key.'_label', $get($key.'_label', 'Label')) }}">
                    </div>

                    <div class="admin-form-group">
                        <label>Judul {{ $label }}</label>
                        <input type="text" name="{{ $key }}_judul" value="{{ old($key.'_judul', $get($key.'_judul', $label)) }}">
                    </div>

                    <div class="admin-form-group full">
                        <label>Deskripsi {{ $label }}</label>
                        <textarea name="{{ $key }}_deskripsi" rows="3">{{ old($key.'_deskripsi', $get($key.'_deskripsi', 'Deskripsi belum tersedia.')) }}</textarea>
                    </div>

                    <div class="admin-form-group">
                        <label>Teks Tombol {{ $label }}</label>
                        <input type="text" name="{{ $key }}_tombol" value="{{ old($key.'_tombol', $get($key.'_tombol', 'Kunjungi')) }}">
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn-admin-save">Simpan Kontak</button>
        </form>
    </div>
</div>

{{-- MODAL MAP --}}
<div class="admin-modal" id="modalMapInformasi">
    <div class="admin-modal-box modal-large">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalMapInformasi')">×</button>

        <h2>Edit Google Maps</h2>

        <form action="{{ route('admin.informasi.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-grid">
                <div class="admin-form-group">
                    <label>Label Map</label>
                    <input type="text" name="map_label" value="{{ old('map_label', $get('map_label', 'Lokasi')) }}">
                </div>

                <div class="admin-form-group">
                    <label>Judul Map</label>
                    <input type="text" name="map_judul" value="{{ old('map_judul', $get('map_judul', 'Lokasi Pantai Pelawan')) }}">
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi Map</label>
                    <textarea name="map_deskripsi" rows="3">{{ old('map_deskripsi', $get('map_deskripsi', 'Temukan lokasi Pantai Pelawan secara langsung melalui Google Maps.')) }}</textarea>
                </div>

                <div class="admin-form-group full">
                    <label>Google Maps Embed URL</label>
                    <input type="text" name="map_embed_url" value="{{ old('map_embed_url', $get('map_embed_url', 'https://www.google.com/maps?q=Pantai+Pelawan&output=embed')) }}">
                </div>

                <div class="admin-form-group full">
                    <label>Link Google Maps</label>
                    <input type="text" name="map_link" value="{{ old('map_link', $get('map_link', '#')) }}">
                </div>

                <div class="admin-form-group">
                    <label>Teks Tombol Map</label>
                    <input type="text" name="map_tombol" value="{{ old('map_tombol', $get('map_tombol', 'Lihat di Google Maps')) }}">
                </div>
            </div>

            <button type="submit" class="btn-admin-save">Simpan Google Maps</button>
        </form>
    </div>
</div>

{{-- MODAL CTA --}}
<div class="admin-modal" id="modalCtaInformasi">
    <div class="admin-modal-box">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalCtaInformasi')">×</button>

        <h2>Edit Penutup / CTA</h2>

        <form action="{{ route('admin.informasi.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label>Label CTA</label>
                <input type="text" name="cta_label" value="{{ old('cta_label', $get('cta_label', '🌴 Informasi Kunjungan')) }}">
            </div>

            <div class="admin-form-group">
                <label>Judul CTA</label>
                <input type="text" name="cta_judul" value="{{ old('cta_judul', $get('cta_judul', 'Siap Liburan ke Pantai Pelawan?')) }}">
            </div>

            <div class="admin-form-group">
                <label>Deskripsi CTA</label>
                <textarea name="cta_deskripsi" rows="4">{{ old('cta_deskripsi', $get('cta_deskripsi', 'Pastikan kamu sudah mengetahui informasi penting agar perjalanan wisata menjadi lebih aman, nyaman, dan menyenangkan.')) }}</textarea>
            </div>

            <div class="admin-form-group">
                <label>Teks Tombol CTA</label>
                <input type="text" name="cta_tombol" value="{{ old('cta_tombol', $get('cta_tombol', 'Pesan Tiket')) }}">
            </div>

            <button type="submit" class="btn-admin-save">Simpan Penutup</button>
        </form>
    </div>
</div>

<script>
    function openAdminModal(id) {
        document.getElementById(id).classList.add('show');
        document.body.classList.add('modal-open');
    }

    function closeAdminModal(id) {
        document.getElementById(id).classList.remove('show');
        document.body.classList.remove('modal-open');
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            document.querySelectorAll('.admin-modal.show').forEach(function(modal) {
                modal.classList.remove('show');
            });
            document.body.classList.remove('modal-open');
        }
    });
</script>

@endsection