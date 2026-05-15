<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panel Pengelola')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="admin-shell">

    <aside class="admin-sidebar">
        <div class="admin-sidebar-inner">
            <div class="admin-brand">
                <h2>Panel Pengelola</h2>
                <p>Pantai Pelawan</p>
            </div>

            <nav class="admin-nav">
                <a href="{{ route('pengelola.dashboard') }}" class="{{ request()->routeIs('pengelola.dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>

                <a href="{{ route('pengelola.catatan.index') }}" class="{{ request()->routeIs('pengelola.catatan.*') ? 'active' : '' }}">
    Catatan ke Admin
</a>

                <div class="admin-nav-divider"></div>

                <a href="{{ route('home') }}" target="_blank">
                    Lihat Website User
                </a>
            </nav>

            <div class="admin-sidebar-footer">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="admin-logout-btn">Logout</button>
                </form>
            </div>
        </div>
    </aside>

    <main class="admin-main">
        @yield('content')
    </main>

</div>

</body>
</html>