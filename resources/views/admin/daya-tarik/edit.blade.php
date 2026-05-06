@extends('admin.layouts.app')

@section('title', 'Kelola Daya Tarik')

@section('content')

@php
    $heroJudul = $dayaTarik->hero_judul ?? 'Daya Tarik Pantai Pelawan';
    $heroSubjudul = $dayaTarik->hero_subjudul ?? 'Beragam keindahan alam, suasana pantai, dan aktivitas menarik yang dapat dinikmati wisatawan di Pantai Pelawan.';

    $highlightLabel = $dayaTarik->highlight_label ?? 'Keunggulan Wisata';
    $highlightJudul = $dayaTarik->highlight_judul ?? 'Pesona Alam Pantai Pelawan';
    $highlightDeskripsi = $dayaTarik->highlight_deskripsi ?? 'Pantai Pelawan memiliki panorama alam yang indah dengan suasana pesisir yang nyaman.';

    $gambarHighlight = $dayaTarik && $dayaTarik->highlight_gambar
        ? asset($dayaTarik->highlight_gambar)
        : asset('images/profil_pantai.jpg');

    $nilaiLabel = $dayaTarik->nilai_label ?? 'Nilai Destinasi';
    $nilaiJudul = $dayaTarik->nilai_judul ?? 'Nilai dan Potensi Pantai Pelawan';
    $nilaiDeskripsi = $dayaTarik->nilai_deskripsi ?? 'Pantai Pelawan memiliki nilai destinasi yang dapat mendukung pengembangan pariwisata daerah.';

    $keunikanLabel = $dayaTarik->keunikan_label ?? 'Keunikan Pantai';
    $keunikanJudul = $dayaTarik->keunikan_judul ?? 'Keunikan Pantai Pelawan';
    $keunikanDeskripsi = $dayaTarik->keunikan_deskripsi ?? 'Keunikan Pantai Pelawan terletak pada karakter pantai dan suasana alamnya.';
    $keunikanBigJudul = $dayaTarik->keunikan_big_judul ?? '🌊 Karakter Pantai yang Landai';
    $keunikanBigDeskripsi = $dayaTarik->keunikan_big_deskripsi ?? 'Pantai Pelawan memiliki karakter pantai yang nyaman untuk dinikmati oleh berbagai kalangan pengunjung.';

    $ctaLabel = $dayaTarik->cta_label ?? '🌴 Ayo Berkunjung';
    $ctaJudul = $dayaTarik->cta_judul ?? 'Yuk Kunjungi Pantai Pelawan!';
    $ctaDeskripsi = $dayaTarik->cta_deskripsi ?? 'Nikmati keindahan alam, aktivitas menarik, dan suasana pantai yang menenangkan.';
    $ctaTombolText = $dayaTarik->cta_tombol_text ?? 'Hubungi Kami';
@endphp

