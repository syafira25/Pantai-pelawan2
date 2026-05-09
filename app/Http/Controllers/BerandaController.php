<?php

namespace App\Http\Controllers;

use App\Models\BerandaPage;
use App\Models\BerandaItem;

class BerandaController extends Controller
{
    public function index()
    {
        $page = BerandaPage::first();

        $layanan = BerandaItem::where('kategori', 'layanan')->where('status', 'aktif')->orderBy('urutan')->get();
        $keunggulan = BerandaItem::where('kategori', 'keunggulan')->where('status', 'aktif')->orderBy('urutan')->get();
        $informasi = BerandaItem::where('kategori', 'informasi')->where('status', 'aktif')->orderBy('urutan')->get();
        $alur = BerandaItem::where('kategori', 'alur')->where('status', 'aktif')->orderBy('urutan')->get();

        return view('dashboard', compact('page', 'layanan', 'keunggulan', 'informasi', 'alur'));
    }
}