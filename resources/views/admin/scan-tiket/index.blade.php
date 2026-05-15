@extends('admin.layouts.app')

@section('title', 'Scan Tiket')

@section('content')

<div class="admin-page-header">
    <h1>Scan Tiket</h1>
    <p>Scan QR Code tiket pengunjung untuk mengecek dan memvalidasi tiket masuk.</p>
</div>

@if(session('success'))
    <div class="scan-alert scan-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="scan-alert scan-error">
        {{ session('error') }}
    </div>
@endif

@php
    if (!isset($pemesanan) || !$pemesanan) {
        $pemesanan = null;

        if (session('scan_result_id')) {
            $pemesanan = \App\Models\Pemesanan::find(session('scan_result_id'));
        }
    }
@endphp

<div class="scan-layout">

    <div class="scan-card">
        <div class="scan-card-header">
            <span>📷 Kamera Scanner</span>
            <h2>Scan QR Tiket</h2>
            <p>Arahkan kamera ke QR Code yang tampil pada tiket pengunjung.</p>
        </div>

        <div id="reader"></div>

        <form id="scanForm" action="{{ route('admin.scan-tiket.cek') }}" method="POST">
            @csrf
            <input type="hidden" name="qr_data" id="qr_data">
        </form>

        <div class="manual-scan-box">
            <h3>Input Manual QR</h3>
            <p>Gunakan ini jika kamera tidak bisa membaca QR.</p>

            <form action="{{ route('admin.scan-tiket.cek') }}" method="POST">
                @csrf
                <input type="text" name="qr_data" placeholder="Masukkan kode QR atau link QR tiket" required>
                <button type="submit">Cek Tiket</button>
            </form>
        </div>
    </div>

    <div class="scan-result-card">
        <div class="scan-card-header">
            <span>🎫 Hasil Scan</span>
            <h2>Detail Tiket</h2>
            <p>Data tiket akan tampil setelah QR berhasil discan.</p>
        </div>

        @if($pemesanan)
            <div class="ticket-result-box">

                <div class="result-status">
                    @if($pemesanan->qr_used_at)
                        <span class="badge-used">SUDAH DIGUNAKAN</span>
                    @elseif($pemesanan->status_pembayaran === 'paid')
                        <span class="badge-valid">VALID</span>
                    @else
                        <span class="badge-warning">BELUM LUNAS</span>
                    @endif
                </div>

                <div class="result-grid">
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
                        <span>Total Orang</span>
                        <strong>{{ $pemesanan->jumlah_orang }} Orang</strong>
                    </div>

                    <div>
                        <span>Total Bayar</span>
                        <strong>Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}</strong>
                    </div>

                    <div>
                        <span>Status Pembayaran</span>
                        <strong>{{ strtoupper($pemesanan->status_pembayaran) }}</strong>
                    </div>

                    <div>
                        <span>Status Tiket</span>
                        <strong>{{ strtoupper($pemesanan->status_tiket) }}</strong>
                    </div>
                </div>

                <div class="ticket-detail-box">
                    <h3>Detail Tiket</h3>

                    @if(($pemesanan->jumlah_dewasa ?? 0) > 0)
                        <p>🎫 {{ $pemesanan->jumlah_dewasa }} Tiket Dewasa</p>
                    @endif

                    @if(($pemesanan->jumlah_anak ?? 0) > 0)
                        <p>🧒 {{ $pemesanan->jumlah_anak }} Tiket Anak</p>
                    @endif

                    @if(($pemesanan->jumlah_dewasa ?? 0) == 0 && ($pemesanan->jumlah_anak ?? 0) == 0)
                        <p>🎫 {{ $pemesanan->jumlah_orang }} Tiket Masuk Pantai Pelawan</p>
                    @endif
                </div>

                @if($pemesanan->qr_used_at)
                    <div class="used-info">
                        Tiket sudah digunakan pada
                        <strong>{{ \Carbon\Carbon::parse($pemesanan->qr_used_at)->format('d M Y H:i') }} WIB</strong>.
                    </div>
                @else
                    @if($pemesanan->status_pembayaran === 'paid')
                        <form action="{{ route('admin.scan-tiket.validasi', $pemesanan->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-validasi"
                                    onclick="return confirm('Validasi tiket ini sekarang? Setelah divalidasi, tiket tidak bisa digunakan lagi.')">
                                ✅ Validasi Tiket
                            </button>
                        </form>
                    @else
                        <div class="used-info warning">
                            Tiket belum bisa divalidasi karena pembayaran belum lunas.
                        </div>
                    @endif
                @endif

            </div>
        @else
            <div class="empty-scan">
                <div>📷</div>
                <h3>Belum Ada Tiket Discan</h3>
                <p>Silakan scan QR Code tiket pengunjung terlebih dahulu.</p>
            </div>
        @endif
    </div>

</div>

