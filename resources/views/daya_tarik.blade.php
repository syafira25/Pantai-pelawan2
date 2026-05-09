@extends('layouts.app')

@section('content')

@php
    $gambarHighlight = $dayaTarik && $dayaTarik->highlight_gambar
        ? (str_starts_with($dayaTarik->highlight_gambar, 'images/')
            ? asset($dayaTarik->highlight_gambar)
            : asset('storage/' . $dayaTarik->highlight_gambar))
        : asset('images/profil_pantai.jpg');
@endphp

<section class="page-hero page-hero-daya-tarik">
    <div class="page-hero-overlay">
        <div class="container">
            <div class="page-hero-content">
                <h1>{{ $dayaTarik->hero_judul ?? 'Daya Tarik Pantai Pelawan' }}</h1>
                <p>{{ $dayaTarik->hero_subjudul ?? 'Beragam keindahan alam, suasana pantai, dan aktivitas menarik yang dapat dinikmati wisatawan di Pantai Pelawan.' }}</p>
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
                    <strong>{{ $dayaTarik->highlight_badge_judul ?? '🌴 Pantai Pelawan' }}</strong>
                    <span>{{ $dayaTarik->highlight_badge_subjudul ?? 'Destinasi wisata alam Kabupaten Karimun' }}</span>
                </div>
            </div>

            <div class="daya-highlight-text">
                <span class="section-label">{{ $dayaTarik->highlight_label ?? 'Keunggulan Wisata' }}</span>
                <h2>{{ $dayaTarik->highlight_judul ?? 'Pesona Alam Pantai Pelawan' }}</h2>
                <p>{{ $dayaTarik->highlight_deskripsi ?? 'Pantai Pelawan menghadirkan panorama pesisir yang memikat dengan hamparan pasir yang nyaman, angin laut yang sejuk, serta suasana alami yang cocok untuk melepas penat.' }}</p>

                <div class="daya-stats">
                    @for($i = 1; $i <= 3; $i++)
                        @php
                            $icon = 'stat_'.$i.'_icon';
                            $text = 'stat_'.$i.'_text';
                            $desc = 'stat_'.$i.'_deskripsi';
                        @endphp

                        <div>
                            <strong>{{ $dayaTarik->$icon }}</strong>
                            <span>{{ $dayaTarik->$text }}</span>
                            <small>{{ $dayaTarik->$desc }}</small>
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
            <p>{{ $dayaTarik->nilai_deskripsi ?? '' }}</p>
        </div>

        <div class="potensi-grid">
            @for($i = 1; $i <= 4; $i++)
                @php
                    $icon = 'potensi_'.$i.'_icon';
                    $judul = 'potensi_'.$i.'_judul';
                    $desc = 'potensi_'.$i.'_deskripsi';
                @endphp

                <div class="potensi-card">
                    <div>{{ $dayaTarik->$icon }}</div>
                    <h3>{{ $dayaTarik->$judul }}</h3>
                    <p>{{ $dayaTarik->$desc }}</p>
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
            <p>{{ $dayaTarik->keunikan_deskripsi ?? '' }}</p>
        </div>

        <div class="unique-premium-wrapper">
            <div class="unique-big-card">
                <h3>{{ $dayaTarik->keunikan_big_judul ?? '🌊 Karakter Pantai yang Landai' }}</h3>
                <p>{{ $dayaTarik->keunikan_big_deskripsi ?? '' }}</p>
            </div>

            <div class="unique-small-grid">
                @for($i = 1; $i <= 4; $i++)
                    @php
                        $icon = 'keunikan_'.$i.'_icon';
                        $judul = 'keunikan_'.$i.'_judul';
                        $desc = 'keunikan_'.$i.'_deskripsi';
                    @endphp

                    <div class="unique-small-card">
                        <span>{{ $dayaTarik->$icon }}</span>
                        <h3>{{ $dayaTarik->$judul }}</h3>
                        <p>{{ $dayaTarik->$desc }}</p>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</section>

