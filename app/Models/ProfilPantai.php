<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPantai extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'subjudul',
        'deskripsi_utama',
        'deskripsi_tambahan',
        'lokasi',
        'jam_operasional',
        'harga_tiket',
        'gambar',

        'hero_judul',
        'hero_subjudul',

        'tentang_label',
        'tentang_judul',
        'tentang_paragraf_1',
        'tentang_paragraf_2',
        'tentang_paragraf_3',

        'gambaran_judul',
        'gambaran_deskripsi',

        'lokasi_judul',
        'lokasi_deskripsi',

        'karakter_destinasi_judul',
        'karakter_destinasi_deskripsi',

        'nilai_alam_judul',
        'nilai_alam_deskripsi',

        'perkembangan_judul',
        'perkembangan_paragraf_1',
        'perkembangan_paragraf_2',
        'perkembangan_paragraf_3',

        'karakteristik_judul',
        'karakteristik_deskripsi',

        'karakter_1_judul',
        'karakter_1_deskripsi',
        'karakter_2_judul',
        'karakter_2_deskripsi',
        'karakter_3_judul',
        'karakter_3_deskripsi',
        'karakter_4_judul',
        'karakter_4_deskripsi',

        'visi_judul',
        'visi_deskripsi',

        'misi_judul',
        'misi_deskripsi',

        'cta_judul',
        'cta_deskripsi',
    ];
}