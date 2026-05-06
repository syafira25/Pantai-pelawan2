<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="admin-shell">

    <!-- SIDEBAR -->
    <aside class="admin-sidebar">
        <div class="admin-sidebar-inner">
            <div class="admin-brand">
                <h2>Admin Panel</h2>
                <p>Pantai Pelawan</p>
            </div>

            <nav class="admin-nav">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>

                <a href="{{ route('admin.pemesanan.index') }}" class="{{ request()->routeIs('admin.pemesanan.*') ? 'active' : '' }}">
                    Pemesanan
                </a>

                <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    User
                </a>
                <a href="{{ route('admin.ulasan.index') }}" class="{{ request()->routeIs('admin.ulasan.*') ? 'active' : '' }}">
                    Kelola Ulasan
                </a>

                <div class="admin-nav-divider"></div>
                <a href="#">Beranda</a>
                <a href="{{ route('admin.profil.edit') }}" class="{{ request()->routeIs('admin.profil.*') ? 'active' : '' }}">
                    Profil
                </a>
               <a href="{{ route('admin.daya-tarik.edit') }}" class="{{ request()->routeIs('admin.daya-tarik.*') ? 'active' : '' }}">
                    Daya Tarik </a>
                <a href="{{ route('admin.informasi.edit') }}" class="{{ request()->routeIs('admin.informasi.*') ? 'active' : '' }}">
                    Informasi
                </a>
               <a href="{{ route('admin.kuliner.index') }}" class="{{ request()->routeIs('admin.kuliner.*') ? 'active' : '' }}">
    Kuliner
</a>
                <a href="#">Galeri</a>
                <a href="#">Fasilitas</a>
            </nav>

            <div class="admin-sidebar-footer">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="admin-logout-btn">Logout</button>
                </form>
            </div>
        </div>
    </aside>

    <!-- CONTENT -->
    <main class="admin-main">
        @yield('content')
    </main>

</div>

</body>
</html>