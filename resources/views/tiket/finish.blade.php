@extends('layouts.app')

@section('content')

<section class="page-hero page-hero-tiket">
    <div class="page-hero-overlay">
        <div class="container">
            <div class="page-hero-content">
                <h1>E-Ticket Pantai Pelawan</h1>
                <p>Pembayaran berhasil. Tiket kamu sudah aktif.</p>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">

        @if(session('success'))
            <div class="success-alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="ticket-finish-card">

            <div class="ticket-finish-left">
                <span class="section-label">Detail Tiket</span>
                <h2>Pesanan Berhasil</h2>

                <div class="ticket-info-list">
                    <div>
                        <span>Kode Booking</span>
                        <strong>{{ $pemesanan->kode_booking }}</strong>
                    </div>

                    <div>
                        <span>Nama</span>
                        <strong>{{ $pemesanan->nama }}</strong>
                    </div>

                    <div>
                        <span>Email</span>
                        <strong>{{ $pemesanan->email }}</strong>
                    </div>

                    <div>
                        <span>Tanggal Kunjungan</span>
                        <strong>{{ \Carbon\Carbon::parse($pemesanan->tanggal_kunjungan)->format('d M Y') }}</strong>
                    </div>

                    <div>
                        <span>Jumlah Tiket</span>
                        <strong>{{ $pemesanan->jumlah_orang }} Orang</strong>
                    </div>

                    <div>
                        <span>Status Tiket</span>
                        <strong class="ticket-status-active">AKTIF</strong>
                    </div>
                </div>
            </div>

            <div class="ticket-finish-right">
                <div class="ticket-success-icon">🎫</div>
                <h3>Tiket Siap Digunakan</h3>
                <p>
                    Silakan download nota transaksi atau lihat tiket dengan QR Code
                    untuk ditunjukkan saat masuk ke Pantai Pelawan.
                </p>

                <div class="ticket-action-buttons">
                    <a href="{{ route('tiket.nota', $pemesanan->id) }}" class="ticket-btn ticket-btn-yellow">
                        Download Nota
                    </a>

                    <a href="{{ route('tiket.lihat', $pemesanan->id) }}" class="ticket-btn ticket-btn-green">
                        Lihat Tiket
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection