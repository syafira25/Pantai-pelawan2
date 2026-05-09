<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerandaPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_badge',
        'hero_judul',
        'hero_deskripsi',
        'hero_tombol_1',
        'hero_tombol_2',
        'layanan_label',
        'layanan_judul',
        'layanan_deskripsi',
        'about_label',
        'about_judul',
        'about_deskripsi_1',
        'about_deskripsi_2',
        'about_gambar',
        'about_tombol',
        'keunggulan_label',
        'keunggulan_judul',
        'keunggulan_deskripsi',
        'info_label',
        'info_judul',
        'info_deskripsi',
        'alur_label',
        'alur_judul',
        'alur_deskripsi',
        'cta_label',
        'cta_judul',
        'cta_deskripsi',
        'cta_tombol_1',
        'cta_tombol_2',
        'cta_wa_link',
    ];
}