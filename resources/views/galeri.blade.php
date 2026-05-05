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

            <div class="galeri-card galeri-large">
                <img src="{{ asset('images/hero-pantai.jpg') }}" alt="Pantai Pelawan">
                <div class="galeri-overlay">
                    <h3>Panorama Pantai</h3>
                    <p>Keindahan suasana Pantai Pelawan.</p>
                </div>
            </div>

            <div class="galeri-card">
                <img src="{{ asset('images/profil_pantai.jpg') }}" alt="Pantai Pelawan">
                <div class="galeri-overlay">
                    <h3>Suasana Pesisir</h3>
                    <p>Nuansa alam yang nyaman.</p>
                </div>
            </div>

            <div class="galeri-card">
                <img src="{{ asset('images/hero-pantai.jpg') }}" alt="Pantai Pelawan">
                <div class="galeri-overlay">
                    <h3>Pemandangan Laut</h3>
                    <p>View pantai yang menarik.</p>
                </div>
            </div>

                        <div class="galeri-card">
                <img src="{{ asset('images/profil_pantai.jpg') }}" alt="Pantai Pelawan">
                <div class="galeri-overlay">
                    <h3>Suasana Pesisir</h3>
                    <p>Nuansa alam yang nyaman.</p>
                </div>
            </div>

            <div class="galeri-card">
                <img src="{{ asset('images/hero-pantai.jpg') }}" alt="Pantai Pelawan">
                <div class="galeri-overlay">
                    <h3>Pemandangan Laut</h3>
                    <p>View pantai yang menarik.</p>
                </div>
            </div>

            <div class="galeri-card galeri-wide">
                <img src="{{ asset('images/hero-pantai.jpg') }}" alt="Pantai Pelawan">
                <div class="galeri-overlay">
                    <h3>Suasana Sore</h3>
                    <p>Keindahan pantai saat sore hari.</p>
                </div>
            </div>

                       <div class="galeri-card">
                <img src="{{ asset('images/profil_pantai.jpg') }}" alt="Pantai Pelawan">
                <div class="galeri-overlay">
                    <h3>Suasana Pesisir</h3>
                    <p>Nuansa alam yang nyaman.</p>
                </div>
            </div>

            <div class="galeri-card">
                <img src="{{ asset('images/hero-pantai.jpg') }}" alt="Pantai Pelawan">
                <div class="galeri-overlay">
                    <h3>Pemandangan Laut</h3>
                    <p>View pantai yang menarik.</p>
                </div>
            </div>

            <div class="galeri-card galeri-large">
                <img src="{{ asset('images/hero-pantai.jpg') }}" alt="Pantai Pelawan">
                <div class="galeri-overlay">
                    <h3>Panorama Pantai</h3>
                    <p>Keindahan suasana Pantai Pelawan.</p>
                </div>
            </div>

            <div class="galeri-card">
                <img src="{{ asset('images/profil_pantai.jpg') }}" alt="Pantai Pelawan">
                <div class="galeri-overlay">
                    <h3>Suasana Pesisir</h3>
                    <p>Nuansa alam yang nyaman.</p>
                </div>
            </div>

            <div class="galeri-card">
                <img src="{{ asset('images/hero-pantai.jpg') }}" alt="Pantai Pelawan">
                <div class="galeri-overlay">
                    <h3>Pemandangan Laut</h3>
                    <p>View pantai yang menarik.</p>
                </div>
            </div>

            <div class="galeri-card">
                <img src="{{ asset('images/profil_pantai.jpg') }}" alt="Pantai Pelawan">
                <div class="galeri-overlay">
                    <h3>Suasana Pesisir</h3>
                    <p>Nuansa alam yang nyaman.</p>
                </div>
            </div>

            <div class="galeri-card">
                <img src="{{ asset('images/hero-pantai.jpg') }}" alt="Pantai Pelawan">
                <div class="galeri-overlay">
                    <h3>Pemandangan Laut</h3>
                    <p>View pantai yang menarik.</p>
                </div>
            </div>

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