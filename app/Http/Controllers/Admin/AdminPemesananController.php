<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class AdminPemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::latest()->get();

        return view('admin.pemesanan.index', compact('pemesanans'));
    }

    public function show($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        return view('admin.pemesanan.show', compact('pemesanan'));
    }
}