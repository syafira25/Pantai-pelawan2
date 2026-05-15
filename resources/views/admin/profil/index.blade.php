@extends('admin.layouts.app')

@section('title', 'Kelola Profil Pantai')

@section('content')

@php
    $profil = $profil ?? null;

    $image = $profil && $profil->gambar
        ? (str_starts_with($profil->gambar, 'images/') ? asset($profil->gambar) : asset('storage/' . $profil->gambar))
        : asset('images/profil_pantai.jpg');

    $heroImg = asset('images/hero-pantai.jpg');

    $defaultIcons = ['🌊', '🌤️', '🏝️', '📸'];

    $defaultJudul = [
        'Pemandangan Laut',
        'Suasana Tenang',
        'Nuansa Pesisir',
        'Daya Tarik Visual'
    ];

    $defaultDeskripsi = [
        'Pantai Pelawan memiliki pemandangan laut yang menjadi daya tarik utama bagi wisatawan yang ingin menikmati suasana alam pesisir.',
        'Suasana pantai yang nyaman membuat Pantai Pelawan cocok untuk melepas penat dan menikmati waktu santai.',
        'Lingkungan pesisir memberikan pengalaman wisata alam yang berbeda dan menjadi identitas khas Pantai Pelawan.',
        'Keindahan alam pantai dapat menjadi daya tarik visual yang mendukung dokumentasi dan promosi wisata.'
    ];
@endphp

