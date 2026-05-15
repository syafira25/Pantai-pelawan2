<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerandaItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        'icon',
        'nomor',
        'judul',
        'deskripsi',
        'gambar',
        'link',
        'urutan',
        'status',
    ];
}