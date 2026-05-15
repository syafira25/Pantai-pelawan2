<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $page = Galeri::where('jenis', 'page')->first();

        if (!$page) {
            $page = Galeri::create([
                'jenis' => 'page',

                // WAJIB DIISI karena kolom lama galeris tidak nullable
                'judul' => 'Konten Halaman Galeri',
                'deskripsi' => 'Data pengaturan halaman galeri',
                'gambar' => 'images/profil_pantai.jpg',
                'tipe_card' => 'normal',
                'urutan' => 0,
                'status' => 'aktif',

                'hero_judul' => 'Galeri Pantai Pelawan',
                'hero_deskripsi' => 'Dokumentasi keindahan Pantai Pelawan dari berbagai sudut, suasana, dan momen wisata.',

                'galeri_label' => 'Dokumentasi Wisata',
                'galeri_judul' => 'Foto Wisata Pantai Pelawan',
                'galeri_deskripsi' => 'Beberapa dokumentasi pemandangan dan suasana wisata Pantai Pelawan.',

                'aktivitas_label' => 'Pengalaman Wisata',
                'aktivitas_judul' => 'Aktivitas Menarik di Pantai Pelawan',
                'aktivitas_deskripsi' => 'Nikmati berbagai aktivitas seru yang bisa dilakukan bersama keluarga, pasangan, maupun teman.',

                'aktivitas_1_label' => '🚤 Aktivitas Favorit',
                'aktivitas_1_judul' => 'Naik Banana Boat',
                'aktivitas_1_deskripsi' => 'Rasakan keseruan wahana air bersama teman dan keluarga.',
                'aktivitas_1_gambar' => 'images/hero-pantai.jpg',

                'aktivitas_2_label' => '🛶 Santai di Laut',
                'aktivitas_2_judul' => 'Naik Sampan',
                'aktivitas_2_deskripsi' => 'Menikmati suasana pantai dari area perairan yang tenang.',
                'aktivitas_2_gambar' => 'images/profil_pantai.jpg',

                'aktivitas_3_label' => '📸 Dokumentasi',
                'aktivitas_3_judul' => 'Spot Foto',
                'aktivitas_3_deskripsi' => 'Abadikan momen dengan latar pantai dan pemandangan alam.',
                'aktivitas_3_gambar' => 'images/hero-pantai.jpg',

                'aktivitas_4_label' => '🔥 Bersama Keluarga',
                'aktivitas_4_judul' => 'Bakar-bakar & Piknik',
                'aktivitas_4_deskripsi' => 'Menikmati waktu santai sambil makan bersama di sekitar kawasan pantai.',
                'aktivitas_4_gambar' => 'images/profil_pantai.jpg',

                'cta_label' => '📸 Dokumentasi Wisata',
                'cta_judul' => 'Keindahan yang Tak Terlupakan',
                'cta_deskripsi' => 'Pantai Pelawan menawarkan pemandangan alam yang memukau dan cocok untuk diabadikan dalam berbagai momen wisata.',
            ]);
        }

        $galeris = Galeri::where('jenis', 'foto')
            ->where('status', 'aktif')
            ->orderBy('urutan', 'asc')
            ->get();

        return view('galeri', compact('galeris', 'page'));
    }
}