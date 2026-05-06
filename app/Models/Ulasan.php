<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'status_pengunjung',
        'rating',
        'pesan',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}