<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPantai extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_judul',
        'hero_subjudul',

        'tentang_label',
        'tentang_judul',
        'tentang_paragraf_1',
        'tentang_paragraf_2',
        'tentang_paragraf_3',

        'gambaran_label',
        'gambaran_judul',
        'gambaran_deskripsi',
        'gambaran_big_judul',
        'gambaran_big_deskripsi',

        'lokasi_judul',
        'lokasi_deskripsi',

        'karakter_destinasi_judul',
        'karakter_destinasi_deskripsi',

        'nilai_alam_judul',
        'nilai_alam_deskripsi',

        'semua_kalangan_judul',
        'semua_kalangan_deskripsi',

        'gambar',

        'perkembangan_label',
        'perkembangan_judul',
        'perkembangan_paragraf_1',
        'perkembangan_paragraf_2',
        'perkembangan_paragraf_3',

        'karakteristik_label',
        'karakteristik_judul',
        'karakteristik_deskripsi',

        'karakter_1_icon',
        'karakter_1_judul',
        'karakter_1_deskripsi',

        'karakter_2_icon',
        'karakter_2_judul',
        'karakter_2_deskripsi',

        'karakter_3_icon',
        'karakter_3_judul',
        'karakter_3_deskripsi',

        'karakter_4_icon',
        'karakter_4_judul',
        'karakter_4_deskripsi',

        'visi_misi_label',
        'visi_misi_judul',
        'visi_misi_deskripsi',

        'visi_judul',
        'visi_deskripsi',

        'misi_judul',
        'misi_deskripsi',

        'cta_judul',
        'cta_deskripsi',
        'cta_tombol_1',
        'cta_tombol_2',
    ];
}