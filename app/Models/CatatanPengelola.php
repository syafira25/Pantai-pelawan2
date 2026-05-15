<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CatatanPengelola extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'isi',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}