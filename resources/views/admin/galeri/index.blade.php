@extends('admin.layouts.app')

@section('title', 'Kelola Galeri')

@section('content')

@php
    $page = $page ?? null;

    $img = function ($path, $default = 'images/profil_pantai.jpg') {
        if (!$path) {
            return asset($default);
        }

        return str_starts_with($path, 'images/')
            ? asset($path)
            : asset('storage/' . $path);
    };
@endphp

<div class="admin-user-preview-page">

    <div class="admin-floating-title">
        <div>
            <h1>Kelola Galeri Pantai</h1>
            <p>Tampilan di bawah sama seperti halaman user. Admin bisa mengubah konten dan foto dari halaman ini.</p>
        </div>

        <div class="admin-header-actions">
            <a href="{{ route('galeri') }}" target="_blank" class="admin-view-user-btn">
                Lihat User
            </a>

            <button type="button" onclick="openModal('modalTambahGaleri')" class="admin-view-user-btn">
                + Tambah Foto
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="admin-alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- HERO --}}
    <div class="admin-editable-section" id="hero">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditHeroGaleri')">
            ✏️ Edit Hero
        </button>

        <section class="page-hero page-hero-galeri">
            <div class="page-hero-overlay">
                <div class="container">
                    <div class="page-hero-content">
                        <h1>{{ $page->hero_judul ?? 'Galeri Pantai Pelawan' }}</h1>
                        <p>
                            {{ $page->hero_deskripsi ?? 'Dokumentasi keindahan Pantai Pelawan dari berbagai sudut, suasana, dan momen wisata.' }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- GALERI --}}
    <div class="admin-editable-section" id="galeri">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditJudulGaleri')">
            ✏️ Edit Judul Galeri
        </button>

        <section class="section section-soft">
            <div class="container">

                <div class="section-heading">
                    <span class="section-label">{{ $page->galeri_label ?? 'Dokumentasi Wisata' }}</span>
                    <h2>{{ $page->galeri_judul ?? 'Foto Wisata Pantai Pelawan' }}</h2>
                    <p>
                        {{ $page->galeri_deskripsi ?? 'Beberapa dokumentasi pemandangan dan suasana wisata Pantai Pelawan.' }}
                    </p>
                </div>

                <div style="text-align:center; margin-bottom:25px;">
                    <button type="button" onclick="openModal('modalTambahGaleri')" class="admin-view-user-btn">
                        + Tambah Foto Galeri
                    </button>
                </div>

                <div class="galeri-masonry">

                    @forelse($galeris as $galeri)
                        <div class="galeri-card admin-card-action-wrap
                            {{ $galeri->tipe_card == 'large' ? 'galeri-large' : '' }}
                            {{ $galeri->tipe_card == 'wide' ? 'galeri-wide' : '' }}
                        ">

                            <img src="{{ $img($galeri->gambar) }}" alt="{{ $galeri->judul }}">

                            <div class="galeri-overlay">
                                <h3>{{ $galeri->judul }}</h3>
                                <p>{{ $galeri->deskripsi }}</p>
                            </div>

                            <div class="admin-galeri-actions">
                                <button type="button" onclick="openModal('editModal{{ $galeri->id }}')">
                                    ✏️ Edit
                                </button>

                                <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin hapus foto ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="hapus-btn">
                                        🗑 Hapus
                                    </button>
                                </form>
                            </div>
                        </div>

                        {{-- MODAL EDIT FOTO --}}
                        <div id="editModal{{ $galeri->id }}" class="admin-modal">
                            <div class="admin-modal-box">
                                <span class="admin-close" onclick="closeModal('editModal{{ $galeri->id }}')">
                                    &times;
                                </span>

                                <h2>Edit Foto Galeri</h2>

                                <form action="{{ route('admin.galeri.update', $galeri->id) }}"
                                      method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <label>Judul</label>
                                    <input type="text" name="judul" value="{{ old('judul', $galeri->judul) }}" required>

                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" rows="4">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>

                                    <label>Gambar Saat Ini</label>
                                    <img src="{{ $img($galeri->gambar) }}" class="admin-preview-image">

                                    <label>Ubah Gambar</label>
                                    <input type="file" name="gambar" accept="image/*">

                                    <label>Tipe Card</label>
                                    <select name="tipe_card">
                                        <option value="normal" {{ $galeri->tipe_card == 'normal' ? 'selected' : '' }}>Normal</option>
                                        <option value="large" {{ $galeri->tipe_card == 'large' ? 'selected' : '' }}>Large</option>
                                        <option value="wide" {{ $galeri->tipe_card == 'wide' ? 'selected' : '' }}>Wide</option>
                                    </select>

                                    <label>Urutan</label>
                                    <input type="number" name="urutan" value="{{ old('urutan', $galeri->urutan) }}">

                                    <label>Status</label>
                                    <select name="status">
                                        <option value="aktif" {{ $galeri->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                        <option value="nonaktif" {{ $galeri->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                    </select>

                                    <button type="submit" class="btn btn-primary">
                                        Simpan Perubahan
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="text-center">Belum ada foto galeri.</p>
                    @endforelse

                </div>

            </div>
        </section>
    </div>

    {{-- AKTIVITAS --}}
    <div class="admin-editable-section" id="aktivitas">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditJudulAktivitas')">
            ✏️ Edit Judul Aktivitas
        </button>

        <section class="dt-activity-clean-section">
            <div class="container">

                <div class="section-heading">
                    <span class="section-label">{{ $page->aktivitas_label ?? 'Pengalaman Wisata' }}</span>
                    <h2>{{ $page->aktivitas_judul ?? 'Aktivitas Menarik di Pantai Pelawan' }}</h2>
                    <p>{{ $page->aktivitas_deskripsi ?? 'Nikmati berbagai aktivitas seru yang bisa dilakukan bersama keluarga, pasangan, maupun teman.' }}</p>
                </div>

                <div class="dt-activity-clean-grid">

                    <div class="dt-activity-clean-card dt-activity-main admin-card-action-wrap">
                        <img src="{{ $img($page->aktivitas_1_gambar ?? null, 'images/hero-pantai.jpg') }}" alt="{{ $page->aktivitas_1_judul ?? 'Naik Banana Boat' }}">
                        <div class="dt-activity-clean-overlay">
                            <span>{{ $page->aktivitas_1_label ?? '🚤 Aktivitas Favorit' }}</span>
                            <h3>{{ $page->aktivitas_1_judul ?? 'Naik Banana Boat' }}</h3>
                            <p>{{ $page->aktivitas_1_deskripsi ?? 'Rasakan keseruan wahana air bersama teman dan keluarga.' }}</p>
                        </div>
                        <button type="button" class="admin-mini-edit-btn" onclick="openModal('modalEditAktivitas1')">✏️ Edit</button>
                    </div>

                    <div class="dt-activity-clean-card admin-card-action-wrap">
                        <img src="{{ $img($page->aktivitas_2_gambar ?? null, 'images/profil_pantai.jpg') }}" alt="{{ $page->aktivitas_2_judul ?? 'Naik Sampan' }}">
                        <div class="dt-activity-clean-overlay">
                            <span>{{ $page->aktivitas_2_label ?? '🛶 Santai di Laut' }}</span>
                            <h3>{{ $page->aktivitas_2_judul ?? 'Naik Sampan' }}</h3>
                            <p>{{ $page->aktivitas_2_deskripsi ?? 'Menikmati suasana pantai dari area perairan yang tenang.' }}</p>
                        </div>
                        <button type="button" class="admin-mini-edit-btn" onclick="openModal('modalEditAktivitas2')">✏️ Edit</button>
                    </div>

                    <div class="dt-activity-clean-card admin-card-action-wrap">
                        <img src="{{ $img($page->aktivitas_3_gambar ?? null, 'images/hero-pantai.jpg') }}" alt="{{ $page->aktivitas_3_judul ?? 'Spot Foto' }}">
                        <div class="dt-activity-clean-overlay">
                            <span>{{ $page->aktivitas_3_label ?? '📸 Dokumentasi' }}</span>
                            <h3>{{ $page->aktivitas_3_judul ?? 'Spot Foto' }}</h3>
                            <p>{{ $page->aktivitas_3_deskripsi ?? 'Abadikan momen dengan latar pantai dan pemandangan alam.' }}</p>
                        </div>
                        <button type="button" class="admin-mini-edit-btn" onclick="openModal('modalEditAktivitas3')">✏️ Edit</button>
                    </div>

                    <div class="dt-activity-clean-card dt-activity-wide admin-card-action-wrap">
                        <img src="{{ $img($page->aktivitas_4_gambar ?? null, 'images/profil_pantai.jpg') }}" alt="{{ $page->aktivitas_4_judul ?? 'Bakar-bakar dan Piknik' }}">
                        <div class="dt-activity-clean-overlay">
                            <span>{{ $page->aktivitas_4_label ?? '🔥 Bersama Keluarga' }}</span>
                            <h3>{{ $page->aktivitas_4_judul ?? 'Bakar-bakar & Piknik' }}</h3>
                            <p>{{ $page->aktivitas_4_deskripsi ?? 'Menikmati waktu santai sambil makan bersama di sekitar kawasan pantai.' }}</p>
                        </div>
                        <button type="button" class="admin-mini-edit-btn" onclick="openModal('modalEditAktivitas4')">✏️ Edit</button>
                    </div>

                </div>
            </div>
        </section>
    </div>

    {{-- CTA --}}
    <div class="admin-editable-section" id="cta">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditCtaGaleri')">
            ✏️ Edit CTA
        </button>

        <section class="section">
            <div class="container">
                <div class="galeri-cta">
                    <div>
                        <span>{{ $page->cta_label ?? '📸 Dokumentasi Wisata' }}</span>
                        <h2>{{ $page->cta_judul ?? 'Keindahan yang Tak Terlupakan' }}</h2>
                        <p>
                            {{ $page->cta_deskripsi ?? 'Pantai Pelawan menawarkan pemandangan alam yang memukau dan cocok untuk diabadikan dalam berbagai momen wisata.' }}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>

{{-- MODAL TAMBAH FOTO --}}
<div id="modalTambahGaleri" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalTambahGaleri')">&times;</span>

        <h2>Tambah Foto Galeri</h2>

        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label>Judul</label>
            <input type="text" name="judul" required>

            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="4"></textarea>

            <label>Upload Gambar</label>
            <input type="file" name="gambar" accept="image/*" required>

            <label>Tipe Card</label>
            <select name="tipe_card">
                <option value="normal">Normal</option>
                <option value="large">Large</option>
                <option value="wide">Wide</option>
            </select>

            <label>Urutan</label>
            <input type="number" name="urutan" value="0">

            <label>Status</label>
            <select name="status">
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>

            <button type="submit" class="btn btn-primary">Simpan Foto</button>
        </form>
    </div>
</div>

{{-- MODAL HERO --}}
<div id="modalEditHeroGaleri" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditHeroGaleri')">&times;</span>

        <h2>Edit Hero Galeri</h2>

        <form action="{{ route('admin.galeri.page.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Judul Hero</label>
            <input type="text" name="hero_judul" value="{{ old('hero_judul', $page->hero_judul ?? 'Galeri Pantai Pelawan') }}">

            <label>Deskripsi Hero</label>
            <textarea name="hero_deskripsi" rows="4">{{ old('hero_deskripsi', $page->hero_deskripsi ?? 'Dokumentasi keindahan Pantai Pelawan dari berbagai sudut, suasana, dan momen wisata.') }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Hero</button>
        </form>
    </div>
</div>

{{-- MODAL JUDUL GALERI --}}
<div id="modalEditJudulGaleri" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditJudulGaleri')">&times;</span>

        <h2>Edit Judul Galeri</h2>

        <form action="{{ route('admin.galeri.page.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label Galeri</label>
            <input type="text" name="galeri_label" value="{{ old('galeri_label', $page->galeri_label ?? 'Dokumentasi Wisata') }}">

            <label>Judul Galeri</label>
            <input type="text" name="galeri_judul" value="{{ old('galeri_judul', $page->galeri_judul ?? 'Foto Wisata Pantai Pelawan') }}">

            <label>Deskripsi Galeri</label>
            <textarea name="galeri_deskripsi" rows="4">{{ old('galeri_deskripsi', $page->galeri_deskripsi ?? 'Beberapa dokumentasi pemandangan dan suasana wisata Pantai Pelawan.') }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Galeri</button>
        </form>
    </div>
</div>

{{-- MODAL JUDUL AKTIVITAS --}}
<div id="modalEditJudulAktivitas" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditJudulAktivitas')">&times;</span>

        <h2>Edit Judul Aktivitas</h2>

        <form action="{{ route('admin.galeri.page.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label Aktivitas</label>
            <input type="text" name="aktivitas_label" value="{{ old('aktivitas_label', $page->aktivitas_label ?? 'Pengalaman Wisata') }}">

            <label>Judul Aktivitas</label>
            <input type="text" name="aktivitas_judul" value="{{ old('aktivitas_judul', $page->aktivitas_judul ?? 'Aktivitas Menarik di Pantai Pelawan') }}">

            <label>Deskripsi Aktivitas</label>
            <textarea name="aktivitas_deskripsi" rows="4">{{ old('aktivitas_deskripsi', $page->aktivitas_deskripsi ?? 'Nikmati berbagai aktivitas seru yang bisa dilakukan bersama keluarga, pasangan, maupun teman.') }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Aktivitas</button>
        </form>
    </div>
</div>

{{-- MODAL CARD AKTIVITAS --}}
@for($i = 1; $i <= 4; $i++)
    @php
        $label = 'aktivitas_'.$i.'_label';
        $judul = 'aktivitas_'.$i.'_judul';
        $deskripsi = 'aktivitas_'.$i.'_deskripsi';
        $gambar = 'aktivitas_'.$i.'_gambar';
    @endphp

    <div id="modalEditAktivitas{{ $i }}" class="admin-modal">
        <div class="admin-modal-box">
            <span class="admin-close" onclick="closeModal('modalEditAktivitas{{ $i }}')">&times;</span>

            <h2>Edit Aktivitas {{ $i }}</h2>

            <form action="{{ route('admin.galeri.page.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label>Label Aktivitas</label>
                <input type="text" name="aktivitas_{{ $i }}_label" value="{{ old('aktivitas_'.$i.'_label', $page->$label ?? '📸 Aktivitas Wisata') }}">

                <label>Judul Aktivitas</label>
                <input type="text" name="aktivitas_{{ $i }}_judul" value="{{ old('aktivitas_'.$i.'_judul', $page->$judul ?? 'Aktivitas Wisata') }}">

                <label>Deskripsi Aktivitas</label>
                <textarea name="aktivitas_{{ $i }}_deskripsi" rows="4">{{ old('aktivitas_'.$i.'_deskripsi', $page->$deskripsi ?? 'Informasi aktivitas belum tersedia.') }}</textarea>

                <label>Gambar Saat Ini</label>
                <img src="{{ $img($page->$gambar ?? null) }}" class="admin-preview-image">

                <label>Ubah Gambar</label>
                <input type="file" name="aktivitas_{{ $i }}_gambar" accept="image/*">

                <button type="submit" class="btn btn-primary">Simpan Aktivitas</button>
            </form>
        </div>
    </div>
@endfor

{{-- MODAL CTA --}}
<div id="modalEditCtaGaleri" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditCtaGaleri')">&times;</span>

        <h2>Edit CTA Galeri</h2>

        <form action="{{ route('admin.galeri.page.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label CTA</label>
            <input type="text" name="cta_label" value="{{ old('cta_label', $page->cta_label ?? '📸 Dokumentasi Wisata') }}">

            <label>Judul CTA</label>
            <input type="text" name="cta_judul" value="{{ old('cta_judul', $page->cta_judul ?? 'Keindahan yang Tak Terlupakan') }}">

            <label>Deskripsi CTA</label>
            <textarea name="cta_deskripsi" rows="4">{{ old('cta_deskripsi', $page->cta_deskripsi ?? 'Pantai Pelawan menawarkan pemandangan alam yang memukau dan cocok untuk diabadikan dalam berbagai momen wisata.') }}</textarea>

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
        const savedScroll = sessionStorage.getItem('galeriAdminScrollY');

        if (savedScroll !== null) {
            window.scrollTo(0, parseInt(savedScroll));
            sessionStorage.removeItem('galeriAdminScrollY');
        }

        document.querySelectorAll('form').forEach(function(form) {
            form.addEventListener('submit', function() {
                sessionStorage.setItem('galeriAdminScrollY', window.scrollY);
            });
        });
    });
</script>

@endsection