<div class="admin-user-preview-page">

    <div class="admin-floating-title">
        <div>
            <h1>Kelola Profil Pantai</h1>
            <p>Tampilan admin dibuat sama seperti halaman user. Admin bisa edit setiap bagian dari sini.</p>
        </div>

        <a href="{{ route('profil.pantai') }}" target="_blank" class="admin-view-user-btn">
            Lihat User
        </a>
    </div>

    @if(session('success'))
        <div class="admin-alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- HERO --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalHero')">
            ✏️ Edit Hero
        </button>

        <section class="page-hero page-hero-fasilitas">
            <div class="page-hero-overlay">
                <div class="container">
                    <div class="page-hero-content">
                        <h1>{{ $profil->hero_judul ?? 'Profil Pantai Pelawan' }}</h1>
                        <p>{{ $profil->hero_subjudul ?? 'Destinasi wisata alam di Kabupaten Karimun' }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- TENTANG --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalTentang')">
            ✏️ Edit Tentang
        </button>

        <div class="profil-about-box profil-about-premium">
            <div class="profil-about-decor"></div>

            <div class="profil-about-side">
                <div class="profil-about-icon">🏝️</div>
                <span>Profil Wisata</span>
            </div>

            <div class="profil-about-content">
                <div class="profil-about-label">
                    {{ $profil->tentang_label ?? 'Tentang Pantai Pelawan' }}
                </div>

                <h3>{{ $profil->tentang_judul ?? 'Pantai Pelawan sebagai Destinasi Wisata Alam' }}</h3>

                <p>{{ $profil->tentang_paragraf_1 ?? 'Pantai Pelawan merupakan salah satu wisata pantai yang berada di Kabupaten Karimun, Kepulauan Riau.' }}</p>

                <p>{{ $profil->tentang_paragraf_2 ?? 'Keindahan Pantai Pelawan menjadi daya tarik bagi wisatawan.' }}</p>

                <p>{{ $profil->tentang_paragraf_3 ?? 'Pantai Pelawan memiliki potensi untuk dikembangkan sebagai destinasi wisata daerah.' }}</p>
            </div>
        </div>
    </div>

    {{-- GAMBARAN UMUM --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalGambaranJudul')">
            ✏️ Edit Gambaran
        </button>

        <section class="section section-soft">
            <div class="container">
                <div class="section-heading">
                    <span class="section-label">{{ $profil->gambaran_label ?? 'Gambaran Umum' }}</span>

                    <h2>{{ $profil->gambaran_judul ?? 'Gambaran Umum Pantai Pelawan' }}</h2>

                    <p>
                        {{ $profil->gambaran_deskripsi ?? 'Profil Pantai Pelawan disajikan untuk memberikan gambaran mengenai lokasi, karakter wisata, dan nilai destinasi yang dimiliki.' }}
                    </p>
                </div>

                <div class="unique-premium-wrapper">

                    <div class="unique-big-card admin-card-action-wrap">
                        <h3>{{ $profil->gambaran_big_judul ?? '🌊 Pesona Pantai Pelawan yang Menenangkan' }}</h3>

                        <p>
                            {{ $profil->gambaran_big_deskripsi ?? 'Pantai Pelawan menghadirkan suasana pesisir yang nyaman dengan hamparan pantai yang indah, menjadikannya tempat ideal untuk bersantai, menikmati pemandangan laut, dan melepas penat bersama keluarga maupun teman.' }}
                        </p>

                        <button type="button" class="admin-mini-edit-btn" onclick="openModal('modalGambaranBig')">
                            ✏️ Edit
                        </button>
                    </div>

                    <div class="unique-small-grid">

                        <div class="unique-small-card admin-card-action-wrap">
                            <span>📍</span>
                            <h3>{{ $profil->lokasi_judul ?? 'Lokasi Pantai' }}</h3>
                            <p>{{ $profil->lokasi_deskripsi ?? 'Pantai Pelawan berada di kawasan wisata alam yang dikenal masyarakat sebagai destinasi rekreasi untuk menikmati suasana pantai dan keindahan pesisir.' }}</p>

                            <button type="button" class="admin-mini-edit-btn" onclick="openModal('modalLokasi')">
                                ✏️ Edit
                            </button>
                        </div>

                        <div class="unique-small-card admin-card-action-wrap">
                            <span>🏖️</span>
                            <h3>{{ $profil->karakter_destinasi_judul ?? 'Karakter Destinasi' }}</h3>
                            <p>{{ $profil->karakter_destinasi_deskripsi ?? 'Pantai Pelawan memiliki karakter wisata alam dengan panorama laut, area pesisir yang nyaman, serta suasana yang mendukung aktivitas santai bagi pengunjung.' }}</p>

                            <button type="button" class="admin-mini-edit-btn" onclick="openModal('modalKarakterDestinasi')">
                                ✏️ Edit
                            </button>
                        </div>

                        <div class="unique-small-card admin-card-action-wrap">
                            <span>🌿</span>
                            <h3>{{ $profil->nilai_alam_judul ?? 'Nilai Alam' }}</h3>
                            <p>{{ $profil->nilai_alam_deskripsi ?? 'Keindahan alam Pantai Pelawan menjadi daya tarik utama yang memberikan pengalaman wisata alami dan menyegarkan bagi wisatawan.' }}</p>

                            <button type="button" class="admin-mini-edit-btn" onclick="openModal('modalNilaiAlam')">
                                ✏️ Edit
                            </button>
                        </div>

                        <div class="unique-small-card admin-card-action-wrap">
                            <span>👨‍👩‍👧</span>
                            <h3>{{ $profil->semua_kalangan_judul ?? 'Wisata untuk Semua Kalangan' }}</h3>
                            <p>{{ $profil->semua_kalangan_deskripsi ?? 'Pantai Pelawan dapat dinikmati oleh berbagai kalangan, baik keluarga, pasangan, maupun wisatawan yang ingin menikmati suasana pantai dengan nyaman.' }}</p>

                            <button type="button" class="admin-mini-edit-btn" onclick="openModal('modalSemuaKalangan')">
                                ✏️ Edit
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- KARAKTERISTIK --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalKarakteristikJudul')">
            ✏️ Edit Karakteristik
        </button>

        <section class="section section-soft">
            <div class="container">
                <div class="section-heading">
                    <span class="section-label">
                        {{ $profil->karakteristik_label ?? 'Karakteristik' }}
                    </span>

                    <h2>
                        <strong>{{ $profil->karakteristik_judul ?? 'Karakteristik Pantai Pelawan' }}</strong>
                    </h2>

                    <p>
                        {{ $profil->karakteristik_deskripsi ?? 'Karakteristik ini menggambarkan ciri khas Pantai Pelawan sebagai destinasi wisata alam.' }}
                    </p>
                </div>

                <div class="profil-card-grid">

                    @for($i = 1; $i <= 4; $i++)
                        @php
                            $iconField = 'karakter_'.$i.'_icon';
                            $judulField = 'karakter_'.$i.'_judul';
                            $deskripsiField = 'karakter_'.$i.'_deskripsi';
                        @endphp

                        <div class="profil-card-item admin-card-action-wrap">
                            <div class="profil-card-icon">
                                {{ !empty($profil->$iconField) ? $profil->$iconField : $defaultIcons[$i - 1] }}
                            </div>

                            <h3>
                                <strong>
                                    {{ !empty($profil->$judulField) ? $profil->$judulField : $defaultJudul[$i - 1] }}
                                </strong>
                            </h3>

                            <p>
                                {{ !empty($profil->$deskripsiField) ? $profil->$deskripsiField : $defaultDeskripsi[$i - 1] }}
                            </p>

                            <button type="button" class="admin-mini-edit-btn" onclick="openModal('modalKarakter{{ $i }}')">
                                ✏️ Edit
                            </button>
                        </div>
                    @endfor

                </div>
            </div>
        </section>
    </div>

    {{-- PERKEMBANGAN --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalPerkembangan')">
            ✏️ Edit Perkembangan
        </button>

        <section class="profile-story-final-section">
            <div class="container">
                <div class="profile-story-final-grid">

                    <div class="profile-story-final-text">
                        <span class="profile-story-final-label">
                            {{ $profil->perkembangan_label ?? 'Perkembangan' }}
                        </span>

                        <h2>{{ $profil->perkembangan_judul ?? 'Perkembangan Pantai Pelawan' }}</h2>

                        <div class="profile-story-final-list">
                            <div class="profile-story-final-item">
                                <b>01</b>
                                <p>{{ $profil->perkembangan_paragraf_1 ?? 'Pantai Pelawan mulai dikenal sebagai salah satu tujuan wisata masyarakat karena memiliki suasana alam yang menarik dan cocok untuk kegiatan rekreasi.' }}</p>
                            </div>

                            <div class="profile-story-final-item">
                                <b>02</b>
                                <p>{{ $profil->perkembangan_paragraf_2 ?? 'Seiring meningkatnya minat masyarakat terhadap wisata lokal, Pantai Pelawan menjadi salah satu destinasi yang memiliki peluang untuk dipromosikan secara lebih luas.' }}</p>
                            </div>

                            <div class="profile-story-final-item">
                                <b>03</b>
                                <p>{{ $profil->perkembangan_paragraf_3 ?? 'Penyajian profil Pantai Pelawan melalui website menjadi salah satu cara untuk memperkenalkan identitas destinasi secara lebih rapi, modern, dan mudah diakses.' }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="profile-story-gallery-grid">
                        <div class="gallery-box">
                            <img src="{{ $heroImg }}" alt="Pantai Pelawan">
                        </div>

                        <div class="gallery-box">
                            <img src="{{ $image }}" alt="Pantai Pelawan">
                        </div>

                        <div class="gallery-box">
                            <img src="{{ $heroImg }}" alt="Pantai Pelawan">
                        </div>

                        <div class="gallery-box">
                            <img src="{{ $image }}" alt="Pantai Pelawan">
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

    {{-- VISI MISI --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalVisiMisiJudul')">
            ✏️ Edit Visi Misi
        </button>

        <section class="section section-soft">
            <div class="container">
                <div class="section-heading">
                    <span class="section-label">
                        {{ $profil->visi_misi_label ?? 'Arah Pengembangan' }}
                    </span>

                    <h2>
                        <strong>{{ $profil->visi_misi_judul ?? 'Visi dan Misi Pantai Pelawan' }}</strong>
                    </h2>

                    <p>
                        {{ $profil->visi_misi_deskripsi ?? 'Visi dan misi disusun untuk menggambarkan arah pengembangan Pantai Pelawan sebagai destinasi wisata yang informatif, menarik, dan mudah dijangkau melalui media digital.' }}
                    </p>
                </div>

                <div class="vm-grid">
                    <div class="vm-card admin-card-action-wrap">
                        <div class="vm-badge">Visi</div>
                        <h3><strong>{{ $profil->visi_judul ?? 'Menjadi Destinasi Wisata Unggulan' }}</strong></h3>
                        <p>{{ $profil->visi_deskripsi ?? 'Menjadikan Pantai Pelawan sebagai destinasi wisata alam yang unggul, informatif, ramah pengunjung, serta mudah dikenal oleh masyarakat melalui penyajian profil dan informasi wisata berbasis web.' }}</p>

                        <button type="button" class="admin-mini-edit-btn" onclick="openModal('modalVisi')">
                            ✏️ Edit
                        </button>
                    </div>

                    <div class="vm-card admin-card-action-wrap">
                        <div class="vm-badge">Misi</div>
                        <h3><strong>{{ $profil->misi_judul ?? 'Mendukung Pengenalan Profil Wisata' }}</strong></h3>
                        <p>{{ $profil->misi_deskripsi ?? 'Menyajikan profil Pantai Pelawan secara lengkap, memperkenalkan potensi wisata daerah, membantu wisatawan memahami karakter destinasi, dan mendukung promosi wisata secara digital.' }}</p>

                        <button type="button" class="admin-mini-edit-btn" onclick="openModal('modalMisi')">
                            ✏️ Edit
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- CTA --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalCTA')">
            ✏️ Edit CTA
        </button>

        <section class="section">
            <div class="container">
                <div class="profil-cta">
                    <h2>
                        <strong>{{ $profil->cta_judul ?? 'Kenali Pantai Pelawan Lebih Dekat' }}</strong>
                    </h2>

                    <p>
                        {{ $profil->cta_deskripsi ?? 'Pantai Pelawan memiliki potensi wisata alam yang menarik untuk diperkenalkan lebih luas. Melalui profil digital ini, wisatawan dapat memahami gambaran umum, karakteristik, dan nilai destinasi Pantai Pelawan.' }}
                    </p>

                    <div class="profil-cta-actions">
                        <a href="{{ route('informasi.pantai') }}" class="btn btn-secondary">
                            {{ $profil->cta_tombol_1 ?? 'Lihat Informasi Pantai' }}
                        </a>

                        <a href="{{ route('tiket') }}" class="btn btn-primary">
                            {{ $profil->cta_tombol_2 ?? 'Pesan Tiket Sekarang' }}
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>

{{-- MODAL HERO --}}
<div id="modalHero" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalHero')">&times;</span>

        <h2>Edit Hero</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Judul Hero</label>
            <input type="text" name="hero_judul" value="{{ old('hero_judul', $profil->hero_judul ?? 'Profil Pantai Pelawan') }}">

            <label>Subjudul Hero</label>
            <textarea name="hero_subjudul" rows="3">{{ old('hero_subjudul', $profil->hero_subjudul ?? 'Destinasi wisata alam di Kabupaten Karimun') }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL TENTANG --}}
<div id="modalTentang" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalTentang')">&times;</span>

        <h2>Edit Tentang Pantai</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label Tentang</label>
            <input type="text" name="tentang_label" value="{{ old('tentang_label', $profil->tentang_label ?? 'Tentang Pantai Pelawan') }}">

            <label>Judul Tentang</label>
            <input type="text" name="tentang_judul" value="{{ old('tentang_judul', $profil->tentang_judul ?? 'Pantai Pelawan sebagai Destinasi Wisata Alam') }}">

            <label>Paragraf Tentang 1</label>
            <textarea name="tentang_paragraf_1" rows="4">{{ old('tentang_paragraf_1', $profil->tentang_paragraf_1 ?? 'Pantai Pelawan merupakan salah satu wisata pantai yang berada di Kabupaten Karimun, Kepulauan Riau.') }}</textarea>

            <label>Paragraf Tentang 2</label>
            <textarea name="tentang_paragraf_2" rows="4">{{ old('tentang_paragraf_2', $profil->tentang_paragraf_2 ?? 'Keindahan Pantai Pelawan menjadi daya tarik bagi wisatawan.') }}</textarea>

            <label>Paragraf Tentang 3</label>
            <textarea name="tentang_paragraf_3" rows="4">{{ old('tentang_paragraf_3', $profil->tentang_paragraf_3 ?? 'Pantai Pelawan memiliki potensi untuk dikembangkan sebagai destinasi wisata daerah.') }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL GAMBARAN JUDUL --}}
<div id="modalGambaranJudul" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalGambaranJudul')">&times;</span>

        <h2>Edit Gambaran Umum</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label Gambaran</label>
            <input type="text" name="gambaran_label" value="{{ old('gambaran_label', $profil->gambaran_label ?? 'Gambaran Umum') }}">

            <label>Judul Gambaran</label>
            <input type="text" name="gambaran_judul" value="{{ old('gambaran_judul', $profil->gambaran_judul ?? 'Gambaran Umum Pantai Pelawan') }}">

            <label>Deskripsi Gambaran</label>
            <textarea name="gambaran_deskripsi" rows="4">{{ old('gambaran_deskripsi', $profil->gambaran_deskripsi ?? 'Profil Pantai Pelawan disajikan untuk memberikan gambaran mengenai lokasi, karakter wisata, dan nilai destinasi yang dimiliki.') }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL GAMBARAN BIG --}}
<div id="modalGambaranBig" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalGambaranBig')">&times;</span>

        <h2>Edit Pesona Pantai</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Judul Card Besar</label>
            <input type="text" name="gambaran_big_judul" value="{{ old('gambaran_big_judul', $profil->gambaran_big_judul ?? '🌊 Pesona Pantai Pelawan yang Menenangkan') }}">

            <label>Deskripsi Card Besar</label>
            <textarea name="gambaran_big_deskripsi" rows="4">{{ old('gambaran_big_deskripsi', $profil->gambaran_big_deskripsi ?? 'Pantai Pelawan menghadirkan suasana pesisir yang nyaman dengan hamparan pantai yang indah, menjadikannya tempat ideal untuk bersantai, menikmati pemandangan laut, dan melepas penat bersama keluarga maupun teman.') }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL LOKASI --}}
<div id="modalLokasi" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalLokasi')">&times;</span>

        <h2>Edit Lokasi Pantai</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Judul Lokasi</label>
            <input type="text" name="lokasi_judul" value="{{ old('lokasi_judul', $profil->lokasi_judul ?? 'Lokasi Pantai') }}">

            <label>Deskripsi Lokasi</label>
            <textarea name="lokasi_deskripsi" rows="4">{{ old('lokasi_deskripsi', $profil->lokasi_deskripsi ?? 'Pantai Pelawan berada di kawasan wisata alam yang dikenal masyarakat sebagai destinasi rekreasi untuk menikmati suasana pantai dan keindahan pesisir.') }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL KARAKTER DESTINASI --}}
<div id="modalKarakterDestinasi" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalKarakterDestinasi')">&times;</span>

        <h2>Edit Karakter Destinasi</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Judul Karakter Destinasi</label>
            <input type="text" name="karakter_destinasi_judul" value="{{ old('karakter_destinasi_judul', $profil->karakter_destinasi_judul ?? 'Karakter Destinasi') }}">

            <label>Deskripsi Karakter Destinasi</label>
            <textarea name="karakter_destinasi_deskripsi" rows="4">{{ old('karakter_destinasi_deskripsi', $profil->karakter_destinasi_deskripsi ?? 'Pantai Pelawan memiliki karakter wisata alam dengan panorama laut, area pesisir yang nyaman, serta suasana yang mendukung aktivitas santai bagi pengunjung.') }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL NILAI ALAM --}}
<div id="modalNilaiAlam" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalNilaiAlam')">&times;</span>

        <h2>Edit Nilai Alam</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Judul Nilai Alam</label>
            <input type="text" name="nilai_alam_judul" value="{{ old('nilai_alam_judul', $profil->nilai_alam_judul ?? 'Nilai Alam') }}">

            <label>Deskripsi Nilai Alam</label>
            <textarea name="nilai_alam_deskripsi" rows="4">{{ old('nilai_alam_deskripsi', $profil->nilai_alam_deskripsi ?? 'Keindahan alam Pantai Pelawan menjadi daya tarik utama yang memberikan pengalaman wisata alami dan menyegarkan bagi wisatawan.') }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL SEMUA KALANGAN --}}
<div id="modalSemuaKalangan" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalSemuaKalangan')">&times;</span>

        <h2>Edit Wisata Semua Kalangan</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Judul</label>
            <input type="text" name="semua_kalangan_judul" value="{{ old('semua_kalangan_judul', $profil->semua_kalangan_judul ?? 'Wisata untuk Semua Kalangan') }}">

            <label>Deskripsi</label>
            <textarea name="semua_kalangan_deskripsi" rows="4">{{ old('semua_kalangan_deskripsi', $profil->semua_kalangan_deskripsi ?? 'Pantai Pelawan dapat dinikmati oleh berbagai kalangan, baik keluarga, pasangan, maupun wisatawan yang ingin menikmati suasana pantai dengan nyaman.') }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL KARAKTERISTIK JUDUL --}}
