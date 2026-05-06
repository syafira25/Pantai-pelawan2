<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarungKuliner extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function menus()
    {
        return $this->hasMany(MenuKuliner::class, 'warung_kuliner_id');
    }
}