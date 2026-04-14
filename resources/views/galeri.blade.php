@extends('layouts.app')

@section('content')

<!-- HEADER -->
<section class="page-header">
    <div class="container">
        <h1>Galeri Pantai Pelawan</h1>
        <p class="page-subtitle">
            Dokumentasi keindahan Pantai Pelawan dari berbagai sudut.
        </p>
    </div>
</section>

<!-- GALERI -->
<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <h2>Foto Wisata</h2>
            <p>Beberapa momen dan pemandangan menarik di Pantai Pelawan.</p>
        </div>

        <div class="galeri-grid">

            <div class="galeri-item">
                <img src="{{ asset('images/galeri1.jpg') }}">
            </div>

            <div class="galeri-item">
                <img src="{{ asset('images/galeri2.jpg') }}">
            </div>

            <div class="galeri-item">
                <img src="{{ asset('images/galeri3.jpg') }}">
            </div>

            <div class="galeri-item">
                <img src="{{ asset('images/galeri4.jpg') }}">
            </div>

            <div class="galeri-item">
                <img src="{{ asset('images/galeri5.jpg') }}">
            </div>

            <div class="galeri-item">
                <img src="{{ asset('images/galeri6.jpg') }}">
            </div>

            <div class="galeri-item">
                <img src="{{ asset('images/galeri7.jpg') }}">
            </div>

            <div class="galeri-item">
                <img src="{{ asset('images/galeri8.jpg') }}">
            </div>

        </div>

    </div>
</section>

<!-- PENUTUP -->
<section class="section">
    <div class="container">
        <div class="highlight-box">
            <div class="highlight-text">
                <h2>Keindahan yang Tak Terlupakan</h2>
                <p>
                    Pantai Pelawan menawarkan pemandangan alam yang memukau dan cocok untuk diabadikan dalam berbagai momen.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection