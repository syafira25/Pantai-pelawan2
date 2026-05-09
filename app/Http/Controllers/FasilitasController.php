<?php

namespace App\Http\Controllers;

use App\Models\FasilitasPage;
use App\Models\FasilitasItem;

class FasilitasController extends Controller
{
    public function index()
    {
        $page = FasilitasPage::first();

        $utama = FasilitasItem::where('kategori', 'utama')
            ->where('status', 'aktif')
            ->orderBy('urutan', 'asc')
            ->get();

        $pendukung = FasilitasItem::where('kategori', 'pendukung')
            ->where('status', 'aktif')
            ->orderBy('urutan', 'asc')
            ->get();

        return view('fasilitas', compact('page', 'utama', 'pendukung'));
    }
}