<?php

namespace App\Http\Controllers;

use App\Models\ProfilPantai;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = ProfilPantai::first();

        if (!$profil) {
            $profil = ProfilPantai::create([
                'hero_judul' => 'Profil Pantai Pelawan',
                'hero_subjudul' => 'Destinasi wisata alam di Kabupaten Karimun',
                'tentang_label' => 'Tentang Pantai Pelawan',
                'tentang_judul' => 'Pantai Pelawan sebagai Destinasi Wisata Alam',
                'tentang_paragraf_1' => 'Pantai Pelawan merupakan salah satu wisata pantai yang berada di Kabupaten Karimun, Kepulauan Riau.',
                'tentang_paragraf_2' => 'Keindahan Pantai Pelawan menjadi daya tarik bagi wisatawan.',
                'tentang_paragraf_3' => 'Pantai Pelawan memiliki potensi untuk dikembangkan sebagai destinasi wisata daerah.',
                'gambar' => 'images/profil_pantai.jpg',
            ]);
        }

        return view('profil', compact('profil'));
    }
}