<div id="modalKarakteristikJudul" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalKarakteristikJudul')">&times;</span>

        <h2>Edit Judul Karakteristik</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label Karakteristik</label>
            <input type="text" name="karakteristik_label" value="{{ old('karakteristik_label', $profil->karakteristik_label ?? 'Karakteristik') }}">

            <label>Judul Karakteristik</label>
            <input type="text" name="karakteristik_judul" value="{{ old('karakteristik_judul', $profil->karakteristik_judul ?? 'Karakteristik Pantai Pelawan') }}">

            <label>Deskripsi Karakteristik</label>
            <textarea name="karakteristik_deskripsi" rows="4">{{ old('karakteristik_deskripsi', $profil->karakteristik_deskripsi ?? 'Karakteristik ini menggambarkan ciri khas Pantai Pelawan sebagai destinasi wisata alam.') }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL CARD KARAKTERISTIK --}}
@for($i = 1; $i <= 4; $i++)
    @php
        $iconField = 'karakter_'.$i.'_icon';
        $judulField = 'karakter_'.$i.'_judul';
        $deskripsiField = 'karakter_'.$i.'_deskripsi';
    @endphp

    <div id="modalKarakter{{ $i }}" class="admin-modal">
        <div class="admin-modal-box">
            <span class="admin-close" onclick="closeModal('modalKarakter{{ $i }}')">&times;</span>

            <h2>Edit Card Karakteristik {{ $i }}</h2>

            <form action="{{ route('admin.profil.update') }}" method="POST">
                @csrf
                @method('PUT')

                <label>Icon Card {{ $i }}</label>
                <input type="text" name="karakter_{{ $i }}_icon" value="{{ old('karakter_'.$i.'_icon', !empty($profil->$iconField) ? $profil->$iconField : $defaultIcons[$i - 1]) }}">

                <label>Judul Card {{ $i }}</label>
                <input type="text" name="karakter_{{ $i }}_judul" value="{{ old('karakter_'.$i.'_judul', !empty($profil->$judulField) ? $profil->$judulField : $defaultJudul[$i - 1]) }}">

                <label>Deskripsi Card {{ $i }}</label>
                <textarea name="karakter_{{ $i }}_deskripsi" rows="4">{{ old('karakter_'.$i.'_deskripsi', !empty($profil->$deskripsiField) ? $profil->$deskripsiField : $defaultDeskripsi[$i - 1]) }}</textarea>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endfor

