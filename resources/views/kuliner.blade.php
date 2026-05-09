@extends('layouts.app')

@section('content')

@php
    $heroJudul = $kulinerPage->hero_judul ?? 'Wisata Kuliner Pantai Pelawan';
    $heroSubjudul = $kulinerPage->hero_subjudul ?? 'Temukan pilihan warung makan di sekitar Pantai Pelawan, lengkap dengan informasi menu, harga, foto makanan, dan lokasi warung.';

    $sectionLabel = $kulinerPage->section_label ?? 'Kuliner Sekitar Pantai';
    $sectionJudul = $kulinerPage->section_judul ?? 'Rekomendasi Warung Kuliner';
    $sectionDeskripsi = $kulinerPage->section_deskripsi ?? 'Pilih warung yang ingin kamu lihat untuk mengetahui daftar menu, harga, foto makanan, dan alamat warung di sekitar Pantai Pelawan.';
@endphp

<section class="page-hero page-hero-kuliner">
    <div class="page-hero-overlay">
        <div class="container">
            <div class="page-hero-content">
                <h1>{{ $heroJudul }}</h1>
                <p>{{ $heroSubjudul }}</p>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">{{ $sectionLabel }}</span>
            <h2>{{ $sectionJudul }}</h2>
            <p>{{ $sectionDeskripsi }}</p>
        </div>

        <div class="warung-grid">
            @forelse($warungs as $warung)

                @php
                    $gambarUtama = $warung->gambar ?? 'images/hero-pantai.jpg';
                    $gambarProfil = $warung->gambar_2 ?? 'images/profil_pantai.jpg';
                    $gambarFallback = $warung->gambar_3 ?? 'images/hero-pantai.jpg';
                @endphp

                <a href="{{ route('kuliner.detail', $warung->slug) }}" class="warung-card">

                    <div class="warung-img-box">
                        <img
                            class="warung-main-img"
                            src="{{ str_starts_with($gambarUtama, 'images/') ? asset($gambarUtama) : asset('storage/' . $gambarUtama) }}"
                            alt="{{ $warung->nama }}"
                            onerror="this.src='{{ asset('images/hero-pantai.jpg') }}'"
                        >

                        <div class="warung-img-overlay"></div>

                        <span class="warung-badge">
                            {{ $warung->badge ?? 'Kuliner Pantai' }}
                        </span>

                        <div class="warung-mini-gallery">
                            <img src="{{ str_starts_with($gambarUtama, 'images/') ? asset($gambarUtama) : asset('storage/' . $gambarUtama) }}"
                                 onerror="this.src='{{ asset('images/hero-pantai.jpg') }}'">

                            <img src="{{ str_starts_with($gambarProfil, 'images/') ? asset($gambarProfil) : asset('storage/' . $gambarProfil) }}"
                                 onerror="this.src='{{ asset('images/hero-pantai.jpg') }}'">

                            <img src="{{ str_starts_with($gambarFallback, 'images/') ? asset($gambarFallback) : asset('storage/' . $gambarFallback) }}"
                                 onerror="this.src='{{ asset('images/hero-pantai.jpg') }}'">
                        </div>
                    </div>

                    <div class="warung-card-body">
                        <span class="warung-category">
                            {{ $warung->kategori ?? 'Warung sekitar Pantai Pelawan' }}
                        </span>

                        <h3>{{ $warung->nama }}</h3>

                        <p>{{ $warung->deskripsi }}</p>

                        <div class="warung-address">
                            <strong>📍 Alamat Warung</strong>
                            <span>
                                {{ $warung->alamat ?? 'Area kuliner sekitar Pantai Pelawan, Desa Pangke Barat, Kabupaten Karimun' }}
                            </span>
                        </div>

                        <span class="lihat-menu">Lihat Menu →</span>
                    </div>

                </a>

            @empty
                <div class="empty-kuliner-box">
                    <h3>Belum Ada Data Kuliner</h3>
                    <p>Data warung kuliner belum tersedia.</p>
                </div>
            @endforelse
        </div>

    </div>
</section>

@endsection