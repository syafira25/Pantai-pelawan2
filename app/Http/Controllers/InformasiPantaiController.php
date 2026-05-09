<?php

namespace App\Http\Controllers;

use App\Models\InformasiPantai;
use App\Models\Ulasan;

class InformasiPantaiController extends Controller
{
public function index()
{
    $informasi = \App\Models\InformasiPantai::first();
    $ulasans = Ulasan::latest()->get();

    return view('informasi', compact('informasi', 'ulasans'));
}
}