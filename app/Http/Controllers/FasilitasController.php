<?php

namespace App\Http\Controllers;

use App\Models\FasilitasPage;
use App\Models\FasilitasItem;

class FasilitasController extends Controller
{
    public function index()
    {
        $page = FasilitasPage::first();

        if (!$page) {
            $page = FasilitasPage::create([
                'hero_judul' => 'Fasilitas Pantai Pelawan',
                'hero_deskripsi' => 'Berbagai fasilitas tersedia untuk menunjang kenyamanan pengunjung selama berwisata di Pantai Pelawan.',
                'utama_label' => 'Fasilitas',
                'utama_judul' => 'Fasilitas yang Tersedia',
                'utama_deskripsi' => 'Pantai Pelawan menyediakan berbagai fasilitas untuk menunjang kenyamanan pengunjung selama berwisata.',
                'pendukung_label' => 'Wahana Wisata',
                'pendukung_judul' => 'Aktivitas Wisata Pantai',
                'pendukung_deskripsi' => 'Nikmati berbagai wahana dan spot menarik yang dapat menambah pengalaman wisata di Pantai Pelawan.',
                'cta_label' => '🌴 Kenyamanan Pengunjung',
                'cta_judul' => 'Fasilitas untuk Kenyamanan Wisata',
                'cta_deskripsi' => 'Dengan berbagai fasilitas yang tersedia, Pantai Pelawan berupaya memberikan pengalaman wisata yang lebih nyaman bagi setiap pengunjung.',
                'cta_tombol' => 'Pesan Tiket',
            ]);
        }

        $utama = FasilitasItem::where('kategori', 'utama')
            ->where('status', 'aktif')
            ->orderBy('urutan', 'asc')
            ->get();

        $pendukung = FasilitasItem::where('kategori', 'pendukung')
            ->where('status', 'aktif')
            ->orderBy('urutan', 'asc')
            ->get();

        return view('fasilitas', compact('page', 'utama', 'pendukung'));
    }
}