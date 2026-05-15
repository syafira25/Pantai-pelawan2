@extends('admin.layouts.app')

@section('title', 'Kelola Beranda')

@section('content')

@php
    $page = $page ?? null;

    $aboutImage = $page && $page->about_gambar
        ? (str_starts_with($page->about_gambar, 'images/') ? asset($page->about_gambar) : asset('storage/' . $page->about_gambar))
        : asset('images/profil_pantai.jpg');

    $weather = $weather ?? [];
    $ikon = $weather['ikon'] ?? '⛅';
    $kondisi = $weather['kondisi'] ?? 'Cerah Berawan';
    $ombak = $weather['ombak'] ?? 'Relatif Tenang';
    $angin = $weather['angin'] ?? 'Normal';
    $status = $weather['status'] ?? 'Aman Dikunjungi';
@endphp

<div class="admin-user-preview-page">

    <div class="admin-floating-title">
        <div>
            <h1>Kelola Beranda</h1>
            <p>Tampilan admin dibuat mengikuti halaman beranda user.</p>
        </div>

        <div class="admin-header-actions">
            <a href="{{ route('home') }}" target="_blank" class="admin-view-user-btn">
                Lihat User
            </a>

            <button type="button" onclick="openModal('modalTambahBeranda')" class="admin-view-user-btn">
                + Tambah Item
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="admin-alert-success">{{ session('success') }}</div>
    @endif

    {{-- HERO --}}
    <section class="hero hero-home admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditHero')">
            ✏️ Edit Hero
        </button>

        <div class="hero-overlay">
            <div class="container">
                <div class="hero-content hero-content-wide">
                    <div class="hero-badge">
                        {{ $page->hero_badge ?? '🌴 Pantai Pelawan Karimun' }}
                    </div>

                    <h1>{{ $page->hero_judul ?? 'Jelajahi Keindahan Pantai Pelawan' }}</h1>

                    <p>
                        {{ $page->hero_deskripsi ?? 'Temukan informasi wisata, fasilitas, galeri, kuliner, dan pemesanan tiket Pantai Pelawan dalam satu website.' }}
                    </p>

                    <div class="hero-buttons">
                        <a href="{{ route('tiket') }}" class="btn btn-primary">
                            {{ $page->hero_tombol_1 ?? 'Pesan Tiket' }}
                        </a>

                        <a href="{{ route('informasi.pantai') }}" class="btn btn-secondary">
                            {{ $page->hero_tombol_2 ?? 'Lihat Informasi' }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CUACA --}}
    <section class="home-weather-wrapper admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditCuaca')">
            ✏️ Edit Cuaca
        </button>

        <div class="container">
            <div class="weather-layout">
                <div class="travel-ready-card">
                    <div class="travel-ready-icon">🏖️</div>

                    <div class="travel-ready-content">
                        <h2>Siap Berwisata Hari Ini?</h2>
                        <p>Cuaca berawan, tetap pantau perubahan cuaca sebelum menikmati wisata Pantai Pelawan.</p>
                    </div>
                </div>

                <div class="home-weather-card">
                    <div class="home-weather-main">
                        <div class="home-weather-icon">{{ $ikon }}</div>

                        <div>
                            <span>INFO CUACA HARI INI</span>
                            <h2>{{ $kondisi }}</h2>
                            <p>Pantau kondisi singkat sebelum berkunjung ke Pantai Pelawan.</p>
                        </div>
                    </div>

                    <div class="home-weather-items">
                        <div class="home-weather-item">
                            <span>🌊 Ombak</span>
                            <strong>{{ $ombak }}</strong>
                        </div>

                        <div class="home-weather-item">
                            <span>💨 Angin</span>
                            <strong>{{ $angin }}</strong>
                        </div>

                        <div class="home-weather-item">
                            <span>✅ Status</span>
                            <strong>{{ $status }}</strong>
                        </div>
                    </div>

                    <a href="{{ route('informasi.pantai') }}" class="home-weather-btn">
                        Lihat Detail
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- INTRO / TENTANG --}}
    <section class="section home-intro-beauty-section admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditTentang')">
            ✏️ Edit Tentang
        </button>

        <div class="home-beauty-leaf-left">🌿</div>
        <div class="home-beauty-leaf-right">🌿</div>
        <div class="home-beauty-circle"></div>
        <div class="home-beauty-dots"></div>

        <div class="container">
            <div class="home-beauty-layout">
                <div class="home-beauty-text">
                    <span class="home-beauty-label">
                        {{ $page->about_label ?? '🍃 Destinasi Wisata Alam' }}
                    </span>

                    <h2>
                        {!! nl2br(e($page->about_judul ?? "Pantai Pelawan,\ntempat menikmati\nsuasana pantai yang\ntenang dan indah.")) !!}
                    </h2>

                    <div class="home-beauty-line">
                        <span></span>
                        <i>🍃</i>
                        <span></span>
                    </div>

                    <p>
                        {{ $page->about_deskripsi_1 ?? 'Pantai Pelawan menjadi pilihan wisata untuk bersantai, menikmati pemandangan, berfoto, mencoba kuliner sekitar pantai, dan menghabiskan waktu bersama keluarga.' }}
                    </p>

                    <div class="home-beauty-mini-grid">
                        @foreach($keunggulan->take(2) as $item)
                            <div class="home-beauty-mini-card admin-mini-edit-card">
                                <div class="home-beauty-mini-icon">{{ $item->icon }}</div>

                                <div>
                                    <h3>{{ $item->judul }}</h3>
                                    <p>{{ $item->deskripsi }}</p>

                                    @include('admin.beranda.partials.card-actions', ['item' => $item])
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <a href="{{ route('profil.pantai') }}" class="home-beauty-btn">
                        {{ $page->about_tombol ?? 'Lihat Profil Pantai' }}
                        <span>→</span>
                    </a>
                </div>

                <div class="home-beauty-image-wrap">
                    <div class="home-beauty-bird">⌁ ⌁ ⌁</div>

                    <div class="home-beauty-image-card admin-image-edit-wrap">
                        <button type="button" class="admin-image-edit-btn" onclick="openModal('modalEditTentang')">
                            ✏️ Ubah Gambar
                        </button>

                        <img src="{{ $aboutImage }}" alt="Pantai Pelawan">

                        <div class="home-beauty-floating">
                            <div class="home-beauty-star">★</div>

                            <div>
                                <h3>Keindahan alami yang memanjakan mata</h3>
                                <p>Cocok untuk liburan keluarga, pasangan, dan teman.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="home-beauty-bottom">
                @foreach($keunggulan as $item)
                    <div class="home-beauty-bottom-item admin-bottom-edit-card">
                        <div class="home-beauty-bottom-icon">{{ $item->icon }}</div>

                        <div>
                            <h3>{{ $item->judul }}</h3>
                            <p>{{ $item->deskripsi }}</p>

                            @include('admin.beranda.partials.card-actions', ['item' => $item])
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- AKTIVITAS --}}
    <section class="section aktivitas-seru-section admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditAktivitasSection')">
            ✏️ Edit Section
        </button>

        <div class="container">
            <div class="section-heading">
                <span class="section-label">
                    {{ $page->aktivitas_label ?? 'Aktivitas Seru' }}
                </span>

                <h2>
                    {{ $page->aktivitas_judul ?? 'Hal Menarik yang Bisa Dilakukan di Pantai Pelawan' }}
                </h2>

                <p>
                    {{ $page->aktivitas_deskripsi ?? 'Nikmati berbagai aktivitas wisata yang membuat kunjungan ke Pantai Pelawan lebih menyenangkan bersama keluarga, teman, maupun pasangan.' }}
                </p>
            </div>

            <div style="text-align:center; margin-bottom:25px;">
                <button type="button" onclick="openModal('modalTambahBeranda')" class="admin-view-user-btn">
                    + Tambah Aktivitas
                </button>
            </div>

            <div class="aktivitas-seru-grid">
                @forelse($aktivitas as $index => $item)
                    @php
                        $gambarAktivitas = $item->gambar
                            ? (str_starts_with($item->gambar, 'images/') ? asset($item->gambar) : asset('storage/' . $item->gambar))
                            : asset('images/profil_pantai.jpg');
                    @endphp

                    <div class="aktivitas-seru-card admin-card-action-wrap {{ $index == 0 ? 'aktivitas-large' : '' }} {{ $index == 3 ? 'aktivitas-wide' : '' }}">
                        <img src="{{ $gambarAktivitas }}" alt="{{ $item->judul }}">

                        <div class="aktivitas-seru-content">
                            <span>{{ $item->icon }} Aktivitas Wisata</span>
                            <h3><strong>{{ $item->judul }}</strong></h3>
                            <p>{{ $item->deskripsi }}</p>
                        </div>

                        @include('admin.beranda.partials.card-actions', ['item' => $item])
                    </div>
                @empty
                    <p class="text-center">Belum ada data aktivitas.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- GALERI --}}
    <section class="pp-gallery-section admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditGaleriSection')">
            ✏️ Edit Section
        </button>

        <div class="container">
            <div class="pp-gallery-grid">
                <div class="pp-gallery-text">
                    <span class="pp-section-label">
                        {{ $page->galeri_label ?? '📸 Galeri Pantai' }}
                    </span>

                    <h2>
                        {{ $page->galeri_judul ?? 'Lihat suasana Pantai Pelawan sebelum berkunjung.' }}
                    </h2>

                    <p>
                        {{ $page->galeri_deskripsi ?? 'Galeri menampilkan suasana pantai, aktivitas wisata, panorama sunset, dan beberapa sudut menarik yang dapat dinikmati pengunjung.' }}
                    </p>

                    <div class="pp-gallery-tags">
                        <span>🌅 Sunset Pantai</span>
                        <span>🚤 Aktivitas Wisata</span>
                        <span>📷 Spot Foto</span>
                    </div>

                    <a href="{{ route('galeri') }}" class="pp-green-btn">
                        Lihat Galeri <b>→</b>
                    </a>

                    <button type="button" onclick="openModal('modalTambahBeranda')" class="admin-view-user-btn" style="margin-top:16px;">
                        + Tambah Galeri
                    </button>
                </div>

                <div class="pp-gallery-images admin-gallery-edit-grid">
                    @forelse($galeri as $item)
                        @php
                            $gambarGaleri = $item->gambar
                                ? (str_starts_with($item->gambar, 'images/') ? asset($item->gambar) : asset('storage/' . $item->gambar))
                                : asset('images/hero-pantai.jpg');
                        @endphp

                        <div class="admin-gallery-card admin-card-action-wrap">
                            <img src="{{ $gambarGaleri }}" alt="{{ $item->judul }}">

                            <div class="admin-gallery-text">
                                <h3>{{ $item->judul }}</h3>
                                <p>{{ $item->deskripsi }}</p>
                            </div>

                            @include('admin.beranda.partials.card-actions', ['item' => $item])
                        </div>
                    @empty
                        <p class="text-center">Belum ada data galeri.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    {{-- KULINER DAN FASILITAS --}}
    <section class="pp-feature-section admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditFiturSection')">
            ✏️ Edit Section
        </button>

        <div class="container">
            <div class="section-heading">
                <span class="section-label">
                    {{ $page->fitur_label ?? 'Kuliner & Fasilitas' }}
                </span>

                <h2>
                    {{ $page->fitur_judul ?? 'Kuliner dan Fasilitas Pantai Pelawan' }}
                </h2>

                <p>
                    {{ $page->fitur_deskripsi ?? 'Temukan informasi kuliner dan fasilitas yang tersedia di sekitar kawasan Pantai Pelawan.' }}
                </p>
            </div>

            <div style="text-align:center; margin-bottom:25px;">
                <button type="button" onclick="openModal('modalTambahBeranda')" class="admin-view-user-btn">
                    + Tambah Kuliner/Fasilitas
                </button>
            </div>

            <div class="pp-feature-grid">
                @forelse($fitur as $item)
                    @php
                        $gambarFitur = $item->gambar
                            ? (str_starts_with($item->gambar, 'images/') ? asset($item->gambar) : asset('storage/' . $item->gambar))
                            : asset('images/profil_pantai.jpg');
                    @endphp

                    <div class="pp-feature-card admin-card-action-wrap">
                        <img src="{{ $gambarFitur }}" alt="{{ $item->judul }}">

                        <div class="pp-feature-body">
                            <span>{{ $item->icon }}</span>
                            <h3>{{ $item->judul }}</h3>
                            <p>{{ $item->deskripsi }}</p>

                            @if($item->link)
                                <a href="{{ $item->link }}">Lihat Detail →</a>
                            @endif
                        </div>

                        @include('admin.beranda.partials.card-actions', ['item' => $item])
                    </div>
                @empty
                    <p class="text-center">Belum ada data kuliner dan fasilitas.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- INFORMASI WEBSITE --}}
    <section class="section admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditInfo')">
            ✏️ Edit Informasi
        </button>

        <div class="container">
            <div class="section-heading">
                <span class="section-label">{{ $page->info_label ?? 'Informasi Website' }}</span>
                <h2>{{ $page->info_judul ?? 'Informasi yang Tersedia di Website' }}</h2>
                <p>{{ $page->info_deskripsi ?? '' }}</p>
            </div>

            <div class="home-info-photo-grid">
                @foreach($informasi as $item)
                    @php
                        $gambarInformasi = $item->gambar
                            ? (str_starts_with($item->gambar, 'images/') ? asset($item->gambar) : asset('storage/' . $item->gambar))
                            : asset('images/hero-pantai.jpg');
                    @endphp

                    <div class="home-info-photo-card admin-card-action-wrap">
                        <img src="{{ $gambarInformasi }}" alt="{{ $item->judul }}">

                        <div class="home-info-overlay"></div>

                        <div class="home-info-content">
                            <div class="home-info-icon">{{ $item->icon }}</div>
                            <h3><strong>{{ $item->judul }}</strong></h3>
                            <p>{{ $item->deskripsi }}</p>
                        </div>

                        @include('admin.beranda.partials.card-actions', ['item' => $item])
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ALUR --}}
    <section class="section section-soft admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditAlur')">
            ✏️ Edit Alur
        </button>

        <div class="container">
            <div class="section-heading">
                <span class="section-label">{{ $page->alur_label ?? 'Cara Pesan' }}</span>
                <h2>{{ $page->alur_judul ?? 'Alur Pemesanan Tiket Online' }}</h2>
                <p>{{ $page->alur_deskripsi ?? '' }}</p>
            </div>

            <div class="step-grid">
                @foreach($alur as $item)
                    <div class="step-card admin-card-action-wrap">
                        <div class="step-number">{{ $item->nomor }}</div>
                        <h3><strong>{{ $item->judul }}</strong></h3>
                        <p>{{ $item->deskripsi }}</p>

                        @include('admin.beranda.partials.card-actions', ['item' => $item])
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="section admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditCta')">
            ✏️ Edit CTA
        </button>

        <div class="container">
            <div class="home-cta">
                <div>
                    <span class="section-label label-light">{{ $page->cta_label ?? 'Ayo Berkunjung' }}</span>
                    <h2><strong>{{ $page->cta_judul ?? 'Rencanakan Kunjunganmu ke Pantai Pelawan' }}</strong></h2>
                    <p>{{ $page->cta_deskripsi ?? '' }}</p>
                </div>

                <div class="home-cta-action">
                    <a href="{{ route('tiket') }}" class="btn btn-primary">
                        {{ $page->cta_tombol_1 ?? 'Mulai Pesan Tiket' }}
                    </a>

                    <a href="{{ $page->cta_wa_link ?? '#' }}" target="_blank" class="btn btn-secondary">
                        {{ $page->cta_tombol_2 ?? 'Hubungi Pengelola' }}
                    </a>
                </div>
            </div>
        </div>
    </section>

