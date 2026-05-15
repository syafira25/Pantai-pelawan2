<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BerandaPage;
use App\Models\BerandaItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBerandaController extends Controller
{
    public function index()
    {
        $defaultPage = [
            'hero_badge' => '🌴 Sistem Informasi Pariwisata Pantai Pelawan',
            'hero_judul' => 'Jelajahi Keindahan Pantai Pelawan dengan Mudah',
            'hero_deskripsi' => 'Temukan informasi wisata, fasilitas, daya tarik, galeri, rekomendasi kuliner, kontak pengelola, hingga layanan pemesanan tiket online dalam satu website yang praktis dan mudah diakses.',
            'hero_tombol_1' => 'Pesan Tiket Sekarang',
            'hero_tombol_2' => 'Lihat Informasi Pantai',

            'layanan_label' => 'Layanan Website',
            'layanan_judul' => 'Layanan Wisata Digital',
            'layanan_deskripsi' => 'Website ini membantu wisatawan memperoleh informasi Pantai Pelawan secara lebih praktis, terstruktur, dan mudah digunakan sebelum melakukan kunjungan.',

            'about_label' => '🍃 Destinasi Wisata Alam',
            'about_judul' => "Pantai Pelawan,\ntempat menikmati\nsuasana pantai yang\ntenang dan indah.",
            'about_deskripsi_1' => 'Pantai Pelawan menjadi pilihan wisata untuk bersantai, menikmati pemandangan, berfoto, mencoba kuliner sekitar pantai, dan menghabiskan waktu bersama keluarga.',
            'about_deskripsi_2' => 'Melalui website ini, informasi wisata Pantai Pelawan disajikan secara lebih lengkap dan terpusat.',
            'about_gambar' => 'images/profil_pantai.jpg',
            'about_tombol' => 'Lihat Profil Pantai',

            'keunggulan_label' => 'Daya Tarik',
            'keunggulan_judul' => 'Kenapa Memilih Pantai Pelawan?',
            'keunggulan_deskripsi' => 'Pantai Pelawan memiliki daya tarik alam dan potensi wisata yang dapat dinikmati oleh berbagai kalangan pengunjung.',

            'aktivitas_label' => 'Aktivitas Seru',
            'aktivitas_judul' => 'Hal Menarik yang Bisa Dilakukan di Pantai Pelawan',
            'aktivitas_deskripsi' => 'Nikmati berbagai aktivitas wisata yang membuat kunjungan ke Pantai Pelawan lebih menyenangkan bersama keluarga, teman, maupun pasangan.',

            'galeri_label' => '📸 Galeri Pantai',
            'galeri_judul' => 'Lihat suasana Pantai Pelawan sebelum berkunjung.',
            'galeri_deskripsi' => 'Galeri menampilkan suasana pantai, aktivitas wisata, panorama sunset, dan beberapa sudut menarik yang dapat dinikmati pengunjung.',

            'fitur_label' => 'Kuliner & Fasilitas',
            'fitur_judul' => 'Kuliner dan Fasilitas Pantai Pelawan',
            'fitur_deskripsi' => 'Temukan informasi kuliner dan fasilitas yang tersedia di sekitar kawasan Pantai Pelawan.',

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
        ];

        $page = BerandaPage::first();

        if (!$page) {
            $page = BerandaPage::create($defaultPage);
        } else {
            $dataKosong = [];

            foreach ($defaultPage as $key => $value) {
                if ($page->$key === null || $page->$key === '') {
                    $dataKosong[$key] = $value;
                }
            }

            if (!empty($dataKosong)) {
                $page->update($dataKosong);
                $page->refresh();
            }
        }

        $layanan = BerandaItem::where('kategori', 'layanan')->orderBy('urutan')->get();
        $keunggulan = BerandaItem::where('kategori', 'keunggulan')->orderBy('urutan')->get();
        $informasi = BerandaItem::where('kategori', 'informasi')->orderBy('urutan')->get();
        $alur = BerandaItem::where('kategori', 'alur')->orderBy('urutan')->get();
        $aktivitas = BerandaItem::where('kategori', 'aktivitas')->orderBy('urutan')->get();
        $galeri = BerandaItem::where('kategori', 'galeri')->orderBy('urutan')->get();
        $fitur = BerandaItem::where('kategori', 'fitur')->orderBy('urutan')->get();

        return view('admin.beranda.index', compact(
            'page',
            'layanan',
            'keunggulan',
            'informasi',
            'alur',
            'aktivitas',
            'galeri',
            'fitur'
        ));
    }

    public function updatePage(Request $request)
    {
        $page = BerandaPage::firstOrCreate([]);

        $data = $request->except([
            '_token',
            '_method',
            'about_gambar',
        ]);

        if ($request->hasFile('about_gambar')) {
            if (
                $page->about_gambar &&
                !str_starts_with($page->about_gambar, 'images/') &&
                Storage::disk('public')->exists($page->about_gambar)
            ) {
                Storage::disk('public')->delete($page->about_gambar);
            }

            $data['about_gambar'] = $request->file('about_gambar')->store('beranda', 'public');
        }

        $page->update($data);

        return back()->with('success', 'Konten section berhasil diperbarui.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|in:layanan,keunggulan,informasi,alur,aktivitas,galeri,fitur',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'icon' => 'nullable|string|max:20',
            'nomor' => 'nullable|string|max:10',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'link' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $data = $request->only([
            'kategori',
            'icon',
            'nomor',
            'judul',
            'deskripsi',
            'link',
            'urutan',
            'status',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('beranda-items', 'public');
        }

        BerandaItem::create($data);

        return back()->with('success', 'Item berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $item = BerandaItem::findOrFail($id);

        $request->validate([
            'kategori' => 'required|in:layanan,keunggulan,informasi,alur,aktivitas,galeri,fitur',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'icon' => 'nullable|string|max:20',
            'nomor' => 'nullable|string|max:10',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'link' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $data = $request->only([
            'kategori',
            'icon',
            'nomor',
            'judul',
            'deskripsi',
            'link',
            'urutan',
            'status',
        ]);

        if ($request->hasFile('gambar')) {
            if (
                $item->gambar &&
                !str_starts_with($item->gambar, 'images/') &&
                Storage::disk('public')->exists($item->gambar)
            ) {
                Storage::disk('public')->delete($item->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('beranda-items', 'public');
        }

        $item->update($data);

        return back()->with('success', 'Item berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = BerandaItem::findOrFail($id);

        if (
            $item->gambar &&
            !str_starts_with($item->gambar, 'images/') &&
            Storage::disk('public')->exists($item->gambar)
        ) {
            Storage::disk('public')->delete($item->gambar);
        }

        $item->delete();

        return back()->with('success', 'Item berhasil dihapus.');
    }
}