{{-- MODAL PERKEMBANGAN --}}
<div id="modalPerkembangan" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalPerkembangan')">&times;</span>

        <h2>Edit Perkembangan</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Gambar Saat Ini</label>
            <img src="{{ $image }}" style="width:100%; height:220px; object-fit:cover; border-radius:16px; margin-bottom:12px;">

            <label>Ubah Gambar</label>
            <input type="file" name="gambar" accept="image/*">

            <label>Label Perkembangan</label>
            <input type="text" name="perkembangan_label" value="{{ old('perkembangan_label', $profil->perkembangan_label ?? 'Perkembangan') }}">

            <label>Judul Perkembangan</label>
            <input type="text" name="perkembangan_judul" value="{{ old('perkembangan_judul', $profil->perkembangan_judul ?? 'Perkembangan Pantai Pelawan') }}">

            <label>Paragraf Perkembangan 1</label>
            <textarea name="perkembangan_paragraf_1" rows="4">{{ old('perkembangan_paragraf_1', $profil->perkembangan_paragraf_1 ?? 'Pantai Pelawan mulai dikenal sebagai salah satu tujuan wisata masyarakat karena memiliki suasana alam yang menarik dan cocok untuk kegiatan rekreasi.') }}</textarea>

            <label>Paragraf Perkembangan 2</label>
            <textarea name="perkembangan_paragraf_2" rows="4">{{ old('perkembangan_paragraf_2', $profil->perkembangan_paragraf_2 ?? 'Seiring meningkatnya minat masyarakat terhadap wisata lokal, Pantai Pelawan menjadi salah satu destinasi yang memiliki peluang untuk dipromosikan secara lebih luas.') }}</textarea>

            <label>Paragraf Perkembangan 3</label>
            <textarea name="perkembangan_paragraf_3" rows="4">{{ old('perkembangan_paragraf_3', $profil->perkembangan_paragraf_3 ?? 'Penyajian profil Pantai Pelawan melalui website menjadi salah satu cara untuk memperkenalkan identitas destinasi secara lebih rapi, modern, dan mudah diakses.') }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL VISI MISI JUDUL --}}