</div>

@include('admin.beranda.partials.modal-create')

@foreach($layanan->merge($keunggulan)->merge($informasi)->merge($alur)->merge($aktivitas)->merge($galeri)->merge($fitur) as $item)
    @include('admin.beranda.partials.modal-edit', ['item' => $item])
@endforeach

{{-- MODAL HERO --}}
<div id="modalEditHero" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditHero')">&times;</span>

        <h2>Edit Hero</h2>

        <form action="{{ route('admin.beranda.page.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Hero Badge</label>
            <input type="text" name="hero_badge" value="{{ $page->hero_badge }}">

            <label>Hero Judul</label>
            <input type="text" name="hero_judul" value="{{ $page->hero_judul }}">

            <label>Hero Deskripsi</label>
            <textarea name="hero_deskripsi" rows="4">{{ $page->hero_deskripsi }}</textarea>

            <label>Tombol Hero 1</label>
            <input type="text" name="hero_tombol_1" value="{{ $page->hero_tombol_1 }}">

            <label>Tombol Hero 2</label>
            <input type="text" name="hero_tombol_2" value="{{ $page->hero_tombol_2 }}">

            <button type="submit" class="btn btn-primary">Simpan Hero</button>
        </form>
    </div>
</div>

{{-- MODAL CUACA --}}
<div id="modalEditCuaca" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditCuaca')">&times;</span>

        <h2>Edit Cuaca</h2>
        <p>
            Bagian cuaca mengambil data otomatis/manual dari halaman Informasi Pantai.
            Ubah data cuaca melalui menu Informasi Pantai.
        </p>
    </div>
</div>

{{-- MODAL TENTANG --}}
<div id="modalEditTentang" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditTentang')">&times;</span>

        <h2>Edit Tentang Pantai</h2>

        <form action="{{ route('admin.beranda.page.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Label Tentang</label>
            <input type="text" name="about_label" value="{{ $page->about_label }}">

            <label>Judul Tentang</label>
            <textarea name="about_judul" rows="4">{{ $page->about_judul }}</textarea>

            <label>Deskripsi Tentang 1</label>
            <textarea name="about_deskripsi_1" rows="4">{{ $page->about_deskripsi_1 }}</textarea>

            <label>Deskripsi Tentang 2</label>
            <textarea name="about_deskripsi_2" rows="4">{{ $page->about_deskripsi_2 }}</textarea>

            <label>Gambar Sekarang</label>
            <img src="{{ $aboutImage }}" style="width:160px;height:100px;object-fit:cover;border-radius:14px;margin-bottom:10px;">

            <label>Ubah Gambar Tentang</label>
            <input type="file" name="about_gambar" accept="image/*">

            <label>Tombol Tentang</label>
            <input type="text" name="about_tombol" value="{{ $page->about_tombol }}">

            <button type="submit" class="btn btn-primary">Simpan Tentang</button>
        </form>
    </div>
</div>

{{-- MODAL AKTIVITAS SECTION --}}
<div id="modalEditAktivitasSection" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditAktivitasSection')">&times;</span>

        <h2>Edit Section Aktivitas</h2>

        <form action="{{ route('admin.beranda.page.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label Aktivitas</label>
            <input type="text" name="aktivitas_label" value="{{ $page->aktivitas_label ?? 'Aktivitas Seru' }}">

            <label>Judul Aktivitas</label>
            <input type="text" name="aktivitas_judul" value="{{ $page->aktivitas_judul ?? 'Hal Menarik yang Bisa Dilakukan di Pantai Pelawan' }}">

            <label>Deskripsi Aktivitas</label>
            <textarea name="aktivitas_deskripsi" rows="4">{{ $page->aktivitas_deskripsi ?? 'Nikmati berbagai aktivitas wisata yang membuat kunjungan ke Pantai Pelawan lebih menyenangkan bersama keluarga, teman, maupun pasangan.' }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Aktivitas</button>
        </form>
    </div>
</div>

{{-- MODAL GALERI SECTION --}}
<div id="modalEditGaleriSection" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditGaleriSection')">&times;</span>

        <h2>Edit Section Galeri</h2>

        <form action="{{ route('admin.beranda.page.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label Galeri</label>
            <input type="text" name="galeri_label" value="{{ $page->galeri_label ?? '📸 Galeri Pantai' }}">

            <label>Judul Galeri</label>
            <input type="text" name="galeri_judul" value="{{ $page->galeri_judul ?? 'Lihat suasana Pantai Pelawan sebelum berkunjung.' }}">

            <label>Deskripsi Galeri</label>
            <textarea name="galeri_deskripsi" rows="4">{{ $page->galeri_deskripsi ?? 'Galeri menampilkan suasana pantai, aktivitas wisata, panorama sunset, dan beberapa sudut menarik yang dapat dinikmati pengunjung.' }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Galeri</button>
        </form>
    </div>
</div>

{{-- MODAL FITUR SECTION --}}
<div id="modalEditFiturSection" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditFiturSection')">&times;</span>

        <h2>Edit Section Kuliner & Fasilitas</h2>

        <form action="{{ route('admin.beranda.page.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label Section</label>
            <input type="text" name="fitur_label" value="{{ $page->fitur_label ?? 'Kuliner & Fasilitas' }}">

            <label>Judul Section</label>
            <input type="text" name="fitur_judul" value="{{ $page->fitur_judul ?? 'Kuliner dan Fasilitas Pantai Pelawan' }}">

            <label>Deskripsi Section</label>
            <textarea name="fitur_deskripsi" rows="4">{{ $page->fitur_deskripsi ?? 'Temukan informasi kuliner dan fasilitas yang tersedia di sekitar kawasan Pantai Pelawan.' }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Section</button>
        </form>
    </div>
</div>

{{-- MODAL INFORMASI --}}
<div id="modalEditInfo" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditInfo')">&times;</span>

        <h2>Edit Informasi Website</h2>

        <form action="{{ route('admin.beranda.page.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label Informasi</label>
            <input type="text" name="info_label" value="{{ $page->info_label }}">

            <label>Judul Informasi</label>
            <input type="text" name="info_judul" value="{{ $page->info_judul }}">

            <label>Deskripsi Informasi</label>
            <textarea name="info_deskripsi" rows="4">{{ $page->info_deskripsi }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Informasi</button>
        </form>
    </div>
</div>

{{-- MODAL ALUR --}}
<div id="modalEditAlur" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditAlur')">&times;</span>

        <h2>Edit Alur Pemesanan</h2>

        <form action="{{ route('admin.beranda.page.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label Alur</label>
            <input type="text" name="alur_label" value="{{ $page->alur_label }}">

            <label>Judul Alur</label>
            <input type="text" name="alur_judul" value="{{ $page->alur_judul }}">

            <label>Deskripsi Alur</label>
            <textarea name="alur_deskripsi" rows="4">{{ $page->alur_deskripsi }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Alur</button>
        </form>
    </div>
</div>

{{-- MODAL CTA --}}
<div id="modalEditCta" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditCta')">&times;</span>

        <h2>Edit CTA</h2>

        <form action="{{ route('admin.beranda.page.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label CTA</label>
            <input type="text" name="cta_label" value="{{ $page->cta_label }}">

            <label>Judul CTA</label>
            <input type="text" name="cta_judul" value="{{ $page->cta_judul }}">

            <label>Deskripsi CTA</label>
            <textarea name="cta_deskripsi" rows="4">{{ $page->cta_deskripsi }}</textarea>

            <label>Tombol CTA 1</label>
            <input type="text" name="cta_tombol_1" value="{{ $page->cta_tombol_1 }}">

            <label>Tombol CTA 2</label>
            <input type="text" name="cta_tombol_2" value="{{ $page->cta_tombol_2 }}">

            <label>Link WhatsApp CTA</label>
            <input type="text" name="cta_wa_link" value="{{ $page->cta_wa_link }}">

            <button type="submit" class="btn btn-primary">Simpan CTA</button>
        </form>
    </div>
</div>

<script>
    function openModal(id) {
        const modal = document.getElementById(id);

        if (modal) {
            document.querySelectorAll('.admin-modal').forEach(function(item) {
                item.style.display = "none";
            });

            modal.style.display = "flex";
            document.body.classList.add('modal-open');
        }
    }

    function closeModal(id) {
        const modal = document.getElementById(id);

        if (modal) {
            modal.style.display = "none";
            document.body.classList.remove('modal-open');
        }
    }

    window.onclick = function(event) {
        document.querySelectorAll('.admin-modal').forEach(function(modal) {
            if (event.target === modal) {
                modal.style.display = "none";
                document.body.classList.remove('modal-open');
            }
        });
    };

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            document.querySelectorAll('.admin-modal').forEach(function(modal) {
                modal.style.display = "none";
            });

            document.body.classList.remove('modal-open');
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const savedScroll = sessionStorage.getItem('berandaAdminScrollY');

        if (savedScroll !== null) {
            window.scrollTo(0, parseInt(savedScroll));
            sessionStorage.removeItem('berandaAdminScrollY');
        }

        document.querySelectorAll('form').forEach(function(form) {
            form.addEventListener('submit', function() {
                sessionStorage.setItem('berandaAdminScrollY', window.scrollY);
            });
        });
    });
</script>

@endsection