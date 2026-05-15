@extends('pengelola.app')

@section('title', 'Catatan ke Admin')

@section('content')

<div class="admin-page-header">
    <div>
        <h1>Catatan ke Admin</h1>
        <p>Kirim catatan atau laporan kepada admin jika ada hal yang perlu diperiksa.</p>
    </div>
</div>

@if(session('success'))
    <div class="admin-alert-success">{{ session('success') }}</div>
@endif

<div class="admin-table-card" style="margin-bottom:24px;">
    <div class="admin-table-title">
        <h2>Kirim Catatan Baru</h2>
    </div>

    <form action="{{ route('pengelola.catatan.store') }}" method="POST">
        @csrf

        <div class="admin-form-group">
            <label>Judul Catatan</label>
            <input type="text" name="judul" required>
        </div>

        <div class="admin-form-group">
            <label>Isi Catatan</label>
            <textarea name="isi" rows="5" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            Kirim ke Admin
        </button>
    </form>
</div>

<div class="admin-table-card">
    <div class="admin-table-title">
        <h2>Riwayat Catatan Saya</h2>
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

@endsection