<div id="modalVisiMisiJudul" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalVisiMisiJudul')">&times;</span>

        <h2>Edit Judul Visi Misi</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label Visi Misi</label>
            <input type="text" name="visi_misi_label" value="{{ old('visi_misi_label', $profil->visi_misi_label ?? 'Arah Pengembangan') }}">

            <label>Judul Visi Misi</label>
            <input type="text" name="visi_misi_judul" value="{{ old('visi_misi_judul', $profil->visi_misi_judul ?? 'Visi dan Misi Pantai Pelawan') }}">

            <label>Deskripsi Visi Misi</label>
            <textarea name="visi_misi_deskripsi" rows="4">{{ old('visi_misi_deskripsi', $profil->visi_misi_deskripsi ?? 'Visi dan misi disusun untuk menggambarkan arah pengembangan Pantai Pelawan sebagai destinasi wisata yang informatif, menarik, dan mudah dijangkau melalui media digital.') }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL VISI --}}
<div id="modalVisi" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalVisi')">&times;</span>

        <h2>Edit Visi</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Judul Visi</label>
            <input type="text" name="visi_judul" value="{{ old('visi_judul', $profil->visi_judul ?? 'Menjadi Destinasi Wisata Unggulan') }}">

            <label>Deskripsi Visi</label>
            <textarea name="visi_deskripsi" rows="4">{{ old('visi_deskripsi', $profil->visi_deskripsi ?? 'Menjadikan Pantai Pelawan sebagai destinasi wisata alam yang unggul, informatif, ramah pengunjung, serta mudah dikenal oleh masyarakat melalui penyajian profil dan informasi wisata berbasis web.') }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL MISI --}}
