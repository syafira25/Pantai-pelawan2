@extends('layouts.app')

@section('content')
<section class="page-header">
    <div class="container">
        <h1>Pemesanan Tiket</h1>
        <p class="page-subtitle">
            Isi data pemesanan, lalu lanjut ke pembayaran QRIS.
        </p>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div class="section-heading">
            <h2>Form Pemesanan Tiket</h2>
            <p>Harga tiket akan dihitung otomatis berdasarkan jumlah orang.</p>
        </div>

        <div class="content-box">
            @if(session('error'))
                <div style="background:#fee2e2;color:#991b1b;padding:12px 14px;border-radius:12px;margin-bottom:16px;">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div style="background:#fee2e2;color:#991b1b;padding:12px 14px;border-radius:12px;margin-bottom:16px;">
                    <ul style="padding-left:18px; margin:0;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tiket.store') }}" method="POST" id="ticketForm">
                @csrf

                <div style="margin-bottom:15px;">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>

                <div style="margin-bottom:15px;">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div style="margin-bottom:15px;">
                    <label>Tanggal Kunjungan</label>
                    <input type="date" name="tanggal_kunjungan" class="form-control" value="{{ old('tanggal_kunjungan') }}" required>
                </div>

                <div style="margin-bottom:15px;">
                    <label>Jumlah Orang</label>
                    <input type="number" name="jumlah_orang" id="jumlah_orang" class="form-control" min="1" value="{{ old('jumlah_orang', 1) }}" required>
                </div>

                <div style="margin-bottom:15px;">
                    <label>Harga per Tiket</label>
                    <input type="text" id="harga_per_tiket" class="form-control" value="Rp {{ number_format($harga, 0, ',', '.') }}" readonly>
                </div>

                <div style="margin-bottom:20px;">
                    <label>Total Harga</label>
                    <input type="text" id="total_harga" class="form-control" readonly>
                </div>

                <button type="submit" class="btn btn-primary">Lanjut ke Pembayaran</button>
            </form>
        </div>
    </div>
</section>

<script>
    const harga = {{ $harga }};
    const jumlahInput = document.getElementById('jumlah_orang');
    const totalInput = document.getElementById('total_harga');

    function formatRupiah(angka) {
        return 'Rp ' + angka.toLocaleString('id-ID');
    }

    function hitungTotal() {
        const jumlah = parseInt(jumlahInput.value || 0);
        totalInput.value = formatRupiah(harga * jumlah);
    }

    jumlahInput.addEventListener('input', hitungTotal);
    hitungTotal();
</script>
@endsection