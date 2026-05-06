@extends('layouts.app')

@section('content')

@php
    function adminImageUrl($path) {
        if (!$path) {
            return asset('images/hero-pantai.jpg');
        }

        if (str_starts_with($path, 'images/')) {
            return asset($path);
        }

        return asset('storage/' . $path);
    }
@endphp

<section class="admin-page-header">
    <div>
        <h1>Kelola Galeri</h1>
        <p>
            Tampilan di bawah dibuat seperti halaman user. Admin cukup klik tombol edit untuk mengubah isi galeri.
        </p>
    </div>

    <a href="{{ route('galeri') }}" class="admin-yellow-btn">
        Lihat Halaman User
    </a>
</section>

@if(session('success'))
    <div class="admin-alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="admin-alert-error">
        <strong>Terjadi kesalahan:</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<section class="admin-preview-area">

    <section 
        class="page-hero page-hero-galeri admin-preview-hero"
        style="background-image: linear-gradient(rgba(33, 78, 53, 0.68), rgba(33, 78, 53, 0.68)), url('{{ adminImageUrl($section->hero_image) }}');"
    >
        <button class="admin-edit-btn admin-hero-edit" onclick="openModal('modalHero')">
            ✏️ Edit Hero
        </button>

        <div class="page-hero-overlay">
            <div class="container">
                <div class="page-hero-content">
                    <h1>{{ $section->hero_title }}</h1>
                    <p>{{ $section->hero_description }}</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-soft">
        <div class="container">

            <div class="admin-section-control">
                <button class="admin-edit-btn" onclick="openModal('modalHeading')">
                    ✏️ Edit Judul Section
                </button>
            </div>

            <div class="section-heading">
                <span class="section-label">{{ $section->section_label }}</span>
                <h2>{{ $section->section_title }}</h2>
                <p>{{ $section->section_description }}</p>
            </div>

            <div class="admin-section-control admin-add-control">
                <button class="admin-add-btn" onclick="openModal('modalTambahFoto')">
                    + Tambah Foto Galeri
                </button>
            </div>

            <div class="galeri-masonry">

                @forelse($items as $item)
                    <div class="galeri-card 
                        {{ $item->type == 'large' ? 'galeri-large' : '' }}
                        {{ $item->type == 'wide' ? 'galeri-wide' : '' }}"
                    >
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">

                        <div class="galeri-overlay">
                            <h3>{{ $item->title }}</h3>
                            <p>{{ $item->description }}</p>
                        </div>

                        <div class="admin-card-actions">
                            <button type="button" onclick="openModal('modalEditFoto{{ $item->id }}')">
                                ✏️ Edit
                            </button>

                            <form action="{{ route('admin.galeri.item.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="delete">
                                    🗑 Hapus
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="admin-modal" id="modalEditFoto{{ $item->id }}">
                        <div class="admin-modal-box">
                            <button class="admin-modal-close" onclick="closeModal('modalEditFoto{{ $item->id }}')" type="button">×</button>

                            <h2>Edit Foto Galeri</h2>

                            <form action="{{ route('admin.galeri.item.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="admin-current-image">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                                </div>

                                <label>Judul Foto</label>
                                <input type="text" name="title" value="{{ $item->title }}" required>

                                <label>Deskripsi Foto</label>
                                <textarea name="description">{{ $item->description }}</textarea>

                                <label>Jenis Tampilan</label>
                                <select name="type">
                                    <option value="normal" {{ $item->type == 'normal' ? 'selected' : '' }}>Normal</option>
                                    <option value="large" {{ $item->type == 'large' ? 'selected' : '' }}>Besar</option>
                                    <option value="wide" {{ $item->type == 'wide' ? 'selected' : '' }}>Lebar</option>
                                </select>

                                <label>Urutan</label>
                                <input type="number" name="sort_order" value="{{ $item->sort_order }}">

                                <label>Ubah Gambar</label>
                                <input type="file" name="image" accept="image/*">

                                <button type="submit" class="admin-submit-btn">
                                    Simpan Perubahan
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="admin-empty-gallery">
                        <h3>Belum ada foto galeri</h3>
                        <p>Klik tombol tambah foto untuk mulai mengisi galeri.</p>
                    </div>
                @endforelse

            </div>

        </div>
    </section>

    <section class="section">
        <div class="container">

            <div class="admin-section-control">
                <button class="admin-edit-btn" onclick="openModal('modalCta')">
                    ✏️ Edit CTA
                </button>
            </div>

            <div class="galeri-cta">
                <div>
                    <span>{{ $section->cta_badge }}</span>
                    <h2>{{ $section->cta_title }}</h2>
                    <p>{{ $section->cta_description }}</p>
                </div>
            </div>

        </div>
    </section>

