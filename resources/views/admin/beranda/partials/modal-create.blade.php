<div id="modalTambahBeranda" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalTambahBeranda')">&times;</span>

        <h2>Tambah Item Beranda</h2>

        <form action="{{ route('admin.beranda.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label>Kategori</label>
            <select name="kategori" required>
                <option value="layanan">Layanan Website</option>
                <option value="keunggulan">Keunggulan / Daya Tarik</option>
                <option value="informasi">Informasi Website</option>
                <option value="alur">Alur Pemesanan</option>
                <option value="aktivitas">Aktivitas</option>
                <option value="galeri">Galeri</option>
                <option value="fitur">Kuliner & Fasilitas</option>
            </select>

            <label>Icon Emoji</label>
            <input type="text" name="icon" placeholder="Contoh: 🌊">

            <label>Nomor</label>
            <input type="text" name="nomor" placeholder="Khusus alur, contoh: 01">

            <label>Judul</label>
            <input type="text" name="judul" required>

            <label>Deskripsi</label>
            <textarea name="deskripsi" rows="4"></textarea>

            <label>Gambar</label>
            <input type="file" name="gambar" accept="image/*">

            <label>Link</label>
            <input type="text" name="link" placeholder="Opsional, contoh: /kuliner">

            <label>Urutan</label>
            <input type="number" name="urutan" value="0">

            <label>Status</label>
            <select name="status">
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>

            <button type="submit" class="btn btn-primary">
                Simpan Item
            </button>
        </form>
    </div>
</div>