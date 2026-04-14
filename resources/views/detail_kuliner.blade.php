@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <h1>{{ $warung['nama'] }}</h1>
        <p class="page-subtitle">{{ $warung['deskripsi'] }}</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="detail-warung">
            <div class="detail-warung-image">
                <img src="{{ asset($warung['gambar']) }}" alt="{{ $warung['nama'] }}">
            </div>
            <div class="detail-warung-text">
                <h2>Tentang Warung</h2>
                <p>{{ $warung['deskripsi'] }}</p>
                <a href="{{ route('kuliner') }}" class="btn btn-primary">Kembali ke Kuliner</a>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div class="section-heading">
            <h2>Daftar Menu</h2>
            <p>Berikut beberapa menu yang tersedia di {{ $warung['nama'] }}.</p>
        </div>

        <div class="menu-grid">
            @foreach($warung['menu'] as $menu)
                <div class="menu-card">
                    <img src="{{ asset($menu['gambar']) }}" alt="{{ $menu['nama'] }}">
                    <div class="menu-card-body">
                        <h3>{{ $menu['nama'] }}</h3>
                        <p class="menu-price">{{ $menu['harga'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection