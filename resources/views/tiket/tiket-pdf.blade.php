<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>E-Ticket Pantai Pelawan</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background: #f3f7f4;
            padding: 25px;
            color: #0f172a;
        }

        .ticket-modern {
            width: 100%;
            background: #ffffff;
            border-radius: 22px;
            overflow: hidden;
            display: table;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .ticket-left {
            display: table-cell;
            width: 30%;
            background: #2f6841;
            color: #ffffff;
            text-align: center;
            padding: 35px 22px;
            vertical-align: middle;
        }

        .ticket-left img {
            width: 190px;
            height: 190px;
            background: #ffffff;
            padding: 10px;
            border-radius: 12px;
            margin-bottom: 15px;
        }

        .qr-text {
            font-size: 13px;
            line-height: 1.5;
            margin: 12px 0;
        }

        .qr-active,
        .qr-used {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: bold;
            margin-top: 8px;
        }

        .qr-active {
            background: #86efac;
            color: #14532d;
        }

        .qr-used {
            background: #fecaca;
            color: #991b1b;
        }

        .status-aktif,
        .status-used {
            display: block;
            margin-top: 10px;
            font-size: 18px;
            font-weight: bold;
            color: #ffffff;
        }

        .ticket-divider {
            display: table-cell;
            width: 2px;
            border-left: 2px dashed #d1d5db;
        }

        .ticket-right {
            display: table-cell;
            width: 70%;
            padding: 32px;
            vertical-align: top;
        }

        .ticket-header {
            width: 100%;
            margin-bottom: 25px;
        }

        .ticket-header h2 {
            margin: 0;
            font-size: 26px;
            color: #0f172a;
            display: inline-block;
        }

        .kode {
            float: right;
            color: #14532d;
            font-weight: bold;
            font-size: 16px;
            margin-top: 6px;
        }

        .ticket-info-grid {
            width: 100%;
            display: table;
            margin-bottom: 22px;
        }

        .info-row {
            display: table-row;
        }

        .info-col {
            display: table-cell;
            width: 50%;
            padding: 8px 0;
        }

        .info-col span {
            color: #6b7280;
            font-size: 12px;
            display: block;
        }

        .info-col strong {
            color: #0f172a;
            font-size: 16px;
            font-weight: bold;
        }

        .ticket-breakdown {
            background: #f8fafc;
            padding: 18px;
            border-radius: 14px;
            margin-bottom: 18px;
        }

        .ticket-breakdown h4 {
            margin: 0 0 8px 0;
            font-size: 18px;
            color: #0f172a;
        }

        .ticket-breakdown p {
            margin: 4px 0;
            font-size: 15px;
        }

        .ticket-breakdown .total {
            font-weight: bold;
            margin-top: 8px;
        }

        .ticket-warning {
            background: #fff3cd;
            color: #111827;
            padding: 14px 16px;
            border-radius: 12px;
            font-size: 13px;
            line-height: 1.6;
        }

        .qr-error {
            background: #ffffff;
            color: #dc2626;
            padding: 20px;
            border-radius: 12px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="ticket-modern">

    <div class="ticket-left">
        @if($pemesanan->qr_code)
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data={{ urlencode(url('/tiket/scan/'.$pemesanan->qr_code)) }}"
                 alt="QR Code Tiket">

            <div class="qr-code-text">
                    {{ $pemesanan->qr_code }}
            </div>
        @else
            <div class="qr-error">
                QR Code belum tersedia
            </div>
        @endif

        <p class="qr-text">
            QR hanya boleh discan oleh petugas di lokasi.
        </p>

        @if($pemesanan->qr_used_at)
            <span class="qr-used">SUDAH DIGUNAKAN</span>
        @else
            <span class="qr-active">BELUM DIGUNAKAN</span>
        @endif

        @if($pemesanan->status_tiket == 'digunakan')
            <strong class="status-used">DIGUNAKAN</strong>
        @else
            <strong class="status-aktif">AKTIF</strong>
        @endif
    </div>

    <div class="ticket-divider"></div>

    <div class="ticket-right">

        <div class="ticket-header">
            <h2>E-Ticket Pantai Pelawan</h2>
            <span class="kode">{{ $pemesanan->kode_booking }}</span>
        </div>

        <div class="ticket-info-grid">
            <div class="info-row">
                <div class="info-col">
                    <span>Nama</span>
                    <strong>{{ $pemesanan->nama }}</strong>
                </div>

                <div class="info-col">
                    <span>Email</span>
                    <strong>{{ $pemesanan->email }}</strong>
                </div>
            </div>

            <div class="info-row">
                <div class="info-col">
                    <span>Tanggal</span>
                    <strong>{{ \Carbon\Carbon::parse($pemesanan->tanggal_kunjungan)->format('d M Y') }}</strong>
                </div>

                <div class="info-col">
                    <span>Total Orang</span>
                    <strong>{{ $pemesanan->jumlah_orang }} Orang</strong>
                </div>
            </div>

            <div class="info-row">
                <div class="info-col">
                    <span>Total Bayar</span>
                    <strong>Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}</strong>
                </div>

                <div class="info-col">
                    <span>Status</span>
                    <strong>
                        {{ $pemesanan->status_tiket == 'digunakan' ? 'DIGUNAKAN' : 'AKTIF' }}
                    </strong>
                </div>
            </div>
        </div>

        <div class="ticket-breakdown">
            <h4>Detail Tiket</h4>

            @if(($pemesanan->jumlah_dewasa ?? 0) > 0)
                <p>{{ $pemesanan->jumlah_dewasa }} Tiket Dewasa</p>
            @endif

            @if(($pemesanan->jumlah_anak ?? 0) > 0)
                <p>{{ $pemesanan->jumlah_anak }} Tiket Anak</p>
            @endif

            @if(($pemesanan->jumlah_dewasa ?? 0) == 0 && ($pemesanan->jumlah_anak ?? 0) == 0)
                <p>{{ $pemesanan->jumlah_orang }} Tiket Masuk Pantai Pelawan</p>
            @endif

            <p class="total">Total: {{ $pemesanan->jumlah_orang }} Tiket</p>
        </div>

        <div class="ticket-warning">
            Jangan scan tiket ini sendiri. QR hanya berlaku 1x dan hanya discan oleh petugas di lokasi.
        </div>

    </div>

</div>

</body>
</html>