<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'status_pengunjung' => 'required',
            'rating' => 'required',
            'pesan' => 'required',
        ]);

       Ulasan::create([
            'nama' => $request->nama,
            'status_pengunjung' => $request->status_pengunjung,
            'rating' => $request->rating,
            'pesan' => $request->pesan,
            'status' => 'disetujui',
        ]);

     return redirect('/informasi-pantai#ulasan')
    ->with('success', 'Ulasan berhasil dikirim.');
    }
}

