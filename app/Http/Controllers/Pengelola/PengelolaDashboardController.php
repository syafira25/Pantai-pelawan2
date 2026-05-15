<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use App\Models\User;
use App\Models\Ulasan;
use App\Models\CatatanPengelola;

class PengelolaDashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::where('role', 'user')->count();
        $totalAdmin = User::where('role', 'admin')->count();
        $totalPengelola = User::where('role', 'pengelola')->count();

        $totalPemesanan = Pemesanan::count();
        $pending = Pemesanan::where('status_pembayaran', 'pending')->count();
        $paid = Pemesanan::where('status_pembayaran', 'paid')->count();
        $tiketDigunakan = Pemesanan::whereNotNull('qr_used_at')->count();

        $usersTerbaru = User::latest()->take(5)->get();
        $pemesananTerbaru = Pemesanan::latest()->take(5)->get();
        $ulasanTerbaru = Ulasan::latest()->take(5)->get();

        $catatanSaya = CatatanPengelola::where('user_id', auth()->id())
            ->latest()
            ->take(5)
            ->get();

        return view('pengelola.dashboard', compact(
            'totalUser',
            'totalAdmin',
            'totalPengelola',
            'totalPemesanan',
            'pending',
            'paid',
            'tiketDigunakan',
            'usersTerbaru',
            'pemesananTerbaru',
            'ulasanTerbaru',
            'catatanSaya'
        ));
    }
}