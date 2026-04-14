<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantai Pelawan</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container">
            <p>© 2026 Pantai Pelawan. Semua Hak Dilindungi.</p>
        </div>
    </footer>

</body>
</html>