<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayaTarik extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_judul',
        'hero_subjudul',

        'highlight_gambar',
        'highlight_badge_judul',
        'highlight_badge_subjudul',
        'highlight_label',
        'highlight_judul',
        'highlight_deskripsi',

        'stat_1_icon',
        'stat_1_text',
        'stat_1_deskripsi',
        'stat_2_icon',
        'stat_2_text',
        'stat_2_deskripsi',
        'stat_3_icon',
        'stat_3_text',
        'stat_3_deskripsi',

        'nilai_label',
        'nilai_judul',
        'nilai_deskripsi',

        'potensi_1_icon',
        'potensi_1_judul',
        'potensi_1_deskripsi',
        'potensi_2_icon',
        'potensi_2_judul',
        'potensi_2_deskripsi',
        'potensi_3_icon',
        'potensi_3_judul',
        'potensi_3_deskripsi',
        'potensi_4_icon',
        'potensi_4_judul',
        'potensi_4_deskripsi',

        'keunikan_label',
        'keunikan_judul',
        'keunikan_deskripsi',
        'keunikan_big_judul',
        'keunikan_big_deskripsi',
        'keunikan_1_icon',
        'keunikan_1_judul',
        'keunikan_1_deskripsi',
        'keunikan_2_icon',
        'keunikan_2_judul',
        'keunikan_2_deskripsi',
        'keunikan_3_icon',
        'keunikan_3_judul',
        'keunikan_3_deskripsi',
        'keunikan_4_icon',
        'keunikan_4_judul',
        'keunikan_4_deskripsi',

        'pengalaman_label',
        'pengalaman_judul',
        'pengalaman_deskripsi',
        'pengalaman_1_icon',
        'pengalaman_1_judul',
        'pengalaman_1_deskripsi',
        'pengalaman_2_icon',
        'pengalaman_2_judul',
        'pengalaman_2_deskripsi',
        'pengalaman_3_icon',
        'pengalaman_3_judul',
        'pengalaman_3_deskripsi',
        'pengalaman_4_icon',
        'pengalaman_4_judul',
        'pengalaman_4_deskripsi',

        'alam_label',
        'alam_judul',
        'alam_deskripsi',
        'alam_1_judul',
        'alam_1_deskripsi',
        'alam_2_judul',
        'alam_2_deskripsi',
        'alam_3_judul',
        'alam_3_deskripsi',
        'alam_card_label',
        'alam_card_judul',
        'alam_card_deskripsi',

        'alasan_label',
        'alasan_judul',
        'alasan_deskripsi',
        'alasan_1_nomor',
        'alasan_1_judul',
        'alasan_1_deskripsi',
        'alasan_2_nomor',
        'alasan_2_judul',
        'alasan_2_deskripsi',
        'alasan_3_nomor',
        'alasan_3_judul',
        'alasan_3_deskripsi',

        'cta_label',
        'cta_judul',
        'cta_deskripsi',
        'cta_tombol_text',
    ];
}