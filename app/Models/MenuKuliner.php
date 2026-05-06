<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuKuliner extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function warung()
    {
        return $this->belongsTo(WarungKuliner::class, 'warung_kuliner_id');
    }
}