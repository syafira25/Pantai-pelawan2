@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <h1>Akses Wisatawan</h1>
        <p class="page-subtitle">
            Silakan login atau daftar terlebih dahulu untuk menggunakan layanan digital.
        </p>
    </div>
</section>

<section class="section section-soft">
    <div class="container">

        <div class="auth-guest-card">
            <div class="auth-guest-icon">🔐</div>

            <div class="auth-guest-content">
                <span class="auth-badge">Khusus Wisatawan</span>
                <h2>Login Diperlukan</h2>
                <p>
                    Untuk melakukan pemesanan tiket dan memberikan ulasan, wisatawan perlu login
                    atau membuat akun terlebih dahulu. Pengunjung yang belum login tetap dapat
                    mengakses informasi wisata, galeri, fasilitas, kuliner, dan lokasi Pantai Pelawan.
                </p>

                <div class="auth-guest-buttons">
                    <a href="{{ route('login') }}" class="btn btn-primary">Login Sekarang</a>

                    @if(Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-secondary auth-register-btn">
                            Daftar Akun
                        </a>
                    @endif
                </div>
            </div>
        </div>

    </div>
</section>

@endsection