@extends('pengelola.app')

@section('title', 'Dashboard Pengelola')

@section('content')

<section class="admin-dashboard-section">
    <div class="container">

        <div class="admin-dashboard-header">
            <div>
                <span class="admin-label">Panel Pengelola</span>
                <h1>Dashboard Pengelola</h1>
                <p>Ringkasan data pengguna, pengelola, admin, pemesanan tiket, pembayaran, dan penukaran tiket Pantai Pelawan.</p>
            </div>

            <a href="{{ route('home') }}" target="_blank" class="btn btn-primary">
                Lihat Tampilan User
            </a>
        </div>

        @if(session('success'))
            <div class="admin-alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="admin-stat-grid">
            <div class="admin-stat-card">
                <div class="admin-stat-icon">👥</div>
                <span>Total User</span>
                <h2>{{ $totalUser }}</h2>
            </div>

            <div class="admin-stat-card">
                <div class="admin-stat-icon">🛡️</div>
                <span>Total Admin</span>
                <h2>{{ $totalAdmin }}</h2>
            </div>

            <div class="admin-stat-card">
                <div class="admin-stat-icon">🌿</div>
                <span>Total Pengelola</span>
                <h2>{{ $totalPengelola }}</h2>
            </div>

            <div class="admin-stat-card">
                <div class="admin-stat-icon">🎫</div>
                <span>Total Pemesanan</span>
                <h2>{{ $totalPemesanan }}</h2>
            </div>

            <div class="admin-stat-card">
                <div class="admin-stat-icon">⏳</div>
                <span>Menunggu Bayar</span>
                <h2>{{ $pending }}</h2>
            </div>

            <div class="admin-stat-card">
                <div class="admin-stat-icon">✅</div>
                <span>Sudah Bayar</span>
                <h2>{{ $paid }}</h2>
            </div>

            <div class="admin-stat-card">
                <div class="admin-stat-icon">📍</div>
                <span>Tiket Ditukarkan</span>
                <h2>{{ $tiketDigunakan }}</h2>
            </div>
        </div>

        <div class="admin-table-grid">

            <div class="admin-table-card">
                <div class="admin-table-title">
                    <h2>Pemesanan Terbaru</h2>
                    <p>Data pemesanan tiket terbaru dari wisatawan.</p>
                </div>

                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Kode Booking</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Total</th>
                                <th>Status Bayar</th>
                                <th>Status Tiket</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pemesananTerbaru as $p)
                                <tr>
                                    <td><strong>{{ $p->kode_booking }}</strong></td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>Rp {{ number_format($p->total_harga, 0, ',', '.') }}</td>
                                    <td>
                                        <span class="badge-pay badge-{{ $p->status_pembayaran }}">
                                            {{ strtoupper($p->status_pembayaran) }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($p->qr_used_at)
                                            <span class="badge-ticket used">Sudah Ditukarkan</span>
                                        @else
                                            <span class="badge-ticket unused">Belum Ditukarkan</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Belum ada pemesanan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="admin-table-card">
                <div class="admin-table-title">
                    <h2>Ulasan Terbaru</h2>
                    <p>Komentar dan masukan terbaru dari wisatawan.</p>
                </div>

                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Rating</th>
                                <th>Komentar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ulasanTerbaru as $ulasan)
                                <tr>
                                    <td>{{ $ulasan->nama ?? '-' }}</td>
                                    <td>⭐ {{ $ulasan->rating ?? '-' }}</td>
                                    <td>{{ $ulasan->komentar ?? $ulasan->pesan ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Belum ada ulasan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection