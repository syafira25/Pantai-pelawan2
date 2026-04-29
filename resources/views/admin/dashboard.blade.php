@extends('admin.layouts.app')

@section('content')

<div class="admin-dashboard-grid">

    <!-- HEADER UTAMA -->
    <div class="admin-hero-card">
        <div class="admin-hero-left">
            <span class="admin-badge">Admin Panel</span>
            <h1>Dashboard Admin</h1>
            <p>
                Selamat datang di halaman pengelolaan Pantai Pelawan. Di dashboard ini admin dapat
                memantau data wisata, mengelola konten website, melihat pesan pengunjung, serta
                mengontrol informasi yang ditampilkan pada sistem.
            </p>

            <div class="admin-hero-actions">
                <a href="#" class="admin-btn admin-btn-primary">Kelola Kuliner</a>
                <a href="#" class="admin-btn admin-btn-soft">Lihat Galeri</a>
            </div>
        </div>

        <div class="admin-hero-right">
            <div class="admin-mini-card">
                <span>Status Sistem</span>
                <strong>Aktif</strong>
            </div>
            <div class="admin-mini-card">
                <span>Mode Website</span>
                <strong>Online</strong>
            </div>
            <div class="admin-mini-card">
                <span>Konten Wisata</span>
                <strong>Terhubung</strong>
            </div>
        </div>
    </div>

    <!-- STATISTIK -->
    <div class="admin-stats-grid">
        <div class="admin-stat-card">
            <div class="admin-stat-icon">🎫</div>
            <div>
                <h3>128</h3>
                <p>Total Tiket</p>
            </div>
        </div>

        <div class="admin-stat-card">
            <div class="admin-stat-icon">🍽️</div>
            <div>
                <h3>10</h3>
                <p>Data Kuliner</p>
            </div>
        </div>

        <div class="admin-stat-card">
            <div class="admin-stat-icon">🖼️</div>
            <div>
                <h3>24</h3>
                <p>Foto Galeri</p>
            </div>
        </div>

        <div class="admin-stat-card">
            <div class="admin-stat-icon">📩</div>
            <div>
                <h3>7</h3>
                <p>Pesan Masuk</p>
            </div>
        </div>
    </div>

    <!-- MENU UTAMA -->
    <div class="admin-section-card">
        <div class="admin-section-header">
            <div>
                <h2>Menu Pengelolaan</h2>
                <p>Akses cepat ke fitur utama admin panel.</p>
            </div>
        </div>

        <div class="admin-card-grid">
            <div class="admin-card">
                <div class="admin-card-icon">🍽️</div>
                <h3>Data Kuliner</h3>
                <p>Kelola warung, daftar menu, harga, dan foto makanan wisata Pantai Pelawan.</p>
                <a href="#" class="admin-link">Buka Menu</a>
            </div>

            <div class="admin-card">
                <div class="admin-card-icon">🖼️</div>
                <h3>Data Galeri</h3>
                <p>Kelola dokumentasi foto pantai, fasilitas, suasana wisata, dan spot unggulan.</p>
                <a href="#" class="admin-link">Buka Menu</a>
            </div>

            <div class="admin-card">
                <div class="admin-card-icon">📄</div>
                <h3>Data Informasi</h3>
                <p>Kelola informasi umum, fasilitas, daya tarik, tiket, lokasi, dan detail wisata.</p>
                <a href="#" class="admin-link">Buka Menu</a>
            </div>

            <div class="admin-card">
                <div class="admin-card-icon">📩</div>
                <h3>Pesan Masuk</h3>
                <p>Lihat pesan dari pengunjung website dan pantau kebutuhan informasi mereka.</p>
                <a href="#" class="admin-link">Buka Menu</a>
            </div>
        </div>
    </div>

    <!-- BAWAH KIRI -->
    <div class="admin-section-card">
        <div class="admin-section-header">
            <div>
                <h2>Aktivitas Terbaru</h2>
                <p>Ringkasan kegiatan terbaru pada sistem.</p>
            </div>
        </div>

        <div class="admin-activity-list">
            <div class="admin-activity-item">
                <div class="admin-activity-dot"></div>
                <div>
                    <h4>Data galeri berhasil diperbarui</h4>
                    <p>2 foto baru ditambahkan ke galeri Pantai Pelawan.</p>
                </div>
                <span>10 menit lalu</span>
            </div>

            <div class="admin-activity-item">
                <div class="admin-activity-dot"></div>
                <div>
                    <h4>Pesan baru dari pengunjung</h4>
                    <p>Terdapat pertanyaan baru terkait jam operasional wisata.</p>
                </div>
                <span>25 menit lalu</span>
            </div>

            <div class="admin-activity-item">
                <div class="admin-activity-dot"></div>
                <div>
                    <h4>Informasi tiket diperbarui</h4>
                    <p>Harga tiket dan keterangan pembayaran berhasil diubah.</p>
                </div>
                <span>1 jam lalu</span>
            </div>

            <div class="admin-activity-item">
                <div class="admin-activity-dot"></div>
                <div>
                    <h4>Konten kuliner ditambahkan</h4>
                    <p>Satu warung kuliner baru berhasil dimasukkan ke sistem.</p>
                </div>
                <span>Hari ini</span>
            </div>
        </div>
    </div>

    <!-- BAWAH KANAN -->
    <div class="admin-section-card">
        <div class="admin-section-header">
            <div>
                <h2>Ringkasan Sistem</h2>
                <p>Kondisi umum website pariwisata.</p>
            </div>
        </div>

        <div class="admin-summary-box">
            <div class="admin-summary-row">
                <span>Status Website</span>
                <strong class="success">Online</strong>
            </div>
            <div class="admin-summary-row">
                <span>Integrasi Maps</span>
                <strong class="success">Aktif</strong>
            </div>
            <div class="admin-summary-row">
                <span>Form Kontak</span>
                <strong class="success">Berjalan</strong>
            </div>
            <div class="admin-summary-row">
                <span>Pembayaran Tiket</span>
                <strong class="warning">Perlu Monitoring</strong>
            </div>
            <div class="admin-summary-row">
                <span>Terakhir Update Konten</span>
                <strong>Hari Ini</strong>
            </div>
        </div>

        <div class="admin-note-box">
            <h4>Catatan Admin</h4>
            <p>
                Pastikan seluruh informasi wisata, harga tiket, galeri, dan data kuliner selalu
                diperbarui agar pengunjung memperoleh informasi yang akurat dan menarik.
            </p>
        </div>
    </div>

</div>

@endsection