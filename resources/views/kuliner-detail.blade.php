@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <h1>{{ $warung->nama }}</h1>
        <p class="page-subtitle">{{ $warung->deskripsi }}</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="detail-warung">
            <div class="detail-warung-image">
                <img 
                    src="{{ str_starts_with($warung->gambar, 'images/') ? asset($warung->gambar) : asset('storage/' . $warung->gambar) }}" 
                    alt="{{ $warung->nama }}"
                >
            </div>

            <div class="detail-warung-text">
                <span class="section-label">Kuliner Pantai</span>

                <h2>Tentang Warung</h2>

                <p>
                    {{ $warung->deskripsi ?? 'Warung kuliner di sekitar Pantai Pelawan yang menyediakan berbagai pilihan makanan dan minuman untuk pengunjung.' }}
                </p>

                <div class="warung-address" style="margin-top:20px;">
                    <strong>📍 Alamat Warung</strong>
                    <span>
                        {{ $warung->alamat ?? 'Area kuliner sekitar Pantai Pelawan, Kabupaten Karimun' }}
                    </span>
                </div>

                <a href="{{ route('kuliner') }}" class="btn btn-primary" style="margin-top:25px;">
                    Kembali ke Kuliner
                </a>
            </div>
        </div>
    </div>
</section>

{{-- MAKANAN --}}
<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">Menu Makanan</span>
            <h2>Daftar Makanan</h2>
            <p>Berikut pilihan makanan yang tersedia di {{ $warung->nama }}</p>
        </div>

        <div class="menu-grid">
            @forelse($warung->menus->where('kategori', 'makanan') as $menu)
                <div class="menu-card">
                    <img src="{{ str_starts_with($menu->gambar, 'images/') ? asset($menu->gambar) : asset('storage/' . $menu->gambar) }}" alt="{{ $menu->nama_menu }}">
                    <div class="menu-card-body">
                        <h3>{{ $menu->nama_menu }}</h3>
                        <p class="menu-price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                    </div>
                </div>
            @empty
                <p>Belum ada menu makanan.</p>
            @endforelse
        </div>

    </div>
</section>

{{-- MINUMAN --}}
<section class="section">
    <div class="container">

        <div class="section-heading">
            <span class="section-label">Menu Minuman</span>
            <h2>Daftar Minuman</h2>
            <p>Berikut pilihan minuman yang tersedia di {{ $warung->nama }}</p>
        </div>

        <div class="menu-grid">
            @forelse($warung->menus->where('kategori', 'minuman') as $menu)
                <div class="menu-card">
                    <img src="{{ asset($menu->gambar) }}" alt="{{ $menu->nama_menu }}">
                    <div class="menu-card-body">
                        <h3>{{ $menu->nama_menu }}</h3>
                        <p class="menu-price">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                    </div>
                </div>
            @empty
                <p>Belum ada menu minuman.</p>
            @endforelse
        </div>

    </div>
</section>

@endsection