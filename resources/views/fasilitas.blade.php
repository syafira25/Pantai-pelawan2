@extends('layouts.app')

@section('content')

@php
    $utama = $utama ?? collect();
    $pendukung = $pendukung ?? collect();
@endphp

<section class="page-hero page-hero-fasilitas">
    <div class="page-hero-overlay">
        <div class="container">
            <div class="page-hero-content">
                <h1>{{ $page->hero_judul ?? 'Fasilitas Pantai Pelawan' }}</h1>
                <p>
                    {{ $page->hero_deskripsi ?? 'Berbagai fasilitas tersedia untuk menunjang kenyamanan pengunjung selama berwisata di Pantai Pelawan.' }}
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">{{ $page->utama_label ?? 'Fasilitas' }}</span>
            <h2>{{ $page->utama_judul ?? 'Fasilitas yang Tersedia' }}</h2>
            <p>{{ $page->utama_deskripsi ?? 'Pantai Pelawan menyediakan berbagai fasilitas untuk menunjang kenyamanan pengunjung selama berwisata.' }}</p>
        </div>

        <div class="facility-premium-grid">

            @forelse($utama as $item)
                <div class="facility-premium-card">
                    <div class="facility-icon">{{ $item->icon }}</div>
                    <h3>{{ $item->judul }}</h3>
                    <p>{{ $item->deskripsi }}</p>
                </div>
            @empty
                <p class="text-center">Belum ada fasilitas utama.</p>
            @endforelse

        </div>

    </div>
</section>

<section class="section section-soft wisata-activity-section">
    <div class="container">

        <div class="section-heading activity-heading">
            <span class="section-label">{{ $page->pendukung_label ?? 'Wahana Wisata' }}</span>
            <h2>{{ $page->pendukung_judul ?? 'Aktivitas Wisata Pantai' }}</h2>
            <p>
                {{ $page->pendukung_deskripsi ?? 'Nikmati berbagai wahana dan spot menarik yang dapat menambah pengalaman wisata di Pantai Pelawan.' }}
            </p>
        </div>

        <div class="activity-grid">

            @forelse($pendukung as $item)
                <div class="activity-card">
                    <div class="activity-icon">{{ $item->icon }}</div>

                    <div class="activity-content">
                        <h3>{{ $item->judul }}</h3>
                        <p>{{ $item->deskripsi }}</p>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada fasilitas pendukung.</p>
            @endforelse

        </div>

    </div>
</section>

<section class="section">
    <div class="container">
        <div class="facility-cta">
            <div>
                <span>{{ $page->cta_label ?? '🌴 Kenyamanan Pengunjung' }}</span>
                <h2>{{ $page->cta_judul ?? 'Fasilitas untuk Kenyamanan Wisata' }}</h2>
                <p>{{ $page->cta_deskripsi ?? 'Dengan berbagai fasilitas yang tersedia, Pantai Pelawan berupaya memberikan pengalaman wisata yang lebih nyaman bagi setiap pengunjung.' }}</p>
            </div>

            <a href="{{ route('tiket') }}" class="btn btn-primary">
                {{ $page->cta_tombol ?? 'Pesan Tiket' }}
            </a>
        </div>
    </div>
</section>

@endsection