<section class="section daya-experience-section">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">{{ $dayaTarik->pengalaman_label ?? 'Pengalaman Wisata' }}</span>
            <h2>{{ $dayaTarik->pengalaman_judul ?? 'Aktivitas Menarik di Pantai Pelawan' }}</h2>
            <p>{{ $dayaTarik->pengalaman_deskripsi ?? '' }}</p>
        </div>

        <div class="daya-experience-grid">
            @for($i = 1; $i <= 4; $i++)
                @php
                    $icon = 'pengalaman_'.$i.'_icon';
                    $judul = 'pengalaman_'.$i.'_judul';
                    $desc = 'pengalaman_'.$i.'_deskripsi';
                @endphp

                <div class="daya-experience-card">
                    <div class="daya-experience-icon">{{ $dayaTarik->$icon }}</div>
                    <h3>{{ $dayaTarik->$judul }}</h3>
                    <p>{{ $dayaTarik->$desc }}</p>
                </div>
            @endfor
        </div>
    </div>
</section>

<section class="section section-soft daya-nature-section">
    <div class="container">
        <div class="daya-nature-layout">
            <div class="daya-nature-content">
                <span class="section-label">{{ $dayaTarik->alam_label ?? 'Karakter Alam' }}</span>
                <h2>{{ $dayaTarik->alam_judul ?? 'Daya Tarik Alam yang Menjadi Ciri Khas' }}</h2>
                <p>{{ $dayaTarik->alam_deskripsi ?? '' }}</p>

                <div class="daya-nature-list">
                    @for($i = 1; $i <= 3; $i++)
                        @php
                            $judul = 'alam_'.$i.'_judul';
                            $desc = 'alam_'.$i.'_deskripsi';
                        @endphp

                        <div>
                            <strong>{{ $dayaTarik->$judul }}</strong>
                            <span>{{ $dayaTarik->$desc }}</span>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="daya-nature-visual">
                <div class="nature-glass-card">
                    <span>{{ $dayaTarik->alam_card_label ?? 'Destinasi Alam' }}</span>
                    <h3>{{ $dayaTarik->alam_card_judul ?? 'Pantai yang Cocok untuk Relaksasi' }}</h3>
                    <p>{{ $dayaTarik->alam_card_deskripsi ?? '' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section daya-reason-section">
    <div class="container">
        <div class="section-heading">
            <span class="section-label">{{ $dayaTarik->alasan_label ?? 'Alasan Berkunjung' }}</span>
            <h2>{{ $dayaTarik->alasan_judul ?? 'Mengapa Pantai Pelawan Menarik Dikunjungi?' }}</h2>
            <p>{{ $dayaTarik->alasan_deskripsi ?? '' }}</p>
        </div>

        <div class="daya-reason-grid">
            @for($i = 1; $i <= 3; $i++)
                @php
                    $nomor = 'alasan_'.$i.'_nomor';
                    $judul = 'alasan_'.$i.'_judul';
                    $desc = 'alasan_'.$i.'_deskripsi';
                @endphp

                <div class="daya-reason-card">
                    <span>{{ $dayaTarik->$nomor }}</span>
                    <h3>{{ $dayaTarik->$judul }}</h3>
                    <p>{{ $dayaTarik->$desc }}</p>
                </div>
            @endfor
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="daya-cta">
            <div>
                <span>{{ $dayaTarik->cta_label ?? '🌴 Ayo Berkunjung' }}</span>
                <h2>{{ $dayaTarik->cta_judul ?? 'Yuk Kunjungi Pantai Pelawan!' }}</h2>
                <p>{{ $dayaTarik->cta_deskripsi ?? '' }}</p>
            </div>

            <a href="{{ route('kontak') }}" class="btn btn-primary">
                {{ $dayaTarik->cta_tombol_text ?? 'Hubungi Kami' }}
            </a>
        </div>
    </div>
</section>

@endsection