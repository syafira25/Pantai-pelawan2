@extends('layouts.app')

@section('content')

<section class="page-hero page-hero-fasilitas">
    <div class="page-hero-overlay">
        <div class="container">
            <div class="page-hero-content">
                <h1>{{ $page->hero_judul ?? 'Fasilitas Pantai Pelawan' }}</h1>
                <p>
                    {{ $page->hero_deskripsi ?? 'Berbagai fasilitas tersedia untuk memberikan kenyamanan, keamanan, dan pengalaman wisata yang menyenangkan bagi pengunjung.' }}
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">{{ $page->utama_label ?? 'Fasilitas Utama' }}</span>
            <h2>{{ $page->utama_judul ?? 'Fasilitas yang Tersedia' }}</h2>
            <p>{{ $page->utama_deskripsi ?? 'Pantai Pelawan menyediakan fasilitas penunjang agar wisatawan dapat berkunjung dengan lebih nyaman.' }}</p>
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

<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">{{ $page->pendukung_label ?? 'Fasilitas Pendukung' }}</span>
            <h2>{{ $page->pendukung_judul ?? 'Penunjang Pengalaman Wisata' }}</h2>
            <p>{{ $page->pendukung_deskripsi ?? 'Fasilitas berikut membantu wisatawan menikmati kunjungan dengan lebih mudah dan nyaman.' }}</p>
        </div>

        <div class="facility-support-grid">
            @forelse($pendukung as $item)
                <div class="facility-support-card">
                    <span>{{ $item->icon }}</span>
                    <div>
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
                <h2>{{ $page->cta_judul ?? 'Nyaman & Lengkap' }}</h2>
                <p>{{ $page->cta_deskripsi ?? 'Dengan fasilitas yang tersedia, Pantai Pelawan siap memberikan pengalaman wisata yang lebih nyaman bagi setiap pengunjung.' }}</p>
            </div>

            <a href="{{ route('tiket') }}" class="btn btn-primary">
                {{ $page->cta_tombol ?? 'Pesan Tiket' }}
            </a>
        </div>
    </div>
</section>

@endsection