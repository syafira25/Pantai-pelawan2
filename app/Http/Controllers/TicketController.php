<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Snap;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TicketController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = (bool) config('midtrans.is_production');
        Config::$isSanitized = (bool) config('midtrans.is_sanitized');
        Config::$is3ds = (bool) config('midtrans.is_3ds');
    }

    public function create()
    {
        $harga = (int) env('TIKET_HARGA', 10000);

        return view('tiket', compact('harga'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => ['required', 'string', 'max:100'],
        'email' => ['required', 'email', 'max:100'],
        'tanggal_kunjungan' => ['required', 'date', 'after_or_equal:today'],

        'jumlah_orang' => ['nullable', 'integer', 'min:1', 'max:20'],
        'jumlah_dewasa' => ['nullable', 'integer', 'min:0', 'max:20'],
        'jumlah_anak' => ['nullable', 'integer', 'min:0', 'max:20'],
        'total_harga' => ['nullable', 'integer', 'min:0'],
    ]);

    $hargaDewasa = 5000;
    $hargaAnak = 2000;

    $dewasa = (int) ($request->jumlah_dewasa ?? 0);
    $anak = (int) ($request->jumlah_anak ?? 0);

    if ($dewasa > 0 || $anak > 0) {
        $jumlahOrang = $dewasa + $anak;
        $total = ($dewasa * $hargaDewasa) + ($anak * $hargaAnak);
        $harga = 0;
    } else {
        $harga = (int) env('TIKET_HARGA', 10000);
        $jumlahOrang = (int) ($validated['jumlah_orang'] ?? 0);
        $total = $harga * $jumlahOrang;
    }

    if ($jumlahOrang <= 0 || $total <= 0) {
        return back()
            ->withInput()
            ->with('error', 'Silakan pilih minimal 1 tiket terlebih dahulu.');
    }

    $kodeBooking = 'TKT-' . strtoupper(Str::random(8));
    $midtransOrderId = 'ORDER-' . now()->format('YmdHis') . '-' . strtoupper(Str::random(6));

    DB::beginTransaction();

    try {
        $pemesanan = Pemesanan::create([
            'user_id' => auth()->id(), // 🔥 FIX DI SINI

            'kode_booking' => $kodeBooking,
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'tanggal_kunjungan' => $validated['tanggal_kunjungan'],

            'jumlah_orang' => $jumlahOrang,
            'jumlah_dewasa' => $dewasa,
            'jumlah_anak' => $anak,
            'harga_per_tiket' => $harga,
            'total_harga' => $total,

            'metode_pembayaran' => 'QRIS',
            'midtrans_order_id' => $midtransOrderId,
            'status_pembayaran' => 'pending',
            'status_tiket' => 'nonaktif',
        ]);

        $itemDetails = [];

        if ($dewasa > 0) {
            $itemDetails[] = [
                'id' => 'TIKET-DEWASA',
                'price' => $hargaDewasa,
                'quantity' => $dewasa,
                'name' => 'Tiket Dewasa Pantai Pelawan',
            ];
        }

        if ($anak > 0) {
            $itemDetails[] = [
                'id' => 'TIKET-ANAK',
                'price' => $hargaAnak,
                'quantity' => $anak,
                'name' => 'Tiket Anak-anak Pantai Pelawan',
            ];
        }

        if (empty($itemDetails)) {
            $itemDetails[] = [
                'id' => 'TIKET-PELAWAN',
                'price' => (int) $harga,
                'quantity' => (int) $jumlahOrang,
                'name' => 'Tiket Masuk Pantai Pelawan',
            ];
        }

        $params = [
            'transaction_details' => [
                'order_id' => $midtransOrderId,
                'gross_amount' => (int) $total,
            ],
            'customer_details' => [
                'first_name' => $validated['nama'],
                'email' => $validated['email'],
            ],
            'item_details' => $itemDetails,
            'custom_field1' => $kodeBooking,
            'custom_field2' => $validated['tanggal_kunjungan'],
        ];

        $snapToken = Snap::getSnapToken($params);

        $pemesanan->update([
            'snap_token' => $snapToken,
        ]);

        DB::commit();

        return redirect()->route('tiket.payment', $pemesanan->id);

    } catch (\Throwable $e) {
        DB::rollBack();

        return back()->withInput()->with('error', 'Gagal membuat transaksi: ' . $e->getMessage());
    }
}

    public function payment(Pemesanan $pemesanan)
    {
        return view('payment', compact('pemesanan'));
    }

    public function notification(Request $request)
    {
        try {
            $payload = $request->all();

            $signatureKey = hash(
                'sha512',
                $payload['order_id'] .
                $payload['status_code'] .
                $payload['gross_amount'] .
                config('midtrans.server_key')
            );

            if (($payload['signature_key'] ?? '') !== $signatureKey) {
                return response()->json(['message' => 'Invalid signature'], 403);
            }

            $notification = new Notification();

            $orderId = $notification->order_id;
            $transactionStatus = $notification->transaction_status;
            $fraudStatus = $notification->fraud_status ?? null;
            $transactionId = $notification->transaction_id ?? null;

            $pemesanan = Pemesanan::where('midtrans_order_id', $orderId)->first();

            if (!$pemesanan) {
                return response()->json(['message' => 'Order not found'], 404);
            }

            if ($transactionStatus === 'capture') {
                if ($fraudStatus === 'accept') {
                    $pemesanan->update([
                        'status_pembayaran' => 'paid',
                        'status_tiket' => 'aktif',
                        'midtrans_transaction_id' => $transactionId,
                        'dibayar_pada' => now(),
                    ]);
                }
            } elseif ($transactionStatus === 'settlement') {
                $pemesanan->update([
                    'status_pembayaran' => 'paid',
                    'status_tiket' => 'aktif',
                    'midtrans_transaction_id' => $transactionId,
                    'dibayar_pada' => now(),
                ]);
            } elseif ($transactionStatus === 'pending') {
                $pemesanan->update([
                    'status_pembayaran' => 'pending',
                    'midtrans_transaction_id' => $transactionId,
                ]);
            } elseif ($transactionStatus === 'deny' || $transactionStatus === 'failure') {
                $pemesanan->update([
                    'status_pembayaran' => 'failed',
                    'midtrans_transaction_id' => $transactionId,
                ]);
            } elseif ($transactionStatus === 'expire') {
                $pemesanan->update([
                    'status_pembayaran' => 'expired',
                    'midtrans_transaction_id' => $transactionId,
                ]);
            } elseif ($transactionStatus === 'cancel') {
                $pemesanan->update([
                    'status_pembayaran' => 'cancelled',
                    'midtrans_transaction_id' => $transactionId,
                ]);
            }

            return response()->json(['message' => 'Notification handled'], 200);

        } catch (\Throwable $e) {
            return response()->json(['message' => 'Webhook error: ' . $e->getMessage()], 500);
        }
    }

    public function manualPayment($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

    return view('tiket.manual-payment', compact('pemesanan'));
    }

        public function uploadBukti(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $pemesanan = Pemesanan::findOrFail($id);

        $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');

        $qrCode = 'QR-' . strtoupper(Str::random(12)) . '-' . $pemesanan->id;

        $pemesanan->update([
            'bukti_pembayaran' => $path,
            'status_pembayaran' => 'paid',
            'qr_code' => $qrCode,
            'qr_used_at' => null,
        ]);

        return redirect()->route('tiket.finish', $pemesanan->id)
            ->with('success', 'Bukti pembayaran berhasil diupload. E-ticket sudah aktif.');
    }

    public function finish($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        return view('tiket.finish', compact('pemesanan'));
    }

    public function lihatTiket($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        // 🔥 pastikan qr_code tidak kosong
        if (!$pemesanan->qr_code) {
            $pemesanan->qr_code = 'QR-' . strtoupper(Str::random(12)) . '-' . $pemesanan->id;
            $pemesanan->save();
        }

        return view('tiket.lihat-tiket', compact('pemesanan'));
    }
    public function downloadNota($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $pdf = Pdf::loadView('tiket.nota-pdf', compact('pemesanan'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('nota-transaksi-' . $pemesanan->kode_booking . '.pdf');
    }

    public function downloadTiket($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);

        $pdf = Pdf::loadView('tiket.tiket-pdf', compact('pemesanan'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('e-ticket-' . $pemesanan->kode_booking . '.pdf');
    }

        public function scanQr($qr_code)
    {
        $pemesanan = Pemesanan::where('qr_code', $qr_code)->first();

        if (!$pemesanan) {
            abort(404, 'QR tidak ditemukan');
        }

        // ❌ SUDAH DIGUNAKAN
        if ($pemesanan->qr_used_at) {
            return view('tiket.scan-result', [
                'status' => 'used',
                'pemesanan' => $pemesanan
            ]);
        }

        // ✅ PERTAMA KALI SCAN
        $pemesanan->update([
            'qr_used_at' => now(),
            'status_tiket' => 'nonaktif' // 🔥 TAMBAH INI
        ]);

        return view('tiket.scan-result', [
            'status' => 'valid',
            'pemesanan' => $pemesanan
        ]);
    }

    
}

