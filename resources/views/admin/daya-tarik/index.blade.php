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
            <p>Tampilan di bawah sama seperti halaman user. Admin dapat mengubah konten tanpa edit coding.</p>
        </div>

        <div style="display:flex; gap:10px; flex-wrap:wrap;">
            <a href="{{ route('daya.tarik') }}" target="_blank" class="admin-view-user-btn">
                Lihat User
            </a>

            <button onclick="openModal('modalEditDayaTarik')" class="admin-view-user-btn">
                ✏️ Edit Daya Tarik
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="admin-alert-success">{{ session('success') }}</div>
    @endif

    <div class="admin-editable-section">
        <button class="admin-section-edit-btn" onclick="openModal('modalEditDayaTarik')">✏️ Edit Hero</button>

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

    <div class="admin-editable-section">
        <button class="admin-section-edit-btn" onclick="openModal('modalEditDayaTarik')">✏️ Edit Highlight</button>

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

    <div class="admin-editable-section">
        <button class="admin-section-edit-btn" onclick="openModal('modalEditDayaTarik')">✏️ Edit Potensi</button>

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
                        </div>
                    @endfor
                </div>
            </div>
        </section>
    </div>

    <div class="admin-editable-section">
        <button class="admin-section-edit-btn" onclick="openModal('modalEditDayaTarik')">✏️ Edit Keunikan</button>

        <section class="section section-soft">
            <div class="container">
                <div class="section-heading">
                    <span class="section-label">{{ $dayaTarik->keunikan_label }}</span>
                    <h2>{{ $dayaTarik->keunikan_judul }}</h2>
                    <p>{{ $dayaTarik->keunikan_deskripsi }}</p>
                </div>

                <div class="unique-premium-wrapper">
                    <div class="unique-big-card">
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
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="admin-editable-section">
        <button class="admin-section-edit-btn" onclick="openModal('modalEditDayaTarik')">✏️ Edit Pengalaman</button>

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
                        </div>
                    @endfor
                </div>
            </div>
        </section>
    </div>

    <div class="admin-editable-section">
        <button class="admin-section-edit-btn" onclick="openModal('modalEditDayaTarik')">✏️ Edit Karakter Alam</button>

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
                                </div>
                            @endfor
                        </div>
                    </div>

                    <div class="daya-nature-visual">
                        <div class="nature-glass-card">
                            <span>{{ $dayaTarik->alam_card_label }}</span>
                            <h3>{{ $dayaTarik->alam_card_judul }}</h3>
                            <p>{{ $dayaTarik->alam_card_deskripsi }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="admin-editable-section">
        <button class="admin-section-edit-btn" onclick="openModal('modalEditDayaTarik')">✏️ Edit Alasan</button>

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
                        </div>
                    @endfor
                </div>
            </div>
        </section>
    </div>

    <div class="admin-editable-section">
        <button class="admin-section-edit-btn" onclick="openModal('modalEditDayaTarik')">✏️ Edit CTA</button>

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

{{-- MODAL EDIT --}}
<div id="modalEditDayaTarik" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditDayaTarik')">&times;</span>

        <h2>Edit Konten Daya Tarik</h2>

        <form action="{{ route('admin.daya-tarik.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Judul Hero</label>
            <input type="text" name="hero_judul" value="{{ $dayaTarik->hero_judul }}">

            <label>Subjudul Hero</label>
            <textarea name="hero_subjudul" rows="3">{{ $dayaTarik->hero_subjudul }}</textarea>

            <hr style="margin:22px 0;">

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

            @for($i = 1; $i <= 3; $i++)
                @php
                    $icon = 'stat_'.$i.'_icon';
                    $text = 'stat_'.$i.'_text';
                    $desc = 'stat_'.$i.'_deskripsi';
                @endphp

                <h3 style="margin-top:20px; color:#14532d;">Statistik {{ $i }}</h3>

                <label>Icon Statistik {{ $i }}</label>
                <input type="text" name="stat_{{ $i }}_icon" value="{{ $dayaTarik->$icon }}">

                <label>Judul Statistik {{ $i }}</label>
                <input type="text" name="stat_{{ $i }}_text" value="{{ $dayaTarik->$text }}">

                <label>Deskripsi Statistik {{ $i }}</label>
                <textarea name="stat_{{ $i }}_deskripsi" rows="3">{{ $dayaTarik->$desc }}</textarea>
            @endfor

            <hr style="margin:22px 0;">

            <label>Label Nilai</label>
            <input type="text" name="nilai_label" value="{{ $dayaTarik->nilai_label }}">

            <label>Judul Nilai</label>
            <input type="text" name="nilai_judul" value="{{ $dayaTarik->nilai_judul }}">

            <label>Deskripsi Nilai</label>
            <textarea name="nilai_deskripsi" rows="4">{{ $dayaTarik->nilai_deskripsi }}</textarea>

            @for($i = 1; $i <= 4; $i++)
                @php
                    $icon = 'potensi_'.$i.'_icon';
                    $judul = 'potensi_'.$i.'_judul';
                    $desc = 'potensi_'.$i.'_deskripsi';
                @endphp

                <h3 style="margin-top:20px; color:#14532d;">Potensi {{ $i }}</h3>

                <label>Icon Potensi {{ $i }}</label>
                <input type="text" name="potensi_{{ $i }}_icon" value="{{ $dayaTarik->$icon }}">

                <label>Judul Potensi {{ $i }}</label>
                <input type="text" name="potensi_{{ $i }}_judul" value="{{ $dayaTarik->$judul }}">

                <label>Deskripsi Potensi {{ $i }}</label>
                <textarea name="potensi_{{ $i }}_deskripsi" rows="3">{{ $dayaTarik->$desc }}</textarea>
            @endfor

            <hr style="margin:22px 0;">

            <label>Label Keunikan</label>
            <input type="text" name="keunikan_label" value="{{ $dayaTarik->keunikan_label }}">

            <label>Judul Keunikan</label>
            <input type="text" name="keunikan_judul" value="{{ $dayaTarik->keunikan_judul }}">

            <label>Deskripsi Keunikan</label>
            <textarea name="keunikan_deskripsi" rows="4">{{ $dayaTarik->keunikan_deskripsi }}</textarea>

            <label>Judul Card Besar Keunikan</label>
            <input type="text" name="keunikan_big_judul" value="{{ $dayaTarik->keunikan_big_judul }}">

            <label>Deskripsi Card Besar Keunikan</label>
            <textarea name="keunikan_big_deskripsi" rows="4">{{ $dayaTarik->keunikan_big_deskripsi }}</textarea>

            @for($i = 1; $i <= 4; $i++)
                @php
                    $icon = 'keunikan_'.$i.'_icon';
                    $judul = 'keunikan_'.$i.'_judul';
                    $desc = 'keunikan_'.$i.'_deskripsi';
                @endphp

                <h3 style="margin-top:20px; color:#14532d;">Keunikan {{ $i }}</h3>

                <label>Icon Keunikan {{ $i }}</label>
                <input type="text" name="keunikan_{{ $i }}_icon" value="{{ $dayaTarik->$icon }}">

                <label>Judul Keunikan {{ $i }}</label>
                <input type="text" name="keunikan_{{ $i }}_judul" value="{{ $dayaTarik->$judul }}">

                <label>Deskripsi Keunikan {{ $i }}</label>
                <textarea name="keunikan_{{ $i }}_deskripsi" rows="3">{{ $dayaTarik->$desc }}</textarea>
            @endfor

            <hr style="margin:22px 0;">

            <label>Label Pengalaman</label>
            <input type="text" name="pengalaman_label" value="{{ $dayaTarik->pengalaman_label }}">

            <label>Judul Pengalaman</label>
            <input type="text" name="pengalaman_judul" value="{{ $dayaTarik->pengalaman_judul }}">

            <label>Deskripsi Pengalaman</label>
            <textarea name="pengalaman_deskripsi" rows="4">{{ $dayaTarik->pengalaman_deskripsi }}</textarea>

            @for($i = 1; $i <= 4; $i++)
                @php
                    $icon = 'pengalaman_'.$i.'_icon';
                    $judul = 'pengalaman_'.$i.'_judul';
                    $desc = 'pengalaman_'.$i.'_deskripsi';
                @endphp

                <h3 style="margin-top:20px; color:#14532d;">Pengalaman {{ $i }}</h3>

                <label>Icon Pengalaman {{ $i }}</label>
                <input type="text" name="pengalaman_{{ $i }}_icon" value="{{ $dayaTarik->$icon }}">

                <label>Judul Pengalaman {{ $i }}</label>
                <input type="text" name="pengalaman_{{ $i }}_judul" value="{{ $dayaTarik->$judul }}">

                <label>Deskripsi Pengalaman {{ $i }}</label>
                <textarea name="pengalaman_{{ $i }}_deskripsi" rows="3">{{ $dayaTarik->$desc }}</textarea>
            @endfor

            <hr style="margin:22px 0;">

            <label>Label Karakter Alam</label>
            <input type="text" name="alam_label" value="{{ $dayaTarik->alam_label }}">

            <label>Judul Karakter Alam</label>
            <input type="text" name="alam_judul" value="{{ $dayaTarik->alam_judul }}">

            <label>Deskripsi Karakter Alam</label>
            <textarea name="alam_deskripsi" rows="4">{{ $dayaTarik->alam_deskripsi }}</textarea>

            @for($i = 1; $i <= 3; $i++)
                @php
                    $judul = 'alam_'.$i.'_judul';
                    $desc = 'alam_'.$i.'_deskripsi';
                @endphp

                <h3 style="margin-top:20px; color:#14532d;">Karakter Alam {{ $i }}</h3>

                <label>Judul Alam {{ $i }}</label>
                <input type="text" name="alam_{{ $i }}_judul" value="{{ $dayaTarik->$judul }}">

                <label>Deskripsi Alam {{ $i }}</label>
                <textarea name="alam_{{ $i }}_deskripsi" rows="3">{{ $dayaTarik->$desc }}</textarea>
            @endfor

            <label>Label Card Alam</label>
            <input type="text" name="alam_card_label" value="{{ $dayaTarik->alam_card_label }}">

            <label>Judul Card Alam</label>
            <input type="text" name="alam_card_judul" value="{{ $dayaTarik->alam_card_judul }}">

            <label>Deskripsi Card Alam</label>
            <textarea name="alam_card_deskripsi" rows="4">{{ $dayaTarik->alam_card_deskripsi }}</textarea>

            <hr style="margin:22px 0;">

            <label>Label Alasan</label>
            <input type="text" name="alasan_label" value="{{ $dayaTarik->alasan_label }}">

            <label>Judul Alasan</label>
            <input type="text" name="alasan_judul" value="{{ $dayaTarik->alasan_judul }}">

            <label>Deskripsi Alasan</label>
            <textarea name="alasan_deskripsi" rows="4">{{ $dayaTarik->alasan_deskripsi }}</textarea>

            @for($i = 1; $i <= 3; $i++)
                @php
                    $nomor = 'alasan_'.$i.'_nomor';
                    $judul = 'alasan_'.$i.'_judul';
                    $desc = 'alasan_'.$i.'_deskripsi';
                @endphp

                <h3 style="margin-top:20px; color:#14532d;">Alasan {{ $i }}</h3>

                <label>Nomor Alasan {{ $i }}</label>
                <input type="text" name="alasan_{{ $i }}_nomor" value="{{ $dayaTarik->$nomor }}">

                <label>Judul Alasan {{ $i }}</label>
                <input type="text" name="alasan_{{ $i }}_judul" value="{{ $dayaTarik->$judul }}">

                <label>Deskripsi Alasan {{ $i }}</label>
                <textarea name="alasan_{{ $i }}_deskripsi" rows="3">{{ $dayaTarik->$desc }}</textarea>
            @endfor

            <hr style="margin:22px 0;">

            <label>Label CTA</label>
            <input type="text" name="cta_label" value="{{ $dayaTarik->cta_label }}">

            <label>Judul CTA</label>
            <input type="text" name="cta_judul" value="{{ $dayaTarik->cta_judul }}">

            <label>Deskripsi CTA</label>
            <textarea name="cta_deskripsi" rows="4">{{ $dayaTarik->cta_deskripsi }}</textarea>

            <label>Teks Tombol CTA</label>
            <input type="text" name="cta_tombol_text" value="{{ $dayaTarik->cta_tombol_text }}">

            <button type="submit" class="btn btn-primary">
                Simpan Perubahan Daya Tarik
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