<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuKuliner extends Model
{
    protected $table = 'menu_kuliners';

    protected $fillable = [
        'warung_kuliner_id',
        'nama_menu',
        'harga',
        'deskripsi',
        'kategori',
        'status',
        'gambar',
    ];

    public function warung()
    {
        return $this->belongsTo(WarungKuliner::class, 'warung_kuliner_id');
    }
}