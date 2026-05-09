@extends('admin.layouts.app')

@section('title', 'Kelola Profil Pantai')

@section('content')

@php
    $image = $profil && $profil->gambar
        ? (str_starts_with($profil->gambar, 'images/') ? asset($profil->gambar) : asset('storage/' . $profil->gambar))
        : asset('images/profil_pantai.jpg');

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
            <p>Tampilan di bawah sama seperti halaman user. Admin bisa mengubah konten tanpa edit coding.</p>
        </div>

        <div style="display:flex; gap:10px; flex-wrap:wrap;">
            <a href="{{ route('profil.pantai') }}" target="_blank" class="admin-view-user-btn">
                Lihat User
            </a>

            <button onclick="openModal('modalEditProfil')" class="admin-view-user-btn">
                ✏️ Edit Profil
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="admin-alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditProfil')">
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

    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditProfil')">
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

                <p>{{ $profil->tentang_paragraf_1 ?? '' }}</p>
                <p>{{ $profil->tentang_paragraf_2 ?? '' }}</p>
                <p>{{ $profil->tentang_paragraf_3 ?? '' }}</p>
            </div>
        </div>
    </div>

    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditProfil')">
            ✏️ Edit Gambaran Umum
        </button>

        <section class="section section-soft">
            <div class="container">
                <div class="section-heading">
                    <span class="section-label">
                        {{ $profil->gambaran_label ?? 'Identitas Pantai' }}
                    </span>

                    <h2>
                        <strong>{{ $profil->gambaran_judul ?? 'Gambaran Umum Pantai Pelawan' }}</strong>
                    </h2>

                    <p>{{ $profil->gambaran_deskripsi ?? '' }}</p>
                </div>

                <div class="profil-overview-grid">
                    <div class="overview-card">
                        <div class="overview-icon">📍</div>
                        <h3><strong>{{ $profil->lokasi_judul ?? 'Lokasi Pantai' }}</strong></h3>
                        <p>{{ $profil->lokasi_deskripsi ?? '' }}</p>
                    </div>

                    <div class="overview-card">
                        <div class="overview-icon">🏖️</div>
                        <h3><strong>{{ $profil->karakter_destinasi_judul ?? 'Karakter Destinasi' }}</strong></h3>
                        <p>{{ $profil->karakter_destinasi_deskripsi ?? '' }}</p>
                    </div>

                    <div class="overview-card">
                        <div class="overview-icon">🌿</div>
                        <h3><strong>{{ $profil->nilai_alam_judul ?? 'Nilai Alam' }}</strong></h3>
                        <p>{{ $profil->nilai_alam_deskripsi ?? '' }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditProfil')">
            ✏️ Edit Perkembangan
        </button>

        <section class="section">
            <div class="container">
                <div class="profil-grid profil-hero-box profil-story-new">

                    <div class="profil-image">
                        <img src="{{ $image }}" alt="Perkembangan Pantai Pelawan">
                    </div>

                    <div class="profil-text">
                        <div class="mini-title">
                            {{ $profil->perkembangan_label ?? 'Perkembangan' }}
                        </div>

                        <h2>
                            <strong>{{ $profil->perkembangan_judul ?? 'Perkembangan Pantai Pelawan' }}</strong>
                        </h2>

                        <p>{{ $profil->perkembangan_paragraf_1 ?? '' }}</p>
                        <p>{{ $profil->perkembangan_paragraf_2 ?? '' }}</p>
                        <p>{{ $profil->perkembangan_paragraf_3 ?? '' }}</p>
                    </div>

                </div>
            </div>
        </section>
    </div>

    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditProfil')">
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

                        <div class="profil-card-item">
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
                        </div>
                    @endfor

                </div>
            </div>
        </section>
    </div>

    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditProfil')">
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

                    <p>{{ $profil->visi_misi_deskripsi ?? '' }}</p>
                </div>

                <div class="vm-grid">
                    <div class="vm-card">
                        <div class="vm-badge">Visi</div>
                        <h3><strong>{{ $profil->visi_judul ?? 'Menjadi Destinasi Wisata Unggulan' }}</strong></h3>
                        <p>{{ $profil->visi_deskripsi ?? '' }}</p>
                    </div>

                    <div class="vm-card">
                        <div class="vm-badge">Misi</div>
                        <h3><strong>{{ $profil->misi_judul ?? 'Mendukung Pengenalan Profil Wisata' }}</strong></h3>
                        <p>{{ $profil->misi_deskripsi ?? '' }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditProfil')">
            ✏️ Edit CTA
        </button>

        <section class="section">
            <div class="container">
                <div class="profil-cta">
                    <h2>
                        <strong>{{ $profil->cta_judul ?? 'Kenali Pantai Pelawan Lebih Dekat' }}</strong>
                    </h2>

                    <p>{{ $profil->cta_deskripsi ?? '' }}</p>

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

{{-- MODAL EDIT PROFIL --}}
<div id="modalEditProfil" class="admin-modal">
    <div class="admin-modal-box">

        <span class="admin-close" onclick="closeModal('modalEditProfil')">&times;</span>

        <h2>Edit Konten Profil Pantai</h2>

        <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Judul Hero</label>
            <input type="text" name="hero_judul" value="{{ $profil->hero_judul }}">

            <label>Subjudul Hero</label>
            <textarea name="hero_subjudul" rows="3">{{ $profil->hero_subjudul }}</textarea>

            <hr style="margin:22px 0;">

            <label>Label Tentang</label>
            <input type="text" name="tentang_label" value="{{ $profil->tentang_label }}">

            <label>Judul Tentang</label>
            <input type="text" name="tentang_judul" value="{{ $profil->tentang_judul }}">

            <label>Paragraf Tentang 1</label>
            <textarea name="tentang_paragraf_1" rows="4">{{ $profil->tentang_paragraf_1 }}</textarea>

            <label>Paragraf Tentang 2</label>
            <textarea name="tentang_paragraf_2" rows="4">{{ $profil->tentang_paragraf_2 }}</textarea>

            <label>Paragraf Tentang 3</label>
            <textarea name="tentang_paragraf_3" rows="4">{{ $profil->tentang_paragraf_3 }}</textarea>

            <hr style="margin:22px 0;">

            <label>Label Gambaran</label>
            <input type="text" name="gambaran_label" value="{{ $profil->gambaran_label }}">

            <label>Judul Gambaran</label>
            <input type="text" name="gambaran_judul" value="{{ $profil->gambaran_judul }}">

            <label>Deskripsi Gambaran</label>
            <textarea name="gambaran_deskripsi" rows="4">{{ $profil->gambaran_deskripsi }}</textarea>

            <label>Judul Lokasi</label>
            <input type="text" name="lokasi_judul" value="{{ $profil->lokasi_judul }}">

            <label>Deskripsi Lokasi</label>
            <textarea name="lokasi_deskripsi" rows="4">{{ $profil->lokasi_deskripsi }}</textarea>

            <label>Judul Karakter Destinasi</label>
            <input type="text" name="karakter_destinasi_judul" value="{{ $profil->karakter_destinasi_judul }}">

            <label>Deskripsi Karakter Destinasi</label>
            <textarea name="karakter_destinasi_deskripsi" rows="4">{{ $profil->karakter_destinasi_deskripsi }}</textarea>

            <label>Judul Nilai Alam</label>
            <input type="text" name="nilai_alam_judul" value="{{ $profil->nilai_alam_judul }}">

            <label>Deskripsi Nilai Alam</label>
            <textarea name="nilai_alam_deskripsi" rows="4">{{ $profil->nilai_alam_deskripsi }}</textarea>

            <hr style="margin:22px 0;">

            <label>Gambar Saat Ini</label>
            <img src="{{ $image }}" style="width:100%; height:220px; object-fit:cover; border-radius:16px; margin-bottom:12px;">

            <label>Ubah Gambar</label>
            <input type="file" name="gambar">

            <label>Label Perkembangan</label>
            <input type="text" name="perkembangan_label" value="{{ $profil->perkembangan_label }}">

            <label>Judul Perkembangan</label>
            <input type="text" name="perkembangan_judul" value="{{ $profil->perkembangan_judul }}">

            <label>Paragraf Perkembangan 1</label>
            <textarea name="perkembangan_paragraf_1" rows="4">{{ $profil->perkembangan_paragraf_1 }}</textarea>

            <label>Paragraf Perkembangan 2</label>
            <textarea name="perkembangan_paragraf_2" rows="4">{{ $profil->perkembangan_paragraf_2 }}</textarea>

            <label>Paragraf Perkembangan 3</label>
            <textarea name="perkembangan_paragraf_3" rows="4">{{ $profil->perkembangan_paragraf_3 }}</textarea>

            <hr style="margin:22px 0;">

            <label>Label Karakteristik</label>
            <input type="text" name="karakteristik_label" value="{{ $profil->karakteristik_label }}">

            <label>Judul Karakteristik</label>
            <input type="text" name="karakteristik_judul" value="{{ $profil->karakteristik_judul }}">

            <label>Deskripsi Karakteristik</label>
            <textarea name="karakteristik_deskripsi" rows="4">{{ $profil->karakteristik_deskripsi }}</textarea>

            @for($i = 1; $i <= 4; $i++)
                @php
                    $iconField = 'karakter_'.$i.'_icon';
                    $judulField = 'karakter_'.$i.'_judul';
                    $deskripsiField = 'karakter_'.$i.'_deskripsi';
                @endphp

                <h3 style="margin-top:20px; color:#14532d;">Card Karakteristik {{ $i }}</h3>

                <label>Icon Card {{ $i }}</label>
                <input type="text" name="karakter_{{ $i }}_icon" value="{{ !empty($profil->$iconField) ? $profil->$iconField : $defaultIcons[$i - 1] }}">

                <label>Judul Card {{ $i }}</label>
                <input type="text" name="karakter_{{ $i }}_judul" value="{{ !empty($profil->$judulField) ? $profil->$judulField : $defaultJudul[$i - 1] }}">

                <label>Deskripsi Card {{ $i }}</label>
                <textarea name="karakter_{{ $i }}_deskripsi" rows="4">{{ !empty($profil->$deskripsiField) ? $profil->$deskripsiField : $defaultDeskripsi[$i - 1] }}</textarea>
            @endfor

            <hr style="margin:22px 0;">

            <label>Label Visi Misi</label>
            <input type="text" name="visi_misi_label" value="{{ $profil->visi_misi_label }}">

            <label>Judul Visi Misi</label>
            <input type="text" name="visi_misi_judul" value="{{ $profil->visi_misi_judul }}">

            <label>Deskripsi Visi Misi</label>
            <textarea name="visi_misi_deskripsi" rows="4">{{ $profil->visi_misi_deskripsi }}</textarea>

            <label>Judul Visi</label>
            <input type="text" name="visi_judul" value="{{ $profil->visi_judul }}">

            <label>Deskripsi Visi</label>
            <textarea name="visi_deskripsi" rows="4">{{ $profil->visi_deskripsi }}</textarea>

            <label>Judul Misi</label>
            <input type="text" name="misi_judul" value="{{ $profil->misi_judul }}">

            <label>Deskripsi Misi</label>
            <textarea name="misi_deskripsi" rows="4">{{ $profil->misi_deskripsi }}</textarea>

            <hr style="margin:22px 0;">

            <label>Judul CTA</label>
            <input type="text" name="cta_judul" value="{{ $profil->cta_judul }}">

            <label>Deskripsi CTA</label>
            <textarea name="cta_deskripsi" rows="4">{{ $profil->cta_deskripsi }}</textarea>

            <label>Teks Tombol 1</label>
            <input type="text" name="cta_tombol_1" value="{{ $profil->cta_tombol_1 }}">

            <label>Teks Tombol 2</label>
            <input type="text" name="cta_tombol_2" value="{{ $profil->cta_tombol_2 }}">

            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>
        </form>

    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).style.display = "flex";
    }

    function closeModal(id) {
        document.getElementById(id).style.display = "none";
    }

    window.onclick = function(event) {
        document.querySelectorAll('.admin-modal').forEach(modal => {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });
    }
</script>



@endsection