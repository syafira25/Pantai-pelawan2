<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        'icon',
        'judul',
        'deskripsi',
        'urutan',
        'status',
    ];
}