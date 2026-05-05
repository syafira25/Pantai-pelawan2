@extends('admin.layouts.app')

@section('title', 'Kelola Pemesanan Tiket')

@section('content')

<div class="admin-content-wrap">

    <div class="admin-page-header">
        <h1>Kelola Pemesanan Tiket</h1>
        <p>Semua data pemesanan tiket wisatawan Pantai Pelawan.</p>
    </div>

    @if(session('success'))
        <div class="admin-alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="admin-alert-error">
            {{ session('error') }}
        </div>
    @endif

    <div class="admin-card">
        <div class="admin-table-wrap">
            <table class="admin-table pemesanan-table">
                <thead>
                    <tr>
                        <th>Kode Booking</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Total</th>
                        <th>Status Bayar</th>
                        <th>Status Tiket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($pemesanans as $p)
                        <tr>
                            <td>
                                <strong class="booking-code">
                                    {{ $p->kode_booking }}
                                </strong>
                            </td>

                            <td>
                                <strong>{{ $p->nama }}</strong>
                            </td>

                            <td>
                                {{ $p->email }}
                            </td>

                            <td>
                                <strong>
                                    Rp {{ number_format($p->total_harga, 0, ',', '.') }}
                                </strong>
                            </td>

                            <td>
                                @if($p->status_pembayaran == 'paid')
                                    <span class="badge-pay badge-paid">PAID</span>
                                @elseif($p->status_pembayaran == 'pending')
                                    <span class="badge-pay badge-pending">PENDING</span>
                                @elseif($p->status_pembayaran == 'failed')
                                    <span class="badge-pay badge-failed">FAILED</span>
                                @elseif($p->status_pembayaran == 'expired')
                                    <span class="badge-pay badge-expired">EXPIRED</span>
                                @elseif($p->status_pembayaran == 'cancelled')
                                    <span class="badge-pay badge-cancelled">CANCELLED</span>
                                @else
                                    <span class="badge-pay badge-pending">
                                        {{ strtoupper($p->status_pembayaran) }}
                                    </span>
                                @endif
                            </td>

                            <td>
                                @if($p->qr_used_at)
                                    <span class="badge-ticket used">
                                        Sudah Digunakan
                                    </span>
                                @else
                                    <span class="badge-ticket unused">
                                        Belum Digunakan
                                    </span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('admin.pemesanan.show', $p->id) }}" class="btn-detail">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty-data">
                                Belum ada data pemesanan tiket.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>

@endsection