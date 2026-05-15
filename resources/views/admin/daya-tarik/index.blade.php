@extends('admin.layouts.app')

@section('title', 'Kelola Daya Tarik')

@section('content')

@php
    $gambarHighlight = $dayaTarik && $dayaTarik->highlight_gambar
        ? (str_starts_with($dayaTarik->highlight_gambar, 'images/')
            ? asset($dayaTarik->highlight_gambar)
            : asset('storage/' . $dayaTarik->highlight_gambar))
        : asset('images/profil_pantai.jpg');
@endphp

<div class="admin-user-preview-page">

    <div class="admin-floating-title">
        <div>
            <h1>Kelola Daya Tarik</h1>
            <p>Tampilan di bawah sama seperti halaman user. Admin dapat mengubah konten per bagian tanpa edit coding.</p>
        </div>

        <a href="{{ route('daya.tarik') }}" target="_blank" class="admin-view-user-btn">
            Lihat User
        </a>
    </div>

    @if(session('success'))
        <div class="admin-alert-success">{{ session('success') }}</div>
    @endif

    {{-- HERO --}}
    <div class="admin-editable-section">
        <button class="admin-section-edit-btn" onclick="openModal('modalEditHero')">✏️ Edit Hero</button>

        <section class="page-hero page-hero-daya-tarik">
            <div class="page-hero-overlay">
                <div class="container">
                    <div class="page-hero-content">
                        <h1>{{ $dayaTarik->hero_judul }}</h1>
                        <p>{{ $dayaTarik->hero_subjudul }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- HIGHLIGHT --}}
    <div class="admin-editable-section">
        <button class="admin-section-edit-btn" onclick="openModal('modalEditHighlight')">✏️ Edit Highlight</button>

        <section class="section section-soft">
            <div class="container">
                <div class="daya-highlight daya-highlight-upgrade">
                    <div class="daya-highlight-img">
                        <img src="{{ $gambarHighlight }}" alt="Pantai Pelawan">

                        <div class="daya-img-badge">
                            <strong>{{ $dayaTarik->highlight_badge_judul }}</strong>
                            <span>{{ $dayaTarik->highlight_badge_subjudul }}</span>
                        </div>
                    </div>

                    <div class="daya-highlight-text">
                        <span class="section-label">{{ $dayaTarik->highlight_label }}</span>
                        <h2>{{ $dayaTarik->highlight_judul }}</h2>
                        <p>{{ $dayaTarik->highlight_deskripsi }}</p>

                        <div class="daya-stats">
                            @for($i = 1; $i <= 3; $i++)
                                @php
                                    $icon = 'stat_'.$i.'_icon';
                                    $text = 'stat_'.$i.'_text';
                                    $desc = 'stat_'.$i.'_deskripsi';
                                @endphp

                                <div>
                                    <button type="button" class="btn-ulasan approve" onclick="openModal('modalEditStat{{ $i }}')">
                                        ✏️ Edit
                                    </button>

                                    <strong>{{ $dayaTarik->$icon }}</strong>
                                    <span>{{ $dayaTarik->$text }}</span>
                                    <small>{{ $dayaTarik->$desc }}</small>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- POTENSI --}}
    <div class="admin-editable-section">
        <button class="admin-section-edit-btn" onclick="openModal('modalEditPotensiJudul')">✏️ Edit Judul Potensi</button>

        <section class="section">
            <div class="container">
                <div class="section-heading">
                    <span class="section-label">{{ $dayaTarik->nilai_label }}</span>
                    <h2>{{ $dayaTarik->nilai_judul }}</h2>
                    <p>{{ $dayaTarik->nilai_deskripsi }}</p>
                </div>

                <div class="potensi-grid">
                    @for($i = 1; $i <= 4; $i++)
                        @php
                            $icon = 'potensi_'.$i.'_icon';
                            $judul = 'potensi_'.$i.'_judul';
                            $desc = 'potensi_'.$i.'_deskripsi';
                        @endphp

                        <div class="potensi-card">
                            <div>{{ $dayaTarik->$icon }}</div>
                            <h3>{{ $dayaTarik->$judul }}</h3>
                            <p>{{ $dayaTarik->$desc }}</p>

                            <button type="button" class="btn-ulasan approve" onclick="openModal('modalEditPotensi{{ $i }}')">
                                ✏️ Edit
                            </button>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
    </div>

    {{-- KEUNIKAN --}}
    <div class="admin-editable-section">
        <button class="admin-section-edit-btn" onclick="openModal('modalEditKeunikanJudul')">✏️ Edit Judul Keunikan</button>

        <section class="section section-soft">
            <div class="container">
                <div class="section-heading">
                    <span class="section-label">{{ $dayaTarik->keunikan_label }}</span>
                    <h2>{{ $dayaTarik->keunikan_judul }}</h2>
                    <p>{{ $dayaTarik->keunikan_deskripsi }}</p>
                </div>

                <div class="unique-premium-wrapper">
                    <div class="unique-big-card">
                        <button type="button" class="btn-ulasan approve" onclick="openModal('modalEditKeunikanBig')">
                            ✏️ Edit
                        </button>

                        <h3>{{ $dayaTarik->keunikan_big_judul }}</h3>
                        <p>{{ $dayaTarik->keunikan_big_deskripsi }}</p>
                    </div>

                    <div class="unique-small-grid">
                        @for($i = 1; $i <= 4; $i++)
                            @php
                                $icon = 'keunikan_'.$i.'_icon';
                                $judul = 'keunikan_'.$i.'_judul';
                                $desc = 'keunikan_'.$i.'_deskripsi';
                            @endphp

                            <div class="unique-small-card">
                                <span>{{ $dayaTarik->$icon }}</span>
                                <h3>{{ $dayaTarik->$judul }}</h3>
                                <p>{{ $dayaTarik->$desc }}</p>

                                <button type="button" class="btn-ulasan approve" onclick="openModal('modalEditKeunikan{{ $i }}')">
                                    ✏️ Edit
                                </button>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- PENGALAMAN --}}
    <div class="admin-editable-section">
        <button class="admin-section-edit-btn" onclick="openModal('modalEditPengalamanJudul')">✏️ Edit Judul Pengalaman</button>

        <section class="section daya-experience-section">
            <div class="container">
                <div class="section-heading">
                    <span class="section-label">{{ $dayaTarik->pengalaman_label }}</span>
                    <h2>{{ $dayaTarik->pengalaman_judul }}</h2>
                    <p>{{ $dayaTarik->pengalaman_deskripsi }}</p>
                </div>

                <div class="daya-experience-grid">
                    @for($i = 1; $i <= 4; $i++)
                        @php
                            $icon = 'pengalaman_'.$i.'_icon';
                            $judul = 'pengalaman_'.$i.'_judul';
                            $desc = 'pengalaman_'.$i.'_deskripsi';
                        @endphp

                        <div class="daya-experience-card">
                            <div class="daya-experience-icon">{{ $dayaTarik->$icon }}</div>
                            <h3>{{ $dayaTarik->$judul }}</h3>
                            <p>{{ $dayaTarik->$desc }}</p>

                            <button type="button" class="btn-ulasan approve" onclick="openModal('modalEditPengalaman{{ $i }}')">
                                ✏️ Edit
                            </button>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
    </div>

    {{-- KARAKTER ALAM --}}
    <div class="admin-editable-section">
        <button class="admin-section-edit-btn" onclick="openModal('modalEditAlamJudul')">✏️ Edit Judul Karakter Alam</button>

        <section class="section section-soft daya-nature-section">
            <div class="container">
                <div class="daya-nature-layout">
                    <div class="daya-nature-content">
                        <span class="section-label">{{ $dayaTarik->alam_label }}</span>
                        <h2>{{ $dayaTarik->alam_judul }}</h2>
                        <p>{{ $dayaTarik->alam_deskripsi }}</p>

                        <div class="daya-nature-list">
                            @for($i = 1; $i <= 3; $i++)
                                @php
                                    $judul = 'alam_'.$i.'_judul';
                                    $desc = 'alam_'.$i.'_deskripsi';
                                @endphp

                                <div>
                                    <strong>{{ $dayaTarik->$judul }}</strong>
                                    <span>{{ $dayaTarik->$desc }}</span>

                                    <button type="button" class="btn-ulasan approve" onclick="openModal('modalEditAlam{{ $i }}')">
                                        ✏️ Edit
                                    </button>
                                </div>
                            @endfor
                        </div>
                    </div>

                    <div class="daya-nature-visual">
                        <div class="nature-glass-card">
                            <button type="button" class="btn-ulasan approve" onclick="openModal('modalEditAlamCard')">
                                ✏️ Edit
                            </button>

                            <span>{{ $dayaTarik->alam_card_label }}</span>
                            <h3>{{ $dayaTarik->alam_card_judul }}</h3>
                            <p>{{ $dayaTarik->alam_card_deskripsi }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- ALASAN --}}
    <div class="admin-editable-section">
        <button class="admin-section-edit-btn" onclick="openModal('modalEditAlasanJudul')">✏️ Edit Judul Alasan</button>

        <section class="section daya-reason-section">
            <div class="container">
                <div class="section-heading">
                    <span class="section-label">{{ $dayaTarik->alasan_label }}</span>
                    <h2>{{ $dayaTarik->alasan_judul }}</h2>
                    <p>{{ $dayaTarik->alasan_deskripsi }}</p>
                </div>

                <div class="daya-reason-grid">
                    @for($i = 1; $i <= 3; $i++)
                        @php
                            $nomor = 'alasan_'.$i.'_nomor';
                            $judul = 'alasan_'.$i.'_judul';
                            $desc = 'alasan_'.$i.'_deskripsi';
                        @endphp

                        <div class="daya-reason-card">
                            <span>{{ $dayaTarik->$nomor }}</span>
                            <h3>{{ $dayaTarik->$judul }}</h3>
                            <p>{{ $dayaTarik->$desc }}</p>

                            <button type="button" class="btn-ulasan approve" onclick="openModal('modalEditAlasan{{ $i }}')">
                                ✏️ Edit
                            </button>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
    </div>

    {{-- CTA --}}
    <div class="admin-editable-section">
        <button class="admin-section-edit-btn" onclick="openModal('modalEditCTA')">✏️ Edit CTA</button>

        <section class="section">
            <div class="container">
                <div class="daya-cta">
                    <div>
                        <span>{{ $dayaTarik->cta_label }}</span>
                        <h2>{{ $dayaTarik->cta_judul }}</h2>
                        <p>{{ $dayaTarik->cta_deskripsi }}</p>
                    </div>

                    <a href="{{ route('kontak') }}" class="btn btn-primary">
                        {{ $dayaTarik->cta_tombol_text }}
                    </a>
                </div>
            </div>
        </section>
    </div>

