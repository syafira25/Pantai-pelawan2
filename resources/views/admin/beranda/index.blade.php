@extends('admin.layouts.app')

@section('title', 'Kelola Beranda')

@section('content')

<div class="admin-user-preview-page">

    <div class="admin-floating-title">
        <div>
            <h1>Kelola Beranda</h1>
            <p>Tampilan di bawah mengikuti halaman user. Admin bisa mengubah konten tanpa edit coding.</p>
        </div>

        <div style="display:flex; gap:10px; flex-wrap:wrap;">
            <a href="{{ route('home') }}" target="_blank" class="admin-view-user-btn">Lihat User</a>
            <button onclick="openModal('modalTambahBeranda')" class="admin-view-user-btn">+ Tambah Item</button>
            <button onclick="openModal('modalEditPage')" class="admin-view-user-btn">✏️ Edit Konten Halaman</button>
        </div>
    </div>

    @if(session('success'))
        <div class="admin-alert-success">{{ session('success') }}</div>
    @endif

    <section class="hero hero-home admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditPage')">✏️ Edit Hero</button>

        <div class="hero-overlay">
            <div class="container">
                <div class="hero-content hero-content-wide">
                    <div class="hero-badge">{{ $page->hero_badge }}</div>
                    <h1>{{ $page->hero_judul }}</h1>
                    <p>{{ $page->hero_deskripsi }}</p>

                    <div class="hero-buttons">
                        <a href="{{ route('tiket') }}" class="btn btn-primary">{{ $page->hero_tombol_1 }}</a>
                        <a href="{{ route('informasi.pantai') }}" class="btn btn-secondary">{{ $page->hero_tombol_2 }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('admin.beranda.partials.section-items', [
        'title' => 'Layanan Website',
        'items' => $layanan,
        'kategori' => 'layanan',
        'gridClass' => 'info-grid',
        'cardType' => 'info'
    ])

    <section class="section section-soft admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditPage')">✏️ Edit Tentang</button>

        <div class="container">
            <div class="home-about-grid">
                <div class="home-about-image">
                    <img src="{{ str_starts_with($page->about_gambar, 'images/') ? asset($page->about_gambar) : asset('storage/' . $page->about_gambar) }}" alt="Pantai Pelawan">
                </div>

                <div class="home-about-text">
                    <span class="section-label">{{ $page->about_label }}</span>
                    <h2>{{ $page->about_judul }}</h2>
                    <p>{{ $page->about_deskripsi_1 }}</p>
                    <p>{{ $page->about_deskripsi_2 }}</p>
                    <a href="{{ route('profil.pantai') }}" class="btn btn-primary">{{ $page->about_tombol }}</a>
                </div>
            </div>
        </div>
    </section>

    @include('admin.beranda.partials.section-items', [
        'title' => 'Keunggulan',
        'items' => $keunggulan,
        'kategori' => 'keunggulan',
        'gridClass' => 'feature-grid',
        'cardType' => 'feature'
    ])

    @include('admin.beranda.partials.section-items', [
        'title' => 'Informasi Website',
        'items' => $informasi,
        'kategori' => 'informasi',
        'gridClass' => 'profil-card-grid profil-card-grid-six',
        'cardType' => 'profil'
    ])

    @include('admin.beranda.partials.section-items', [
        'title' => 'Alur Pemesanan',
        'items' => $alur,
        'kategori' => 'alur',
        'gridClass' => 'step-grid',
        'cardType' => 'step'
    ])

    <section class="section admin-editable-section">
        <button type="button" class="admin-section-edit-btn" onclick="openModal('modalEditPage')">✏️ Edit CTA</button>

        <div class="container">
            <div class="home-cta">
                <div>
                    <span class="section-label label-light">{{ $page->cta_label }}</span>
                    <h2><strong>{{ $page->cta_judul }}</strong></h2>
                    <p>{{ $page->cta_deskripsi }}</p>
                </div>

                <div class="home-cta-action">
                    <a href="{{ route('tiket') }}" class="btn btn-primary">{{ $page->cta_tombol_1 }}</a>
                    <a href="{{ $page->cta_wa_link }}" target="_blank" class="btn btn-secondary">{{ $page->cta_tombol_2 }}</a>
                </div>
            </div>
        </div>
    </section>

</div>

@include('admin.beranda.partials.modal-page')
@include('admin.beranda.partials.modal-create')

@foreach($layanan->merge($keunggulan)->merge($informasi)->merge($alur) as $item)
    @include('admin.beranda.partials.modal-edit', ['item' => $item])
@endforeach

<script>
    function openModal(id) {
        document.getElementById(id).style.display = "flex";
    }

    function closeModal(id) {
        document.getElementById(id).style.display = "none";
    }

    window.onclick = function(event) {
        document.querySelectorAll('.admin-modal').forEach(modal => {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });
    }
</script>

@endsection