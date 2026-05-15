@extends('admin.layouts.app')

@section('title', 'Kelola Kuliner')

@section('content')

@php
    $heroJudul = $kulinerPage->hero_judul ?? 'Wisata Kuliner Pantai Pelawan';
    $heroSubjudul = $kulinerPage->hero_subjudul ?? 'Temukan pilihan warung makan di sekitar Pantai Pelawan, lengkap dengan informasi menu, harga, foto makanan, dan lokasi warung.';

    $sectionLabel = $kulinerPage->section_label ?? 'Kuliner Sekitar Pantai';
    $sectionJudul = $kulinerPage->section_judul ?? 'Rekomendasi Warung Kuliner';
    $sectionDeskripsi = $kulinerPage->section_deskripsi ?? 'Pilih warung yang ingin kamu lihat untuk mengetahui daftar menu, harga, foto makanan, dan alamat warung di sekitar Pantai Pelawan.';
@endphp

<div class="admin-user-preview-page">

    <div class="admin-floating-title">
        <div>
            <h1>Kelola Kuliner</h1>
            <p>Tampilan di bawah ini sama seperti halaman user. Admin dapat mengedit hero, heading, warung, gambar, dan menu.</p>
        </div>

        <a href="{{ route('kuliner') }}" target="_blank" class="admin-view-user-btn">
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
        <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalHeroKuliner')">
            ✏️ Edit Hero
        </button>

        <section class="page-hero page-hero-kuliner admin-preview-hero">
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

    {{-- SECTION WARUNG --}}
    <div class="admin-editable-section">
        <div class="admin-kuliner-action-group">
            <button type="button" class="admin-section-edit-btn admin-section-edit-left" onclick="openAdminModal('modalSectionKuliner')">
                ✏️ Edit Judul Section
            </button>

            <button type="button" class="admin-section-edit-btn" onclick="openAdminModal('modalTambahWarung')">
                + Tambah Warung
            </button>
        </div>

        <section class="section section-soft">
            <div class="container">

                <div class="section-heading">
                    <span class="section-label">{{ $sectionLabel }}</span>
                    <h2>{{ $sectionJudul }}</h2>
                    <p>{{ $sectionDeskripsi }}</p>
                </div>

                <div class="warung-grid">

                    @forelse($warungs as $warung)

                        @php
                            $gambarUtama = $warung->gambar ?? 'images/hero-pantai.jpg';
                            $gambarProfil = $warung->gambar_2 ?? 'images/profil_pantai.jpg';
                            $gambarFallback = $warung->gambar_3 ?? 'images/hero-pantai.jpg';
                        @endphp

                        <div class="admin-warung-preview-wrap">

                            <div class="admin-card-actions">
                                <button type="button"
                                        class="admin-card-edit-btn"
                                        onclick="openAdminModal('modalEditWarung{{ $warung->id }}')">
                                    ✏️ Edit
                                </button>

                                <button type="button"
                                        class="admin-card-menu-btn"
                                        onclick="openAdminModal('modalMenuWarung{{ $warung->id }}')">
                                    🍽️ Menu
                                </button>

                                <a href="{{ route('kuliner.detail', $warung->slug) }}"
                                   target="_blank"
                                   class="admin-card-preview-btn">
                                    👁️ Detail
                                </a>

                                <form action="{{ route('admin.kuliner.destroy', $warung->id) }}"
      method="POST"
      onsubmit="return confirm('Yakin ingin menghapus warung ini?')">
    @csrf
    @method('DELETE')

    <button type="submit" class="admin-card-delete-btn">
        🗑️ Hapus
    </button>
</form>
                            </div>

                            <div class="warung-card admin-warung-card-same">

                                <div class="warung-img-box">
                                    <img
                                         class="warung-main-img"
                                        src="{{ str_starts_with($gambarUtama, 'images/') ? asset($gambarUtama) : asset('storage/' . $gambarUtama) }}"
                                        alt="{{ $warung->nama }}"
                                        onerror="this.src='{{ asset('images/hero-pantai.jpg') }}'"
                                    >

                                    <div class="warung-img-overlay"></div>

                                    <span class="warung-badge">
                                        {{ $warung->badge ?? 'Kuliner Pantai' }}
                                    </span>

                                    <div class="warung-mini-gallery">
                                        <img src="{{ str_starts_with($gambarUtama, 'images/') ? asset($gambarUtama) : asset('storage/' . $gambarUtama) }}" alt="{{ $warung->nama }}"
                                             onerror="this.src='{{ asset('images/hero-pantai.jpg') }}'">

                                        <img src="{{ str_starts_with($gambarProfil, 'images/') ? asset($gambarProfil) : asset('storage/' . $gambarProfil) }}" alt="{{ $warung->nama }}"
                                             onerror="this.src='{{ asset('images/hero-pantai.jpg') }}'">

                                        <img src="{{ str_starts_with($gambarFallback, 'images/') ? asset($gambarFallback) : asset('storage/' . $gambarFallback) }}" alt="{{ $warung->nama }}"
                                             onerror="this.src='{{ asset('images/hero-pantai.jpg') }}'">
                                    </div>
                                </div>

                                <div class="warung-card-body">
                                    <span class="warung-category">
                                        {{ $warung->kategori ?? 'Warung sekitar Pantai Pelawan' }}
                                    </span>

                                    <h3>{{ $warung->nama }}</h3>

                                    <p>{{ $warung->deskripsi }}</p>

                                    <div class="warung-address">
                                        <strong>📍 Alamat Warung</strong>
                                        <span>
                                            {{ $warung->alamat ?? 'Area kuliner sekitar Pantai Pelawan, Desa Pangke Barat, Kabupaten Karimun' }}
                                        </span>
                                    </div>

                                    <span class="lihat-menu">Lihat Menu →</span>
                                </div>

                            </div>
                        </div>

                        {{-- MODAL EDIT WARUNG --}}
                        <div class="admin-modal" id="modalEditWarung{{ $warung->id }}">
                            <div class="admin-modal-box modal-large">
                                <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalEditWarung{{ $warung->id }}')">×</button>

                                <h2>Edit Warung Kuliner</h2>

                                <form action="{{ route('admin.kuliner.update', $warung->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

                                    <div class="admin-form-grid">
                                        <div class="admin-form-group">
                                            <label>Nama Warung</label>
                                            <input type="text" name="nama" value="{{ old('nama', $warung->nama) }}" required>
                                        </div>

                                        <div class="admin-form-group">
                                            <label>Badge</label>
                                            <input type="text" name="badge" value="{{ old('badge', $warung->badge) }}" placeholder="Kuliner Pantai">
                                        </div>

                                        <div class="admin-form-group">
                                            <label>Kategori</label>
                                            <input type="text" name="kategori" value="{{ old('kategori', $warung->kategori) }}" placeholder="Warung sekitar Pantai Pelawan">
                                        </div>

                                        <div class="admin-form-group">
                                            <label>Status</label>
                                            <select name="status">
                                                <option value="aktif" {{ $warung->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                                <option value="nonaktif" {{ $warung->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                            </select>
                                        </div>

                                        <div class="admin-form-group full">
                                            <label>Deskripsi</label>
                                            <textarea name="deskripsi" rows="4">{{ old('deskripsi', $warung->deskripsi) }}</textarea>
                                        </div>

                                        <div class="admin-form-group full">
                                            <label>Alamat</label>
                                            <textarea name="alamat" rows="3">{{ old('alamat', $warung->alamat) }}</textarea>
                                        </div>

                                        <div class="admin-form-group">
                                            <label>Ganti Gambar Utama</label>
                                            <input type="file" name="gambar" accept="image/*">
                                        </div>

                                        <div class="admin-form-group">
                                            <label>Ganti Gambar Mini 1</label>
                                            <input type="file" name="gambar_2" accept="image/*">
                                        </div>

                                        <div class="admin-form-group">
                                            <label>Ganti Gambar Mini 2</label>
                                            <input type="file" name="gambar_3" accept="image/*">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn-admin-save">
                                        Simpan Perubahan Warung
                                    </button>
                                </form>
                            </div>
                        </div>

                    {{-- MODAL MENU WARUNG --}}
<div class="admin-modal" id="modalMenuWarung{{ $warung->id }}">
    <div class="admin-modal-box modal-large">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalMenuWarung{{ $warung->id }}')">×</button>

        <h2>Kelola Menu - {{ $warung->nama }}</h2>

        <form action="{{ route('admin.kuliner.menu.store', $warung->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="admin-form-grid">
                <div class="admin-form-group">
                    <label>Nama Menu</label>
                    <input type="text" name="nama_menu" required>
                </div>

                <div class="admin-form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" placeholder="Contoh: 15000">
                </div>

                <div class="admin-form-group">
                    <label>Kategori Menu</label>
                    <select name="kategori" required>
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                    </select>
                </div>

                <div class="admin-form-group">
                    <label>Status</label>
                    <select name="status">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi Menu</label>
                    <textarea name="deskripsi" rows="3"></textarea>
                </div>

                <div class="admin-form-group">
                    <label>Gambar Menu</label>
                    <input type="file" name="gambar" accept="image/*">
                </div>
            </div>

            <button type="submit" class="btn-admin-save">
                Tambah Menu
            </button>
        </form>

        <h3 style="margin-top:25px;">Menu Makanan</h3>

        <div class="admin-menu-list">
            @forelse($warung->menus->where('kategori', 'makanan') as $menu)
                <div class="admin-menu-item">
                    <div>
                        <h4>{{ $menu->nama_menu }}</h4>
                        <p>{{ $menu->deskripsi }}</p>
                        <strong>Rp {{ number_format($menu->harga ?? 0, 0, ',', '.') }}</strong>
                    </div>

                    <button type="button"
                            class="btn-ulasan edit"
                            onclick="openAdminModal('modalEditMenu{{ $menu->id }}')">
                        Edit
                    </button>

                    <form action="{{ route('admin.kuliner.menu.destroy', $menu->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn-ulasan delete">
                            Hapus
                        </button>
                    </form>
                </div>

                {{-- MODAL EDIT MENU MAKANAN --}}
                <div class="admin-modal" id="modalEditMenu{{ $menu->id }}">
                    <div class="admin-modal-box">
                        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalEditMenu{{ $menu->id }}')">×</button>

                        <h2>Edit Menu</h2>

                        <form action="{{ route('admin.kuliner.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                            <div class="admin-form-group">
                                <label>Nama Menu</label>
                                <input type="text" name="nama_menu" value="{{ $menu->nama_menu }}" required>
                            </div>

                            <div class="admin-form-group">
                                <label>Harga</label>
                                <input type="number" name="harga" value="{{ $menu->harga }}">
                            </div>

                            <div class="admin-form-group">
                                <label>Kategori</label>
                                <select name="kategori" required>
                                    <option value="makanan" {{ $menu->kategori == 'makanan' ? 'selected' : '' }}>Makanan</option>
                                    <option value="minuman" {{ $menu->kategori == 'minuman' ? 'selected' : '' }}>Minuman</option>
                                </select>
                            </div>

                            <div class="admin-form-group">
                                <label>Status</label>
                                <select name="status" required>
                                    <option value="aktif" {{ $menu->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="nonaktif" {{ $menu->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                            </div>

                            <div class="admin-form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" rows="3">{{ $menu->deskripsi }}</textarea>
                            </div>

                            <div class="admin-form-group">
                                <label>Ganti Gambar</label>
                                <input type="file" name="gambar" accept="image/*">
                            </div>

                            <button type="submit" class="btn-admin-save">
                                Simpan Perubahan Menu
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="admin-empty-small">
                    Belum ada menu makanan.
                </div>
            @endforelse
        </div>

        <h3 style="margin-top:25px;">Menu Minuman</h3>

        <div class="admin-menu-list">
            @forelse($warung->menus->where('kategori', 'minuman') as $menu)
                <div class="admin-menu-item">
                    <div>
                        <h4>{{ $menu->nama_menu }}</h4>
                        <p>{{ $menu->deskripsi }}</p>
                        <strong>Rp {{ number_format($menu->harga ?? 0, 0, ',', '.') }}</strong>
                    </div>

                    <button type="button"
                            class="btn-ulasan edit"
                            onclick="openAdminModal('modalEditMenu{{ $menu->id }}')">
                        Edit
                    </button>

                    <form action="{{ route('admin.kuliner.menu.destroy', $menu->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn-ulasan delete">
                            Hapus
                        </button>
                    </form>
                </div>

                {{-- MODAL EDIT MENU MINUMAN --}}
                <div class="admin-modal" id="modalEditMenu{{ $menu->id }}">
                    <div class="admin-modal-box">
                        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalEditMenu{{ $menu->id }}')">×</button>

                        <h2>Edit Menu</h2>

                        <form action="{{ route('admin.kuliner.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="admin-form-group">
                                <label>Nama Menu</label>
                                <input type="text" name="nama_menu" value="{{ $menu->nama_menu }}" required>
                            </div>

                            <div class="admin-form-group">
                                <label>Harga</label>
                                <input type="number" name="harga" value="{{ $menu->harga }}">
                            </div>

                            <div class="admin-form-group">
                                <label>Kategori</label>
                                <select name="kategori" required>
                                    <option value="makanan" {{ $menu->kategori == 'makanan' ? 'selected' : '' }}>Makanan</option>
                                    <option value="minuman" {{ $menu->kategori == 'minuman' ? 'selected' : '' }}>Minuman</option>
                                </select>
                            </div>

                            <div class="admin-form-group">
                                <label>Status</label>
                                <select name="status" required>
                                    <option value="aktif" {{ $menu->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="nonaktif" {{ $menu->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                                </select>
                            </div>

                            <div class="admin-form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" rows="3">{{ $menu->deskripsi }}</textarea>
                            </div>

                            <div class="admin-form-group">
                                <label>Ganti Gambar</label>
                                <input type="file" name="gambar" accept="image/*">
                            </div>

                            <button type="submit" class="btn-admin-save">
                                Simpan Perubahan Menu
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="admin-empty-small">
                    Belum ada menu minuman.
                </div>
            @endforelse
        </div>

    </div>
</div>

                    @empty
                        <div class="empty-kuliner-box">
                            <h3>Belum Ada Data Kuliner</h3>
                            <p>Data warung kuliner akan tampil setelah admin menambahkannya.</p>
                        </div>
                    @endforelse

                </div>

            </div>
        </section>
    </div>

</div>

{{-- MODAL EDIT HERO --}}
<div class="admin-modal" id="modalHeroKuliner">
    <div class="admin-modal-box">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalHeroKuliner')">×</button>

        <h2>Edit Hero Kuliner</h2>

        <form action="{{ route('admin.kuliner.page.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label>Judul Hero</label>
                <input type="text" name="hero_judul" value="{{ old('hero_judul', $heroJudul) }}">
            </div>

            <div class="admin-form-group">
                <label>Subjudul Hero</label>
                <textarea name="hero_subjudul" rows="4">{{ old('hero_subjudul', $heroSubjudul) }}</textarea>
            </div>

            <button type="submit" class="btn-admin-save">
                Simpan Hero
            </button>
        </form>
    </div>
</div>

{{-- MODAL EDIT SECTION --}}
<div class="admin-modal" id="modalSectionKuliner">
    <div class="admin-modal-box">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalSectionKuliner')">×</button>

        <h2>Edit Judul Section Kuliner</h2>

        <form action="{{ route('admin.kuliner.page.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="admin-form-group">
                <label>Label Section</label>
                <input type="text" name="section_label" value="{{ old('section_label', $sectionLabel) }}">
            </div>

            <div class="admin-form-group">
                <label>Judul Section</label>
                <input type="text" name="section_judul" value="{{ old('section_judul', $sectionJudul) }}">
            </div>

            <div class="admin-form-group">
                <label>Deskripsi Section</label>
                <textarea name="section_deskripsi" rows="4">{{ old('section_deskripsi', $sectionDeskripsi) }}</textarea>
            </div>

            <button type="submit" class="btn-admin-save">
                Simpan Section
            </button>
        </form>
    </div>
</div>

{{-- MODAL TAMBAH WARUNG --}}
<div class="admin-modal" id="modalTambahWarung">
    <div class="admin-modal-box modal-large">
        <button type="button" class="admin-modal-close" onclick="closeAdminModal('modalTambahWarung')">×</button>

        <h2>Tambah Warung Kuliner</h2>

        <form action="{{ route('admin.kuliner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="admin-form-grid">
                <div class="admin-form-group">
                    <label>Nama Warung</label>
                    <input type="text" name="nama" required>
                </div>

                <div class="admin-form-group">
                    <label>Badge</label>
                    <input type="text" name="badge" placeholder="Kuliner Pantai">
                </div>

                <div class="admin-form-group">
                    <label>Kategori</label>
                    <input type="text" name="kategori" placeholder="Warung sekitar Pantai Pelawan">
                </div>

                <div class="admin-form-group">
                    <label>Status</label>
                    <select name="status">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" rows="4"></textarea>
                </div>

                <div class="admin-form-group full">
                    <label>Alamat</label>
                    <textarea name="alamat" rows="3"></textarea>
                </div>

                <div class="admin-form-group">
                    <label>Gambar Utama</label>
                    <input type="file" name="gambar" accept="image/*">
                </div>

                <div class="admin-form-group">
                    <label>Gambar Mini 1</label>
                    <input type="file" name="gambar_2" accept="image/*">
                </div>

                <div class="admin-form-group">
                    <label>Gambar Mini 2</label>
                    <input type="file" name="gambar_3" accept="image/*">
                </div>
            </div>

            <button type="submit" class="btn-admin-save">
                Simpan Warung
            </button>
        </form>
    </div>
</div>

<script>
    function openAdminModal(id) {
        const modal = document.getElementById(id);

        if (modal) {
            modal.classList.add('show');
            document.body.classList.add('modal-open');
        }
    }

    function closeAdminModal(id) {
        const modal = document.getElementById(id);

        if (modal) {
            modal.classList.remove('show');
            document.body.classList.remove('modal-open');
        }
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            document.querySelectorAll('.admin-modal.show').forEach(function(modal) {
                modal.classList.remove('show');
            });

            document.body.classList.remove('modal-open');
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const savedScroll = sessionStorage.getItem('kulinerAdminScrollY');

        if (savedScroll !== null) {
            window.scrollTo(0, parseInt(savedScroll));
            sessionStorage.removeItem('kulinerAdminScrollY');
        }

        document.querySelectorAll('form').forEach(function(form) {
            form.addEventListener('submit', function() {
                sessionStorage.setItem('kulinerAdminScrollY', window.scrollY);
            });
        });

        @if(session('open_menu_modal'))
            openAdminModal('modalMenuWarung{{ session('open_menu_modal') }}');
        @endif
    });
</script>

@endsection