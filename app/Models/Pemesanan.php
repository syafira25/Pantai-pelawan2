<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $fillable = [
        'user_id',
        'kode_booking',
        'nama',
        'email',
        'tanggal_kunjungan',
        'jumlah_orang',
        'jumlah_dewasa',
        'jumlah_anak',
        'harga_per_tiket',
        'total_harga',
        'metode_pembayaran',
        'midtrans_order_id',
        'midtrans_transaction_id',
        'snap_token',
        'status_pembayaran',
        'bukti_pembayaran',
        'status_tiket',
        'dibayar_pada',
        'qr_code',
        'qr_used_at',
    ];

    protected $casts = [
        'tanggal_kunjungan' => 'date',
        'dibayar_pada' => 'datetime',
        'qr_used_at' => 'datetime',
    ];
}