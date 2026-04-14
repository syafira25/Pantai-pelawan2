@extends('layouts.app')

@section('content')
<section class="page-header">
    <div class="container">
        <h1>E-Ticket Pantai Pelawan</h1>
        <p class="page-subtitle">
            Pembayaran berhasil. Tiket kamu sudah aktif.
        </p>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div class="content-box">
            <h2 style="margin-bottom:16px;">Detail Tiket</h2>

            <p><strong>Kode Booking:</strong> {{ $pemesanan->kode_booking }}</p>
            <p><strong>Nama:</strong> {{ $pemesanan->nama }}</p>
            <p><strong>Email:</strong> {{ $pemesanan->email }}</p>
            <p><strong>Tanggal Kunjungan:</strong> {{ $pemesanan->tanggal_kunjungan->format('d M Y') }}</p>
            <p><strong>Jumlah Orang:</strong> {{ $pemesanan->jumlah_orang }}</p>
            <p><strong>Status Tiket:</strong> {{ strtoupper($pemesanan->status_tiket) }}</p>
        </div>
    </div>
</section>
@endsection