<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilPantai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProfilController extends Controller
{
    public function edit()
    {
        $profil = ProfilPantai::first();

        if (!$profil) {
            $profil = ProfilPantai::create($this->defaultData());
        }

        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        | Semua field dibuat nullable karena admin hanya mengedit per bagian.
        | Contoh: saat edit Hero, hanya hero_judul dan hero_subjudul yang dikirim.
        | Field lain tidak boleh ikut terhapus.
        */
        $request->validate([
            'judul' => 'nullable|string|max:150',
            'subjudul' => 'nullable|string|max:200',
            'deskripsi_utama' => 'nullable|string',
            'deskripsi_tambahan' => 'nullable|string',
            'lokasi' => 'nullable|string|max:255',
            'jam_operasional' => 'nullable|string|max:100',
            'harga_tiket' => 'nullable|string|max:150',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'hero_judul' => 'nullable|string|max:255',
            'hero_subjudul' => 'nullable|string|max:255',

            'tentang_label' => 'nullable|string|max:255',
            'tentang_judul' => 'nullable|string|max:255',
            'tentang_paragraf_1' => 'nullable|string',
            'tentang_paragraf_2' => 'nullable|string',
            'tentang_paragraf_3' => 'nullable|string',

            'gambaran_judul' => 'nullable|string|max:255',
            'gambaran_deskripsi' => 'nullable|string',

            'lokasi_judul' => 'nullable|string|max:255',
            'lokasi_deskripsi' => 'nullable|string',

            'karakter_destinasi_judul' => 'nullable|string|max:255',
            'karakter_destinasi_deskripsi' => 'nullable|string',

            'nilai_alam_judul' => 'nullable|string|max:255',
            'nilai_alam_deskripsi' => 'nullable|string',

            'perkembangan_judul' => 'nullable|string|max:255',
            'perkembangan_paragraf_1' => 'nullable|string',
            'perkembangan_paragraf_2' => 'nullable|string',
            'perkembangan_paragraf_3' => 'nullable|string',

            'karakteristik_judul' => 'nullable|string|max:255',
            'karakteristik_deskripsi' => 'nullable|string',

            'karakter_1_judul' => 'nullable|string|max:255',
            'karakter_1_deskripsi' => 'nullable|string',
            'karakter_2_judul' => 'nullable|string|max:255',
            'karakter_2_deskripsi' => 'nullable|string',
            'karakter_3_judul' => 'nullable|string|max:255',
            'karakter_3_deskripsi' => 'nullable|string',
            'karakter_4_judul' => 'nullable|string|max:255',
            'karakter_4_deskripsi' => 'nullable|string',

            'visi_judul' => 'nullable|string|max:255',
            'visi_deskripsi' => 'nullable|string',

            'misi_judul' => 'nullable|string|max:255',
            'misi_deskripsi' => 'nullable|string',

            'cta_judul' => 'nullable|string|max:255',
            'cta_deskripsi' => 'nullable|string',
        ]);

        $profil = ProfilPantai::first();

        if (!$profil) {
            $profil = new ProfilPantai();
        }

        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA YANG DIKIRIM SAJA
        |--------------------------------------------------------------------------
        | request->except() hanya mengambil input yang ada di form modal tersebut.
        | Jadi kalau admin edit Hero, field Tentang/CTA tidak akan berubah.
        */
        $data = $request->except([
            '_token',
            '_method',
            'gambar',
        ]);

        /*
        |--------------------------------------------------------------------------
        | UPLOAD / GANTI GAMBAR
        |--------------------------------------------------------------------------
        | Kalau gambar lama tersimpan di storage, gambar lama dihapus.
        | Kalau gambar lama dari public/images, tidak dihapus.
        */
        if ($request->hasFile('gambar')) {
            if ($profil->gambar && str_starts_with($profil->gambar, 'storage/')) {
                $oldPath = str_replace('storage/', '', $profil->gambar);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('gambar')->store('profil', 'public');
            $data['gambar'] = 'storage/' . $path;
        }

        $profil->fill($data);
        $profil->save();

        return back()->with('success', 'Profil Pantai berhasil diperbarui.');
    }

    private function defaultData()
    {
        return [
            'judul' => 'Profil Pantai Pelawan',
            'subjudul' => 'Destinasi wisata alam di Kabupaten Karimun',
            'deskripsi_utama' => 'Pantai Pelawan merupakan salah satu objek wisata alam yang berada di Desa Pangke Barat, Kabupaten Karimun, Provinsi Kepulauan Riau.',
            'deskripsi_tambahan' => 'Pantai Pelawan memiliki suasana pantai yang nyaman, pemandangan laut yang indah, serta lingkungan yang cocok untuk kegiatan rekreasi dan wisata keluarga.',
            'lokasi' => 'Desa Pangke Barat, Kabupaten Karimun, Kepulauan Riau',
            'jam_operasional' => '08.00 - 18.00 WIB',
            'harga_tiket' => 'Dewasa Rp5.000, Anak-anak Rp2.000',
            'gambar' => 'images/profil_pantai.jpg',

            'hero_judul' => 'Profil Pantai Pelawan',
            'hero_subjudul' => 'Destinasi wisata alam di Kabupaten Karimun',

            'tentang_label' => 'Tentang Pantai Pelawan',
            'tentang_judul' => 'Pantai Pelawan sebagai Destinasi Wisata Alam',
            'tentang_paragraf_1' => 'Pantai Pelawan merupakan salah satu wisata pantai yang berada di Kabupaten Karimun, Kepulauan Riau. Pantai ini dikenal sebagai destinasi wisata alam dengan pemandangan laut, hamparan pasir, serta suasana pesisir yang nyaman untuk dikunjungi.',
            'tentang_paragraf_2' => 'Keindahan Pantai Pelawan menjadi daya tarik bagi wisatawan yang ingin menikmati suasana alam, bersantai bersama keluarga, maupun sekadar menikmati panorama pantai.',
            'tentang_paragraf_3' => 'Selain sebagai tempat rekreasi, Pantai Pelawan juga menjadi bagian dari potensi pariwisata daerah yang dapat terus dikembangkan melalui penyajian informasi yang lebih lengkap, rapi, dan mudah diakses oleh wisatawan.',

            'gambaran_judul' => 'Gambaran Umum Pantai Pelawan',
            'gambaran_deskripsi' => 'Profil Pantai Pelawan disajikan untuk memberikan gambaran mengenai lokasi, karakter wisata, dan nilai destinasi yang dimiliki.',

            'lokasi_judul' => 'Lokasi Pantai',
            'lokasi_deskripsi' => 'Pantai Pelawan berada di kawasan wisata alam yang dikenal masyarakat sekitar sebagai tempat rekreasi dan menikmati suasana pantai.',

            'karakter_destinasi_judul' => 'Karakter Destinasi',
            'karakter_destinasi_deskripsi' => 'Pantai Pelawan memiliki karakter wisata alam berupa pemandangan laut, suasana pesisir, dan lingkungan yang nyaman.',

            'nilai_alam_judul' => 'Nilai Alam',
            'nilai_alam_deskripsi' => 'Keindahan alam Pantai Pelawan menjadi nilai utama yang dapat dikenalkan kepada wisatawan.',

            'perkembangan_judul' => 'Perkembangan Pantai Pelawan',
            'perkembangan_paragraf_1' => 'Pantai Pelawan mulai dikenal sebagai salah satu tujuan wisata masyarakat karena memiliki suasana alam yang menarik dan cocok untuk kegiatan rekreasi.',
            'perkembangan_paragraf_2' => 'Seiring meningkatnya minat masyarakat terhadap wisata lokal, Pantai Pelawan menjadi salah satu destinasi yang memiliki peluang untuk dipromosikan secara lebih luas.',
            'perkembangan_paragraf_3' => 'Penyajian profil Pantai Pelawan melalui website menjadi salah satu cara untuk memperkenalkan identitas destinasi secara lebih rapi, modern, dan mudah diakses.',

            'karakteristik_judul' => 'Karakteristik Pantai Pelawan',
            'karakteristik_deskripsi' => 'Karakteristik ini menggambarkan ciri khas Pantai Pelawan sebagai destinasi wisata alam.',

            'karakter_1_judul' => 'Pemandangan Laut',
            'karakter_1_deskripsi' => 'Pantai Pelawan memiliki pemandangan laut yang menjadi daya tarik utama bagi wisatawan.',
            'karakter_2_judul' => 'Suasana Tenang',
            'karakter_2_deskripsi' => 'Suasana pantai yang nyaman membuat Pantai Pelawan cocok untuk melepas penat dan menikmati waktu santai.',
            'karakter_3_judul' => 'Nuansa Pesisir',
            'karakter_3_deskripsi' => 'Lingkungan pesisir memberikan pengalaman wisata alam yang berbeda dan menjadi identitas khas Pantai Pelawan.',
            'karakter_4_judul' => 'Daya Tarik Visual',
            'karakter_4_deskripsi' => 'Keindahan alam pantai dapat menjadi daya tarik visual yang mendukung dokumentasi dan promosi wisata.',

            'visi_judul' => 'Menjadi Destinasi Wisata Unggulan',
            'visi_deskripsi' => 'Menjadikan Pantai Pelawan sebagai destinasi wisata alam yang unggul, informatif, ramah pengunjung, serta mudah dikenal oleh masyarakat.',
            'misi_judul' => 'Mendukung Pengenalan Profil Wisata',
            'misi_deskripsi' => 'Menyajikan profil Pantai Pelawan secara lengkap, memperkenalkan potensi wisata daerah, dan mendukung promosi wisata secara digital.',

            'cta_judul' => 'Kenali Pantai Pelawan Lebih Dekat',
            'cta_deskripsi' => 'Melalui profil digital ini, wisatawan dapat memahami gambaran umum, karakteristik, dan nilai destinasi Pantai Pelawan.',
        ];
    }
}