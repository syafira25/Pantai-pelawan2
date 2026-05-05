@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <h1>Akun Saya</h1>
        <p class="page-subtitle">
            Kelola informasi akun, lihat riwayat pemesanan, dan ubah password akun wisatawan.
        </p>
    </div>
</section>

<section class="section section-soft">
    <div class="container">

        <div class="akun-wrapper">

            <div class="akun-profile-card">
                <div class="akun-avatar">👤</div>

                <h2>{{ Auth::user()->name }}</h2>
                <p>{{ Auth::user()->email }}</p>

                <div class="akun-info-list">
                    <div>
                        <span>Nama Terdaftar</span>
                        <strong>{{ Auth::user()->name }}</strong>
                    </div>

                    <div>
                        <span>Email Akun</span>
                        <strong>{{ Auth::user()->email }}</strong>
                    </div>

                    <div>
                        <span>Status Akun</span>
                        <strong>Wisatawan</strong>
                    </div>
                </div>

                <div class="akun-actions">

                    <a href="{{ route('profile.saya') }}" class="akun-btn akun-btn-primary">
                        Lihat Profil Saya
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="akun-btn akun-btn-danger">
                            Keluar
                        </button>
                    </form>

                </div>
            </div>

            <div class="akun-history-card">
                <div class="akun-section-title">
                    <span>Riwayat</span>
                    <h2>Riwayat Pemesanan Tiket</h2>
                    <p>Berikut daftar tiket yang pernah kamu pesan melalui website Pantai Pelawan.</p>
                </div>

                @if($pemesanans->count() > 0)
                    <div class="riwayat-list">
                        @foreach($pemesanans as $pemesanan)
                            <div class="riwayat-item">
                                <div>
                                    <h3>{{ $pemesanan->kode_booking }}</h3>
                                    <p>
                                        Tanggal Kunjungan:
                                        {{ \Carbon\Carbon::parse($pemesanan->tanggal_kunjungan)->format('d M Y') }}
                                    </p>
                                    <p>Jumlah Tiket: {{ $pemesanan->jumlah_orang }} orang</p>
                                </div>

                                <div class="riwayat-right">
                                    <strong>Rp {{ number_format($pemesanan->total_harga, 0, ',', '.') }}</strong>

                                    <span class="status-akun status-{{ $pemesanan->status_pembayaran }}">
                                        {{ strtoupper($pemesanan->status_pembayaran) }}
                                    </span>

                                    @if($pemesanan->status_pembayaran === 'paid')
                                        <a href="{{ route('tiket.finish', $pemesanan->id) }}" class="lihat-ticket-btn">
                                            Lihat E-Ticket
                                        </a>
                                    @else
                                        <a href="{{ route('tiket.payment', $pemesanan->id) }}" class="lihat-ticket-btn">
                                            Lanjut Bayar
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-riwayat">
                        <div>🎫</div>
                        <h3>Belum Ada Pemesanan</h3>
                        <p>Kamu belum pernah melakukan pemesanan tiket Pantai Pelawan.</p>
                        <a href="{{ route('tiket') }}" class="btn btn-primary">
                            Pesan Tiket Sekarang
                        </a>
                    </div>
                @endif
            </div>

        </div>

    </div>
</section>

@endsection