@extends('layouts.app')

@section('content')

<section class="section section-soft">
    <div class="container">

        <div class="ticket-modern-wrapper">

            <!-- TIKET -->
            <div class="ticket-modern">

                <!-- KIRI (QR) -->
                <div class="ticket-left">

                    @if($pemesanan->qr_code)
                        <img         
                        src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ urlencode('http://192.168.1.30:8000/tiket/scan/'.$pemesanan->qr_code) }}"
                            alt="QR Code Tiket"
                        >
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
                        <small class="qr-used-time">
                            Pada {{ \Carbon\Carbon::parse($pemesanan->qr_used_at)->format('d M Y, H:i') }} WIB
                        </small>
                    @else
                        <span class="qr-active">BELUM DIGUNAKAN</span>
                    @endif

                    @if($pemesanan->status_tiket == 'digunakan')
                        <strong class="status-used">DIGUNAKAN</strong>
                    @else
                        <strong class="status-aktif">AKTIF</strong>
                    @endif
                </div>

                <!-- GARIS TIKET -->
                <div class="ticket-divider"></div>

                <!-- KANAN (DETAIL) -->
                <div class="ticket-right">

                    <div class="ticket-header">
                        <h2>E-Ticket Pantai Pelawan</h2>
                        <span class="kode">{{ $pemesanan->kode_booking }}</span>
                    </div>

                    <div class="ticket-info-grid">

                        <div>
                            <span>Nama</span>
                            <strong>{{ $pemesanan->nama }}</strong>
                        </div>

                        <div>
                            <span>Email</span>
                            <strong>{{ $pemesanan->email }}</strong>
                        </div>

                        <div>
                            <span>Tanggal</span>
                            <strong>{{ \Carbon\Carbon::parse($pemesanan->tanggal_kunjungan)->format('d M Y') }}</strong>
                        </div>

                        <div>
                            <span>Total Orang</span>
                            <strong>{{ $pemesanan->jumlah_orang }} Orang</strong>
                        </div>

                        <div>
                            <span>Total Bayar</span>
                            <strong>Rp {{ number_format($pemesanan->total_harga,0,',','.') }}</strong>
                        </div>

                        <div>
                            <span>Status</span>
                            <strong class="status-aktif">AKTIF</strong>
                        </div>

                    </div>

                                    <div class="ticket-breakdown">
                        <h4>Detail Tiket</h4>

                        @if(($pemesanan->jumlah_dewasa ?? 0) > 0)
                            <p>🎫 {{ $pemesanan->jumlah_dewasa }} Tiket Dewasa</p>
                        @endif

                        @if(($pemesanan->jumlah_anak ?? 0) > 0)
                            <p>🧒 {{ $pemesanan->jumlah_anak }} Tiket Anak</p>
                        @endif

                        @if(($pemesanan->jumlah_dewasa ?? 0) == 0 && ($pemesanan->jumlah_anak ?? 0) == 0)
                            <p>🎫 {{ $pemesanan->jumlah_orang }} Tiket Masuk Pantai Pelawan</p>
                        @endif

                        <p class="total">
                            Total: {{ $pemesanan->jumlah_orang }} Tiket
                        </p>
                    </div>

                    <!-- WARNING -->
                    <div class="ticket-warning">
                        ⚠️ Jangan scan tiket ini sendiri.  
                        QR hanya berlaku 1x dan hanya discan oleh petugas di lokasi.
                    </div>

                    <!-- BUTTON -->
                    <div class="ticket-actions">
                        <a href="{{ route('tiket.download.nota', $pemesanan->id) }}" class="btn-download">
                            Download Nota
                        </a>

                        <a href="{{ route('tiket.download.tiket', $pemesanan->id) }}" class="btn-download">
                            Download Tiket
                        </a>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

@endsection