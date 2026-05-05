@extends('layouts.app')

@section('content')
<section class="page-header">
    <div class="container">
        <h1>Pembayaran Tiket</h1>
        <p class="page-subtitle">
            Selesaikan pembayaran QRIS untuk mengaktifkan tiket online kamu.
        </p>
    </div>
</section>

<section class="section section-soft">
    <div class="container">

        @if(session('error'))
            <div class="payment-alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="payment-wrapper">

            <div class="payment-card payment-detail-card">
                <div class="payment-card-header">
                    <span class="payment-badge">Detail Pemesanan</span>
                    <h2>Tiket Pantai Pelawan</h2>
                    <p>Pastikan data pemesanan sudah benar sebelum melanjutkan pembayaran.</p>
                </div>

                <div class="payment-info-list">
                    <div class="payment-info-item">
                        <span>Kode Booking</span>
                        <strong>{{ $pemesanan->kode_booking }}</strong>
                    </div>

                    <div class="payment-info-item">
                        <span>Nama</span>
                        <strong>{{ $pemesanan->nama }}</strong>
                    </div>

                    <div class="payment-info-item">
                        <span>Email</span>
                        <strong>{{ $pemesanan->email }}</strong>
                    </div>

                    <div class="payment-info-item">
                        <span>Tanggal Kunjungan</span>
                        <strong>{{ $pemesanan->tanggal_kunjungan->format('d M Y') }}</strong>
                    </div>

                    <div class="payment-info-item">
                        <span>Jumlah Tiket</span>
                        <strong>{{ $pemesanan->jumlah_orang }} Orang</strong>
                    </div>

                    <div class="payment-info-item">
                        <span>Metode Pembayaran</span>
                        <strong>{{ $pemesanan->metode_pembayaran ?? 'QRIS' }}</strong>
                    </div>

                    <div class="payment-info-item">
                        <span>Status Pembayaran</span>
                        <strong class="status-badge status-{{ $pemesanan->status_pembayaran }}">
                            {{ strtoupper($pemesanan->status_pembayaran) }}
                        </strong>
                    </div>
                </div>
            </div>

            <div class="payment-card payment-summary-card">
                <div class="summary-top">
                    <div class="summary-icon">🎫</div>
                    <div>
                        <span>Total Pembayaran</span>
                        <h2>Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}</h2>
                    </div>
                </div>

                <div class="payment-note">
                    <h4>Instruksi Pembayaran</h4>
                    <p>
                        Klik tombol bayar, lalu pilih metode pembayaran yang tersedia.
                        Setelah pembayaran berhasil, tiket online akan aktif secara otomatis.
                    </p>
                </div>

                <div class="payment-step-list">
                    <div class="payment-step">
                        <span>1</span>
                        <p>Klik tombol bayar sekarang</p>
                    </div>

                    <div class="payment-step">
                        <span>2</span>
                        <p>Selesaikan pembayaran melalui Snap Midtrans</p>
                    </div>

                    <div class="payment-step">
                        <span>3</span>
                        <p>E-ticket akan muncul setelah pembayaran berhasil</p>
                    </div>
                </div>

                <div class="payment-action">

                   <button id="pay-button" class="btn-pay primary">
                        Bayar Sekarang
                    </button>

                    <a href="{{ route('tiket.manual.payment', $pemesanan->id) }}" class="btn-pay secondary">
                        Bayar Manual
                    </a>

                    @if($pemesanan->status_pembayaran === 'paid')
                        <a href="{{ route('tiket.finish', $pemesanan->id) }}" class="btn btn-secondary payment-ticket-btn">
                            Lihat E-Ticket
                        </a>
                    @endif

                </div>
            </div>

        </div>
    </div>
</section>

<script
    src="{{ config('midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}"
    data-client-key="{{ config('midtrans.client_key') }}">
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const payButton = document.getElementById('pay-button');

        if (!payButton) {
            console.log('Tombol bayar tidak ditemukan');
            return;
        }

        payButton.addEventListener('click', function () {
            const snapToken = "{{ $pemesanan->snap_token }}";

            if (!snapToken) {
                alert('Snap token kosong. Transaksi belum berhasil dibuat.');
                return;
            }

            if (typeof window.snap === 'undefined') {
                alert('Midtrans Snap belum berhasil dimuat. Cek koneksi internet atau Client Key.');
                return;
            }

            window.snap.pay(snapToken, {
                onSuccess: function(result) {
                    window.location.href = "{{ route('tiket.finish', $pemesanan->id) }}";
                },
                onPending: function(result) {
                    alert('Pembayaran belum selesai. Silakan lanjutkan pembayaran.');
                },
                onError: function(result) {
                    alert('Pembayaran gagal diproses.');
                },
                onClose: function() {
                    alert('Kamu menutup popup pembayaran.');
                }
            });
        });
    });
</script>
@endsection