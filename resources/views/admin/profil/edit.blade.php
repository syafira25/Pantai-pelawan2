@extends('admin.layouts.app')

@section('title', 'Kelola Profil Pantai')

@section('content')

@php
    $heroJudul = $profil->hero_judul ?? 'Profil Pantai Pelawan';
    $heroSubjudul = $profil->hero_subjudul ?? 'Destinasi wisata alam di Kabupaten Karimun';

    $tentangLabel = $profil->tentang_label ?? 'Tentang Pantai Pelawan';
    $tentangJudul = $profil->tentang_judul ?? 'Pantai Pelawan sebagai Destinasi Wisata Alam';
    $tentangParagraf1 = $profil->tentang_paragraf_1 ?? 'Pantai Pelawan merupakan salah satu wisata pantai yang berada di Kabupaten Karimun, Kepulauan Riau. Pantai ini dikenal sebagai destinasi wisata alam dengan pemandangan laut, hamparan pasir, serta suasana pesisir yang nyaman untuk dikunjungi.';
    $tentangParagraf2 = $profil->tentang_paragraf_2 ?? 'Keindahan Pantai Pelawan menjadi daya tarik bagi wisatawan yang ingin menikmati suasana alam, bersantai bersama keluarga, maupun sekadar menikmati panorama pantai.';
    $tentangParagraf3 = $profil->tentang_paragraf_3 ?? 'Selain sebagai tempat rekreasi, Pantai Pelawan juga menjadi bagian dari potensi pariwisata daerah yang dapat terus dikembangkan melalui penyajian informasi yang lebih lengkap, rapi, dan mudah diakses oleh wisatawan.';

    $gambaranJudul = $profil->gambaran_judul ?? 'Gambaran Umum Pantai Pelawan';
    $gambaranDeskripsi = $profil->gambaran_deskripsi ?? 'Profil Pantai Pelawan disajikan untuk memberikan gambaran mengenai lokasi, karakter wisata, dan nilai destinasi yang dimiliki.';

    $lokasiJudul = $profil->lokasi_judul ?? 'Lokasi Pantai';
    $lokasiDeskripsi = $profil->lokasi_deskripsi ?? 'Pantai Pelawan berada di kawasan wisata alam yang dikenal masyarakat sekitar sebagai tempat rekreasi dan menikmati suasana pantai.';

    $karakterDestinasiJudul = $profil->karakter_destinasi_judul ?? 'Karakter Destinasi';
    $karakterDestinasiDeskripsi = $profil->karakter_destinasi_deskripsi ?? 'Pantai ini memiliki karakter wisata alam berupa pemandangan laut, suasana pesisir, dan lingkungan yang nyaman.';

    $nilaiAlamJudul = $profil->nilai_alam_judul ?? 'Nilai Alam';
    $nilaiAlamDeskripsi = $profil->nilai_alam_deskripsi ?? 'Keindahan alam Pantai Pelawan menjadi nilai utama yang dapat dikenalkan kepada wisatawan.';

    $perkembanganJudul = $profil->perkembangan_judul ?? 'Perkembangan Pantai Pelawan';
    $perkembanganParagraf1 = $profil->perkembangan_paragraf_1 ?? 'Pantai Pelawan mulai dikenal sebagai salah satu tujuan wisata masyarakat karena memiliki suasana alam yang menarik dan cocok untuk kegiatan rekreasi.';
    $perkembanganParagraf2 = $profil->perkembangan_paragraf_2 ?? 'Seiring meningkatnya minat masyarakat terhadap wisata lokal, Pantai Pelawan menjadi salah satu destinasi yang memiliki peluang untuk dipromosikan secara lebih luas.';
    $perkembanganParagraf3 = $profil->perkembangan_paragraf_3 ?? 'Penyajian profil Pantai Pelawan melalui website menjadi salah satu cara untuk memperkenalkan identitas destinasi secara lebih rapi, modern, dan mudah diakses oleh masyarakat.';

    $karakteristikJudul = $profil->karakteristik_judul ?? 'Karakteristik Pantai Pelawan';
    $karakteristikDeskripsi = $profil->karakteristik_deskripsi ?? 'Karakteristik ini menggambarkan ciri khas Pantai Pelawan sebagai destinasi wisata alam.';

    $visiJudul = $profil->visi_judul ?? 'Menjadi Destinasi Wisata Unggulan';
    $visiDeskripsi = $profil->visi_deskripsi ?? 'Menjadikan Pantai Pelawan sebagai destinasi wisata alam yang unggul, informatif, ramah pengunjung, serta mudah dikenal oleh masyarakat melalui penyajian profil dan informasi wisata berbasis web.';

    $misiJudul = $profil->misi_judul ?? 'Mendukung Pengenalan Profil Wisata';
    $misiDeskripsi = $profil->misi_deskripsi ?? 'Menyajikan profil Pantai Pelawan secara lengkap, memperkenalkan potensi wisata daerah, membantu wisatawan memahami karakter destinasi, dan mendukung promosi wisata secara digital.';

    $ctaJudul = $profil->cta_judul ?? 'Kenali Pantai Pelawan Lebih Dekat';
    $ctaDeskripsi = $profil->cta_deskripsi ?? 'Pantai Pelawan memiliki potensi wisata alam yang menarik untuk diperkenalkan lebih luas. Melalui profil digital ini, wisatawan dapat memahami gambaran umum, karakteristik, dan nilai destinasi Pantai Pelawan.';

    $gambarProfil = $profil && $profil->gambar
        ? asset($profil->gambar)
        : asset('images/profil_pantai.jpg');
