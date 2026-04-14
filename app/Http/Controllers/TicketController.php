<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Notification;
use Midtrans\Snap;

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
            'jumlah_orang' => ['required', 'integer', 'min:1', 'max:20'],
        ]);

        $harga = (int) env('TIKET_HARGA', 10000);
        $total = $harga * (int) $validated['jumlah_orang'];

        $kodeBooking = 'TKT-' . strtoupper(Str::random(8));
        $midtransOrderId = 'ORDER-' . now()->format('YmdHis') . '-' . strtoupper(Str::random(6));

        DB::beginTransaction();

        try {
            $pemesanan = Pemesanan::create([
                'kode_booking' => $kodeBooking,
                'nama' => $validated['nama'],
                'email' => $validated['email'],
                'tanggal_kunjungan' => $validated['tanggal_kunjungan'],
                'jumlah_orang' => $validated['jumlah_orang'],
                'harga_per_tiket' => $harga,
                'total_harga' => $total,
                'metode_pembayaran' => 'QRIS',
                'midtrans_order_id' => $midtransOrderId,
                'status_pembayaran' => 'pending',
                'status_tiket' => 'nonaktif',
            ]);

            $params = [
                'transaction_details' => [
                    'order_id' => $midtransOrderId,
                    'gross_amount' => $total,
                ],
                'customer_details' => [
                    'first_name' => $validated['nama'],
                    'email' => $validated['email'],
                ],
                'item_details' => [
                    [
                        'id' => 'TIKET-PELAWAN',
                        'price' => $harga,
                        'quantity' => (int) $validated['jumlah_orang'],
                        'name' => 'Tiket Masuk Pantai Pelawan',
                    ]
                ],
                'enabled_payments' => ['qris'],
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

    public function finish(Pemesanan $pemesanan)
    {
        $pemesanan->refresh();

        if ($pemesanan->status_pembayaran !== 'paid') {
            return redirect()->route('tiket.payment', $pemesanan->id)
                ->with('error', 'Pembayaran belum terkonfirmasi.');
        }

        return view('e-ticket', compact('pemesanan'));
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
}