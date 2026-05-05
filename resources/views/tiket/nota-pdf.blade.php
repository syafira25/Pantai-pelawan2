<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Nota Transaksi</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #222;
            font-size: 13px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #14532d;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .header h1 {
            margin: 0;
            color: #14532d;
        }

        .box {
            border: 1px solid #ddd;
            padding: 18px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .row {
            display: table;
            width: 100%;
            margin-bottom: 10px;
        }

        .col {
            display: table-cell;
            width: 50%;
        }

        .label {
            color: #666;
            font-size: 12px;
        }

        .value {
            font-weight: bold;
            margin-top: 4px;
        }

        .total {
            background: #14532d;
            color: white;
            padding: 16px;
            border-radius: 10px;
            font-size: 20px;
            font-weight: bold;
            text-align: right;
        }

        .footer {
            margin-top: 35px;
            font-size: 12px;
            color: #555;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Nota Transaksi / Faktur</h1>
    <p>Pemesanan Tiket Pantai Pelawan</p>
</div>

<div class="box">
    <div class="row">
        <div class="col">
            <div class="label">No. Pesanan</div>
            <div class="value">{{ $pemesanan->kode_booking }}</div>
        </div>

        <div class="col">
            <div class="label">Tanggal Transaksi</div>
            <div class="value">{{ $pemesanan->updated_at->format('d/m/Y') }}</div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="label">Nama Pemesan</div>
            <div class="value">{{ $pemesanan->nama }}</div>
        </div>

        <div class="col">
            <div class="label">Email</div>
            <div class="value">{{ $pemesanan->email }}</div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="label">Metode Pembayaran</div>
            <div class="value">{{ $pemesanan->metode_pembayaran ?? 'QRIS / Transfer Manual' }}</div>
        </div>

        <div class="col">
            <div class="label">Status Pembayaran</div>
            <div class="value">{{ strtoupper($pemesanan->status_pembayaran) }}</div>
        </div>
    </div>
</div>

<div class="box">
    <h3>Rincian Pesanan</h3>

    <div class="row">
        <div class="col">
            <div class="label">Tiket Pantai Pelawan</div>
            <div class="value">{{ $pemesanan->jumlah_orang }} Orang</div>
        </div>

        <div class="col">
            <div class="label">Tanggal Kunjungan</div>
            <div class="value">{{ \Carbon\Carbon::parse($pemesanan->tanggal_kunjungan)->format('d M Y') }}</div>
        </div>
    </div>
</div>

<div class="total">
    Total Pembayaran: Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}
</div>

<div class="footer">
    Nota ini dihasilkan secara otomatis oleh Sistem Informasi Pariwisata Pantai Pelawan.
</div>

</body>
</html>