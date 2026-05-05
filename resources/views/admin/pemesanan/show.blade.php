@extends('admin.layouts.app')

@section('content')

<section class="admin-dashboard-section">
    <div class="container">

        <h1>Detail Pemesanan</h1>

        <div class="admin-table-card">

            <p><strong>Kode:</strong> {{ $pemesanan->kode_booking }}</p>
            <p><strong>Nama:</strong> {{ $pemesanan->nama }}</p>
            <p><strong>Email:</strong> {{ $pemesanan->email }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($pemesanan->tanggal_kunjungan)->format('d M Y') }}</p>

            <p><strong>Total:</strong> Rp {{ number_format($pemesanan->total_harga,0,',','.') }}</p>

            <p><strong>Status Bayar:</strong> {{ $pemesanan->status_pembayaran }}</p>

            <p>
                <strong>Status Tiket:</strong>
                @if($pemesanan->qr_used_at)
                    Sudah Digunakan
                @else
                    Belum Digunakan
                @endif
            </p>

            <p>
                <strong>QR:</strong><br>
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=180x180&data={{ url('/tiket/scan/'.$pemesanan->qr_code) }}">
            </p>

        </div>

    </div>
</section>

@endsection