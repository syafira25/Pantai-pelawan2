@extends('admin.layouts.app')

@section('title', 'Catatan Pengelola')

@section('content')

<section class="admin-dashboard-section">
    <div class="container">

        <div class="admin-dashboard-header">
            <div>
                <span class="admin-label">Catatan Pengelola</span>
                <h1>Catatan dari Pengelola</h1>
                <p>Daftar catatan atau laporan yang dikirim oleh pengelola kepada admin.</p>
            </div>
        </div>

        @if(session('success'))
            <div class="admin-alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="admin-table-card" id="daftar-catatan">
            <div class="admin-table-title">
                <h2>Daftar Catatan</h2>
                <p>Admin dapat melihat, memproses, menyelesaikan, atau menghapus catatan.</p>
            </div>

            <div class="table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Pengirim</th>
                            <th>Judul</th>
                            <th>Isi</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($catatans as $catatan)
                            <tr id="catatan-{{ $catatan->id }}">
                                <td>
                                    <strong>{{ $catatan->user->name ?? 'Pengelola' }}</strong><br>
                                    <small>{{ $catatan->user->email ?? '-' }}</small>
                                </td>

                                <td>{{ $catatan->judul }}</td>

                                <td>{{ $catatan->isi }}</td>

                                <td>
                                    <span class="badge-pay badge-{{ $catatan->status }}">
                                        {{ strtoupper($catatan->status) }}
                                    </span>
                                </td>

                                <td>{{ $catatan->created_at->format('d M Y H:i') }}</td>

                                <td>
                                    <form action="{{ route('admin.catatan-pengelola.status', $catatan->id) }}#catatan-{{ $catatan->id }}"
                                          method="POST"
                                          class="keep-scroll-form"
                                          style="margin-bottom:8px;">
                                        @csrf
                                        @method('PATCH')

                                        <select name="status" onchange="this.form.submit()">
                                            <option value="baru" {{ $catatan->status == 'baru' ? 'selected' : '' }}>Baru</option>
                                            <option value="diproses" {{ $catatan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                            <option value="selesai" {{ $catatan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                        </select>
                                    </form>

                                    <form action="{{ route('admin.catatan-pengelola.destroy', $catatan->id) }}#daftar-catatan"
                                          method="POST"
                                          class="keep-scroll-form"
                                          onsubmit="return confirm('Yakin ingin menghapus catatan ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-ulasan delete">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Belum ada catatan dari pengelola.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

<style>
    .badge-baru {
        background: #fee2e2;
        color: #991b1b;
    }

    .badge-diproses {
        background: #fef3c7;
        color: #92400e;
    }

    .badge-selesai {
        background: #dcfce7;
        color: #166534;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const savedScroll = sessionStorage.getItem('adminCatatanPengelolaScrollY');

        if (savedScroll !== null) {
            window.scrollTo(0, parseInt(savedScroll));
            sessionStorage.removeItem('adminCatatanPengelolaScrollY');
        }

        document.querySelectorAll('.keep-scroll-form').forEach(function (form) {
            form.addEventListener('submit', function () {
                sessionStorage.setItem('adminCatatanPengelolaScrollY', window.scrollY);
            });
        });
    });
</script>

@endsection