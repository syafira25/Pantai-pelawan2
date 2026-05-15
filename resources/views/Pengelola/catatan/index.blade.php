@extends('pengelola.app')

@section('title', 'Catatan ke Admin')

@section('content')

<section class="admin-dashboard-section">
    <div class="container">

        <div class="admin-dashboard-header">
            <div>
                <span class="admin-label">Catatan Pengelola</span>
                <h1>Catatan ke Admin</h1>
                <p>Kirim catatan kepada admin jika ada informasi, kendala, atau hal penting yang perlu ditindaklanjuti.</p>
            </div>
        </div>

        @if(session('success'))
            <div class="admin-alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="admin-table-grid">

            <div class="admin-table-card" id="form-catatan">
                <div class="admin-table-title">
                    <h2>Kirim Catatan Baru</h2>
                    <p>Catatan ini akan masuk ke halaman admin untuk diperiksa.</p>
                </div>

                <form action="{{ route('pengelola.catatan.store') }}#riwayat-catatan" method="POST" class="keep-scroll-form">
                    @csrf

                    <div class="admin-form-group">
                        <label>Judul Catatan</label>
                        <input type="text" name="judul" placeholder="Contoh: Fasilitas perlu diperiksa" required>
                    </div>

                    <div class="admin-form-group">
                        <label>Isi Catatan</label>
                        <textarea name="isi" rows="6" placeholder="Tulis isi catatan di sini..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Kirim Catatan
                    </button>
                </form>
            </div>

            <div class="admin-table-card" id="riwayat-catatan">
                <div class="admin-table-title">
                    <h2>Riwayat Catatan Saya</h2>
                    <p>Daftar catatan yang sudah kamu kirim ke admin.</p>
                </div>

                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($catatans as $catatan)
                                <tr>
                                    <td><strong>{{ $catatan->judul }}</strong></td>
                                    <td>{{ $catatan->isi }}</td>
                                    <td>{{ strtoupper($catatan->status) }}</td>
                                    <td>{{ $catatan->created_at->format('d M Y H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Belum ada catatan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const savedScroll = sessionStorage.getItem('pengelolaCatatanScrollY');

        if (savedScroll !== null) {
            window.scrollTo(0, parseInt(savedScroll));
            sessionStorage.removeItem('pengelolaCatatanScrollY');
        }

        document.querySelectorAll('.keep-scroll-form').forEach(function (form) {
            form.addEventListener('submit', function () {
                sessionStorage.setItem('pengelolaCatatanScrollY', window.scrollY);
            });
        });
    });
</script>

@endsection