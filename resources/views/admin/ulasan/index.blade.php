@extends('admin.layouts.app')

@section('title', 'Kelola Ulasan')

@section('content')

<div class="admin-content-wrap">

    <div class="admin-page-header">
        <h1>Kelola Ulasan Pengunjung</h1>
        <p>Admin dapat menyetujui, menyembunyikan, atau menghapus ulasan dari wisatawan.</p>
    </div>

    @if(session('success'))
        <div class="admin-alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="admin-card">

        <div class="admin-ulasan-grid">

            @forelse($ulasans as $ulasan)
                <div class="admin-ulasan-card">

                    <div class="admin-ulasan-top">
                        <div class="admin-ulasan-avatar">
                            {{ strtoupper(substr($ulasan->nama, 0, 1)) }}
                        </div>

                        <div>
                            <h3>{{ $ulasan->nama }}</h3>
                            <p>{{ $ulasan->email }}</p>
                        </div>
                    </div>

                    <div class="admin-ulasan-meta">
                        <span>{{ $ulasan->status_pengunjung }}</span>

                        @if($ulasan->status == 'pending')
                            <strong class="status-pending">Pending</strong>
                        @elseif($ulasan->status == 'disetujui')
                            <strong class="status-approved">Disetujui</strong>
                        @else
                            <strong class="status-hidden">Disembunyikan</strong>
                        @endif
                    </div>

                    <div class="admin-ulasan-stars">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $ulasan->rating)
                                ★
                            @else
                                ☆
                            @endif
                        @endfor
                    </div>

                    <p class="admin-ulasan-text">
                        {{ $ulasan->pesan }}
                    </p>

                    <div class="admin-ulasan-date">
                        Dikirim pada {{ $ulasan->created_at->format('d M Y H:i') }}
                    </div>

                    <div class="admin-ulasan-actions">

                        <form action="{{ route('admin.ulasan.setujui', $ulasan->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn-ulasan approve">
                                Setujui
                            </button>
                        </form>

                        <form action="{{ route('admin.ulasan.sembunyikan', $ulasan->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn-ulasan hide">
                                Sembunyikan
                            </button>
                        </form>

                        <form action="{{ route('admin.ulasan.destroy', $ulasan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus ulasan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-ulasan delete">
                                Hapus
                            </button>
                        </form>

                    </div>

                </div>
            @empty
                <div class="admin-empty-box">
                    <h3>Belum Ada Ulasan</h3>
                    <p>Ulasan dari wisatawan akan tampil di halaman ini setelah dikirim.</p>
                </div>
            @endforelse

        </div>

    </div>

</div>

@endsection