</div>

{{-- MODAL HERO --}}
<div id="modalEditHero" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditHero')">&times;</span>
        <h2>Edit Hero</h2>

        <form action="{{ route('admin.daya-tarik.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Judul Hero</label>
            <input type="text" name="hero_judul" value="{{ $dayaTarik->hero_judul }}">

            <label>Subjudul Hero</label>
            <textarea name="hero_subjudul" rows="3">{{ $dayaTarik->hero_subjudul }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL HIGHLIGHT --}}
<div id="modalEditHighlight" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditHighlight')">&times;</span>
        <h2>Edit Highlight</h2>

        <form action="{{ route('admin.daya-tarik.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Gambar Highlight Saat Ini</label>
            <img src="{{ $gambarHighlight }}" style="width:100%; height:220px; object-fit:cover; border-radius:16px; margin-bottom:12px;">

            <label>Ubah Gambar Highlight</label>
            <input type="file" name="highlight_gambar" accept="image/*">

            <label>Badge Judul</label>
            <input type="text" name="highlight_badge_judul" value="{{ $dayaTarik->highlight_badge_judul }}">

            <label>Badge Subjudul</label>
            <input type="text" name="highlight_badge_subjudul" value="{{ $dayaTarik->highlight_badge_subjudul }}">

            <label>Label Highlight</label>
            <input type="text" name="highlight_label" value="{{ $dayaTarik->highlight_label }}">

            <label>Judul Highlight</label>
            <input type="text" name="highlight_judul" value="{{ $dayaTarik->highlight_judul }}">

            <label>Deskripsi Highlight</label>
            <textarea name="highlight_deskripsi" rows="4">{{ $dayaTarik->highlight_deskripsi }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL STAT --}}
