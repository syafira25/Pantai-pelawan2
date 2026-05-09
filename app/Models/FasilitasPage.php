<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_judul',
        'hero_deskripsi',
        'utama_label',
        'utama_judul',
        'utama_deskripsi',
        'pendukung_label',
        'pendukung_judul',
        'pendukung_deskripsi',
        'cta_label',
        'cta_judul',
        'cta_deskripsi',
        'cta_tombol',
    ];
}