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
            <p>Tampilan di bawah ini sama seperti halaman user. Admin dapat mengedit konten per bagian kecil.</p>
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

    {{-- CUACA --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalCuacaInformasi')">
            ✏️ Edit Mode Cuaca
        </button>

        @php
            $modeCuaca = $get('cuaca_mode', 'otomatis');

           $kondisi = $weather['kondisi'] ?? 'Cerah Berawan';
            $deskripsi = $weather['deskripsi'] ?? '';
            $ikon = $weather['ikon'] ?? '⛅';

            $ombak = $weather['ombak'] ?? '';
            $ombakDeskripsi = $weather['ombak_deskripsi'] ?? '';

            $angin = $weather['angin'] ?? '';
            $anginDeskripsi = $weather['angin_deskripsi'] ?? '';

            $status = $weather['status'] ?? '';
            $statusDeskripsi = $weather['status_deskripsi'] ?? '';

            $catatanJudul = $weather['catatan_judul'] ?? '';
            $catatan = $weather['catatan'] ?? '';
        @endphp

        <section class="section weather-beach-section">
            <div class="container">

                <div class="weather-beach-card">

                    <div class="weather-beach-left">
                        <span class="weather-label">
                            {{ $modeCuaca == 'manual' ? 'Mode Manual Admin' : 'Mode Otomatis API' }}
                        </span>

                        <h2>Perkiraan Cuaca & Kondisi Ombak Pantai Pelawan</h2>

                        <p>
                            Informasi ini membantu wisatawan mengetahui kondisi pantai sebelum berkunjung,
                            sehingga perjalanan wisata menjadi lebih aman dan nyaman.
                        </p>

                        <div class="weather-update">
                            <span>📅</span>
                            <strong>{{ $modeCuaca == 'manual' ? 'Diperbarui Admin' : 'Diperbarui Otomatis' }}</strong>
                        </div>

                        <div class="weather-scene">
                            <div class="weather-big-icon">🏖️</div>
                            <h3>Siap Berwisata Hari Ini?</h3>
                            <p>{{ $catatan }}</p>
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
    </div>

    {{-- INFORMASI UMUM --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalUmumJudul')">
            ✏️ Edit Judul Informasi Umum
        </button>

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
                                <h3>{{ $get('umum_'.$i.'_judul', 'Informasi Pantai') }}</h3>
                                <p>{!! $nl2p($get('umum_'.$i.'_deskripsi', 'Informasi belum tersedia.')) !!}</p>

                                <button type="button" class="admin-mini-edit-btn" onclick="openAdminModal('modalUmumCard{{ $i }}')">
                                    ✏️ Edit
                                </button>
                            </div>

                        </div>
                    @endfor
                </div>

            </div>
        </section>
    </div>

    {{-- KEAMANAN --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalKeamananJudul')">
            ✏️ Edit Judul Keamanan
        </button>

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

                            <h3>{{ $get('keamanan_'.$i.'_judul', 'Keamanan Wisata') }}</h3>

                            <p>{{ $get('keamanan_'.$i.'_deskripsi', 'Informasi keamanan belum tersedia.') }}</p>

                            <button type="button" class="admin-mini-edit-btn" onclick="openAdminModal('modalKeamananCard{{ $i }}')">
                                ✏️ Edit
                            </button>
                        </div>
                    @endfor
                </div>

            </div>
        </section>
    </div>

    {{-- TIPS --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalTipsJudul')">
            ✏️ Edit Judul Tips
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
                                {{ $get('tips_'.$i.'_icon', ['🌅','👕','🧴','🗑️','⚠️','📢'][$i - 1]) }}
                            </div>

                            <h3>{{ $get('tips_'.$i.'_judul', 'Tips Berkunjung') }}</h3>
                            <p>{{ $get('tips_'.$i.'_deskripsi', 'Informasi tips belum tersedia.') }}</p>

                            <button type="button" class="admin-mini-edit-btn" onclick="openAdminModal('modalTipsCard{{ $i }}')">
                                ✏️ Edit
                            </button>
                        </div>
                    @endfor
                </div>

            </div>
        </section>
    </div>

    {{-- KONTAK --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalKontakJudul')">
            ✏️ Edit Judul Kontak
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

                            <button type="button" class="admin-mini-edit-btn" onclick="event.preventDefault(); openAdminModal('modalWhatsapp')">
                                ✏️ Edit
                            </button>
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

                            <button type="button" class="admin-mini-edit-btn" onclick="event.preventDefault(); openAdminModal('modalInstagram')">
                                ✏️ Edit
                            </button>
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

                            <button type="button" class="admin-mini-edit-btn" onclick="event.preventDefault(); openAdminModal('modalTiktok')">
                                ✏️ Edit
                            </button>
                        </div>
                    </a>

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
                    <a href="{{ $get('map_link', '#') }}" target="_blank" class="btn btn-primary">
                       {{ $get('map_tombol', 'Lihat di Google Maps') }}
                    </a>
                </div>

            </div>
        </section>
    </div>

    {{-- ULASAN --}}
    <div class="admin-editable-section">
        <a href="{{ route('admin.ulasan.index') }}" class="admin-section-edit-btn admin-section-link-btn">
            👁️ Kelola Ulasan
        </a>

        <section id="ulasan" class="section section-soft review-section">
            <div class="container">

                <div class="section-heading">
                    <span class="section-label">{{ $get('ulasan_label', 'Ulasan Pengunjung') }}</span>
                    <h2>{{ $get('ulasan_judul', 'Bagikan Pengalaman Anda') }}</h2>
                    <p>{{ $get('ulasan_deskripsi', 'Wisatawan dapat memberikan penilaian, kesan, dan pesan setelah berkunjung ke Pantai Pelawan.') }}</p>
                </div>

                <div class="review-layout">

                    <div class="review-form-box">
                        <div class="review-form-header">
                            <span>{{ $get('ulasan_form_label', '✍️ Form Ulasan') }}</span>
                            <h3>{{ $get('ulasan_form_judul', 'Tulis Ulasan Anda') }}</h3>
                            <p>{{ $get('ulasan_form_deskripsi', 'Isi pengalaman berkunjung Anda agar dapat menjadi referensi bagi wisatawan lain.') }}</p>
                        </div>

                        <div class="review-form-grid">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" value="Nama Wisatawan" readonly>
                            </div>

                            <div class="form-group">
                                <label>Status Pengunjung</label>
                                <select disabled>
                                    <option>Wisatawan Lokal</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Rating</label>
                            <div class="rating-input preview-rating">
                                <label>★</label>
                                <label>★</label>
                                <label>★</label>
                                <label>★</label>
                                <label>★</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Kesan & Pesan</label>
                            <textarea rows="5" readonly>Contoh pengalaman wisatawan setelah berkunjung ke Pantai Pelawan.</textarea>
                        </div>

                        <button type="button" class="btn btn-primary review-submit">
                            Kirim Ulasan
                        </button>
                    </div>

                    <div class="review-side-card">
                        <div class="review-side-icon">⭐</div>
                        <h3>{{ $get('ulasan_side_judul', 'Ulasan Pengunjung') }}</h3>
                        <p>{{ $get('ulasan_side_deskripsi', 'Ulasan membantu pengelola mengetahui pengalaman wisatawan dan membantu pengunjung lain memperoleh gambaran mengenai Pantai Pelawan.') }}</p>

                        <div class="review-point">✅ {{ $get('ulasan_point_1', 'Berikan penilaian sesuai pengalaman') }}</div>
                        <div class="review-point">✅ {{ $get('ulasan_point_2', 'Tulis kesan dan saran dengan sopan') }}</div>
                        <div class="review-point">✅ {{ $get('ulasan_point_3', 'Bantu wisatawan lain mengenal Pantai Pelawan') }}</div>
                    </div>

                </div>

                <div class="section-heading review-list-heading">
                    <span class="section-label">{{ $get('ulasan_list_label', 'Pengalaman Wisatawan') }}</span>
                    <h2>{{ $get('ulasan_list_judul', 'Ulasan dari Pengunjung') }}</h2>
                    <p>{{ $get('ulasan_list_deskripsi', 'Beberapa pendapat pengunjung mengenai pengalaman mereka saat berwisata ke Pantai Pelawan.') }}</p>
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
                        <p>Pantainya nyaman untuk bersantai bersama keluarga.</p>
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
                        <p>Pemandangan pantainya bagus dan banyak spot yang cocok untuk foto.</p>
                    </div>
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
                        <p>{{ $get('cta_deskripsi', 'Pastikan kamu sudah mengetahui informasi penting agar perjalanan wisata menjadi lebih aman, nyaman, dan menyenangkan.') }}</p>
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

{{-- MODAL CUACA --}}
{{-- MODAL CUACA --}}
<div class="admin-modal" id="modalCuacaInformasi">
    <div class="admin-modal-box modal-large">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalCuacaInformasi')">×</button>

        <h2>Edit Mode Cuaca</h2>

        <form action="{{ route('admin.informasi.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label>Mode Cuaca</label>
                <select name="cuaca_mode" id="cuaca_mode_select" onchange="toggleManualCuaca()">
                    <option value="otomatis" {{ $get('cuaca_mode', 'otomatis') == 'otomatis' ? 'selected' : '' }}>
                        Otomatis dari API
                    </option>

                    <option value="manual" {{ $get('cuaca_mode', 'otomatis') == 'manual' ? 'selected' : '' }}>
                        Manual dari Admin
                    </option>
                </select>
            </div>

            <div id="manual-cuaca-fields">
                <div class="admin-form-group">
                    <label>Pilih Kondisi Cuaca Manual</label>
                    <select name="manual_kondisi">
                        <option value="cerah" {{ $get('manual_kondisi', 'cerah_berawan') == 'cerah' ? 'selected' : '' }}>
                            Cerah
                        </option>

                        <option value="cerah_berawan" {{ $get('manual_kondisi', 'cerah_berawan') == 'cerah_berawan' ? 'selected' : '' }}>
                            Cerah Berawan
                        </option>

                        <option value="berawan" {{ $get('manual_kondisi', 'cerah_berawan') == 'berawan' ? 'selected' : '' }}>
                            Berawan
                        </option>

                        <option value="hujan" {{ $get('manual_kondisi', 'cerah_berawan') == 'hujan' ? 'selected' : '' }}>
                            Hujan
                        </option>

                        <option value="hujan_petir" {{ $get('manual_kondisi', 'cerah_berawan') == 'hujan_petir' ? 'selected' : '' }}>
                            Hujan Disertai Petir
                        </option>

                        <option value="angin_kencang" {{ $get('manual_kondisi', 'cerah_berawan') == 'angin_kencang' ? 'selected' : '' }}>
                            Angin Kencang
                        </option>
                    </select>

                    <small style="display:block; margin-top:8px; color:#64748b;">
                        Admin cukup memilih kondisi cuaca. Status ombak, angin, kunjungan, ikon, dan catatan akan mengikuti otomatis.
                    </small>
                </div>
            </div>

            <button type="submit" class="btn-admin-save">Simpan Pengaturan Cuaca</button>
        </form>
    </div>
</div>

{{-- MODAL UMUM JUDUL --}}
<div class="admin-modal" id="modalUmumJudul">
    <div class="admin-modal-box">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalUmumJudul')">×</button>

        <h2>Edit Judul Informasi Umum</h2>

        <form action="{{ route('admin.informasi.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label>Judul Section</label>
                <input type="text" name="umum_judul" value="{{ old('umum_judul', $get('umum_judul', 'Informasi Umum')) }}">
            </div>

            <div class="admin-form-group">
                <label>Deskripsi Section</label>
                <textarea name="umum_deskripsi" rows="4">{{ old('umum_deskripsi', $get('umum_deskripsi', 'Informasi dasar yang perlu diketahui wisatawan sebelum berkunjung ke Pantai Pelawan.')) }}</textarea>
            </div>

            <button type="submit" class="btn-admin-save">Simpan Judul</button>
        </form>
    </div>
</div>

{{-- MODAL UMUM CARD --}}
@for($i = 1; $i <= 4; $i++)
<div class="admin-modal" id="modalUmumCard{{ $i }}">
    <div class="admin-modal-box">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalUmumCard{{ $i }}')">×</button>

        <h2>Edit Informasi Umum {{ $i }}</h2>

        <form action="{{ route('admin.informasi.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label>Icon</label>
                <input type="text" name="umum_{{ $i }}_icon" value="{{ old('umum_'.$i.'_icon', $get('umum_'.$i.'_icon', '📍')) }}">
            </div>

            <div class="admin-form-group">
                <label>Judul</label>
                <input type="text" name="umum_{{ $i }}_judul" value="{{ old('umum_'.$i.'_judul', $get('umum_'.$i.'_judul', 'Informasi Pantai')) }}">
            </div>

            <div class="admin-form-group">
                <label>Deskripsi</label>
                <textarea name="umum_{{ $i }}_deskripsi" rows="5">{{ old('umum_'.$i.'_deskripsi', $get('umum_'.$i.'_deskripsi', 'Informasi belum tersedia.')) }}</textarea>
            </div>

            <button type="submit" class="btn-admin-save">Simpan Card</button>
        </form>
    </div>
</div>
@endfor

{{-- MODAL KEAMANAN JUDUL --}}
<div class="admin-modal" id="modalKeamananJudul">
    <div class="admin-modal-box">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalKeamananJudul')">×</button>

        <h2>Edit Judul Keamanan</h2>

        <form action="{{ route('admin.informasi.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label>Judul Section</label>
                <input type="text" name="keamanan_judul" value="{{ old('keamanan_judul', $get('keamanan_judul', 'Keamanan & Keselamatan')) }}">
            </div>

            <div class="admin-form-group">
                <label>Deskripsi Section</label>
                <textarea name="keamanan_deskripsi" rows="4">{{ old('keamanan_deskripsi', $get('keamanan_deskripsi', 'Hal-hal penting yang perlu diperhatikan agar wisata tetap aman dan nyaman.')) }}</textarea>
            </div>

            <button type="submit" class="btn-admin-save">Simpan Judul</button>
        </form>
    </div>
</div>

{{-- MODAL KEAMANAN CARD --}}
@for($i = 1; $i <= 4; $i++)
<div class="admin-modal" id="modalKeamananCard{{ $i }}">
    <div class="admin-modal-box">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalKeamananCard{{ $i }}')">×</button>

        <h2>Edit Keamanan {{ $i }}</h2>

        <form action="{{ route('admin.informasi.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label>Icon</label>
                <input type="text" name="keamanan_{{ $i }}_icon" value="{{ old('keamanan_'.$i.'_icon', $get('keamanan_'.$i.'_icon', '⚠️')) }}">
            </div>

            <div class="admin-form-group">
                <label>Judul</label>
                <input type="text" name="keamanan_{{ $i }}_judul" value="{{ old('keamanan_'.$i.'_judul', $get('keamanan_'.$i.'_judul', 'Keamanan Wisata')) }}">
            </div>

            <div class="admin-form-group">
                <label>Deskripsi</label>
                <textarea name="keamanan_{{ $i }}_deskripsi" rows="5">{{ old('keamanan_'.$i.'_deskripsi', $get('keamanan_'.$i.'_deskripsi', 'Informasi keamanan belum tersedia.')) }}</textarea>
            </div>

            <button type="submit" class="btn-admin-save">Simpan Card</button>
        </form>
    </div>
</div>
@endfor

{{-- MODAL TIPS JUDUL --}}
<div class="admin-modal" id="modalTipsJudul">
    <div class="admin-modal-box">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalTipsJudul')">×</button>

        <h2>Edit Judul Tips</h2>

        <form action="{{ route('admin.informasi.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label>Judul Section</label>
                <input type="text" name="tips_judul" value="{{ old('tips_judul', $get('tips_judul', 'Tips Berkunjung')) }}">
            </div>

            <div class="admin-form-group">
                <label>Deskripsi Section</label>
                <textarea name="tips_deskripsi" rows="4">{{ old('tips_deskripsi', $get('tips_deskripsi', 'Beberapa tips agar pengalaman wisata di Pantai Pelawan lebih maksimal.')) }}</textarea>
            </div>

            <button type="submit" class="btn-admin-save">Simpan Judul</button>
        </form>
    </div>
</div>

{{-- MODAL TIPS CARD --}}
@for($i = 1; $i <= 6; $i++)
<div class="admin-modal" id="modalTipsCard{{ $i }}">
    <div class="admin-modal-box">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalTipsCard{{ $i }}')">×</button>

        <h2>Edit Tips {{ $i }}</h2>

        <form action="{{ route('admin.informasi.update') }}" method="POST">
            @csrf
            @method('PUT')

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

            <div class="admin-form-group">
                <label>Deskripsi</label>
                <textarea name="tips_{{ $i }}_deskripsi" rows="5">{{ old('tips_'.$i.'_deskripsi', $get('tips_'.$i.'_deskripsi', 'Informasi tips belum tersedia.')) }}</textarea>
            </div>

            <button type="submit" class="btn-admin-save">Simpan Tips</button>
        </form>
    </div>
</div>
@endfor

{{-- MODAL KONTAK JUDUL --}}
<div class="admin-modal" id="modalKontakJudul">
    <div class="admin-modal-box">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalKontakJudul')">×</button>

        <h2>Edit Judul Kontak</h2>

        <form action="{{ route('admin.informasi.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label>Label Kontak</label>
                <input type="text" name="kontak_label" value="{{ old('kontak_label', $get('kontak_label', 'Kontak')) }}">
            </div>

            <div class="admin-form-group">
                <label>Judul Kontak</label>
                <input type="text" name="kontak_judul" value="{{ old('kontak_judul', $get('kontak_judul', 'Kontak Pengelola')) }}">
            </div>

            <div class="admin-form-group">
                <label>Deskripsi Kontak</label>
                <textarea name="kontak_deskripsi" rows="4">{{ old('kontak_deskripsi', $get('kontak_deskripsi', 'Hubungi pengelola Pantai Pelawan melalui WhatsApp dan media sosial.')) }}</textarea>
            </div>

            <button type="submit" class="btn-admin-save">Simpan Kontak</button>
        </form>
    </div>
</div>

{{-- MODAL WHATSAPP --}}
<div class="admin-modal" id="modalWhatsapp">
    <div class="admin-modal-box">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalWhatsapp')">×</button>

        <h2>Edit WhatsApp</h2>

        <form action="{{ route('admin.informasi.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label>Link WhatsApp</label>
                <input type="text" name="whatsapp_link" value="{{ old('whatsapp_link', $get('whatsapp_link', '#')) }}">
            </div>

            <div class="admin-form-group">
                <label>Label</label>
                <input type="text" name="whatsapp_label" value="{{ old('whatsapp_label', $get('whatsapp_label', 'Layanan Informasi')) }}">
            </div>

            <div class="admin-form-group">
                <label>Judul</label>
                <input type="text" name="whatsapp_judul" value="{{ old('whatsapp_judul', $get('whatsapp_judul', 'WhatsApp')) }}">
            </div>

            <div class="admin-form-group">
                <label>Deskripsi</label>
                <textarea name="whatsapp_deskripsi" rows="4">{{ old('whatsapp_deskripsi', $get('whatsapp_deskripsi', 'Hubungi pengelola untuk informasi tiket, fasilitas, kondisi pantai, dan layanan wisata.')) }}</textarea>
            </div>

            <div class="admin-form-group">
                <label>Teks Tombol</label>
                <input type="text" name="whatsapp_tombol" value="{{ old('whatsapp_tombol', $get('whatsapp_tombol', 'Chat Sekarang')) }}">
            </div>

            <button type="submit" class="btn-admin-save">Simpan WhatsApp</button>
        </form>
    </div>
</div>

{{-- MODAL INSTAGRAM --}}
<div class="admin-modal" id="modalInstagram">
    <div class="admin-modal-box">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalInstagram')">×</button>

        <h2>Edit Instagram</h2>

        <form action="{{ route('admin.informasi.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label>Link Instagram</label>
                <input type="text" name="instagram_link" value="{{ old('instagram_link', $get('instagram_link', '#')) }}">
            </div>

            <div class="admin-form-group">
                <label>Label</label>
                <input type="text" name="instagram_label" value="{{ old('instagram_label', $get('instagram_label', 'Media Promosi')) }}">
            </div>

            <div class="admin-form-group">
                <label>Judul</label>
                <input type="text" name="instagram_judul" value="{{ old('instagram_judul', $get('instagram_judul', 'Instagram')) }}">
            </div>

            <div class="admin-form-group">
                <label>Deskripsi</label>
                <textarea name="instagram_deskripsi" rows="4">{{ old('instagram_deskripsi', $get('instagram_deskripsi', 'Lihat dokumentasi, informasi terbaru, dan aktivitas wisata Pantai Pelawan.')) }}</textarea>
            </div>

            <div class="admin-form-group">
                <label>Teks Tombol</label>
                <input type="text" name="instagram_tombol" value="{{ old('instagram_tombol', $get('instagram_tombol', 'Kunjungi Instagram')) }}">
            </div>

            <button type="submit" class="btn-admin-save">Simpan Instagram</button>
        </form>
    </div>
</div>

{{-- MODAL TIKTOK --}}
<div class="admin-modal" id="modalTiktok">
    <div class="admin-modal-box">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalTiktok')">×</button>

        <h2>Edit TikTok</h2>

        <form action="{{ route('admin.informasi.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label>Link TikTok</label>
                <input type="text" name="tiktok_link" value="{{ old('tiktok_link', $get('tiktok_link', '#')) }}">
            </div>

            <div class="admin-form-group">
                <label>Label</label>
                <input type="text" name="tiktok_label" value="{{ old('tiktok_label', $get('tiktok_label', 'Video Wisata')) }}">
            </div>

            <div class="admin-form-group">
                <label>Judul</label>
                <input type="text" name="tiktok_judul" value="{{ old('tiktok_judul', $get('tiktok_judul', 'TikTok')) }}">
            </div>

            <div class="admin-form-group">
                <label>Deskripsi</label>
                <textarea name="tiktok_deskripsi" rows="4">{{ old('tiktok_deskripsi', $get('tiktok_deskripsi', 'Tonton video singkat tentang suasana, daya tarik, dan pengalaman wisata.')) }}</textarea>
            </div>

            <div class="admin-form-group">
                <label>Teks Tombol</label>
                <input type="text" name="tiktok_tombol" value="{{ old('tiktok_tombol', $get('tiktok_tombol', 'Kunjungi TikTok')) }}">
            </div>

            <button type="submit" class="btn-admin-save">Simpan TikTok</button>
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
        const modal = document.getElementById(id);

        if (modal) {
            modal.classList.add('show');
            document.body.classList.add('modal-open');
        }
    }

    function closeAdminModal(id) {
        const modal = document.getElementById(id);

        if (modal) {
            modal.classList.remove('show');
            document.body.classList.remove('modal-open');
        }
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            document.querySelectorAll('.admin-modal.show').forEach(function(modal) {
                modal.classList.remove('show');
            });

            document.body.classList.remove('modal-open');
        }
    });

    function toggleManualCuaca() {
        const select = document.getElementById('cuaca_mode_select');
        const manualFields = document.getElementById('manual-cuaca-fields');

        if (!select || !manualFields) return;

        if (select.value === 'manual') {
            manualFields.style.display = 'block';
        } else {
            manualFields.style.display = 'none';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        toggleManualCuaca();

        const savedScroll = sessionStorage.getItem('informasiAdminScrollY');

        if (savedScroll !== null) {
            window.scrollTo(0, parseInt(savedScroll));
            sessionStorage.removeItem('informasiAdminScrollY');
        }

        document.querySelectorAll('form').forEach(function(form) {
            form.addEventListener('submit', function() {
                sessionStorage.setItem('informasiAdminScrollY', window.scrollY);
            });
        });
    });
</script>

@endsection