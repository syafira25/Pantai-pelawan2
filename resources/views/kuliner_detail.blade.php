@extends('layouts.app')

@section('content')

@php
    $gambarWarung = $warung->gambar ?? 'images/hero-pantai.jpg';
@endphp

<section class="page-header">
    <div class="container">
        <h1>{{ $warung->nama }}</h1>
        <p class="page-subtitle">
            {{ $warung->deskripsi }}
        </p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="detail-warung">
            <div class="detail-warung-image">
                <img 
                    src="{{ asset($gambarWarung) }}" 
                    alt="{{ $warung->nama }}"
                    onerror="this.src='{{ asset('images/hero-pantai.jpg') }}'"
                >
            </div>

            <div class="detail-warung-text">
                <h2>Tentang Warung</h2>

                <p>
                    {{ $warung->deskripsi }}
                </p>

                @if($warung->alamat)
                    <div class="detail-warung-address">
                        <strong>📍 Alamat Warung</strong>
                        <span>{{ $warung->alamat }}</span>
                    </div>
                @endif

                <a href="{{ route('kuliner') }}" class="btn btn-primary">
                    Kembali ke Kuliner
                </a>
            </div>
        </div>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div class="section-heading">
            <h2>Daftar Menu</h2>
            <p>
                Berikut beberapa menu yang tersedia di {{ $warung->nama }}.
            </p>
        </div>

        <div class="menu-grid">

            @forelse($warung->menus as $menu)

                @php
                    $gambarMenu = $menu->gambar ?? 'images/hero-pantai.jpg';
                @endphp

                <div class="menu-card">
                    <img 
                        src="{{ asset($gambarMenu) }}" 
                        alt="{{ $menu->nama_menu }}"
                        onerror="this.src='{{ asset('images/hero-pantai.jpg') }}'"
                    >

                    <div class="menu-card-body">
                        <h3>{{ $menu->nama_menu }}</h3>

                        <p class="menu-price">
                            Rp {{ number_format($menu->harga ?? 0, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

            @empty

                <div class="empty-kuliner-box">
                    <h3>Belum Ada Menu</h3>
                    <p>
                        Menu untuk warung ini belum ditambahkan oleh admin.
                    </p>
                </div>

            @endforelse

        </div>
    </div>
</section>

@endsection