@for($i = 1; $i <= 3; $i++)
    @php
        $icon = 'stat_'.$i.'_icon';
        $text = 'stat_'.$i.'_text';
        $desc = 'stat_'.$i.'_deskripsi';
    @endphp

    <div id="modalEditStat{{ $i }}" class="admin-modal">
        <div class="admin-modal-box">
            <span class="admin-close" onclick="closeModal('modalEditStat{{ $i }}')">&times;</span>
            <h2>Edit Statistik {{ $i }}</h2>

            <form action="{{ route('admin.daya-tarik.update') }}" method="POST">
                @csrf
                @method('PUT')

                <label>Icon Statistik {{ $i }}</label>
                <input type="text" name="stat_{{ $i }}_icon" value="{{ $dayaTarik->$icon }}">

                <label>Judul Statistik {{ $i }}</label>
                <input type="text" name="stat_{{ $i }}_text" value="{{ $dayaTarik->$text }}">

                <label>Deskripsi Statistik {{ $i }}</label>
                <textarea name="stat_{{ $i }}_deskripsi" rows="3">{{ $dayaTarik->$desc }}</textarea>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endfor

{{-- MODAL POTENSI JUDUL --}}
<div id="modalEditPotensiJudul" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditPotensiJudul')">&times;</span>
        <h2>Edit Judul Potensi</h2>

        <form action="{{ route('admin.daya-tarik.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label Potensi</label>
            <input type="text" name="nilai_label" value="{{ $dayaTarik->nilai_label }}">

            <label>Judul Potensi</label>
            <input type="text" name="nilai_judul" value="{{ $dayaTarik->nilai_judul }}">

            <label>Deskripsi Potensi</label>
            <textarea name="nilai_deskripsi" rows="4">{{ $dayaTarik->nilai_deskripsi }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL POTENSI CARD --}}
