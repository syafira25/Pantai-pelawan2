<nav class="navbar">
    <div class="container nav-wrapper">

        <div class="logo">
            <a href="{{ route('dashboard') }}">Pantai Pelawan</a>
        </div>

        <ul class="nav-menu">
            <li>
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    Beranda
                </a>
            </li>

            <li>
                <a href="{{ route('profil.pantai') }}" class="{{ request()->routeIs('profil.pantai') ? 'active' : '' }}">
                    Profil
                </a>
            </li>

            <li>
                <a href="{{ route('daya.tarik') }}" class="{{ request()->routeIs('daya.tarik*') ? 'active' : '' }}">
                    Daya Tarik
                </a>
            </li>

            <li>
                <a href="{{ route('informasi.pantai') }}" class="{{ request()->routeIs('informasi.pantai*') ? 'active' : '' }}">
                    Informasi
                </a>
            </li>

            <li>
                <a href="{{ route('kuliner') }}" class="{{ request()->routeIs('kuliner*') ? 'active' : '' }}">
                    Kuliner
                </a>
            </li>

            <li>
                <a href="{{ route('galeri') }}" class="{{ request()->routeIs('galeri*') ? 'active' : '' }}">
                    Galeri
                </a>
            </li>

            <li>
                <a href="{{ route('fasilitas') }}" class="{{ request()->routeIs('fasilitas*') ? 'active' : '' }}">
                    Fasilitas
                </a>
            </li>

            <li>
                <a href="{{ route('tiket') }}" class="{{ request()->routeIs('tiket*') ? 'active' : '' }}">
                    Tiket
                </a>
            </li>

            @auth
                <li class="user-dropdown">
                    <button type="button" class="user-dropdown-btn">
                        👤 {{ Auth::user()->name }} ▾
                    </button>

                    <div class="user-dropdown-menu">
                        <div class="user-info-box">
                            <div class="user-info-avatar">👤</div>
                            <div>
                                <h4>{{ Auth::user()->name }}</h4>
                                <p>{{ Auth::user()->email }}</p>
                            </div>
                        </div>

                        <a href="{{ route('akun.saya') }}" class="dropdown-link">
                            👤 Akun Saya
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-logout">
                                🚪 Keluar
                            </button>
                        </form>
                    </div>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">
                        Login
                    </a>
                </li>
            @endauth
        </ul>

    </div>
</nav>