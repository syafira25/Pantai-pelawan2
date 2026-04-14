@extends('admin.layouts.app')

@section('content')
    <div class="admin-page-header">
        <h1>Dashboard Admin</h1>
        <p>Selamat datang di halaman admin Pantai Pelawan.</p>
    </div>

    <div class="admin-card-grid">
        <div class="admin-card">
            <h3>Data Kuliner</h3>
            <p>Kelola data warung dan menu kuliner wisata.</p>
        </div>

        <div class="admin-card">
            <h3>Data Galeri</h3>
            <p>Kelola foto-foto Pantai Pelawan.</p>
        </div>

        <div class="admin-card">
            <h3>Data Informasi</h3>
            <p>Kelola informasi umum wisata pantai.</p>
        </div>

        <div class="admin-card">
            <h3>Pesan Masuk</h3>
            <p>Lihat pesan yang dikirim pengunjung.</p>
        </div>
    </div>
@endsection