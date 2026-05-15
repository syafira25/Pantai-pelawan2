<nav class="navbar">
    <div class="container nav-wrapper">

        <div class="logo">
            <a href="{{ route('home') }}">Pantai Pelawan</a>
        </div>

        <ul class="nav-menu">
            <li>
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    Beranda
                </a>
            </li>

            <li>
                <a href="{{ route('profil.pantai') }}" class="{{ request()->routeIs('profil.pantai') ? 'active' : '' }}">
                    Profil
                </a>
            </li>
<!--
            <li>
                <a href="{{ route('daya.tarik') }}" class="{{ request()->routeIs('daya.tarik*') ? 'active' : '' }}">
                    Daya Tarik
                </a>
            </li>
-->
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
                        <span>👤</span>
                        <span>{{ Auth::user()->name }}</span>
                        <span>▾</span>
                    </button>

                    <div class="user-dropdown-menu" id="userDropdownMenu">
                        <div class="user-info-box">
                            <div class="user-info-avatar">👤</div>
                            <div>
                                <h4>{{ Auth::user()->name }}</h4>
                                <p>{{ Auth::user()->email }}</p>
                            </div>
                        </div>

                        <a href="{{ route('akun.saya') }}" class="dropdown-link">
                            <span>👤</span>
                            <b>Akun Saya</b>
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-logout">
                                <span>🚪</span>
                                <b>Keluar</b>
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

                <script>
                function toggleUserDropdown(event) {
                    event.stopPropagation();
                    const menu = document.getElementById('userDropdownMenu');
                    menu.classList.toggle('show');
                }

                document.addEventListener('click', function(event) {
                    const dropdown = document.querySelector('.user-dropdown');

                    if (dropdown && !dropdown.contains(event.target)) {
                        const menu = document.getElementById('userDropdownMenu');
                        if (menu) {
                            menu.classList.remove('show');
                        }
                    }
                });
            </script>
            @endauth
        </ul>

    </div>
</nav>