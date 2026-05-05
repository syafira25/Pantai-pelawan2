@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <h1>Profil Saya</h1>
        <p class="page-subtitle">
            Informasi akun wisatawan yang terdaftar pada sistem Pantai Pelawan.
        </p>
    </div>
</section>

<section class="section section-soft">
    <div class="container">

        <div class="akun-profile-card" style="max-width:650px; margin:0 auto;">
            <div class="akun-avatar">👤</div>

            <h2>{{ Auth::user()->name }}</h2>
            <p>{{ Auth::user()->email }}</p>

            <div class="akun-info-list">
                <div>
                    <span>Nama Lengkap</span>
                    <strong>{{ Auth::user()->name }}</strong>
                </div>

                <div>
                    <span>Email Terdaftar</span>
                    <strong>{{ Auth::user()->email }}</strong>
                </div>

                <div>
                    <span>Status Akun</span>
                    <strong>Wisatawan</strong>
                </div>

                <div>
                    <span>Tanggal Bergabung</span>
                    <strong>{{ optional(Auth::user()->created_at)->format('d M Y') }}</strong>
                </div>
            </div>

            <div class="akun-actions">
                <a href="{{ route('profile.edit.saya') }}" class="akun-btn akun-btn-primary">
                    Edit Profil
                </a>

                <a href="{{ route('password.ganti') }}" class="akun-btn akun-btn-secondary">
                    Ganti Password
                </a>

                <a href="{{ route('akun.saya') }}" class="akun-btn akun-btn-secondary">
                    Lihat Riwayat Pemesanan
                </a>
            </div>
        </div>

    </div>
</section>

@endsection