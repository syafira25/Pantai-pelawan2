@extends('layouts.app')

@section('content')

<!-- HEADER -->
<section class="page-header">
    <div class="container">
        <h1>Kontak & Informasi</h1>
        <p class="page-subtitle">
            Hubungi kami untuk informasi lebih lanjut mengenai Pantai Pelawan.
        </p>
    </div>
</section>

<!-- KONTAK -->
<section class="section section-soft">
    <div class="container">

        <div class="section-heading">
            <h2>Hubungi Kami</h2>
            <p>Silakan hubungi pengelola Pantai Pelawan melalui informasi berikut.</p>
        </div>

        <div class="info-grid">

            <div class="info-card">
                <div class="icon-box">📍</div>
                <h3>Alamat</h3>
                <p>Desa Pangke Barat, Kabupaten Karimun, Kepulauan Riau</p>
            </div>

            <div class="info-card">
                <div class="icon-box">📞</div>
                <h3>Telepon</h3>
                <p>+62 812 3456 7890</p>
            </div>

            <div class="info-card">
                <div class="icon-box">📧</div>
                <h3>Email</h3>
                <p>info@pantaipelawan.com</p>
            </div>

            <div class="info-card">
                <div class="icon-box">🌐</div>
                <h3>Media Sosial</h3>
                <p>Instagram & Facebook Pantai Pelawan</p>
            </div>

        </div>

    </div>
</section>

<!-- FORM KONTAK -->
<section class="section">
    <div class="container">

        <div class="section-heading">
            <h2>Kirim Pesan</h2>
            <p>Isi form berikut untuk mengirim pertanyaan atau saran.</p>
        </div>

        <div class="content-box">

            {{-- NOTIFIKASI --}}
            @if(session('success'))
                <div style="margin-bottom:15px; padding:12px; background:#d1fae5; color:#065f46; border-radius:10px;">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('kirim.pesan') }}" method="POST">
                @csrf

                <div style="margin-bottom:15px;">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required>
                </div>

                <div style="margin-bottom:15px;">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                </div>

                <div style="margin-bottom:15px;">
                    <label>Pesan</label>
                    <textarea name="pesan" class="form-control" rows="5" placeholder="Tulis pesan..." required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Kirim Pesan
                </button>
            </form>
        </div>

    </div>
</section>

<!-- PENUTUP -->
<section class="section">
    <div class="container">
        <div class="highlight-box">
            <div class="highlight-text">
                <h2>Kami Siap Membantu</h2>
                <p>
                    Jangan ragu untuk menghubungi kami jika membutuhkan informasi lebih lanjut
                    mengenai wisata Pantai Pelawan.
                </p>
            </div>
        </div>
    </div>
</section>

@endsection