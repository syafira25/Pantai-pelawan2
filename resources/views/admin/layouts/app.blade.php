<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Pantai Pelawan</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="admin-wrapper">
        <aside class="admin-sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a href="#">Data Kuliner</a></li>
                <li><a href="#">Data Galeri</a></li>
                <li><a href="#">Data Informasi</a></li>
                <li><a href="#">Data Pesan</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="admin-logout-btn">Logout</button>
                    </form>
                </li>
            </ul>
        </aside>

        <main class="admin-content">
            @yield('content')
        </main>
    </div>

</body>
</html>