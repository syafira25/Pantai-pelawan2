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
    ];
}