@for($i = 1; $i <= 4; $i++)
    @php
        $icon = 'potensi_'.$i.'_icon';
        $judul = 'potensi_'.$i.'_judul';
        $desc = 'potensi_'.$i.'_deskripsi';
    @endphp

    <div id="modalEditPotensi{{ $i }}" class="admin-modal">
        <div class="admin-modal-box">
            <span class="admin-close" onclick="closeModal('modalEditPotensi{{ $i }}')">&times;</span>
            <h2>Edit Potensi {{ $i }}</h2>

            <form action="{{ route('admin.daya-tarik.update') }}" method="POST">
                @csrf
                @method('PUT')

                <label>Icon Potensi {{ $i }}</label>
                <input type="text" name="potensi_{{ $i }}_icon" value="{{ $dayaTarik->$icon }}">

                <label>Judul Potensi {{ $i }}</label>
                <input type="text" name="potensi_{{ $i }}_judul" value="{{ $dayaTarik->$judul }}">

                <label>Deskripsi Potensi {{ $i }}</label>
                <textarea name="potensi_{{ $i }}_deskripsi" rows="4">{{ $dayaTarik->$desc }}</textarea>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endfor

{{-- MODAL KEUNIKAN JUDUL --}}
<div id="modalEditKeunikanJudul" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditKeunikanJudul')">&times;</span>
        <h2>Edit Judul Keunikan</h2>

        <form action="{{ route('admin.daya-tarik.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label Keunikan</label>
            <input type="text" name="keunikan_label" value="{{ $dayaTarik->keunikan_label }}">

            <label>Judul Keunikan</label>
            <input type="text" name="keunikan_judul" value="{{ $dayaTarik->keunikan_judul }}">

            <label>Deskripsi Keunikan</label>
            <textarea name="keunikan_deskripsi" rows="4">{{ $dayaTarik->keunikan_deskripsi }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL KEUNIKAN BIG --}}
<div id="modalEditKeunikanBig" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditKeunikanBig')">&times;</span>
        <h2>Edit Card Besar Keunikan</h2>

        <form action="{{ route('admin.daya-tarik.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Judul Card Besar</label>
            <input type="text" name="keunikan_big_judul" value="{{ $dayaTarik->keunikan_big_judul }}">

            <label>Deskripsi Card Besar</label>
            <textarea name="keunikan_big_deskripsi" rows="4">{{ $dayaTarik->keunikan_big_deskripsi }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL KEUNIKAN CARD --}}
