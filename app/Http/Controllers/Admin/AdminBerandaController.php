<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BerandaPage;
use App\Models\BerandaItem;
use Illuminate\Http\Request;

class AdminBerandaController extends Controller
{
    public function index()
    {
        $page = BerandaPage::firstOrCreate([], [
            'hero_badge' => '🌴 Sistem Informasi Pariwisata Pantai Pelawan',
            'hero_judul' => 'Jelajahi Keindahan Pantai Pelawan dengan Mudah',
            'hero_deskripsi' => 'Temukan informasi wisata, fasilitas, daya tarik, galeri, rekomendasi kuliner, kontak pengelola, hingga layanan pemesanan tiket online dalam satu website yang praktis dan mudah diakses.',
            'hero_tombol_1' => 'Pesan Tiket Sekarang',
            'hero_tombol_2' => 'Lihat Informasi Pantai',

            'layanan_label' => 'Layanan Website',
            'layanan_judul' => 'Layanan Wisata Digital',
            'layanan_deskripsi' => 'Website ini membantu wisatawan memperoleh informasi Pantai Pelawan secara lebih praktis, terstruktur, dan mudah digunakan sebelum melakukan kunjungan.',

            'about_label' => 'Tentang Destinasi',
            'about_judul' => 'Pantai Pelawan sebagai Destinasi Wisata Alam',
            'about_deskripsi_1' => 'Pantai Pelawan merupakan salah satu destinasi wisata alam yang berada di Kabupaten Karimun, Kepulauan Riau. Pantai ini memiliki suasana yang nyaman, pemandangan laut yang indah, serta lingkungan yang cocok untuk rekreasi keluarga.',
            'about_deskripsi_2' => 'Melalui website ini, informasi wisata Pantai Pelawan disajikan secara lebih lengkap dan terpusat, sehingga wisatawan dapat mengetahui daya tarik, fasilitas, kondisi pantai, lokasi, kuliner sekitar, hingga melakukan pemesanan tiket secara online.',
            'about_gambar' => 'images/profil_pantai.jpg',
            'about_tombol' => 'Lihat Profil Pantai',

            'keunggulan_label' => 'Daya Tarik',
            'keunggulan_judul' => 'Kenapa Memilih Pantai Pelawan?',
            'keunggulan_deskripsi' => 'Pantai Pelawan memiliki daya tarik alam dan potensi wisata yang dapat dinikmati oleh berbagai kalangan pengunjung.',

            'info_label' => 'Informasi Website',
            'info_judul' => 'Informasi yang Tersedia di Website',
            'info_deskripsi' => 'Website ini menyajikan berbagai informasi penting agar wisatawan lebih mudah merencanakan kunjungan.',

            'alur_label' => 'Cara Pesan',
            'alur_judul' => 'Alur Pemesanan Tiket Online',
            'alur_deskripsi' => 'Pemesanan tiket dibuat sederhana agar wisatawan dapat melakukan proses pemesanan dengan lebih cepat dan mudah.',

            'cta_label' => 'Ayo Berkunjung',
            'cta_judul' => 'Rencanakan Kunjunganmu ke Pantai Pelawan',
            'cta_deskripsi' => 'Dapatkan informasi lengkap dan lakukan pemesanan tiket secara online melalui website Sistem Informasi Pariwisata Pantai Pelawan.',
            'cta_tombol_1' => 'Mulai Pesan Tiket',
            'cta_tombol_2' => 'Hubungi Pengelola',
            'cta_wa_link' => 'https://wa.me/6281268005708',
        ]);

        $layanan = BerandaItem::where('kategori', 'layanan')->orderBy('urutan')->get();
        $keunggulan = BerandaItem::where('kategori', 'keunggulan')->orderBy('urutan')->get();
        $informasi = BerandaItem::where('kategori', 'informasi')->orderBy('urutan')->get();
        $alur = BerandaItem::where('kategori', 'alur')->orderBy('urutan')->get();

        return view('admin.beranda.index', compact('page', 'layanan', 'keunggulan', 'informasi', 'alur'));
    }

    public function updatePage(Request $request)
    {
        $page = BerandaPage::firstOrCreate([]);

        $page->update($request->only([
            'hero_badge',
            'hero_judul',
            'hero_deskripsi',
            'hero_tombol_1',
            'hero_tombol_2',
            'layanan_label',
            'layanan_judul',
            'layanan_deskripsi',
            'about_label',
            'about_judul',
            'about_deskripsi_1',
            'about_deskripsi_2',
            'about_gambar',
            'about_tombol',
            'keunggulan_label',
            'keunggulan_judul',
            'keunggulan_deskripsi',
            'info_label',
            'info_judul',
            'info_deskripsi',
            'alur_label',
            'alur_judul',
            'alur_deskripsi',
            'cta_label',
            'cta_judul',
            'cta_deskripsi',
            'cta_tombol_1',
            'cta_tombol_2',
            'cta_wa_link',
        ]));

        return back()->with('success', 'Konten beranda berhasil diperbarui.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|in:layanan,keunggulan,informasi,alur',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'icon' => 'nullable|string|max:20',
            'nomor' => 'nullable|string|max:10',
            'urutan' => 'nullable|integer',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        BerandaItem::create($request->only([
            'kategori',
            'icon',
            'nomor',
            'judul',
            'deskripsi',
            'urutan',
            'status',
        ]));

        return back()->with('success', 'Item beranda berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $item = BerandaItem::findOrFail($id);

        $request->validate([
            'kategori' => 'required|in:layanan,keunggulan,informasi,alur',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'icon' => 'nullable|string|max:20',
            'nomor' => 'nullable|string|max:10',
            'urutan' => 'nullable|integer',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $item->update($request->only([
            'kategori',
            'icon',
            'nomor',
            'judul',
            'deskripsi',
            'urutan',
            'status',
        ]));

        return back()->with('success', 'Item beranda berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = BerandaItem::findOrFail($id);
        $item->delete();

        return back()->with('success', 'Item beranda berhasil dihapus.');
    }
}