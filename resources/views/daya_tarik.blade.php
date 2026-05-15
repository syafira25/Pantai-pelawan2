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

<section class="section daya-experience-photo-section">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">{{ $dayaTarik->pengalaman_label ?? 'Pengalaman Wisata' }}</span>
            <h2>{{ $dayaTarik->pengalaman_judul ?? 'Aktivitas Menarik di Pantai Pelawan' }}</h2>
            <p>{{ $dayaTarik->pengalaman_deskripsi ?? 'Nikmati berbagai aktivitas seru yang bisa dilakukan bersama keluarga, pasangan, maupun teman.' }}</p>
        </div>

        <div class="experience-mosaic-grid">

            <div class="experience-mosaic-big">
                <img src="{{ asset('images/hero-pantai.jpg') }}" alt="Banana Boat">

                <div class="experience-overlay">
                    <span>🚤 Aktivitas Favorit</span>
                    <h3>Naik Banana Boat</h3>
                    <p>Rasakan keseruan bermain wahana air bersama teman dan keluarga.</p>
                </div>
            </div>

            <div class="experience-mosaic-small">
                <img src="{{ asset('images/profil_pantai.jpg') }}" alt="Sampan">

                <div class="experience-overlay">
                    <span>🛶 Santai di Laut</span>
                    <h3>Naik Sampan</h3>
                    <p>Menikmati suasana pantai dari area perairan yang tenang.</p>
                </div>
            </div>

            <div class="experience-mosaic-small">
                <img src="{{ asset('images/hero-pantai.jpg') }}" alt="Spot Foto">

                <div class="experience-overlay">
                    <span>📸 Dokumentasi</span>
                    <h3>Spot Foto</h3>
                    <p>Abadikan momen dengan latar pantai dan pemandangan alam.</p>
                </div>
            </div>

            <div class="experience-mosaic-wide">
                <img src="{{ asset('images/profil_pantai.jpg') }}" alt="Piknik">

                <div class="experience-overlay">
                    <span>🔥 Bersama Keluarga</span>
                    <h3>Bakar-bakar & Piknik</h3>
                    <p>Menikmati waktu santai sambil makan bersama di sekitar kawasan pantai.</p>
                </div>
            </div>

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