@for($i = 1; $i <= 4; $i++)
    @php
        $icon = 'keunikan_'.$i.'_icon';
        $judul = 'keunikan_'.$i.'_judul';
        $desc = 'keunikan_'.$i.'_deskripsi';
    @endphp

    <div id="modalEditKeunikan{{ $i }}" class="admin-modal">
        <div class="admin-modal-box">
            <span class="admin-close" onclick="closeModal('modalEditKeunikan{{ $i }}')">&times;</span>
            <h2>Edit Keunikan {{ $i }}</h2>

            <form action="{{ route('admin.daya-tarik.update') }}" method="POST">
                @csrf
                @method('PUT')

                <label>Icon Keunikan {{ $i }}</label>
                <input type="text" name="keunikan_{{ $i }}_icon" value="{{ $dayaTarik->$icon }}">

                <label>Judul Keunikan {{ $i }}</label>
                <input type="text" name="keunikan_{{ $i }}_judul" value="{{ $dayaTarik->$judul }}">

                <label>Deskripsi Keunikan {{ $i }}</label>
                <textarea name="keunikan_{{ $i }}_deskripsi" rows="4">{{ $dayaTarik->$desc }}</textarea>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endfor

{{-- MODAL PENGALAMAN JUDUL --}}
<div id="modalEditPengalamanJudul" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditPengalamanJudul')">&times;</span>
        <h2>Edit Judul Pengalaman</h2>

        <form action="{{ route('admin.daya-tarik.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label Pengalaman</label>
            <input type="text" name="pengalaman_label" value="{{ $dayaTarik->pengalaman_label }}">

            <label>Judul Pengalaman</label>
            <input type="text" name="pengalaman_judul" value="{{ $dayaTarik->pengalaman_judul }}">

            <label>Deskripsi Pengalaman</label>
            <textarea name="pengalaman_deskripsi" rows="4">{{ $dayaTarik->pengalaman_deskripsi }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL PENGALAMAN CARD --}}
@for($i = 1; $i <= 4; $i++)
    @php
        $icon = 'pengalaman_'.$i.'_icon';
        $judul = 'pengalaman_'.$i.'_judul';
        $desc = 'pengalaman_'.$i.'_deskripsi';
    @endphp

    <div id="modalEditPengalaman{{ $i }}" class="admin-modal">
        <div class="admin-modal-box">
            <span class="admin-close" onclick="closeModal('modalEditPengalaman{{ $i }}')">&times;</span>
            <h2>Edit Pengalaman {{ $i }}</h2>

            <form action="{{ route('admin.daya-tarik.update') }}" method="POST">
                @csrf
                @method('PUT')

                <label>Icon Pengalaman {{ $i }}</label>
                <input type="text" name="pengalaman_{{ $i }}_icon" value="{{ $dayaTarik->$icon }}">

                <label>Judul Pengalaman {{ $i }}</label>
                <input type="text" name="pengalaman_{{ $i }}_judul" value="{{ $dayaTarik->$judul }}">

                <label>Deskripsi Pengalaman {{ $i }}</label>
                <textarea name="pengalaman_{{ $i }}_deskripsi" rows="4">{{ $dayaTarik->$desc }}</textarea>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endfor

{{-- MODAL ALAM JUDUL --}}
<div id="modalEditAlamJudul" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditAlamJudul')">&times;</span>
        <h2>Edit Judul Karakter Alam</h2>

        <form action="{{ route('admin.daya-tarik.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label Karakter Alam</label>
            <input type="text" name="alam_label" value="{{ $dayaTarik->alam_label }}">

            <label>Judul Karakter Alam</label>
            <input type="text" name="alam_judul" value="{{ $dayaTarik->alam_judul }}">

            <label>Deskripsi Karakter Alam</label>
            <textarea name="alam_deskripsi" rows="4">{{ $dayaTarik->alam_deskripsi }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL ALAM LIST --}}
