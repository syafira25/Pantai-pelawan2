<section class="section {{ $kategori == 'alur' ? 'section-soft' : '' }}">
    <div class="container">

        <div class="section-heading">
            @if($kategori == 'layanan')
                <span class="section-label">{{ $page->layanan_label ?? 'Layanan Website' }}</span>
                <h2>{{ $page->layanan_judul ?? 'Layanan Digital Wisata' }}</h2>
                <p>{{ $page->layanan_deskripsi ?? '' }}</p>

            @elseif($kategori == 'keunggulan')
                <span class="section-label">{{ $page->keunggulan_label ?? 'Keunggulan' }}</span>
                <h2>{{ $page->keunggulan_judul ?? 'Keunggulan Pantai Pelawan' }}</h2>
                <p>{{ $page->keunggulan_deskripsi ?? '' }}</p>

            @elseif($kategori == 'informasi')
                <span class="section-label">{{ $page->info_label ?? 'Informasi Website' }}</span>
                <h2>{{ $page->info_judul ?? 'Informasi yang Tersedia di Website' }}</h2>
                <p>{{ $page->info_deskripsi ?? '' }}</p>

            @elseif($kategori == 'alur')
                <span class="section-label">{{ $page->alur_label ?? 'Cara Pesan' }}</span>
                <h2>{{ $page->alur_judul ?? 'Alur Pemesanan Tiket Online' }}</h2>
                <p>{{ $page->alur_deskripsi ?? '' }}</p>
            @endif
        </div>

        <div class="{{ $gridClass }}">
            @forelse($items as $item)

                <div class="admin-home-card">

                    @if($cardType == 'step')
                        <div class="step-number">{{ $item->nomor }}</div>
                    @endif

                    <h3>
                        @if($item->icon)
                            <span>{{ $item->icon }}</span>
                        @endif

                        {{ $item->judul }}
                    </h3>

                    <p>{{ $item->deskripsi }}</p>

                    @include('admin.beranda.partials.card-actions', ['item' => $item])

                </div>

            @empty
                <p class="text-center">Belum ada item {{ $title }}.</p>
            @endforelse
        </div>

    </div>
</section>