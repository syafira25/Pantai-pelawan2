<section class="section {{ $kategori == 'alur' ? 'section-soft' : '' }}">
    <div class="container">

        <div class="section-heading">
            @if($kategori == 'layanan')
                <span class="section-label">{{ $page->layanan_label }}</span>
                <h2>{{ $page->layanan_judul }}</h2>
                <p>{{ $page->layanan_deskripsi }}</p>
            @elseif($kategori == 'keunggulan')
                <span class="section-label">{{ $page->keunggulan_label }}</span>
                <h2>{{ $page->keunggulan_judul }}</h2>
                <p>{{ $page->keunggulan_deskripsi }}</p>
            @elseif($kategori == 'informasi')
                <span class="section-label">{{ $page->info_label }}</span>
                <h2>{{ $page->info_judul }}</h2>
                <p>{{ $page->info_deskripsi }}</p>
            @elseif($kategori == 'alur')
                <span class="section-label">{{ $page->alur_label }}</span>
                <h2>{{ $page->alur_judul }}</h2>
                <p>{{ $page->alur_deskripsi }}</p>
            @endif
        </div>

        <div class="{{ $gridClass }}">
            @forelse($items as $item)

                @if($cardType == 'info')
                    <div class="info-card admin-beranda-card">
                        <div class="icon-box">{{ $item->icon }}</div>
                        <h3>{{ $item->judul }}</h3>
                        <p>{{ $item->deskripsi }}</p>
                        @include('admin.beranda.partials.card-actions', ['item' => $item])
                    </div>
                @elseif($cardType == 'feature')
                    <div class="feature-card admin-beranda-card">
                        <h3>{{ $item->icon }} {{ $item->judul }}</h3>
                        <p>{{ $item->deskripsi }}</p>
                        @include('admin.beranda.partials.card-actions', ['item' => $item])
                    </div>
                @elseif($cardType == 'profil')
                    <div class="profil-card-item admin-beranda-card">
                        <div class="profil-card-icon">{{ $item->icon }}</div>
                        <h3>{{ $item->judul }}</h3>
                        <p>{{ $item->deskripsi }}</p>
                        @include('admin.beranda.partials.card-actions', ['item' => $item])
                    </div>
                @elseif($cardType == 'step')
                    <div class="step-card admin-beranda-card">
                        <div class="step-number">{{ $item->nomor }}</div>
                        <h3><strong>{{ $item->judul }}</strong></h3>
                        <p>{{ $item->deskripsi }}</p>
                        @include('admin.beranda.partials.card-actions', ['item' => $item])
                    </div>
                @endif

            @empty
                <p class="text-center">Belum ada item {{ $title }}.</p>
            @endforelse
        </div>

    </div>
</section>