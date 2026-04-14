<nav class="navbar">
    <div class="container nav-wrapper">

        <div class="logo">
            <a href="{{ route('dashboard') }}">Pantai Pelawan</a>
        </div>

        <ul class="nav-menu">

            <li>
                <a href="{{ route('dashboard') }}" 
                   class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                   Beranda
                </a>
            </li>

            <li>
                <a href="{{ route('profil.pantai') }}" 
                   class="{{ request()->routeIs('profil.pantai') ? 'active' : '' }}">
                   Profil Pantai
                </a>
            </li>

            <li>
                <a href="{{ route('daya.tarik') }}" 
                   class="{{ request()->routeIs('daya.tarik*') ? 'active' : '' }}">
                   Daya Tarik
                </a>
            </li>

            <li>
                <a href="{{ route('fasilitas') }}" 
                   class="{{ request()->routeIs('fasilitas*') ? 'active' : '' }}">
                   Fasilitas
                </a>
            </li>

            <li>
                <a href="{{ route('galeri') }}" 
                   class="{{ request()->routeIs('galeri*') ? 'active' : '' }}">
                   Galeri
                </a>
            </li>

            <li>
                <a href="{{ route('informasi.pantai') }}" 
                   class="{{ request()->routeIs('informasi.pantai*') ? 'active' : '' }}">
                   Informasi Pantai
                </a>
            </li>

            <li>
                <a href="{{ route('kuliner') }}" 
                   class="{{ request()->routeIs('kuliner*') ? 'active' : '' }}">
                   Kuliner
                </a>
            </li>

            <li>
                <a href="{{ route('kontak') }}" 
                   class="{{ request()->routeIs('kontak') ? 'active' : '' }}">
                   Kontak
                </a>
            </li>

            <li>
                <a href="{{ route('tiket') }}"
                class="{{ request()->routeIs('tiket') ? 'active' : '' }}">
                Tiket
                </a>
            </li>

        </ul>

    </div>
</nav>