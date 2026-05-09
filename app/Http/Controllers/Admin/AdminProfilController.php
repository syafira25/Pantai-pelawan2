<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilPantai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProfilController extends Controller
{
    public function index()
    {
        $profil = ProfilPantai::firstOrCreate([], $this->defaultData());

        return view('admin.profil.index', compact('profil'));
    }

    public function update(Request $request)
    {
        $profil = ProfilPantai::firstOrCreate([], $this->defaultData());

        $data = $request->except(['_token', '_method', 'gambar']);

        if ($request->hasFile('gambar')) {
            if ($profil->gambar && !str_starts_with($profil->gambar, 'images/') && Storage::disk('public')->exists($profil->gambar)) {
                Storage::disk('public')->delete($profil->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('profil', 'public');
        }

        $profil->update($data);

        return back()->with('success', 'Konten profil berhasil diperbarui.');
    }

    private function defaultData()
    {
        return [
            'hero_judul' => 'Profil Pantai Pelawan',
            'hero_subjudul' => 'Destinasi wisata alam di Kabupaten Karimun',

            'tentang_label' => 'Tentang Pantai Pelawan',
            'tentang_judul' => 'Pantai Pelawan sebagai Destinasi Wisata Alam',
            'tentang_paragraf_1' => 'Pantai Pelawan merupakan salah satu wisata pantai yang berada di Kabupaten Karimun, Kepulauan Riau. Pantai ini dikenal sebagai destinasi wisata alam dengan pemandangan laut, hamparan pasir, serta suasana pesisir yang nyaman untuk dikunjungi.',
            'tentang_paragraf_2' => 'Keindahan Pantai Pelawan menjadi daya tarik bagi wisatawan yang ingin menikmati suasana alam, bersantai bersama keluarga, maupun sekadar menikmati panorama pantai.',
            'tentang_paragraf_3' => 'Selain sebagai tempat rekreasi, Pantai Pelawan juga menjadi bagian dari potensi pariwisata daerah yang dapat terus dikembangkan melalui penyajian informasi yang lebih lengkap, rapi, dan mudah diakses oleh wisatawan.',

            'gambaran_label' => 'Identitas Pantai',
            'gambaran_judul' => 'Gambaran Umum Pantai Pelawan',
            'gambaran_deskripsi' => 'Profil Pantai Pelawan disajikan untuk memberikan gambaran mengenai lokasi, karakter wisata, dan nilai destinasi yang dimiliki.',

            'lokasi_judul' => 'Lokasi Pantai',
            'lokasi_deskripsi' => 'Pantai Pelawan berada di kawasan wisata alam yang dikenal masyarakat sekitar sebagai tempat rekreasi dan menikmati suasana pantai.',

            'karakter_destinasi_judul' => 'Karakter Destinasi',
            'karakter_destinasi_deskripsi' => 'Pantai ini memiliki karakter wisata alam berupa pemandangan laut, suasana pesisir, dan lingkungan yang nyaman.',

            'nilai_alam_judul' => 'Nilai Alam',
            'nilai_alam_deskripsi' => 'Keindahan alam Pantai Pelawan menjadi nilai utama yang dapat dikenalkan kepada wisatawan.',

            'gambar' => 'images/profil_pantai.jpg',
            'perkembangan_label' => 'Perkembangan',
            'perkembangan_judul' => 'Perkembangan Pantai Pelawan',
            'perkembangan_paragraf_1' => 'Pantai Pelawan mulai dikenal sebagai salah satu tujuan wisata masyarakat karena memiliki suasana alam yang menarik dan cocok untuk kegiatan rekreasi.',
            'perkembangan_paragraf_2' => 'Seiring meningkatnya minat masyarakat terhadap wisata lokal, Pantai Pelawan menjadi salah satu destinasi yang memiliki peluang untuk dipromosikan secara lebih luas.',
            'perkembangan_paragraf_3' => 'Penyajian profil Pantai Pelawan melalui website menjadi salah satu cara untuk memperkenalkan identitas destinasi secara lebih rapi, modern, dan mudah diakses oleh masyarakat.',

            'karakteristik_label' => 'Karakteristik',
            'karakteristik_judul' => 'Karakteristik Pantai Pelawan',
            'karakteristik_deskripsi' => 'Karakteristik ini menggambarkan ciri khas Pantai Pelawan sebagai destinasi wisata alam.',

            'karakter_1_icon' => '🌊',
            'karakter_1_judul' => 'Pemandangan Laut',
            'karakter_1_deskripsi' => 'Pantai Pelawan memiliki pemandangan laut yang menjadi daya tarik utama bagi wisatawan.',
            'karakter_2_icon' => '🌤️',
            'karakter_2_judul' => 'Suasana Tenang',
            'karakter_2_deskripsi' => 'Suasana pantai yang nyaman membuat Pantai Pelawan cocok untuk melepas penat dan menikmati waktu santai.',
            'karakter_3_icon' => '🏝️',
            'karakter_3_judul' => 'Nuansa Pesisir',
            'karakter_3_deskripsi' => 'Lingkungan pesisir memberikan pengalaman wisata alam yang berbeda dan menjadi identitas khas Pantai Pelawan.',
            'karakter_4_icon' => '📸',
            'karakter_4_judul' => 'Daya Tarik Visual',
            'karakter_4_deskripsi' => 'Keindahan alam pantai dapat menjadi daya tarik visual yang mendukung dokumentasi dan promosi wisata.',

            'visi_misi_label' => 'Arah Pengembangan',
            'visi_misi_judul' => 'Visi dan Misi Pantai Pelawan',
            'visi_misi_deskripsi' => 'Visi dan misi disusun untuk menggambarkan arah pengembangan Pantai Pelawan sebagai destinasi wisata yang informatif, menarik, dan mudah dijangkau melalui media digital.',

            'visi_judul' => 'Menjadi Destinasi Wisata Unggulan',
            'visi_deskripsi' => 'Menjadikan Pantai Pelawan sebagai destinasi wisata alam yang unggul, informatif, ramah pengunjung, serta mudah dikenal oleh masyarakat melalui penyajian profil dan informasi wisata berbasis web.',

            'misi_judul' => 'Mendukung Pengenalan Profil Wisata',
            'misi_deskripsi' => 'Menyajikan profil Pantai Pelawan secara lengkap, memperkenalkan potensi wisata daerah, membantu wisatawan memahami karakter destinasi, dan mendukung promosi wisata secara digital.',

            'cta_judul' => 'Kenali Pantai Pelawan Lebih Dekat',
            'cta_deskripsi' => 'Pantai Pelawan memiliki potensi wisata alam yang menarik untuk diperkenalkan lebih luas.',
            'cta_tombol_1' => 'Lihat Informasi Pantai',
            'cta_tombol_2' => 'Pesan Tiket Sekarang',
        ];
    }
}