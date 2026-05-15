<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis',

        'judul',
        'deskripsi',
        'gambar',
        'tipe_card',
        'urutan',
        'status',

        'hero_judul',
        'hero_deskripsi',

        'galeri_label',
        'galeri_judul',
        'galeri_deskripsi',

        'aktivitas_label',
        'aktivitas_judul',
        'aktivitas_deskripsi',

        'aktivitas_1_label',
        'aktivitas_1_judul',
        'aktivitas_1_deskripsi',
        'aktivitas_1_gambar',

        'aktivitas_2_label',
        'aktivitas_2_judul',
        'aktivitas_2_deskripsi',
        'aktivitas_2_gambar',

        'aktivitas_3_label',
        'aktivitas_3_judul',
        'aktivitas_3_deskripsi',
        'aktivitas_3_gambar',

        'aktivitas_4_label',
        'aktivitas_4_judul',
        'aktivitas_4_deskripsi',
        'aktivitas_4_gambar',

        'cta_label',
        'cta_judul',
        'cta_deskripsi',
    ];
}