@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <h1>Ganti Password</h1>
        <p class="page-subtitle">Ubah password akun wisatawan agar tetap aman.</p>
    </div>
</section>

<section class="section section-soft">
    <div class="container">

        <div class="akun-profile-card" style="max-width:650px; margin:0 auto;">

            @if (session('status') === 'password-updated')
                <div class="alert-success">Password berhasil diperbarui.</div>
            @endif

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Password Lama</label>
                    <input type="password" name="current_password" required>
                    @error('current_password', 'updatePassword')
                        <small class="error-text">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="password" required>
                    @error('password', 'updatePassword')
                        <small class="error-text">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password Baru</label>
                    <input type="password" name="password_confirmation" required>
                </div>

                <div class="akun-actions">
                    <button type="submit" class="akun-btn akun-btn-primary">
                        Simpan Password Baru
                    </button>

                    <a href="{{ route('profile.saya') }}" class="akun-btn akun-btn-secondary">
                        Kembali ke Profil
                    </a>
                </div>
            </form>

        </div>

    </div>
</section>

@endsection