</section>

<div class="admin-modal" id="modalHero">
    <div class="admin-modal-box">
        <button class="admin-modal-close" onclick="closeModal('modalHero')" type="button">×</button>

        <h2>Edit Hero Galeri</h2>

        <form action="{{ route('admin.galeri.hero.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="admin-current-image">
                <img src="{{ adminImageUrl($section->hero_image) }}" alt="Hero Galeri">
            </div>

            <label>Judul Hero</label>
            <input type="text" name="hero_title" value="{{ $section->hero_title }}" required>

            <label>Deskripsi Hero</label>
            <textarea name="hero_description">{{ $section->hero_description }}</textarea>

            <label>Ubah Gambar Hero</label>
            <input type="file" name="hero_image" accept="image/*">

            <button type="submit" class="admin-submit-btn">
                Simpan Hero
            </button>
        </form>
    </div>
</div>

<div class="admin-modal" id="modalHeading">
    <div class="admin-modal-box">
        <button class="admin-modal-close" onclick="closeModal('modalHeading')" type="button">×</button>

        <h2>Edit Judul Section</h2>

        <form action="{{ route('admin.galeri.heading.update') }}" method="POST">
            @csrf

            <label>Label Section</label>
            <input type="text" name="section_label" value="{{ $section->section_label }}" required>

            <label>Judul Section</label>
            <input type="text" name="section_title" value="{{ $section->section_title }}" required>

            <label>Deskripsi Section</label>
            <textarea name="section_description">{{ $section->section_description }}</textarea>

            <button type="submit" class="admin-submit-btn">
                Simpan Section
            </button>
        </form>
    </div>
</div>

<div class="admin-modal" id="modalCta">
    <div class="admin-modal-box">
        <button class="admin-modal-close" onclick="closeModal('modalCta')" type="button">×</button>

        <h2>Edit CTA Galeri</h2>

        <form action="{{ route('admin.galeri.cta.update') }}" method="POST">
            @csrf

            <label>Badge CTA</label>
            <input type="text" name="cta_badge" value="{{ $section->cta_badge }}" required>

            <label>Judul CTA</label>
            <input type="text" name="cta_title" value="{{ $section->cta_title }}" required>

            <label>Deskripsi CTA</label>
            <textarea name="cta_description">{{ $section->cta_description }}</textarea>

            <button type="submit" class="admin-submit-btn">
                Simpan CTA
            </button>
        </form>
    </div>
</div>

<div class="admin-modal" id="modalTambahFoto">
    <div class="admin-modal-box">
        <button class="admin-modal-close" onclick="closeModal('modalTambahFoto')" type="button">×</button>

        <h2>Tambah Foto Galeri</h2>

        <form action="{{ route('admin.galeri.item.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label>Judul Foto</label>
            <input type="text" name="title" placeholder="Contoh: Panorama Pantai" required>

            <label>Deskripsi Foto</label>
            <textarea name="description" placeholder="Contoh: Keindahan suasana Pantai Pelawan."></textarea>

            <label>Jenis Tampilan</label>
            <select name="type">
                <option value="normal">Normal</option>
                <option value="large">Besar</option>
                <option value="wide">Lebar</option>
            </select>

            <label>Urutan</label>
            <input type="number" name="sort_order" value="0">

            <label>Gambar</label>
            <input type="file" name="image" accept="image/*" required>

            <button type="submit" class="admin-submit-btn">
                Tambah Foto
            </button>
        </form>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).classList.add('active');
    }

    function closeModal(id) {
        document.getElementById(id).classList.remove('active');
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.admin-modal').forEach(function(modal) {
                modal.classList.remove('active');
            });
        }
    });
</script>

@endsection