<div id="modalMisi" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalMisi')">&times;</span>

        <h2>Edit Misi</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Judul Misi</label>
            <input type="text" name="misi_judul" value="{{ old('misi_judul', $profil->misi_judul ?? 'Mendukung Pengenalan Profil Wisata') }}">

            <label>Deskripsi Misi</label>
            <textarea name="misi_deskripsi" rows="4">{{ old('misi_deskripsi', $profil->misi_deskripsi ?? 'Menyajikan profil Pantai Pelawan secara lengkap, memperkenalkan potensi wisata daerah, membantu wisatawan memahami karakter destinasi, dan mendukung promosi wisata secara digital.') }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL CTA --}}
<div id="modalCTA" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalCTA')">&times;</span>

        <h2>Edit CTA</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Judul CTA</label>
            <input type="text" name="cta_judul" value="{{ old('cta_judul', $profil->cta_judul ?? 'Kenali Pantai Pelawan Lebih Dekat') }}">

            <label>Deskripsi CTA</label>
            <textarea name="cta_deskripsi" rows="4">{{ old('cta_deskripsi', $profil->cta_deskripsi ?? 'Pantai Pelawan memiliki potensi wisata alam yang menarik untuk diperkenalkan lebih luas. Melalui profil digital ini, wisatawan dapat memahami gambaran umum, karakteristik, dan nilai destinasi Pantai Pelawan.') }}</textarea>

            <label>Teks Tombol 1</label>
            <input type="text" name="cta_tombol_1" value="{{ old('cta_tombol_1', $profil->cta_tombol_1 ?? 'Lihat Informasi Pantai') }}">

            <label>Teks Tombol 2</label>
            <input type="text" name="cta_tombol_2" value="{{ old('cta_tombol_2', $profil->cta_tombol_2 ?? 'Pesan Tiket Sekarang') }}">

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
        }
    }

    function closeModal(id) {
        const modal = document.getElementById(id);

        if (modal) {
            modal.style.display = "none";
        }
    }

    window.onclick = function(event) {
        document.querySelectorAll('.admin-modal').forEach(function(modal) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    };

    document.querySelectorAll('form').forEach(function(form) {
        form.addEventListener('submit', function() {
            localStorage.setItem('profilAdminScrollY', window.scrollY);
        });
    });

    window.addEventListener('load', function() {
        const scrollY = localStorage.getItem('profilAdminScrollY');

        if (scrollY !== null) {
            window.scrollTo(0, parseInt(scrollY));

            localStorage.removeItem('profilAdminScrollY');
        }
    });
</script>

@endsection