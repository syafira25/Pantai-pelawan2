@extends('admin.layouts.app')

@section('content')

@php
    $utama = $utama ?? collect();
    $pendukung = $pendukung ?? collect();
@endphp

<section class="page-hero page-hero-fasilitas">
    <button type="button" class="admin-edit-btn-float" onclick="openModal('modalEditHero')">
        ✏️ Edit Hero
    </button>

    <div class="page-hero-overlay">
        <div class="container">
            <div class="page-hero-content">
                <h1>{{ $page->hero_judul ?? 'Fasilitas Pantai Pelawan' }}</h1>
                <p>
                    {{ $page->hero_deskripsi ?? 'Berbagai fasilitas tersedia untuk menunjang kenyamanan pengunjung selama berwisata di Pantai Pelawan.' }}
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <button type="button" class="admin-edit-btn-float" onclick="openModal('modalEditUtamaHeader')">
        ✏️ Edit Judul
    </button>

    <div class="container">

        <div class="section-heading">
            <span class="section-label">{{ $page->utama_label ?? 'Fasilitas' }}</span>
            <h2>{{ $page->utama_judul ?? 'Fasilitas yang Tersedia' }}</h2>
            <p>{{ $page->utama_deskripsi ?? 'Pantai Pelawan menyediakan berbagai fasilitas untuk menunjang kenyamanan pengunjung selama berwisata.' }}</p>
        </div>

        <div class="facility-premium-grid">

            @forelse($utama as $item)
                <div class="facility-premium-card admin-edit-card">
                    <div class="facility-icon">{{ $item->icon }}</div>
                    <h3>{{ $item->judul }}</h3>
                    <p>{{ $item->deskripsi }}</p>

                    <div class="admin-card-edit-actions">
                        <button type="button" onclick="openModal('modalEditFasilitas{{ $item->id }}')">
                            ✏️ Edit
                        </button>

                        <form action="{{ route('admin.fasilitas.destroy', $item->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus fasilitas ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="hapus-btn">
                                🗑 Hapus
                            </button>
                        </form>
                    </div>
                </div>

                <div id="modalEditFasilitas{{ $item->id }}" class="admin-modal">
                    <div class="admin-modal-box">
                        <span class="admin-close" onclick="closeModal('modalEditFasilitas{{ $item->id }}')">&times;</span>

                        <h2>Edit Fasilitas</h2>

                        <form action="{{ route('admin.fasilitas.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <label>Kategori</label>
                            <select name="kategori" required>
                                <option value="utama" {{ old('kategori', $item->kategori) == 'utama' ? 'selected' : '' }}>Fasilitas Utama</option>
                                <option value="pendukung" {{ old('kategori', $item->kategori) == 'pendukung' ? 'selected' : '' }}>Fasilitas Pendukung</option>
                            </select>

                            <label>Icon Emoji</label>
                            <input type="text" name="icon" value="{{ old('icon', $item->icon) }}">

                            <label>Judul</label>
                            <input type="text" name="judul" value="{{ old('judul', $item->judul) }}" required>

                            <label>Deskripsi</label>
                            <textarea name="deskripsi" rows="4">{{ old('deskripsi', $item->deskripsi) }}</textarea>

                            <label>Urutan</label>
                            <input type="number" name="urutan" value="{{ old('urutan', $item->urutan) }}">

                            <label>Status</label>
                            <select name="status">
                                <option value="aktif" {{ old('status', $item->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status', $item->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>

                            <button type="submit" class="btn btn-primary">
                                Simpan Perubahan
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada fasilitas utama.</p>
            @endforelse

        </div>

    </div>
</section>

<section class="section section-soft wisata-activity-section">
    <button type="button" class="admin-edit-btn-float" onclick="openModal('modalEditPendukungHeader')">
        ✏️ Edit Judul
    </button>

    <div class="container">

        <div class="section-heading activity-heading">
            <span class="section-label">{{ $page->pendukung_label ?? 'Wahana Wisata' }}</span>
            <h2>{{ $page->pendukung_judul ?? 'Aktivitas Wisata Pantai' }}</h2>
            <p>
                {{ $page->pendukung_deskripsi ?? 'Nikmati berbagai wahana dan spot menarik yang dapat menambah pengalaman wisata di Pantai Pelawan.' }}
            </p>
        </div>

        <div class="activity-grid">

            @forelse($pendukung as $item)
                <div class="activity-card admin-edit-card">
                    <div class="activity-icon">{{ $item->icon }}</div>

                    <div class="activity-content">
                        <h3>{{ $item->judul }}</h3>
                        <p>{{ $item->deskripsi }}</p>
                    </div>

                    <div class="admin-card-edit-actions">
                        <button type="button" onclick="openModal('modalEditFasilitas{{ $item->id }}')">
                            ✏️ Edit
                        </button>

                        <form action="{{ route('admin.fasilitas.destroy', $item->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus fasilitas ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="hapus-btn">
                                🗑 Hapus
                            </button>
                        </form>
                    </div>
                </div>

                <div id="modalEditFasilitas{{ $item->id }}" class="admin-modal">
                    <div class="admin-modal-box">
                        <span class="admin-close" onclick="closeModal('modalEditFasilitas{{ $item->id }}')">&times;</span>

                        <h2>Edit Aktivitas / Wahana</h2>

                        <form action="{{ route('admin.fasilitas.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <label>Kategori</label>
                            <select name="kategori" required>
                                <option value="utama" {{ old('kategori', $item->kategori) == 'utama' ? 'selected' : '' }}>Fasilitas Utama</option>
                                <option value="pendukung" {{ old('kategori', $item->kategori) == 'pendukung' ? 'selected' : '' }}>Fasilitas Pendukung</option>
                            </select>

                            <label>Icon Emoji</label>
                            <input type="text" name="icon" value="{{ old('icon', $item->icon) }}">

                            <label>Judul</label>
                            <input type="text" name="judul" value="{{ old('judul', $item->judul) }}" required>

                            <label>Deskripsi</label>
                            <textarea name="deskripsi" rows="4">{{ old('deskripsi', $item->deskripsi) }}</textarea>

                            <label>Urutan</label>
                            <input type="number" name="urutan" value="{{ old('urutan', $item->urutan) }}">

                            <label>Status</label>
                            <select name="status">
                                <option value="aktif" {{ old('status', $item->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="nonaktif" {{ old('status', $item->status) == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                            </select>

                            <button type="submit" class="btn btn-primary">
                                Simpan Perubahan
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada fasilitas pendukung.</p>
            @endforelse

        </div>

    </div>
</section>

<section class="section">
    <button type="button" class="admin-edit-btn-float" onclick="openModal('modalEditCta')">
        ✏️ Edit CTA
    </button>

    <div class="container">
        <div class="facility-cta">
            <div>
                <span>{{ $page->cta_label ?? '🌴 Kenyamanan Pengunjung' }}</span>
                <h2>{{ $page->cta_judul ?? 'Fasilitas untuk Kenyamanan Wisata' }}</h2>
                <p>{{ $page->cta_deskripsi ?? 'Dengan berbagai fasilitas yang tersedia, Pantai Pelawan berupaya memberikan pengalaman wisata yang lebih nyaman bagi setiap pengunjung.' }}</p>
            </div>

            <a href="{{ route('tiket') }}" class="btn btn-primary">
                {{ $page->cta_tombol ?? 'Pesan Tiket' }}
            </a>
        </div>
    </div>
</section>

<div id="modalEditHero" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditHero')">&times;</span>

        <h2>Edit Hero</h2>

        <form action="{{ route('admin.fasilitas.page.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Judul Hero</label>
            <input type="text" name="hero_judul" value="{{ old('hero_judul', $page->hero_judul ?? 'Fasilitas Pantai Pelawan') }}">

            <label>Deskripsi Hero</label>
            <textarea name="hero_deskripsi" rows="4">{{ old('hero_deskripsi', $page->hero_deskripsi ?? 'Berbagai fasilitas tersedia untuk menunjang kenyamanan pengunjung selama berwisata di Pantai Pelawan.') }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Hero</button>
        </form>
    </div>
</div>

<div id="modalEditUtamaHeader" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditUtamaHeader')">&times;</span>

        <h2>Edit Judul Fasilitas</h2>

        <form action="{{ route('admin.fasilitas.page.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label Fasilitas</label>
            <input type="text" name="utama_label" value="{{ old('utama_label', $page->utama_label ?? 'Fasilitas') }}">

            <label>Judul Fasilitas</label>
            <input type="text" name="utama_judul" value="{{ old('utama_judul', $page->utama_judul ?? 'Fasilitas yang Tersedia') }}">

            <label>Deskripsi Fasilitas</label>
            <textarea name="utama_deskripsi" rows="4">{{ old('utama_deskripsi', $page->utama_deskripsi ?? 'Pantai Pelawan menyediakan berbagai fasilitas untuk menunjang kenyamanan pengunjung selama berwisata.') }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Judul</button>
        </form>
    </div>
</div>

<div id="modalEditPendukungHeader" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditPendukungHeader')">&times;</span>

        <h2>Edit Judul Aktivitas</h2>

        <form action="{{ route('admin.fasilitas.page.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label Aktivitas</label>
            <input type="text" name="pendukung_label" value="{{ old('pendukung_label', $page->pendukung_label ?? 'Wahana Wisata') }}">

            <label>Judul Aktivitas</label>
            <input type="text" name="pendukung_judul" value="{{ old('pendukung_judul', $page->pendukung_judul ?? 'Aktivitas Wisata Pantai') }}">

            <label>Deskripsi Aktivitas</label>
            <textarea name="pendukung_deskripsi" rows="4">{{ old('pendukung_deskripsi', $page->pendukung_deskripsi ?? 'Nikmati berbagai wahana dan spot menarik yang dapat menambah pengalaman wisata di Pantai Pelawan.') }}</textarea>

            <button type="submit" class="btn btn-primary">Simpan Judul</button>
        </form>
    </div>
</div>

<div id="modalEditCta" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditCta')">&times;</span>

        <h2>Edit CTA</h2>

        <form action="{{ route('admin.fasilitas.page.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Label CTA</label>
            <input type="text" name="cta_label" value="{{ old('cta_label', $page->cta_label ?? '🌴 Kenyamanan Pengunjung') }}">

            <label>Judul CTA</label>
            <input type="text" name="cta_judul" value="{{ old('cta_judul', $page->cta_judul ?? 'Fasilitas untuk Kenyamanan Wisata') }}">

            <label>Deskripsi CTA</label>
            <textarea name="cta_deskripsi" rows="4">{{ old('cta_deskripsi', $page->cta_deskripsi ?? 'Dengan berbagai fasilitas yang tersedia, Pantai Pelawan berupaya memberikan pengalaman wisata yang lebih nyaman bagi setiap pengunjung.') }}</textarea>

            <label>Teks Tombol CTA</label>
            <input type="text" name="cta_tombol" value="{{ old('cta_tombol', $page->cta_tombol ?? 'Pesan Tiket') }}">

            <button type="submit" class="btn btn-primary">Simpan CTA</button>
        </form>
    </div>
</div>

<style>
    .page-hero-fasilitas,
    .section {
        position: relative;
    }

    .admin-edit-card {
        position: relative;
    }

    .admin-edit-btn-float {
        position: absolute;
        top: 18px;
        right: 18px;
        z-index: 20;
        border: none;
        border-radius: 999px;
        background: #dc2626;
        color: #fff;
        padding: 8px 14px;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 10px 25px rgba(0,0,0,.2);
    }

    .admin-card-edit-actions {
        position: absolute;
        left: 18px;
        right: 18px;
        bottom: 16px;
        display: flex;
        justify-content: center;
        gap: 8px;
        opacity: 0;
        transform: translateY(8px);
        transition: .25s ease;
    }

    .admin-edit-card:hover .admin-card-edit-actions {
        opacity: 1;
        transform: translateY(0);
    }

    .admin-card-edit-actions button {
        border: none;
        border-radius: 999px;
        padding: 7px 12px;
        background: #fff;
        color: #14532d;
        font-size: 12px;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 8px 20px rgba(0,0,0,.18);
    }

    .admin-card-edit-actions .hapus-btn {
        background: #dc2626;
        color: #fff;
    }

    .admin-modal {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 9999;
        background: rgba(0,0,0,.55);
        align-items: center;
        justify-content: center;
        padding: 20px;
    }

    .admin-modal-box {
        width: min(95%, 620px);
        max-height: 90vh;
        overflow-y: auto;
        background: #fff;
        border-radius: 22px;
        padding: 28px;
        position: relative;
    }

    .admin-close {
        position: absolute;
        top: 12px;
        right: 18px;
        font-size: 30px;
        font-weight: bold;
        color: #dc2626;
        cursor: pointer;
    }

    .admin-modal-box label {
        display: block;
        font-weight: 700;
        margin: 14px 0 6px;
        color: #14532d;
    }

    .admin-modal-box input,
    .admin-modal-box textarea,
    .admin-modal-box select {
        width: 100%;
        border: 1px solid #d1fae5;
        border-radius: 12px;
        padding: 12px;
        outline: none;
    }
</style>

<script>
    function openModal(id) {
        const modal = document.getElementById(id);
        if (modal) {
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

    document.addEventListener('DOMContentLoaded', function() {
        const savedScroll = sessionStorage.getItem('fasilitasAdminScrollY');

        if (savedScroll !== null) {
            window.scrollTo(0, parseInt(savedScroll));
            sessionStorage.removeItem('fasilitasAdminScrollY');
        }

        document.querySelectorAll('form').forEach(function(form) {
            form.addEventListener('submit', function() {
                sessionStorage.setItem('fasilitasAdminScrollY', window.scrollY);
            });
        });
    });
</script>

@endsection