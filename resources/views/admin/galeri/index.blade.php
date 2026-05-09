@extends('admin.layouts.app')

@section('title', 'Kelola Galeri')

@section('content')

<div class="admin-user-preview-page">

    <div class="admin-floating-title">
        <div>
            <h1>Kelola Galeri Pantai</h1>
            <p>Tampilan di bawah sama seperti halaman user, tetapi admin bisa mengelola semua foto.</p>
        </div>

        <button onclick="openModal('modalTambahGaleri')" class="admin-view-user-btn">
            + Tambah Foto
        </button>
    </div>

    @if(session('success'))
        <div class="admin-alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- HEADER --}}
    <section class="page-hero page-hero-galeri">
        <div class="page-hero-overlay">
            <div class="container">
                <div class="page-hero-content">
                    <h1>Galeri Pantai Pelawan</h1>
                    <p>
                        Dokumentasi keindahan Pantai Pelawan dari berbagai sudut, suasana, dan momen wisata.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- GALERI --}}
    <section class="section section-soft">
        <div class="container">

            <div class="section-heading">
                <span class="section-label">Dokumentasi Wisata</span>
                <h2>Foto Wisata Pantai Pelawan</h2>
                <p>
                    Beberapa dokumentasi pemandangan dan suasana wisata Pantai Pelawan.
                </p>
            </div>

            <div class="galeri-masonry">

                @forelse($galeris as $galeri)
                    <div class="galeri-card
                        {{ $galeri->tipe_card == 'large' ? 'galeri-large' : '' }}
                        {{ $galeri->tipe_card == 'wide' ? 'galeri-wide' : '' }}
                    ">

                        <img src="{{ str_starts_with($galeri->gambar, 'images/') ? asset($galeri->gambar) : asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}">

                        <div class="galeri-overlay">
                            <h3>{{ $galeri->judul }}</h3>
                            <p>{{ $galeri->deskripsi }}</p>
                        </div>

                        {{-- ADMIN ACTION --}}
                        <div class="admin-galeri-actions">
                            <button onclick="openModal('editModal{{ $galeri->id }}')">
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

                    {{-- MODAL EDIT --}}
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
                                <input type="text" name="judul" value="{{ $galeri->judul }}" required>

                                <label>Deskripsi</label>
                                <textarea name="deskripsi" rows="4">{{ $galeri->deskripsi }}</textarea>

                                <label>Gambar Saat Ini</label>
                                <img src="{{ str_starts_with($galeri->gambar, 'images/') ? asset($galeri->gambar) : asset('storage/' . $galeri->gambar) }}" class="admin-preview-image">

                                <label>Ubah Gambar</label>
                                <input type="file" name="gambar">

                                <label>Tipe Card</label>
                                <select name="tipe_card">
                                    <option value="normal" {{ $galeri->tipe_card == 'normal' ? 'selected' : '' }}>
                                        Normal
                                    </option>
                                    <option value="large" {{ $galeri->tipe_card == 'large' ? 'selected' : '' }}>
                                        Large
                                    </option>
                                    <option value="wide" {{ $galeri->tipe_card == 'wide' ? 'selected' : '' }}>
                                        Wide
                                    </option>
                                </select>

                                <label>Urutan</label>
                                <input type="number" name="urutan" value="{{ $galeri->urutan }}">

                                <label>Status</label>
                                <select name="status">
                                    <option value="aktif" {{ $galeri->status == 'aktif' ? 'selected' : '' }}>
                                        Aktif
                                    </option>
                                    <option value="nonaktif" {{ $galeri->status == 'nonaktif' ? 'selected' : '' }}>
                                        Nonaktif
                                    </option>
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

{{-- MODAL TAMBAH --}}
<div id="modalTambahGaleri" class="admin-modal">
    <div class="admin-modal-box">

        <span class="admin-close" onclick="closeModal('modalTambahGaleri')">
            &times;
        </span>

        <h2>Tambah Foto Galeri</h2>

        <form action="{{ route('admin.galeri.store') }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf

            <label>Judul</label>
            <input type="text" name="judul" required>

            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="4"></textarea>

            <label>Upload Gambar</label>
            <input type="file" name="gambar" required>

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

            <button type="submit" class="btn btn-primary">
                Simpan Foto
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