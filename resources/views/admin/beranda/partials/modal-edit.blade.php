<div id="modalEditFasilitas{{ $item->id }}" class="admin-modal">
    <div class="admin-modal-box">

        <span class="admin-close" onclick="closeModal('modalEditFasilitas{{ $item->id }}')">&times;</span>

        <h2>Edit Fasilitas</h2>

        <form action="{{ route('admin.fasilitas.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="redirect_section" value="{{ $item->kategori == 'utama' ? 'fasilitas-utama' : 'fasilitas-pendukung' }}">

            <label>Kategori</label>
            <select name="kategori" required>
                <option value="utama" {{ old('kategori', $item->kategori) == 'utama' ? 'selected' : '' }}>
                    Fasilitas Utama
                </option>

                <option value="pendukung" {{ old('kategori', $item->kategori) == 'pendukung' ? 'selected' : '' }}>
                    Fasilitas Pendukung
                </option>
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
                <option value="aktif" {{ old('status', $item->status) == 'aktif' ? 'selected' : '' }}>
                    Aktif
                </option>

                <option value="nonaktif" {{ old('status', $item->status) == 'nonaktif' ? 'selected' : '' }}>
                    Nonaktif
                </option>
            </select>

            <button type="submit" class="btn btn-primary">
                Simpan Perubahan
            </button>
        </form>

    </div>
</div>