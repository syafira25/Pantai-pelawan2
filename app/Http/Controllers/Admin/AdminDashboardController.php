<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pemesanan;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::where('role', 'user')->count();
        $totalAdmin = User::where('role', 'admin')->count();

        $totalPemesanan = Pemesanan::count();
        $pending = Pemesanan::where('status_pembayaran', 'pending')->count();
        $paid = Pemesanan::where('status_pembayaran', 'paid')->count();
        $tiketDigunakan = Pemesanan::whereNotNull('qr_used_at')->count();

        $usersTerbaru = User::latest()->take(5)->get();
        $pemesananTerbaru = Pemesanan::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUser',
            'totalAdmin',
            'totalPemesanan',
            'pending',
            'paid',
            'tiketDigunakan',
            'usersTerbaru',
            'pemesananTerbaru'
        ));
    }
}