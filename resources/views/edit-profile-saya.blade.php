@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <h1>Edit Profil</h1>
        <p class="page-subtitle">Ubah nama dan email akun wisatawan.</p>
    </div>
</section>

<section class="section section-soft">
    <div class="container">

        <div class="akun-profile-card" style="max-width:650px; margin:0 auto;">

            @if (session('status') === 'profile-updated')
                <div class="alert-success">Profil berhasil diperbarui.</div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                    @error('name')
                        <small class="error-text">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                    @error('email')
                        <small class="error-text">{{ $message }}</small>
                    @enderror
                </div>

                <div class="akun-actions">
                    <button type="submit" class="akun-btn akun-btn-primary">
                        Simpan Perubahan
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