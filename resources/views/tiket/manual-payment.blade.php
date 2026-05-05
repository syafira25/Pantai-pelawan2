@extends('layouts.app')

@section('content')

<section class="section section-soft">
    <div class="container">

        <div class="manual-payment-wrapper">

            <div class="manual-payment-card">
                <span class="section-label">Pembayaran Manual</span>

                <h1>Upload Bukti Pembayaran</h1>

                <p>
                    Silakan lakukan pembayaran secara manual, lalu upload bukti transaksi
                    agar e-ticket dapat dicetak.
                </p>

                <div class="manual-info">
                    <div>
                        <span>Kode Booking</span>
                        <strong>{{ $pemesanan->kode_booking }}</strong>
                    </div>

                    <div>
                        <span>Total Pembayaran</span>
                        <strong>Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}</strong>
                    </div>

                    <div>
                        <span>Metode</span>
                        <strong>Transfer / QRIS Manual</strong>
                    </div>
                </div>

                <div class="manual-rekening">
                    <h3>Informasi Pembayaran</h3>
                    <p>Silakan transfer sesuai total pembayaran ke rekening/QRIS pengelola.</p>

                    <div class="rekening-box">
                        <span>Bank / QRIS</span>
                        <strong>QRIS Pengelola Pantai Pelawan</strong>
                    </div>

                    <div class="rekening-box">
                        <span>Atas Nama</span>
                        <strong>Pengelola Pantai Pelawan</strong>
                    </div>
                </div>

                <form action="{{ route('tiket.upload.bukti', $pemesanan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Upload Bukti Transaksi</label>
                        <input type="file" name="bukti_pembayaran" accept="image/*" required>

                        @error('bukti_pembayaran')
                            <small class="error-text">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Upload Bukti & Cetak Tiket
                    </button>
                </form>
            </div>

        </div>

    </div>
</section>

@endsection