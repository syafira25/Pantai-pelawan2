@extends('admin.layouts.app')

@section('title', 'Kelola Fasilitas')

@section('content')

<div class="admin-user-preview-page">

    <div class="admin-floating-title">
        <div>
            <h1>Kelola Fasilitas Pantai</h1>
            <p>Tampilan di bawah sama seperti halaman user. Admin bisa mengubah setiap bagian tanpa edit coding.</p>
        </div>

        <div style="display:flex; gap:10px; flex-wrap:wrap;">
            <a href="{{ route('fasilitas') }}" target="_blank" class="admin-view-user-btn">
                Lihat User
            </a>

            <button onclick="openModal('modalTambahFasilitas')" class="admin-view-user-btn">
                + Tambah Fasilitas
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="admin-alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- HERO --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditPage')">
            ✏️ Edit Konten Halaman
        </button>

        <section class="page-hero page-hero-fasilitas">
            <div class="page-hero-overlay">
                <div class="container">
                    <div class="page-hero-content">
                        <h1>{{ $page->hero_judul }}</h1>
                        <p>{{ $page->hero_deskripsi }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- FASILITAS UTAMA --}}
    <section class="section section-soft">
        <div class="container">

            <div class="section-heading">
                <span class="section-label">{{ $page->utama_label }}</span>
                <h2>{{ $page->utama_judul }}</h2>
                <p>{{ $page->utama_deskripsi }}</p>
            </div>

            <div class="facility-premium-grid">
                @forelse($utama as $item)
                    <div class="facility-premium-card admin-fasilitas-card">
                        <div class="facility-icon">{{ $item->icon }}</div>
                        <h3>{{ $item->judul }}</h3>
                        <p>{{ $item->deskripsi }}</p>

                        <div class="admin-fasilitas-actions">
                            <button onclick="openModal('modalEditFasilitas{{ $item->id }}')">✏️ Edit</button>

                            <form action="{{ route('admin.fasilitas.destroy', $item->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus fasilitas ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="hapus-btn">🗑 Hapus</button>
                            </form>
                        </div>
                    </div>

                    @include('admin.fasilitas.partials.modal-edit', ['item' => $item])
                @empty
                    <p class="text-center">Belum ada fasilitas utama.</p>
                @endforelse
            </div>

        </div>
    </section>

    {{-- FASILITAS PENDUKUNG --}}
    <section class="section section-soft">
        <div class="container">

            <div class="section-heading">
                <span class="section-label">{{ $page->pendukung_label }}</span>
                <h2>{{ $page->pendukung_judul }}</h2>
                <p>{{ $page->pendukung_deskripsi }}</p>
            </div>

            <div class="facility-support-grid">
                @forelse($pendukung as $item)
                    <div class="facility-support-card admin-fasilitas-card">
                        <span>{{ $item->icon }}</span>
                        <div>
                            <h3>{{ $item->judul }}</h3>
                            <p>{{ $item->deskripsi }}</p>
                        </div>

                        <div class="admin-fasilitas-actions">
                            <button onclick="openModal('modalEditFasilitas{{ $item->id }}')">✏️ Edit</button>

                            <form action="{{ route('admin.fasilitas.destroy', $item->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus fasilitas ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="hapus-btn">🗑 Hapus</button>
                            </form>
                        </div>
                    </div>

                    @include('admin.fasilitas.partials.modal-edit', ['item' => $item])
                @empty
                    <p class="text-center">Belum ada fasilitas pendukung.</p>
                @endforelse
            </div>

        </div>
    </section>

    {{-- CTA --}}
    <div class="admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditPage')">
            ✏️ Edit CTA
        </button>

        <section class="section">
            <div class="container">
                <div class="facility-cta">
                    <div>
                        <span>{{ $page->cta_label }}</span>
                        <h2>{{ $page->cta_judul }}</h2>
                        <p>{{ $page->cta_deskripsi }}</p>
                    </div>

                    <a href="{{ route('tiket') }}" class="btn btn-primary">
                        {{ $page->cta_tombol }}
                    </a>
                </div>
            </div>
        </section>
    </div>

</div>

{{-- MODAL EDIT PAGE --}}
<div id="modalEditPage" class="admin-modal">
    <div class="admin-modal-box">

        <span class="admin-close" onclick="closeModal('modalEditPage')">&times;</span>

        <h2>Edit Konten Halaman Fasilitas</h2>

        <form action="{{ route('admin.fasilitas.page.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Judul Hero</label>
            <input type="text" name="hero_judul" value="{{ $page->hero_judul }}">

            <label>Deskripsi Hero</label>
            <textarea name="hero_deskripsi" rows="4">{{ $page->hero_deskripsi }}</textarea>

            <hr style="margin:22px 0;">

            <label>Label Fasilitas Utama</label>
            <input type="text" name="utama_label" value="{{ $page->utama_label }}">

            <label>Judul Fasilitas Utama</label>
            <input type="text" name="utama_judul" value="{{ $page->utama_judul }}">

            <label>Deskripsi Fasilitas Utama</label>
            <textarea name="utama_deskripsi" rows="4">{{ $page->utama_deskripsi }}</textarea>

            <hr style="margin:22px 0;">

            <label>Label Fasilitas Pendukung</label>
            <input type="text" name="pendukung_label" value="{{ $page->pendukung_label }}">

            <label>Judul Fasilitas Pendukung</label>
            <input type="text" name="pendukung_judul" value="{{ $page->pendukung_judul }}">

            <label>Deskripsi Fasilitas Pendukung</label>
            <textarea name="pendukung_deskripsi" rows="4">{{ $page->pendukung_deskripsi }}</textarea>

            <hr style="margin:22px 0;">

            <label>Label CTA</label>
            <input type="text" name="cta_label" value="{{ $page->cta_label }}">

            <label>Judul CTA</label>
            <input type="text" name="cta_judul" value="{{ $page->cta_judul }}">

            <label>Deskripsi CTA</label>
            <textarea name="cta_deskripsi" rows="4">{{ $page->cta_deskripsi }}</textarea>

            <label>Teks Tombol CTA</label>
            <input type="text" name="cta_tombol" value="{{ $page->cta_tombol }}">

            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>
        </form>

    </div>
</div>

{{-- MODAL TAMBAH --}}
<div id="modalTambahFasilitas" class="admin-modal">
    <div class="admin-modal-box">

        <span class="admin-close" onclick="closeModal('modalTambahFasilitas')">&times;</span>

        <h2>Tambah Fasilitas</h2>

        <form action="{{ route('admin.fasilitas.store') }}" method="POST">
            @csrf

            <label>Kategori</label>
            <select name="kategori" required>
                <option value="utama">Fasilitas Utama</option>
                <option value="pendukung">Fasilitas Pendukung</option>
            </select>

            <label>Icon Emoji</label>
            <input type="text" name="icon" placeholder="Contoh: 🏖️">

            <label>Judul</label>
            <input type="text" name="judul" required>

            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="4"></textarea>

            <label>Urutan</label>
            <input type="number" name="urutan" value="0">

            <label>Status</label>
            <select name="status">
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>

            <button type="submit" class="btn btn-primary">
                Simpan Fasilitas
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