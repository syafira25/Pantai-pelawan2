@extends('admin.layouts.app')

@section('content')

<section class="admin-dashboard-section">
    <div class="container">

        <div class="admin-dashboard-header">
            <div>
                <span class="admin-label">Panel Administrator</span>
                <h1>Dashboard Admin</h1>
                <p>Ringkasan data pengguna, pemesanan tiket, pembayaran, dan penukaran tiket Pantai Pelawan.</p>
            </div>
        </div>

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
                    <h2>User Terbaru</h2>
                    <p>Daftar akun yang baru terdaftar di website.</p>
                </div>

                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Tanggal Register</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usersTerbaru as $user)
                                <tr>
                                    <td><strong>{{ $user->name }}</strong></td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge-role badge-{{ $user->role }}">
                                            {{ strtoupper($user->role) }}
                                        </span>
                                    </td>
                                    <td>{{ $user->created_at->format('d M Y H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

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
                            @foreach($pemesananTerbaru as $p)
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection