<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Models\CatatanPengelola;
use Illuminate\Http\Request;

class PengelolaCatatanController extends Controller
{
    public function index()
    {
        $catatans = CatatanPengelola::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('pengelola.catatan.index', compact('catatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        CatatanPengelola::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'isi' => $request->isi,
            'status' => 'baru',
        ]);

        return back()->with('success', 'Catatan berhasil dikirim ke admin.');
    }
}