@endphp

<div class="admin-user-preview-page">

    <div class="admin-floating-title">
        <div>
            <h1>Kelola Profil Pantai</h1>
            <p>Tampilan di bawah ini dibuat seperti halaman user. Klik tombol edit pada bagian yang ingin diubah.</p>
        </div>

        <a href="{{ route('profil.pantai') }}" target="_blank" class="admin-view-user-btn">
            Lihat Halaman User
        </a>
    </div>

    @if(session('success'))
        <div class="admin-alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- HERO --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalHero')">
            ✏️ Edit Hero
        </button>

        <section class="page-hero page-hero-fasilitas admin-preview-hero">
            <div class="page-hero-overlay">
                <div class="container">
                    <div class="page-hero-content">
                        <h1>{{ $heroJudul }}</h1>
                        <p>{{ $heroSubjudul }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- TENTANG --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalTentang')">
            ✏️ Edit Tentang
        </button>

        <div class="profil-about-box profil-about-premium">
            <div class="profil-about-decor"></div>

            <div class="profil-about-side">
                <div class="profil-about-icon">🏝️</div>
                <span>Profil Wisata</span>
            </div>

            <div class="profil-about-content">
                <div class="profil-about-label">{{ $tentangLabel }}</div>

                <h3>{{ $tentangJudul }}</h3>

                <p>{{ $tentangParagraf1 }}</p>
                <p>{{ $tentangParagraf2 }}</p>
                <p>{{ $tentangParagraf3 }}</p>
            </div>
        </div>
    </div>

    {{-- GAMBARAN UMUM --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalGambaran')">
            ✏️ Edit Gambaran Umum
        </button>

        <section class="section section-soft">
            <div class="container">
                <div class="section-heading">
                    <span class="section-label">Identitas Pantai</span>
                    <h2><strong>{{ $gambaranJudul }}</strong></h2>
                    <p>{{ $gambaranDeskripsi }}</p>
                </div>

                <div class="profil-overview-grid">
                    <div class="overview-card">
                        <div class="overview-icon">📍</div>
                        <h3><strong>{{ $lokasiJudul }}</strong></h3>
                        <p>{{ $lokasiDeskripsi }}</p>
                    </div>

                    <div class="overview-card">
                        <div class="overview-icon">🏖️</div>
                        <h3><strong>{{ $karakterDestinasiJudul }}</strong></h3>
                        <p>{{ $karakterDestinasiDeskripsi }}</p>
                    </div>

                    <div class="overview-card">
                        <div class="overview-icon">🌿</div>
                        <h3><strong>{{ $nilaiAlamJudul }}</strong></h3>
                        <p>{{ $nilaiAlamDeskripsi }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- PERKEMBANGAN --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalPerkembangan')">
            ✏️ Edit Perkembangan
        </button>

        <section class="section">
            <div class="container">
                <div class="profil-grid profil-hero-box profil-story-new">

                    <div class="profil-image">
                        <img src="{{ $gambarProfil }}" alt="Perkembangan Pantai Pelawan">
                    </div>

                    <div class="profil-text">
                        <div class="mini-title">Perkembangan</div>

                        <h2><strong>{{ $perkembanganJudul }}</strong></h2>

                        <p>{{ $perkembanganParagraf1 }}</p>
                        <p>{{ $perkembanganParagraf2 }}</p>
                        <p>{{ $perkembanganParagraf3 }}</p>
                    </div>

                </div>
            </div>
        </section>
    </div>

    {{-- KARAKTERISTIK --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalKarakteristik')">
            ✏️ Edit Karakteristik
        </button>

        <section class="section section-soft">
            <div class="container">
                <div class="section-heading">
                    <span class="section-label">Karakteristik</span>
                    <h2><strong>{{ $karakteristikJudul }}</strong></h2>
                    <p>{{ $karakteristikDeskripsi }}</p>
                </div>

                <div class="profil-card-grid">
                    @for($i = 1; $i <= 4; $i++)
                        @php
                            $judulField = 'karakter_'.$i.'_judul';
                            $deskField = 'karakter_'.$i.'_deskripsi';

                            $icons = ['🌊', '🌤️', '🏝️', '📸'];
                            $defaultJudul = ['Pemandangan Laut', 'Suasana Tenang', 'Nuansa Pesisir', 'Daya Tarik Visual'];
                            $defaultDesk = [
                                'Pantai Pelawan memiliki pemandangan laut yang menjadi daya tarik utama bagi wisatawan.',
                                'Suasana pantai yang nyaman membuat Pantai Pelawan cocok untuk melepas penat dan menikmati waktu santai.',
                                'Lingkungan pesisir memberikan pengalaman wisata alam yang berbeda dan menjadi identitas khas Pantai Pelawan.',
                                'Keindahan alam pantai dapat menjadi daya tarik visual yang mendukung dokumentasi dan promosi wisata.'
                            ];
                        @endphp

                        <div class="profil-card-item">
                            <div class="profil-card-icon">{{ $icons[$i-1] }}</div>
                            <h3><strong>{{ $profil->$judulField ?? $defaultJudul[$i-1] }}</strong></h3>
                            <p>{{ $profil->$deskField ?? $defaultDesk[$i-1] }}</p>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
    </div>

    {{-- VISI MISI --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalVisiMisi')">
            ✏️ Edit Visi Misi
        </button>

        <section class="section section-soft">
            <div class="container">
                <div class="section-heading">
                    <span class="section-label">Arah Pengembangan</span>
                    <h2><strong>Visi dan Misi Pantai Pelawan</strong></h2>
                    <p>
                        Visi dan misi disusun untuk menggambarkan arah pengembangan Pantai Pelawan sebagai destinasi
                        wisata yang informatif, menarik, dan mudah dijangkau melalui media digital.
                    </p>
                </div>

                <div class="vm-grid">
                    <div class="vm-card">
                        <div class="vm-badge">Visi</div>
                        <h3><strong>{{ $visiJudul }}</strong></h3>
                        <p>{{ $visiDeskripsi }}</p>
                    </div>

                    <div class="vm-card">
                        <div class="vm-badge">Misi</div>
                        <h3><strong>{{ $misiJudul }}</strong></h3>
                        <p>{{ $misiDeskripsi }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- CTA --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalCta')">
            ✏️ Edit CTA
        </button>

        <section class="section">
            <div class="container">
                <div class="profil-cta">
                    <h2><strong>{{ $ctaJudul }}</strong></h2>
                    <p>{{ $ctaDeskripsi }}</p>

                    <div class="profil-cta-actions">
                        <a href="#" class="btn btn-secondary">Lihat Informasi Pantai</a>
                        <a href="#" class="btn btn-primary">Pesan Tiket Sekarang</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>

{{-- MODAL HERO --}}
<div class="admin-modal" id="modalHero">
    <div class="admin-modal-box">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalHero')">×</button>

        <h2>Edit Hero Profil</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label>Judul Hero</label>
                <input type="text" name="hero_judul" value="{{ old('hero_judul', $heroJudul) }}">
            </div>

            <div class="admin-form-group">
                <label>Subjudul Hero</label>
                <input type="text" name="hero_subjudul" value="{{ old('hero_subjudul', $heroSubjudul) }}">
            </div>

            <button type="submit" class="btn-admin-save">Simpan Hero</button>
        </form>
    </div>
</div>

{{-- MODAL TENTANG --}}
<div class="admin-modal" id="modalTentang">
    <div class="admin-modal-box modal-large">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalTentang')">×</button>

        <h2>Edit Tentang Pantai</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-grid">
                <div class="admin-form-group">
                    <label>Label</label>
                    <input type="text" name="tentang_label" value="{{ old('tentang_label', $tentangLabel) }}">
                </div>

                <div class="admin-form-group">
                    <label>Judul</label>
                    <input type="text" name="tentang_judul" value="{{ old('tentang_judul', $tentangJudul) }}">
                </div>

                <div class="admin-form-group full">
                    <label>Paragraf 1</label>
                    <textarea name="tentang_paragraf_1" rows="4">{{ old('tentang_paragraf_1', $tentangParagraf1) }}</textarea>
                </div>

                <div class="admin-form-group full">
                    <label>Paragraf 2</label>
                    <textarea name="tentang_paragraf_2" rows="4">{{ old('tentang_paragraf_2', $tentangParagraf2) }}</textarea>
                </div>

                <div class="admin-form-group full">
                    <label>Paragraf 3</label>
                    <textarea name="tentang_paragraf_3" rows="4">{{ old('tentang_paragraf_3', $tentangParagraf3) }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn-admin-save">Simpan Tentang</button>
        </form>
    </div>
</div>

{{-- MODAL GAMBARAN --}}
<div class="admin-modal" id="modalGambaran">
    <div class="admin-modal-box modal-large">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalGambaran')">×</button>

        <h2>Edit Gambaran Umum</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-grid">
                <div class="admin-form-group">
                    <label>Judul Section</label>
                    <input type="text" name="gambaran_judul" value="{{ old('gambaran_judul', $gambaranJudul) }}">
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi Section</label>
                    <textarea name="gambaran_deskripsi" rows="3">{{ old('gambaran_deskripsi', $gambaranDeskripsi) }}</textarea>
                </div>

                <div class="admin-form-group">
                    <label>Judul Card Lokasi</label>
                    <input type="text" name="lokasi_judul" value="{{ old('lokasi_judul', $lokasiJudul) }}">
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi Card Lokasi</label>
                    <textarea name="lokasi_deskripsi" rows="3">{{ old('lokasi_deskripsi', $lokasiDeskripsi) }}</textarea>
                </div>

                <div class="admin-form-group">
                    <label>Judul Card Karakter</label>
                    <input type="text" name="karakter_destinasi_judul" value="{{ old('karakter_destinasi_judul', $karakterDestinasiJudul) }}">
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi Card Karakter</label>
                    <textarea name="karakter_destinasi_deskripsi" rows="3">{{ old('karakter_destinasi_deskripsi', $karakterDestinasiDeskripsi) }}</textarea>
                </div>

                <div class="admin-form-group">
                    <label>Judul Card Nilai Alam</label>
                    <input type="text" name="nilai_alam_judul" value="{{ old('nilai_alam_judul', $nilaiAlamJudul) }}">
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi Card Nilai Alam</label>
                    <textarea name="nilai_alam_deskripsi" rows="3">{{ old('nilai_alam_deskripsi', $nilaiAlamDeskripsi) }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn-admin-save">Simpan Gambaran Umum</button>
        </form>
    </div>
</div>

{{-- MODAL PERKEMBANGAN --}}
<div class="admin-modal" id="modalPerkembangan">
    <div class="admin-modal-box modal-large">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalPerkembangan')">×</button>

        <h2>Edit Perkembangan</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="admin-form-grid">
                <div class="admin-form-group">
                    <label>Judul Perkembangan</label>
                    <input type="text" name="perkembangan_judul" value="{{ old('perkembangan_judul', $perkembanganJudul) }}">
                </div>

                <div class="admin-form-group">
                    <label>Ganti Gambar</label>
                    <input type="file" name="gambar" accept="image/*">
                </div>

                <div class="admin-form-group full">
                    <label>Paragraf 1</label>
                    <textarea name="perkembangan_paragraf_1" rows="3">{{ old('perkembangan_paragraf_1', $perkembanganParagraf1) }}</textarea>
                </div>

                <div class="admin-form-group full">
                    <label>Paragraf 2</label>
                    <textarea name="perkembangan_paragraf_2" rows="3">{{ old('perkembangan_paragraf_2', $perkembanganParagraf2) }}</textarea>
                </div>

                <div class="admin-form-group full">
                    <label>Paragraf 3</label>
                    <textarea name="perkembangan_paragraf_3" rows="3">{{ old('perkembangan_paragraf_3', $perkembanganParagraf3) }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn-admin-save">Simpan Perkembangan</button>
        </form>
    </div>
</div>

{{-- MODAL KARAKTERISTIK --}}
<div class="admin-modal" id="modalKarakteristik">
    <div class="admin-modal-box modal-large">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalKarakteristik')">×</button>

        <h2>Edit Karakteristik</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-grid">
                <div class="admin-form-group">
                    <label>Judul Section</label>
                    <input type="text" name="karakteristik_judul" value="{{ old('karakteristik_judul', $karakteristikJudul) }}">
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi Section</label>
                    <textarea name="karakteristik_deskripsi" rows="3">{{ old('karakteristik_deskripsi', $karakteristikDeskripsi) }}</textarea>
                </div>

                @for($i = 1; $i <= 4; $i++)
                    @php
                        $judulField = 'karakter_'.$i.'_judul';
                        $deskField = 'karakter_'.$i.'_deskripsi';
                    @endphp

                    <div class="admin-form-subtitle full">
                        <strong>Card Karakteristik {{ $i }}</strong>
                    </div>

                    <div class="admin-form-group">
                        <label>Judul Card {{ $i }}</label>
                        <input type="text" name="karakter_{{ $i }}_judul" value="{{ old('karakter_'.$i.'_judul', $profil->$judulField) }}">
                    </div>

                    <div class="admin-form-group full">
                        <label>Deskripsi Card {{ $i }}</label>
                        <textarea name="karakter_{{ $i }}_deskripsi" rows="3">{{ old('karakter_'.$i.'_deskripsi', $profil->$deskField) }}</textarea>
                    </div>
                @endfor
            </div>

            <button type="submit" class="btn-admin-save">Simpan Karakteristik</button>
        </form>
    </div>
</div>

{{-- MODAL VISI MISI --}}
<div class="admin-modal" id="modalVisiMisi">
    <div class="admin-modal-box modal-large">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalVisiMisi')">×</button>

        <h2>Edit Visi dan Misi</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-grid">
                <div class="admin-form-group">
                    <label>Judul Visi</label>
                    <input type="text" name="visi_judul" value="{{ old('visi_judul', $visiJudul) }}">
                </div>

                <div class="admin-form-group">
                    <label>Judul Misi</label>
                    <input type="text" name="misi_judul" value="{{ old('misi_judul', $misiJudul) }}">
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi Visi</label>
                    <textarea name="visi_deskripsi" rows="4">{{ old('visi_deskripsi', $visiDeskripsi) }}</textarea>
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi Misi</label>
                    <textarea name="misi_deskripsi" rows="4">{{ old('misi_deskripsi', $misiDeskripsi) }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn-admin-save">Simpan Visi Misi</button>
        </form>
    </div>
</div>

{{-- MODAL CTA --}}
<div class="admin-modal" id="modalCta">
    <div class="admin-modal-box">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalCta')">×</button>

        <h2>Edit CTA Penutup</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label>Judul CTA</label>
                <input type="text" name="cta_judul" value="{{ old('cta_judul', $ctaJudul) }}">
            </div>

            <div class="admin-form-group">
                <label>Deskripsi CTA</label>
                <textarea name="cta_deskripsi" rows="4">{{ old('cta_deskripsi', $ctaDeskripsi) }}</textarea>
            </div>

            <button type="submit" class="btn-admin-save">Simpan CTA</button>
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