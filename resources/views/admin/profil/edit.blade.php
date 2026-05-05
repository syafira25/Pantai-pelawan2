@extends('admin.layouts.app')

@section('title', 'Kelola Profil Pantai')

@section('content')

<div class="admin-content-wrap">

    <div class="admin-page-header">
        <h1>Kelola Profil Pantai</h1>
        <p>Ubah informasi profil Pantai Pelawan yang tampil di halaman user.</p>
    </div>

    @if(session('success'))
        <div class="admin-alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-card admin-form-card">

        <form action="{{ route('admin.profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="admin-form-grid">

                <div class="admin-form-group">
                    <label>Judul Profil</label>
                    <input type="text" name="judul" value="{{ old('judul', $profil->judul) }}" required>
                    @error('judul')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="admin-form-group">
                    <label>Subjudul</label>
                    <input type="text" name="subjudul" value="{{ old('subjudul', $profil->subjudul) }}">
                    @error('subjudul')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi Utama</label>
                    <textarea name="deskripsi_utama" rows="5" required>{{ old('deskripsi_utama', $profil->deskripsi_utama) }}</textarea>
                    @error('deskripsi_utama')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="admin-form-group full">
                    <label>Deskripsi Tambahan</label>
                    <textarea name="deskripsi_tambahan" rows="5">{{ old('deskripsi_tambahan', $profil->deskripsi_tambahan) }}</textarea>
                    @error('deskripsi_tambahan')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="admin-form-group">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" value="{{ old('lokasi', $profil->lokasi) }}">
                    @error('lokasi')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="admin-form-group">
                    <label>Jam Operasional</label>
                    <input type="text" name="jam_operasional" value="{{ old('jam_operasional', $profil->jam_operasional) }}">
                    @error('jam_operasional')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="admin-form-group">
                    <label>Harga Tiket</label>
                    <input type="text" name="harga_tiket" value="{{ old('harga_tiket', $profil->harga_tiket) }}">
                    @error('harga_tiket')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

                <div class="admin-form-group">
                    <label>Gambar Profil</label>
                    <input type="file" name="gambar" accept="image/*">
                    @error('gambar')
                        <small>{{ $message }}</small>
                    @enderror
                </div>

            </div>

            @if($profil->gambar)
                <div class="admin-preview-image">
                    <p>Gambar saat ini:</p>
                    <img src="{{ asset($profil->gambar) }}" alt="Profil Pantai">
                </div>
            @endif

            <div class="admin-form-actions">
                <button type="submit" class="btn-admin-save">
                    Simpan Perubahan
                </button>
            </div>

        </form>

    </div>

</div>

@endsection