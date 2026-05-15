@extends('layouts.app')

@section('content')


<section class="page-header">
    <div class="container">
        <h1>Pemesanan Tiket</h1>
        <p class="page-subtitle">
            Pilih jenis tiket, tentukan jumlah pengunjung, lalu lanjut ke pembayaran QRIS.
        </p>
    </div>
</section>

<section class="section section-soft">
    <div class="container">
        <div class="section-heading">
            <h2>Form Pemesanan Tiket</h2>
            <p>Harga tiket akan dihitung otomatis berdasarkan jenis dan jumlah tiket.</p>
        </div>

        <div class="content-box ticket-order-box">
            @if(session('error'))
                <div class="ticket-alert">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="ticket-alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tiket.store') }}" method="POST" id="ticketForm">
                @csrf

                <div class="ticket-form-card">

    <div class="ticket-form-header">
        <span>Data Pemesan</span>
        <h3>Informasi Pengunjung</h3>
        <p>Isi data sebelum memilih tiket.</p>
    </div>

    <div class="ticket-form-grid">

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group full">
            <label>Tanggal Kunjungan</label>
            <input 
                type="date" 
                name="tanggal_kunjungan" 
                class="form-control" 
                min="{{ date('Y-m-d') }}"
                required
            >
        </div>

    </div>

</div>

                <div class="ticket-type-wrapper">
                    <div class="ticket-type-card">
                        <div class="ticket-type-left">
                            <div class="ticket-icon">👨‍👩‍👧</div>
                            <div>
                                <span class="ticket-label">Jenis Tiket</span>
                                <h3>Tiket Dewasa</h3>
                                <p>Untuk pengunjung dewasa.</p>
                                <strong>Rp 5.000</strong>
                            </div>
                        </div>

                        <div class="qty-control">
                            <button type="button" onclick="kurangTiket('dewasa')">−</button>
                            <input type="number" id="dewasa" name="jumlah_dewasa" value="{{ old('jumlah_dewasa', 0) }}" readonly>
                            <button type="button" onclick="tambahTiket('dewasa')">+</button>
                        </div>
                    </div>

                    <div class="ticket-type-card">
                        <div class="ticket-type-left">
                            <div class="ticket-icon">🧒</div>
                            <div>
                                <span class="ticket-label">Jenis Tiket</span>
                                <h3>Tiket Anak-anak</h3>
                                <p>Untuk anak-anak usia 10 tahun ke bawah.</p>
                                <strong>Rp 2.000</strong>
                            </div>
                        </div>

                        <div class="qty-control">
                            <button type="button" onclick="kurangTiket('anak')">−</button>
                            <input type="number" id="anak" name="jumlah_anak" value="{{ old('jumlah_anak', 0) }}" readonly>
                            <button type="button" onclick="tambahTiket('anak')">+</button>
                        </div>
                    </div>
                </div>

                <div class="ticket-summary">
                    <div>
                        <span>Total Tiket</span>
                        <h4 id="totalTiket">0 Tiket</h4>
                    </div>

                    <div>
                        <span>Total Harga</span>
                        <h2 id="totalText">Rp 0</h2>
                    </div>
                </div>

                <input type="hidden" name="total_harga" id="totalHarga" value="0">

                <button type="submit" class="btn btn-primary ticket-submit-btn">
                    Lanjut ke Pembayaran
                </button>
            </form>
        </div>
    </div>
</section>

<script>
    const hargaDewasa = 5000;
    const hargaAnak = 2000;

    function tambahTiket(type) {
        const input = document.getElementById(type);
        input.value = parseInt(input.value || 0) + 1;
        hitungTotal();
    }

    function kurangTiket(type) {
        const input = document.getElementById(type);
        if (parseInt(input.value || 0) > 0) {
            input.value = parseInt(input.value) - 1;
        }
        hitungTotal();
    }

    function formatRupiah(angka) {
        return 'Rp ' + angka.toLocaleString('id-ID');
    }

    function hitungTotal() {
        const dewasa = parseInt(document.getElementById('dewasa').value || 0);
        const anak = parseInt(document.getElementById('anak').value || 0);

        const totalTiket = dewasa + anak;
        const totalHarga = (dewasa * hargaDewasa) + (anak * hargaAnak);

        document.getElementById('totalTiket').innerText = totalTiket + ' Tiket';
        document.getElementById('totalText').innerText = formatRupiah(totalHarga);
        document.getElementById('totalHarga').value = totalHarga;
    }

    document.getElementById('ticketForm').addEventListener('submit', function(e) {
        const totalHarga = parseInt(document.getElementById('totalHarga').value || 0);

        if (totalHarga <= 0) {
            e.preventDefault();
            alert('Silakan pilih minimal 1 tiket terlebih dahulu.');
        }
    });

    hitungTotal();
</script>
@endsection