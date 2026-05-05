@extends('layouts.app')

@section('content')

<section class="section section-soft">
    <div class="container">

        <div class="scan-result-card">

            @if($status === 'valid')@extends('layouts.app')

@section('content')

<section class="section section-soft">
    <div class="container">

        <div class="scan-result-card">

            @if($status === 'valid')
                <div class="scan-icon success">✅</div>
                <h1>Tiket Valid</h1>
                <p>Tiket berhasil divalidasi dan sekarang statusnya sudah digunakan.</p>
            @else
                <div class="scan-icon danger">❌</div>
                <h1>Tiket Sudah Digunakan</h1>
                <p>QR Code ini sudah pernah discan dan tidak dapat digunakan kembali.</p>
            @endif

            <div class="scan-info">
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
                    <strong>{{ $pemesanan->jumlah_orang }} Tiket</strong>
                </div>

                <div>
                    <span>Status Tiket</span>
                    <strong>
                        {{ $pemesanan->qr_used_at ? 'SUDAH DIGUNAKAN' : 'BELUM DIGUNAKAN' }}
                    </strong>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection
                <div class="scan-icon success">✅</div>
                <h1>Tiket Valid</h1>
                <p>QR Code berhasil dipindai. Tiket sekarang sudah digunakan.</p>
            @else
                <div class="scan-icon danger">❌</div>
                <h1>Tiket Sudah Digunakan</h1>
                <p>QR Code ini sudah pernah dipakai dan tidak dapat digunakan kembali.</p>
            @endif

            <div class="scan-info">
                <div>
                    <span>Kode Booking</span>
                    <strong>{{ $pemesanan->kode_booking }}</strong>
                </div>

                <div>
                    <span>Nama</span>
                    <strong>{{ $pemesanan->nama }}</strong>
                </div>

                <div>
                    <span>Tanggal Kunjungan</span>
                    <strong>{{ \Carbon\Carbon::parse($pemesanan->tanggal_kunjungan)->format('d M Y') }}</strong>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection