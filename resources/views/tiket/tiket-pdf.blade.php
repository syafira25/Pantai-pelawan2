<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>E-Ticket Pantai Pelawan</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            background: #f3f7f4;
            padding: 30px;
        }

        .ticket {
            width: 100%;
            border-radius: 20px;
            overflow: hidden;
            background: #ffffff;
            border: 2px dashed #14532d;
        }

        .header {
            background: #14532d;
            color: white;
            padding: 25px;
        }

        .header h1 {
            margin: 0;
            font-size: 32px;
        }

        .body {
            padding: 25px;
        }

        .row {
            display: table;
            width: 100%;
            margin-bottom: 16px;
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
            font-size: 16px;
            font-weight: bold;
            color: #14532d;
        }

        .warning {
            margin-top: 25px;
            background: #fff7cc;
            padding: 15px;
            border-radius: 10px;
            font-size: 13px;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #555;
        }
    </style>
</head>

<body>

<div class="ticket">
    <div class="header">
        <h1>E-Ticket Pantai Pelawan</h1>
        <p>Kode Booking: {{ $pemesanan->kode_booking }}</p>
    </div>

    <div class="body">

        <div class="row">
            <div class="col">
                <div class="label">Nama</div>
                <div class="value">{{ $pemesanan->nama }}</div>
            </div>

            <div class="col">
                <div class="label">Email</div>
                <div class="value">{{ $pemesanan->email }}</div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="label">Tanggal Kunjungan</div>
                <div class="value">{{ \Carbon\Carbon::parse($pemesanan->tanggal_kunjungan)->format('d M Y') }}</div>
            </div>

            <div class="col">
                <div class="label">Total Tiket</div>
                <div class="value">{{ $pemesanan->jumlah_orang }} Tiket</div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="label">Detail Tiket</div>
                <div class="value">
                    @if(($pemesanan->jumlah_dewasa ?? 0) > 0)
                        {{ $pemesanan->jumlah_dewasa }} Dewasa
                    @endif

                    @if(($pemesanan->jumlah_anak ?? 0) > 0)
                        , {{ $pemesanan->jumlah_anak }} Anak
                    @endif

                    @if(($pemesanan->jumlah_dewasa ?? 0) == 0 && ($pemesanan->jumlah_anak ?? 0) == 0)
                        {{ $pemesanan->jumlah_orang }} Tiket Masuk
                    @endif
                </div>
            </div>

            <div class="col">
                <div class="label">Status Tiket</div>
                <div class="value">{{ strtoupper($pemesanan->status_tiket) }}</div>
            </div>
        </div>

        <div class="warning">
            QR Code tiket hanya berlaku satu kali dan hanya boleh discan oleh petugas di lokasi.
            Jangan melakukan scan sendiri sebelum tiba di Pantai Pelawan.
        </div>

        <div class="footer">
            Tiket ini diterbitkan otomatis oleh Sistem Informasi Pariwisata Pantai Pelawan.
        </div>

    </div>
</div>

</body>
</html>