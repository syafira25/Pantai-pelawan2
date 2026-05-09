@extends('layouts.app')

@section('content')

<section class="page-hero page-hero-galeri">
    <div class="page-hero-overlay">
        <div class="container">
            <div class="page-hero-content">
                <h1>Galeri Pantai Pelawan</h1>
                <p>
                    Dokumentasi keindahan Pantai Pelawan dari berbagai sudut, suasana, dan momen wisata.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">Dokumentasi Wisata</span>
            <h2>Foto Wisata Pantai Pelawan</h2>
            <p>
                Beberapa dokumentasi pemandangan dan suasana wisata Pantai Pelawan.
            </p>
        </div>

        <div class="galeri-masonry">

            @forelse($galeris as $galeri)
                <div class="galeri-card
                    {{ $galeri->tipe_card == 'large' ? 'galeri-large' : '' }}
                    {{ $galeri->tipe_card == 'wide' ? 'galeri-wide' : '' }}
                ">

                    <img src="{{ str_starts_with($galeri->gambar, 'images/') ? asset($galeri->gambar) : asset('storage/' . $galeri->gambar) }}"
                         alt="{{ $galeri->judul }}">

                    <div class="galeri-overlay">
                        <h3>{{ $galeri->judul }}</h3>
                        <p>{{ $galeri->deskripsi }}</p>
                    </div>

                </div>
            @empty
                <p class="text-center">Belum ada foto galeri.</p>
            @endforelse

        </div>

    </div>
</section>

<section class="section">
    <div class="container">
        <div class="galeri-cta">
            <div>
                <span>📸 Dokumentasi Wisata</span>
                <h2>Keindahan yang Tak Terlupakan</h2>
                <p>
                    Pantai Pelawan menawarkan pemandangan alam yang memukau dan cocok untuk
                    diabadikan dalam berbagai momen wisata.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection