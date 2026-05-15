<div id="modalEditPage" class="admin-modal">
    <div class="admin-modal-box">
        <span class="admin-close" onclick="closeModal('modalEditPage')">&times;</span>

        <h2>Edit Konten Halaman Beranda</h2>

        <form action="{{ route('admin.beranda.page.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Hero Badge</label>
            <input type="text" name="hero_badge" value="{{ $page->hero_badge }}">

            <label>Hero Judul</label>
            <input type="text" name="hero_judul" value="{{ $page->hero_judul }}">

            <label>Hero Deskripsi</label>
            <textarea name="hero_deskripsi" rows="4">{{ $page->hero_deskripsi }}</textarea>

            <label>Tombol Hero 1</label>
            <input type="text" name="hero_tombol_1" value="{{ $page->hero_tombol_1 }}">

            <label>Tombol Hero 2</label>
            <input type="text" name="hero_tombol_2" value="{{ $page->hero_tombol_2 }}">

            <hr style="margin:22px 0;">

            <label>Label Layanan</label>
            <input type="text" name="layanan_label" value="{{ $page->layanan_label }}">

            <label>Judul Layanan</label>
            <input type="text" name="layanan_judul" value="{{ $page->layanan_judul }}">

            <label>Deskripsi Layanan</label>
            <textarea name="layanan_deskripsi" rows="4">{{ $page->layanan_deskripsi }}</textarea>

            <hr style="margin:22px 0;">

            <label>Label Tentang</label>
            <input type="text" name="about_label" value="{{ $page->about_label }}">

            <label>Judul Tentang</label>
            <input type="text" name="about_judul" value="{{ $page->about_judul }}">

            <label>Deskripsi Tentang 1</label>
            <textarea name="about_deskripsi_1" rows="4">{{ $page->about_deskripsi_1 }}</textarea>

            <label>Deskripsi Tentang 2</label>
            <textarea name="about_deskripsi_2" rows="4">{{ $page->about_deskripsi_2 }}</textarea>

            <label>Gambar Tentang Sekarang</label>

            @if($page->about_gambar)
                <img src="{{ str_starts_with($page->about_gambar, 'images/') ? asset($page->about_gambar) : asset('storage/' . $page->about_gambar) }}"
                    style="width:160px; height:100px; object-fit:cover; border-radius:14px; margin-bottom:10px;">
            @endif

            <input type="hidden" name="about_gambar_lama" value="{{ $page->about_gambar }}">

            <label>Ubah Gambar Tentang</label>
            <input type="file" name="about_gambar" accept="image/*">

            <label>Tombol Tentang</label>
            <input type="text" name="about_tombol" value="{{ $page->about_tombol }}">

            <hr style="margin:22px 0;">

            <label>Label Keunggulan</label>
            <input type="text" name="keunggulan_label" value="{{ $page->keunggulan_label }}">

            <label>Judul Keunggulan</label>
            <input type="text" name="keunggulan_judul" value="{{ $page->keunggulan_judul }}">

            <label>Deskripsi Keunggulan</label>
            <textarea name="keunggulan_deskripsi" rows="4">{{ $page->keunggulan_deskripsi }}</textarea>

            <hr style="margin:22px 0;">

            <label>Label Informasi Website</label>
            <input type="text" name="info_label" value="{{ $page->info_label }}">

            <label>Judul Informasi Website</label>
            <input type="text" name="info_judul" value="{{ $page->info_judul }}">

            <label>Deskripsi Informasi Website</label>
            <textarea name="info_deskripsi" rows="4">{{ $page->info_deskripsi }}</textarea>

            <hr style="margin:22px 0;">

            <label>Label Alur</label>
            <input type="text" name="alur_label" value="{{ $page->alur_label }}">

            <label>Judul Alur</label>
            <input type="text" name="alur_judul" value="{{ $page->alur_judul }}">

            <label>Deskripsi Alur</label>
            <textarea name="alur_deskripsi" rows="4">{{ $page->alur_deskripsi }}</textarea>

            <hr style="margin:22px 0;">

            <label>Label CTA</label>
            <input type="text" name="cta_label" value="{{ $page->cta_label }}">

            <label>Judul CTA</label>
            <input type="text" name="cta_judul" value="{{ $page->cta_judul }}">

            <label>Deskripsi CTA</label>
            <textarea name="cta_deskripsi" rows="4">{{ $page->cta_deskripsi }}</textarea>

            <label>Tombol CTA 1</label>
            <input type="text" name="cta_tombol_1" value="{{ $page->cta_tombol_1 }}">

            <label>Tombol CTA 2</label>
            <input type="text" name="cta_tombol_2" value="{{ $page->cta_tombol_2 }}">

            <label>Link WhatsApp CTA</label>
            <input type="text" name="cta_wa_link" value="{{ $page->cta_wa_link }}">

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>