<?php

namespace App\Http\Controllers;

use App\Models\KulinerPage;
use App\Models\WarungKuliner;

class KulinerController extends Controller
{
    public function index()
    {
        $kulinerPage = KulinerPage::first();

        if (!$kulinerPage) {
            $kulinerPage = KulinerPage::create([
                'hero_judul' => 'Wisata Kuliner Pantai Pelawan',
                'hero_subjudul' => 'Temukan pilihan warung makan di sekitar Pantai Pelawan, lengkap dengan informasi menu, harga, foto makanan, dan lokasi warung.',
                'section_label' => 'Kuliner Sekitar Pantai',
                'section_judul' => 'Rekomendasi Warung Kuliner',
                'section_deskripsi' => 'Pilih warung yang ingin kamu lihat untuk mengetahui daftar menu, harga, foto makanan, dan alamat warung di sekitar Pantai Pelawan.',
            ]);
        }

        if (WarungKuliner::count() == 0) {
            WarungKuliner::create([
                'nama' => 'Warung Makan Pantai Pelawan',
                'slug' => 'warung-makan-pantai-pelawan',
                'badge' => 'Kuliner Pantai',
                'kategori' => 'Warung sekitar Pantai Pelawan',
                'deskripsi' => 'Warung makan yang menyediakan berbagai pilihan makanan dan minuman untuk pengunjung Pantai Pelawan.',
                'alamat' => 'Area kuliner sekitar Pantai Pelawan, Desa Pangke Barat, Kabupaten Karimun',
                'gambar' => 'images/hero-pantai.jpg',
                'gambar_2' => 'images/profil_pantai.jpg',
                'gambar_3' => 'images/hero-pantai.jpg',
                'status' => 'aktif',
            ]);

            WarungKuliner::create([
                'nama' => 'Warung Seafood Pelawan',
                'slug' => 'warung-seafood-pelawan',
                'badge' => 'Kuliner Pantai',
                'kategori' => 'Warung sekitar Pantai Pelawan',
                'deskripsi' => 'Menyediakan pilihan makanan laut sederhana yang cocok dinikmati setelah berwisata di Pantai Pelawan.',
                'alamat' => 'Sekitar kawasan Pantai Pelawan, Desa Pangke Barat, Kabupaten Karimun',
                'gambar' => 'images/profil_pantai.jpg',
                'gambar_2' => 'images/hero-pantai.jpg',
                'gambar_3' => 'images/profil_pantai.jpg',
                'status' => 'aktif',
            ]);

            WarungKuliner::create([
                'nama' => 'Kedai Minuman Pantai',
                'slug' => 'kedai-minuman-pantai',
                'badge' => 'Kuliner Pantai',
                'kategori' => 'Warung sekitar Pantai Pelawan',
                'deskripsi' => 'Kedai sederhana yang menyediakan minuman dan makanan ringan untuk pengunjung pantai.',
                'alamat' => 'Area wisata Pantai Pelawan, Kabupaten Karimun',
                'gambar' => 'images/hero-pantai.jpg',
                'gambar_2' => 'images/profil_pantai.jpg',
                'gambar_3' => 'images/hero-pantai.jpg',
                'status' => 'aktif',
            ]);
        }

        $warungs = WarungKuliner::where('status', 'aktif')
            ->latest()
            ->get();

        return view('kuliner', compact('kulinerPage', 'warungs'));
    }

        public function detail($slug)
    {
        $warung = WarungKuliner::with(['menus' => function ($query) {
                $query->where('status', 'aktif')->latest();
            }])
            ->where('slug', $slug)
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | AUTO CREATE MENU DEFAULT
        |--------------------------------------------------------------------------
        */

        if ($warung->menus->count() == 0) {

            $defaultMenus = [

                [
                    'nama_menu' => 'Ikan Bakar Spesial',
                    'deskripsi' => 'Ikan bakar segar dengan sambal khas Pantai Pelawan.',
                    'harga' => 35000,
                    'gambar' => 'images/hero-pantai.jpg',
                ],

                [
                    'nama_menu' => 'Mie Seafood',
                    'deskripsi' => 'Mie seafood lengkap dengan udang dan cumi.',
                    'harga' => 28000,
                    'gambar' => 'images/profil_pantai.jpg',
                ],

                [
                    'nama_menu' => 'Kelapa Muda',
                    'deskripsi' => 'Minuman kelapa muda segar cocok untuk suasana pantai.',
                    'harga' => 12000,
                    'gambar' => 'images/hero-pantai.jpg',
                ],

                [
                    'nama_menu' => 'Es Jeruk Segar',
                    'deskripsi' => 'Minuman dingin menyegarkan setelah wisata pantai.',
                    'harga' => 10000,
                    'gambar' => 'images/profil_pantai.jpg',
                ],

            ];

            foreach ($defaultMenus as $menu) {

                $warung->menus()->create([
                    'nama_menu' => $menu['nama_menu'],
                    'deskripsi' => $menu['deskripsi'],
                    'harga' => $menu['harga'],
                    'gambar' => $menu['gambar'],
                    'status' => 'aktif',
                ]);
            }

            $warung->load('menus');
        }

        return view('kuliner_detail', compact('warung'));
    }
}