<style>
    .scan-layout {
        display: grid;
        grid-template-columns: 1fr 1.1fr;
        gap: 26px;
        align-items: start;
    }

    .scan-card,
    .scan-result-card {
        background: #ffffff;
        border-radius: 26px;
        padding: 26px;
        box-shadow: 0 18px 45px rgba(20, 83, 45, 0.10);
        border: 1px solid rgba(34, 197, 94, 0.12);
        position: relative;
        overflow: hidden;
    }

    .scan-card::before,
    .scan-result-card::before {
        content: "";
        position: absolute;
        inset: 0 0 auto 0;
        height: 7px;
        background: linear-gradient(90deg, #14532d, #22c55e);
    }

    .scan-card-header span {
        display: inline-block;
        background: #dcfce7;
        color: #166534;
        padding: 7px 14px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .scan-card-header h2 {
        color: #14532d;
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 6px;
    }

    .scan-card-header p {
        color: #6b7280;
        margin-bottom: 20px;
    }

    #reader {
        width: 100%;
        overflow: hidden;
        border-radius: 18px;
        border: 2px dashed #bbf7d0;
        padding: 10px;
        background: #f0fdf4;
    }

    .manual-scan-box {
        margin-top: 22px;
        padding: 18px;
        border-radius: 18px;
        background: #f8fafc;
    }

    .manual-scan-box h3 {
        color: #14532d;
        margin-bottom: 5px;
    }

    .manual-scan-box p {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 12px;
    }

    .manual-scan-box form {
        display: grid;
        gap: 10px;
    }

    .manual-scan-box input {
        width: 100%;
        border: 1px solid #d1fae5;
        border-radius: 14px;
        padding: 13px 14px;
        outline: none;
    }

    .manual-scan-box button,
    .btn-validasi {
        border: none;
        border-radius: 14px;
        padding: 13px 18px;
        background: #14532d;
        color: #ffffff;
        font-weight: 800;
        cursor: pointer;
    }

    .manual-scan-box button:hover,
    .btn-validasi:hover {
        background: #166534;
    }

    .scan-alert {
        padding: 14px 16px;
        border-radius: 14px;
        margin-bottom: 18px;
        font-weight: 800;
    }

    .scan-success {
        background: #dcfce7;
        color: #166534;
    }

    .scan-error {
        background: #fee2e2;
        color: #991b1b;
    }

    .ticket-result-box {
        display: grid;
        gap: 18px;
    }

    .result-status {
        margin-bottom: 2px;
    }

    .badge-valid,
    .badge-used,
    .badge-warning {
        display: inline-block;
        padding: 8px 14px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 900;
    }

    .badge-valid {
        background: #dcfce7;
        color: #166534;
    }

    .badge-used {
        background: #fee2e2;
        color: #991b1b;
    }

    .badge-warning {
        background: #fef3c7;
        color: #92400e;
    }

    .result-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 14px;
    }

    .result-grid div {
        background: #f8fafc;
        border-radius: 16px;
        padding: 14px;
    }

    .result-grid span {
        display: block;
        color: #6b7280;
        font-size: 13px;
        margin-bottom: 5px;
    }

    .result-grid strong {
        color: #14532d;
        font-size: 15px;
        word-break: break-word;
    }

    .ticket-detail-box {
        background: #f0fdf4;
        border: 1px solid #bbf7d0;
        border-radius: 18px;
        padding: 18px;
    }

    .ticket-detail-box h3 {
        color: #14532d;
        margin-bottom: 8px;
    }

    .ticket-detail-box p {
        margin: 5px 0;
        color: #1f2937;
    }

    .used-info {
        background: #fee2e2;
        color: #991b1b;
        padding: 14px;
        border-radius: 14px;
        font-weight: 700;
    }

    .used-info.warning {
        background: #fef3c7;
        color: #92400e;
    }

    .empty-scan {
        text-align: center;
        padding: 60px 20px;
        color: #6b7280;
    }

    .empty-scan div {
        font-size: 54px;
        margin-bottom: 14px;
    }

    .empty-scan h3 {
        color: #14532d;
        font-size: 22px;
        margin-bottom: 8px;
    }

    @media (max-width: 992px) {
        .scan-layout {
            grid-template-columns: 1fr;
        }

        .result-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<script src="https://unpkg.com/html5-qrcode"></script>

<script>
    let isScanning = false;

    function onScanSuccess(decodedText) {
        if (isScanning) return;

        isScanning = true;

        document.getElementById('qr_data').value = decodedText;
        document.getElementById('scanForm').submit();
    }

    const scanner = new Html5QrcodeScanner(
        "reader",
        {
            fps: 10,
            qrbox: {
                width: 250,
                height: 250
            },
            rememberLastUsedCamera: true
        },
        false
    );

    scanner.render(onScanSuccess);
</script>

@endsection