<div class="admin-user-preview-page">

    <div class="admin-floating-title">
        <div>
            <h1>Kelola Daya Tarik</h1>
            <p>Tampilan di bawah ini dibuat seperti halaman user. Klik tombol edit pada bagian yang ingin diubah.</p>
        </div>

        <a href="{{ route('daya.tarik') }}" target="_blank" class="admin-view-user-btn">
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
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalHeroDaya')">
            ✏️ Edit Hero
        </button>

        <section class="page-hero page-hero-daya-tarik admin-preview-hero">
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

    {{-- HIGHLIGHT --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalHighlightDaya')">
            ✏️ Edit Highlight
        </button>

        <section class="section section-soft">
            <div class="container">

                <div class="daya-highlight daya-highlight-upgrade">
                    <div class="daya-highlight-img">
                        <img src="{{ $gambarHighlight }}" alt="Pantai Pelawan">

                        <div class="daya-img-badge">
                            <strong>🌴 Pantai Pelawan</strong>
                            <span>Destinasi wisata alam Kabupaten Karimun</span>
                        </div>
                    </div>

                    <div class="daya-highlight-text">
                        <span class="section-label">
                            {{ $highlightLabel }}
                        </span>

                        <h2>{{ $highlightJudul }}</h2>

                        <p>{{ $highlightDeskripsi }}</p>

                        <div class="daya-stats">
                            @for($i = 1; $i <= 3; $i++)
                                <div>
                                    <strong>{{ $dayaTarik->{'stat_'.$i.'_icon'} ?? '🌊' }}</strong>
                                    <span>{{ $dayaTarik->{'stat_'.$i.'_text'} ?? 'Panorama Laut' }}</span>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

    {{-- NILAI DESTINASI --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalNilaiDaya')">
            ✏️ Edit Nilai Destinasi
        </button>

        <section class="section">
            <div class="container">
                <div class="section-heading">
                    <span class="section-label">{{ $nilaiLabel }}</span>
                    <h2>{{ $nilaiJudul }}</h2>
                    <p>{{ $nilaiDeskripsi }}</p>
                </div>

                <div class="potensi-grid">
                    @for($i = 1; $i <= 4; $i++)
                        <div class="potensi-card">
                            <div>{{ $dayaTarik->{'potensi_'.$i.'_icon'} ?? '🌿' }}</div>
                            <h3>{{ $dayaTarik->{'potensi_'.$i.'_judul'} ?? 'Potensi Wisata Alam' }}</h3>
                            <p>{{ $dayaTarik->{'potensi_'.$i.'_deskripsi'} ?? 'Keindahan alam pantai menjadi potensi utama wisata daerah.' }}</p>
                        </div>
                    @endfor
                </div>
            </div>
        </section>
    </div>

    {{-- KEUNIKAN --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalKeunikanDaya')">
            ✏️ Edit Keunikan
        </button>

        <section class="section section-soft">
            <div class="container">

                <div class="section-heading">
                    <span class="section-label">{{ $keunikanLabel }}</span>
                    <h2>{{ $keunikanJudul }}</h2>
                    <p>{{ $keunikanDeskripsi }}</p>
                </div>

                <div class="unique-premium-wrapper">

                    <div class="unique-big-card">
                        <h3>{{ $keunikanBigJudul }}</h3>
                        <p>{{ $keunikanBigDeskripsi }}</p>
                    </div>

                    <div class="unique-small-grid">
                        @for($i = 1; $i <= 4; $i++)
                            <div class="unique-small-card">
                                <span>{{ $dayaTarik->{'keunikan_'.$i.'_icon'} ?? '🌤️' }}</span>
                                <h3>{{ $dayaTarik->{'keunikan_'.$i.'_judul'} ?? 'Suasana Tenang' }}</h3>
                                <p>{{ $dayaTarik->{'keunikan_'.$i.'_deskripsi'} ?? 'Lingkungan pantai memberikan kesan santai bagi wisatawan.' }}</p>
                            </div>
                        @endfor
                    </div>

                </div>

            </div>
        </section>
    </div>

    {{-- CTA --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalCtaDaya')">
            ✏️ Edit CTA
        </button>

        <section class="section">
            <div class="container">
                <div class="daya-cta">
                    <div>
                        <span>{{ $ctaLabel }}</span>
                        <h2>{{ $ctaJudul }}</h2>
                        <p>{{ $ctaDeskripsi }}</p>
                    </div>

                    <a href="#" class="btn btn-primary">
                        {{ $ctaTombolText }}
                    </a>
                </div>
            </div>
        </section>
    </div>

</div>

{{-- MODAL HERO --}}
<div class="admin-modal" id="modalHeroDaya">
    <div class="admin-modal-box">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalHeroDaya')">×</button>

        <h2>Edit Hero Daya Tarik</h2>

        <form action="{{ route('admin.daya-tarik.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label>Judul Hero</label>
                <input type="text" name="hero_judul" value="{{ old('hero_judul', $heroJudul) }}">
            </div>

            <div class="admin-form-group">
                <label>Subjudul Hero</label>
                <textarea name="hero_subjudul" rows="3">{{ old('hero_subjudul', $heroSubjudul) }}</textarea>
            </div>

            <button type="submit" class="btn-admin-save">Simpan Hero</button>
        </form>
    </div>
</div>

{{-- MODAL HIGHLIGHT --}}
<div class="admin-modal" id="modalHighlightDaya">
    <div class="admin-modal-box modal-large">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalHighlightDaya')">×</button>

        <h2>Edit Highlight Pesona Alam</h2>

        <form action="{{ route('admin.daya-tarik.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="admin-form-grid">
                <div class="admin-form-group">
                    <label>Label Highlight</label>
                    <input type="text" name="highlight_label" value="{{ old('highlight_label', $highlightLabel) }}">
                </div>

                <div class="admin-form-group">
                    <label>Judul Highlight</label>
                    <input type="text" name="highlight_judul" value="{{ old('highlight_judul', $highlightJudul) }}">
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi Highlight</label>
                    <textarea name="highlight_deskripsi" rows="4">{{ old('highlight_deskripsi', $highlightDeskripsi) }}</textarea>
                </div>

                <div class="admin-form-group full">
                    <label>Ganti Gambar Highlight</label>
                    <input type="file" name="highlight_gambar" accept="image/*">
                </div>

                @for($i = 1; $i <= 3; $i++)
                    <div class="admin-form-subtitle full">
                        <strong>Statistik / Info Kecil {{ $i }}</strong>
                    </div>

                    <div class="admin-form-group">
                        <label>Icon {{ $i }}</label>
                        <input type="text" name="stat_{{ $i }}_icon" value="{{ old('stat_'.$i.'_icon', $dayaTarik->{'stat_'.$i.'_icon'}) }}">
                    </div>

                    <div class="admin-form-group">
                        <label>Teks {{ $i }}</label>
                        <input type="text" name="stat_{{ $i }}_text" value="{{ old('stat_'.$i.'_text', $dayaTarik->{'stat_'.$i.'_text'}) }}">
                    </div>
                @endfor
            </div>

            <button type="submit" class="btn-admin-save">Simpan Highlight</button>
        </form>
    </div>
</div>

{{-- MODAL NILAI DESTINASI --}}
<div class="admin-modal" id="modalNilaiDaya">
    <div class="admin-modal-box modal-large">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalNilaiDaya')">×</button>

        <h2>Edit Nilai Destinasi</h2>

        <form action="{{ route('admin.daya-tarik.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-grid">
                <div class="admin-form-group">
                    <label>Label Section</label>
                    <input type="text" name="nilai_label" value="{{ old('nilai_label', $nilaiLabel) }}">
                </div>

                <div class="admin-form-group">
                    <label>Judul Section</label>
                    <input type="text" name="nilai_judul" value="{{ old('nilai_judul', $nilaiJudul) }}">
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi Section</label>
                    <textarea name="nilai_deskripsi" rows="3">{{ old('nilai_deskripsi', $nilaiDeskripsi) }}</textarea>
                </div>

                @for($i = 1; $i <= 4; $i++)
                    <div class="admin-form-subtitle full">
                        <strong>Card Potensi {{ $i }}</strong>
                    </div>

                    <div class="admin-form-group">
                        <label>Icon Potensi {{ $i }}</label>
                        <input type="text" name="potensi_{{ $i }}_icon" value="{{ old('potensi_'.$i.'_icon', $dayaTarik->{'potensi_'.$i.'_icon'}) }}">
                    </div>

                    <div class="admin-form-group">
                        <label>Judul Potensi {{ $i }}</label>
                        <input type="text" name="potensi_{{ $i }}_judul" value="{{ old('potensi_'.$i.'_judul', $dayaTarik->{'potensi_'.$i.'_judul'}) }}">
                    </div>

                    <div class="admin-form-group full">
                        <label>Deskripsi Potensi {{ $i }}</label>
                        <textarea name="potensi_{{ $i }}_deskripsi" rows="3">{{ old('potensi_'.$i.'_deskripsi', $dayaTarik->{'potensi_'.$i.'_deskripsi'}) }}</textarea>
                    </div>
                @endfor
            </div>

            <button type="submit" class="btn-admin-save">Simpan Nilai Destinasi</button>
        </form>
    </div>
</div>

{{-- MODAL KEUNIKAN --}}
<div class="admin-modal" id="modalKeunikanDaya">
    <div class="admin-modal-box modal-large">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalKeunikanDaya')">×</button>

        <h2>Edit Keunikan Pantai</h2>

        <form action="{{ route('admin.daya-tarik.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-grid">
                <div class="admin-form-group">
                    <label>Label Section</label>
                    <input type="text" name="keunikan_label" value="{{ old('keunikan_label', $keunikanLabel) }}">
                </div>

                <div class="admin-form-group">
                    <label>Judul Section</label>
                    <input type="text" name="keunikan_judul" value="{{ old('keunikan_judul', $keunikanJudul) }}">
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi Section</label>
                    <textarea name="keunikan_deskripsi" rows="3">{{ old('keunikan_deskripsi', $keunikanDeskripsi) }}</textarea>
                </div>

                <div class="admin-form-group">
                    <label>Judul Card Besar</label>
                    <input type="text" name="keunikan_big_judul" value="{{ old('keunikan_big_judul', $keunikanBigJudul) }}">
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi Card Besar</label>
                    <textarea name="keunikan_big_deskripsi" rows="3">{{ old('keunikan_big_deskripsi', $keunikanBigDeskripsi) }}</textarea>
                </div>

                @for($i = 1; $i <= 4; $i++)
                    <div class="admin-form-subtitle full">
                        <strong>Card Keunikan {{ $i }}</strong>
                    </div>

                    <div class="admin-form-group">
                        <label>Icon Keunikan {{ $i }}</label>
                        <input type="text" name="keunikan_{{ $i }}_icon" value="{{ old('keunikan_'.$i.'_icon', $dayaTarik->{'keunikan_'.$i.'_icon'}) }}">
                    </div>

                    <div class="admin-form-group">
                        <label>Judul Keunikan {{ $i }}</label>
                        <input type="text" name="keunikan_{{ $i }}_judul" value="{{ old('keunikan_'.$i.'_judul', $dayaTarik->{'keunikan_'.$i.'_judul'}) }}">
                    </div>

                    <div class="admin-form-group full">
                        <label>Deskripsi Keunikan {{ $i }}</label>
                        <textarea name="keunikan_{{ $i }}_deskripsi" rows="3">{{ old('keunikan_'.$i.'_deskripsi', $dayaTarik->{'keunikan_'.$i.'_deskripsi'}) }}</textarea>
                    </div>
                @endfor
            </div>

            <button type="submit" class="btn-admin-save">Simpan Keunikan</button>
        </form>
    </div>
</div>

{{-- MODAL CTA --}}
<div class="admin-modal" id="modalCtaDaya">
    <div class="admin-modal-box">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalCtaDaya')">×</button>

        <h2>Edit CTA Penutup</h2>

        <form action="{{ route('admin.daya-tarik.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label>Label CTA</label>
                <input type="text" name="cta_label" value="{{ old('cta_label', $ctaLabel) }}">
            </div>

            <div class="admin-form-group">
                <label>Judul CTA</label>
                <input type="text" name="cta_judul" value="{{ old('cta_judul', $ctaJudul) }}">
            </div>

            <div class="admin-form-group">
                <label>Deskripsi CTA</label>
                <textarea name="cta_deskripsi" rows="4">{{ old('cta_deskripsi', $ctaDeskripsi) }}</textarea>
            </div>

            <div class="admin-form-group">
                <label>Teks Tombol CTA</label>
                <input type="text" name="cta_tombol_text" value="{{ old('cta_tombol_text', $ctaTombolText) }}">
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