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
        <div class="content-box">
            @if(session('error'))
                <div style="background:#fee2e2;color:#991b1b;padding:12px 14px;border-radius:12px;margin-bottom:16px;">
                    {{ session('error') }}
                </div>
            @endif

            <h2 style="margin-bottom:16px;">Detail Pemesanan</h2>

            <p><strong>Kode Booking:</strong> {{ $pemesanan->kode_booking }}</p>
            <p><strong>Nama:</strong> {{ $pemesanan->nama }}</p>
            <p><strong>Email:</strong> {{ $pemesanan->email }}</p>
            <p><strong>Tanggal Kunjungan:</strong> {{ $pemesanan->tanggal_kunjungan->format('d M Y') }}</p>
            <p><strong>Jumlah Orang:</strong> {{ $pemesanan->jumlah_orang }}</p>
            <p><strong>Total Harga:</strong> Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}</p>
            <p><strong>Status Pembayaran:</strong> {{ strtoupper($pemesanan->status_pembayaran) }}</p>

            <div style="margin-top:24px;">
                <button id="pay-button" class="btn btn-primary">Bayar Sekarang</button>

                @if($pemesanan->status_pembayaran === 'paid')
                    <a href="{{ route('tiket.finish', $pemesanan->id) }}" class="btn btn-secondary" style="margin-left:10px;">
                        Lihat E-Ticket
                    </a>
                @endif
            </div>
        </div>
    </div>
</section>

<script
    type="text/javascript"
    src="{{ config('midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js' }}"
    data-client-key="{{ config('midtrans.client_key') }}">
</script>

<script type="text/javascript">
    document.getElementById('pay-button').onclick = function () {
        window.snap.pay('{{ $pemesanan->snap_token }}', {
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
    };
</script>
@endsection