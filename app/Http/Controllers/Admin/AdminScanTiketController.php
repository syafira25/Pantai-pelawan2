<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class AdminScanTiketController extends Controller
{
    public function index()
    {
        $qrCode = session('qr_code_from_link');
        $pemesanan = null;

        if ($qrCode) {
            $pemesanan = Pemesanan::where('qr_code', $qrCode)->first();
        }

        return view('admin.scan-tiket.index', compact('pemesanan'));
    }

    public function cek(Request $request)
    {
        $request->validate([
            'qr_data' => 'required|string',
        ]);

        $qrData = trim($request->qr_data);

        $path = parse_url($qrData, PHP_URL_PATH);
        $qrCode = $path ? basename($path) : $qrData;

        $pemesanan = Pemesanan::where('qr_code', $qrCode)->first();

        if (!$pemesanan) {
            return redirect()
                ->route('admin.scan-tiket.index')
                ->with('error', 'QR Code tidak ditemukan atau tidak valid.');
        }

        return redirect()
            ->route('admin.scan-tiket.index')
            ->with('scan_result_id', $pemesanan->id)
            ->with('success', 'QR Code berhasil dibaca.');
    }

    public function validasi($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        if ($pemesanan->qr_used_at) {
            return redirect()
                ->route('admin.scan-tiket.index')
                ->with('scan_result_id', $pemesanan->id)
                ->with('error', 'Tiket ini sudah digunakan sebelumnya.');
        }

        if ($pemesanan->status_pembayaran !== 'paid') {
            return redirect()
                ->route('admin.scan-tiket.index')
                ->with('scan_result_id', $pemesanan->id)
                ->with('error', 'Tiket belum bisa divalidasi karena pembayaran belum lunas.');
        }

        $pemesanan->update([
            'qr_used_at' => now(),
            'status_tiket' => 'nonaktif',
        ]);

        return redirect()
            ->route('admin.scan-tiket.index')
            ->with('scan_result_id', $pemesanan->id)
            ->with('success', 'Tiket berhasil divalidasi. Tiket sekarang sudah digunakan.');
    }
}