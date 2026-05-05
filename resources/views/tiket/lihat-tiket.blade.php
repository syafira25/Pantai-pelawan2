@extends('layouts.app')

@section('content')

<section class="section section-soft">
    <div class="container">

        <div class="ticket-view-wrapper">

            <div class="ticket-view-card">

                <div class="ticket-view-header">
                    <div>
                        <span>E-Ticket</span>
                        <h2>Pantai Pelawan</h2>
                    </div>

                    <strong>{{ $pemesanan->kode_booking }}</strong>
                </div>

                <div class="ticket-view-body">

                    <div class="ticket-detail">
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
                            <span>Status</span>
                            <strong class="ticket-status-active">AKTIF</strong>
                        </div>
                    </div>

                    <div class="ticket-qr-box">
                        {!! QrCode::size(180)->generate(route('tiket.scan', $pemesanan->qr_code)) !!}
                        <p>Scan QR untuk validasi tiket</p>

                        @if($pemesanan->qr_used_at)
                            <span class="qr-used">SUDAH DIGUNAKAN</span>
                        @else
                            <span class="qr-active">BELUM DIGUNAKAN</span>
                        @endif
                    </div>

                </div>

                <div class="ticket-view-footer">
                    <p>
                        QR Code hanya dapat digunakan satu kali saat validasi masuk kawasan Pantai Pelawan.
                    </p>
                </div>

            </div>

        </div>

    </div>
</section>

@endsection