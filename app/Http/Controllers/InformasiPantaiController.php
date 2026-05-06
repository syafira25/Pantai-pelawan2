<?php

namespace App\Http\Controllers;

use App\Models\InformasiPantai;
use App\Models\Ulasan;

class InformasiPantaiController extends Controller
{
    public function index()
    {
        $informasi = InformasiPantai::first();

        $ulasans = Ulasan::where('status', 'disetujui')
            ->latest()
            ->take(6)
            ->get();

        return view('informasi_pantai', compact('informasi', 'ulasans'));
    }
}