@for($i = 1; $i <= 3; $i++)
    @php
        $judul = 'alam_'.$i.'_judul';
        $desc = 'alam_'.$i.'_deskripsi';
    @endphp

    <div id="modalEditAlam{{ $i }}" class="admin-modal">
        <div class="admin-modal-box">
            <span class="admin-close" onclick="closeModal('modalEditAlam{{ $i }}')">&times;</span>
            <h2>Edit Karakter Alam {{ $i }}</h2>

            <form action="{{ route('admin.daya-tarik.update') }}" method="POST">
                @csrf
                @method('PUT')

                <label>Judul Alam {{ $i }}</label>
                <input type="text" name="alam_{{ $i }}_judul" value="{{ $dayaTarik->$judul }}">

                <label>Deskripsi Alam {{ $i }}</label>
                <textarea name="alam_{{ $i }}_deskripsi" rows="4">{{ $dayaTarik->$desc }}</textarea>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endfor

{{-- MODAL ALAM CARD --}}
<div id="modalEditAlamCard" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditAlamCard')">&times;</span>
        <h2>Edit Card Alam</h2>

        <form action="{{ route('admin.daya-tarik.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label Card Alam</label>
            <input type="text" name="alam_card_label" value="{{ $dayaTarik->alam_card_label }}">

            <label>Judul Card Alam</label>
            <input type="text" name="alam_card_judul" value="{{ $dayaTarik->alam_card_judul }}">

            <label>Deskripsi Card Alam</label>
            <textarea name="alam_card_deskripsi" rows="4">{{ $dayaTarik->alam_card_deskripsi }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL ALASAN JUDUL --}}
<div id="modalEditAlasanJudul" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditAlasanJudul')">&times;</span>
        <h2>Edit Judul Alasan</h2>

        <form action="{{ route('admin.daya-tarik.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label Alasan</label>
            <input type="text" name="alasan_label" value="{{ $dayaTarik->alasan_label }}">

            <label>Judul Alasan</label>
            <input type="text" name="alasan_judul" value="{{ $dayaTarik->alasan_judul }}">

            <label>Deskripsi Alasan</label>
            <textarea name="alasan_deskripsi" rows="4">{{ $dayaTarik->alasan_deskripsi }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

{{-- MODAL ALASAN CARD --}}
@for($i = 1; $i <= 3; $i++)
    @php
        $nomor = 'alasan_'.$i.'_nomor';
        $judul = 'alasan_'.$i.'_judul';
        $desc = 'alasan_'.$i.'_deskripsi';
    @endphp

    <div id="modalEditAlasan{{ $i }}" class="admin-modal">
        <div class="admin-modal-box">
            <span class="admin-close" onclick="closeModal('modalEditAlasan{{ $i }}')">&times;</span>
            <h2>Edit Alasan {{ $i }}</h2>

            <form action="{{ route('admin.daya-tarik.update') }}" method="POST">
                @csrf
                @method('PUT')

                <label>Nomor Alasan {{ $i }}</label>
                <input type="text" name="alasan_{{ $i }}_nomor" value="{{ $dayaTarik->$nomor }}">

                <label>Judul Alasan {{ $i }}</label>
                <input type="text" name="alasan_{{ $i }}_judul" value="{{ $dayaTarik->$judul }}">

                <label>Deskripsi Alasan {{ $i }}</label>
                <textarea name="alasan_{{ $i }}_deskripsi" rows="4">{{ $dayaTarik->$desc }}</textarea>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
@endfor

{{-- MODAL CTA --}}
<div id="modalEditCTA" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditCTA')">&times;</span>
        <h2>Edit CTA</h2>

        <form action="{{ route('admin.daya-tarik.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label CTA</label>
            <input type="text" name="cta_label" value="{{ $dayaTarik->cta_label }}">

            <label>Judul CTA</label>
            <input type="text" name="cta_judul" value="{{ $dayaTarik->cta_judul }}">

            <label>Deskripsi CTA</label>
            <textarea name="cta_deskripsi" rows="4">{{ $dayaTarik->cta_deskripsi }}</textarea>

            <label>Teks Tombol CTA</label>
            <input type="text" name="cta_tombol_text" value="{{ $dayaTarik->cta_tombol_text }}">

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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