<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WarungKuliner extends Model
{
    protected $table = 'warung_kuliners';

    protected $fillable = [
        'nama',
        'slug',
        'badge',
        'kategori',
        'deskripsi',
        'alamat',
        'gambar',
        'gambar_2',
        'gambar_3',
        'status',
    ];

    public function menus()
    {
        return $this->hasMany(MenuKuliner::class, 'warung_kuliner_id');
    }
}