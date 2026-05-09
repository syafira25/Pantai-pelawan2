<div id="modalEditBeranda{{ $item->id }}" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditBeranda{{ $item->id }}')">&times;</span>

        <h2>Edit Item Beranda</h2>

        <form action="{{ route('admin.beranda.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Kategori</label>
            <select name="kategori" required>
                <option value="layanan" {{ $item->kategori == 'layanan' ? 'selected' : '' }}>Layanan Website</option>
                <option value="keunggulan" {{ $item->kategori == 'keunggulan' ? 'selected' : '' }}>Keunggulan</option>
                <option value="informasi" {{ $item->kategori == 'informasi' ? 'selected' : '' }}>Informasi Website</option>
                <option value="alur" {{ $item->kategori == 'alur' ? 'selected' : '' }}>Alur Pemesanan</option>
            </select>

            <label>Icon Emoji</label>
            <input type="text" name="icon" value="{{ $item->icon }}">

            <label>Nomor</label>
            <input type="text" name="nomor" value="{{ $item->nomor }}">

            <label>Judul</label>
            <input type="text" name="judul" value="{{ $item->judul }}" required>

            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="4">{{ $item->deskripsi }}</textarea>

            <label>Urutan</label>
            <input type="number" name="urutan" value="{{ $item->urutan }}">

            <label>Status</label>
            <select name="status">
                <option value="aktif" {{ $item->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ $item->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>