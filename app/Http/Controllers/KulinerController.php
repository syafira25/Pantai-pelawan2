<?php

namespace App\Http\Controllers;

use App\Models\KulinerPage;
use App\Models\WarungKuliner;

class KulinerController extends Controller
{
    public function index()
    {
        $kulinerPage = KulinerPage::first();

        $warungs = WarungKuliner::where('status', 'aktif')
            ->with(['menus' => function ($q) {
                $q->where('status', 'aktif');
            }])
            ->orderBy('id', 'asc')
            ->get();

        return view('kuliner', compact('kulinerPage', 'warungs'));
    }

    public function detail($slug)
    {
        $warung = WarungKuliner::where('slug', $slug)
            ->where('status', 'aktif')
            ->with(['menus' => function ($q) {
                $q->where('status', 'aktif')
                  ->orderBy('id', 'asc');
            }])
            ->firstOrFail();

        return view('kuliner-detail', compact('warung'));
    }
}