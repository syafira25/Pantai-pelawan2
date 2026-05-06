@extends('layouts.app')

@section('content')

@php
    $heroJudul = $dayaTarik->hero_judul ?? 'Daya Tarik Pantai Pelawan';
    $heroSubjudul = $dayaTarik->hero_subjudul ?? 'Beragam keindahan alam, suasana pantai, dan aktivitas menarik yang dapat dinikmati wisatawan di Pantai Pelawan.';

    $gambarHighlight = $dayaTarik && $dayaTarik->highlight_gambar
        ? asset($dayaTarik->highlight_gambar)
        : asset('images/profil_pantai.jpg');
@endphp

<section class="page-hero page-hero-daya-tarik">
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

        <div class="daya-highlight daya-highlight-upgrade">
            <div class="daya-highlight-img">
                <img src="{{ $gambarHighlight }}" alt="Pantai Pelawan">

                <div class="daya-img-badge">
                    <strong>🌴 Pantai Pelawan</strong>
                    <span>Destinasi wisata alam Kabupaten Karimun</span>
                </div>
            </div>

            <div class="daya-highlight-text">
                <span class="section-label">
                    {{ $dayaTarik->highlight_label ?? 'Keunggulan Wisata' }}
                </span>

                <h2>{{ $dayaTarik->highlight_judul ?? 'Pesona Alam Pantai Pelawan' }}</h2>

                <p>
                    {{ $dayaTarik->highlight_deskripsi ?? 'Pantai Pelawan memiliki panorama alam yang indah dengan suasana pesisir yang nyaman.' }}
                </p>

                <div class="daya-stats">
                    @for($i = 1; $i <= 3; $i++)
                        <div>
                            <strong>{{ $dayaTarik->{'stat_'.$i.'_icon'} ?? '🌊' }}</strong>
                            <span>{{ $dayaTarik->{'stat_'.$i.'_text'} ?? 'Panorama Laut' }}</span>
                        </div>
                    @endfor
                </div>
            </div>
        </div>

    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">{{ $dayaTarik->nilai_label ?? 'Nilai Destinasi' }}</span>
            <h2>{{ $dayaTarik->nilai_judul ?? 'Nilai dan Potensi Pantai Pelawan' }}</h2>
            <p>{{ $dayaTarik->nilai_deskripsi ?? 'Pantai Pelawan memiliki nilai destinasi yang dapat mendukung pengembangan pariwisata daerah.' }}</p>
        </div>

        <div class="potensi-grid">
            @for($i = 1; $i <= 4; $i++)
                <div class="potensi-card">
                    <div>{{ $dayaTarik->{'potensi_'.$i.'_icon'} ?? '🌿' }}</div>
                    <h3>{{ $dayaTarik->{'potensi_'.$i.'_judul'} ?? 'Potensi Wisata Alam' }}</h3>
                    <p>{{ $dayaTarik->{'potensi_'.$i.'_deskripsi'} ?? 'Keindahan alam pantai menjadi potensi utama wisata daerah.' }}</p>
                </div>
            @endfor
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">{{ $dayaTarik->keunikan_label ?? 'Keunikan Pantai' }}</span>
            <h2>{{ $dayaTarik->keunikan_judul ?? 'Keunikan Pantai Pelawan' }}</h2>
            <p>{{ $dayaTarik->keunikan_deskripsi ?? 'Keunikan Pantai Pelawan terletak pada karakter pantai dan suasana alamnya.' }}</p>
        </div>

        <div class="unique-premium-wrapper">

            <div class="unique-big-card">
                <h3>{{ $dayaTarik->keunikan_big_judul ?? '🌊 Karakter Pantai yang Landai' }}</h3>
                <p>{{ $dayaTarik->keunikan_big_deskripsi ?? 'Pantai Pelawan memiliki karakter pantai yang nyaman untuk dinikmati oleh berbagai kalangan pengunjung.' }}</p>
            </div>

            <div class="unique-small-grid">
                @for($i = 1; $i <= 4; $i++)
                    <div class="unique-small-card">
                        <span>{{ $dayaTarik->{'keunikan_'.$i.'_icon'} ?? '🌤️' }}</span>
                        <h3>{{ $dayaTarik->{'keunikan_'.$i.'_judul'} ?? 'Suasana Tenang' }}</h3>
                        <p>{{ $dayaTarik->{'keunikan_'.$i.'_deskripsi'} ?? 'Lingkungan pantai memberikan kesan santai bagi wisatawan.' }}</p>
                    </div>
                @endfor
            </div>

        </div>

    </div>
</section>

<section class="section">
    <div class="container">
        <div class="daya-cta">
            <div>
                <span>{{ $dayaTarik->cta_label ?? '🌴 Ayo Berkunjung' }}</span>
                <h2>{{ $dayaTarik->cta_judul ?? 'Yuk Kunjungi Pantai Pelawan!' }}</h2>
                <p>{{ $dayaTarik->cta_deskripsi ?? 'Nikmati keindahan alam, aktivitas menarik, dan suasana pantai yang menenangkan.' }}</p>
            </div>

            <a href="{{ route('kontak') }}" class="btn btn-primary">
                {{ $dayaTarik->cta_tombol_text ?? 'Hubungi Kami' }}
            </a>
        </div>
    </div>
</section>

@endsection