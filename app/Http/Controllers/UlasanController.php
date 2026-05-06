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
            'status_pengunjung' => 'required|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'pesan' => 'required|string|min:5',
        ]);

        Ulasan::create([
            'user_id' => Auth::id(),
            'nama' => Auth::user()->name,
            'email' => Auth::user()->email,
            'status_pengunjung' => $request->status_pengunjung,
            'rating' => $request->rating,
            'pesan' => $request->pesan,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Ulasan berhasil dikirim dan menunggu persetujuan admin.');
    }
}