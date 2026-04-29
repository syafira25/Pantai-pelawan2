<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Pantai Pelawan</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            background:
                linear-gradient(rgba(8, 36, 20, 0.55), rgba(8, 36, 20, 0.55)),
                url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 18px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 1150px;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            background: rgba(255, 255, 255, 0.10);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 30px;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.20);
        }

        .login-left {
            padding: 55px 48px;
            color: #ffffff;
            position: relative;
            background:
                linear-gradient(135deg, rgba(20, 83, 45, 0.88), rgba(34, 197, 94, 0.72));
        }

        .login-left::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top left, rgba(255,255,255,0.14), transparent 25%),
                radial-gradient(circle at bottom right, rgba(255,255,255,0.10), transparent 20%);
            pointer-events: none;
        }

        .login-left-content {
            position: relative;
            z-index: 1;
        }

        .brand-badge {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 18px;
            border-radius: 999px;
            background: rgba(255,255,255,0.14);
            border: 1px solid rgba(255,255,255,0.22);
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 26px;
        }

        .brand-logo {
            width: 42px;
            height: 42px;
            border-radius: 14px;
            background: #ffffff;
            color: #14532d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 20px;
            box-shadow: 0 10px 24px rgba(0,0,0,0.12);
        }

        .login-left h1 {
            font-size: 42px;
            line-height: 1.2;
            font-weight: 800;
            margin-bottom: 16px;
        }

        .login-left p {
            font-size: 15px;
            line-height: 1.9;
            color: #ecfdf5;
            max-width: 520px;
            margin-bottom: 30px;
        }

        .login-points {
            display: grid;
            gap: 14px;
            margin-top: 26px;
        }

        .login-point {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 16px;
            border-radius: 18px;
            background: rgba(255,255,255,0.10);
            border: 1px solid rgba(255,255,255,0.10);
        }

        .login-point-icon {
            min-width: 38px;
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: rgba(255,255,255,0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .login-point h4 {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 3px;
        }

        .login-point p {
            margin: 0;
            font-size: 13px;
            line-height: 1.7;
            color: #dcfce7;
        }

        .login-right {
            background: rgba(255, 255, 255, 0.96);
            padding: 55px 42px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
        }

        .login-card-header {
            margin-bottom: 26px;
        }

        .login-card-header h2 {
            font-size: 30px;
            color: #14532d;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .login-card-header p {
            font-size: 14px;
            color: #6b7280;
            line-height: 1.7;
        }

        .alert-success,
        .alert-error {
            padding: 13px 16px;
            border-radius: 14px;
            margin-bottom: 18px;
            font-size: 13px;
            line-height: 1.7;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .alert-error ul {
            padding-left: 18px;
            margin: 0;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #14532d;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            height: 50px;
            padding: 0 16px;
            border-radius: 14px;
            border: 1px solid #d1d5db;
            outline: none;
            font-size: 14px;
            color: #111827;
            background: #ffffff;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #22c55e;
            box-shadow: 0 0 0 4px rgba(34, 197, 94, 0.12);
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            margin-bottom: 22px;
            flex-wrap: wrap;
        }

        .remember-box {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            color: #4b5563;
        }

        .remember-box input {
            width: 16px;
            height: 16px;
            accent-color: #16a34a;
        }

        .login-link {
            font-size: 13px;
            font-weight: 600;
            color: #16a34a;
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        .login-btn {
            width: 100%;
            height: 52px;
            border: none;
            border-radius: 15px;
            background: linear-gradient(135deg, #14532d, #22c55e);
            color: #ffffff;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 14px 28px rgba(34, 197, 94, 0.18);
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 34px rgba(34, 197, 94, 0.22);
        }

        .login-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: #6b7280;
            line-height: 1.8;
        }

        .login-footer a {
            color: #16a34a;
            text-decoration: none;
            font-weight: 600;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 992px) {
            .login-wrapper {
                grid-template-columns: 1fr;
            }

            .login-left,
            .login-right {
                padding: 38px 28px;
            }

            .login-left h1 {
                font-size: 34px;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 18px 12px;
            }

            .login-left,
            .login-right {
                padding: 28px 20px;
            }

            .login-left h1 {
                font-size: 28px;
            }

            .login-card-header h2 {
                font-size: 24px;
            }

            .form-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .login-btn {
                height: 50px;
            }
        }
    </style>
</head>
<body>

    <div class="login-wrapper">

        <div class="login-left">
            <div class="login-left-content">
                <div class="brand-badge">
                    <div class="brand-logo">P</div>
                    <span>Sistem Informasi Pariwisata</span>
                </div>

                <h1>Kelola Pantai Pelawan dengan Tampilan yang Lebih Modern</h1>
                <p>
                    Halaman login ini digunakan untuk mengakses panel admin Pantai Pelawan.
                    Admin dapat mengelola informasi wisata, galeri, kuliner, pesan pengunjung,
                    serta layanan digital lainnya dalam satu sistem terintegrasi.
                </p>

                <div class="login-points">
                    <div class="login-point">
                        <div class="login-point-icon">📄</div>
                        <div>
                            <h4>Kelola Informasi Wisata</h4>
                            <p>Atur data profil, fasilitas, daya tarik, dan informasi pantai secara lebih terstruktur.</p>
                        </div>
                    </div>

                    <div class="login-point">
                        <div class="login-point-icon">🖼️</div>
                        <div>
                            <h4>Kelola Galeri dan Kuliner</h4>
                            <p>Tambahkan dokumentasi wisata dan informasi kuliner agar website lebih menarik bagi pengunjung.</p>
                        </div>
                    </div>

                    <div class="login-point">
                        <div class="login-point-icon">🎫</div>
                        <div>
                            <h4>Pantau Layanan Digital</h4>
                            <p>Kelola data tiket, pembayaran, dan interaksi pengunjung melalui dashboard admin.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="login-right">
            <div class="login-card">
                <div class="login-card-header">
                    <h2>Masuk ke Sistem</h2>
                    <p>Silakan login menggunakan email dan password yang sudah terdaftar.</p>
                </div>

                @if (session('status'))
                    <div class="alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert-error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input
                            id="email"
                            class="form-control"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Masukkan email"
                        >
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input
                            id="password"
                            class="form-control"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Masukkan password"
                        >
                    </div>

                    <div class="form-row">
                        <label class="remember-box" for="remember_me">
                            <input id="remember_me" type="checkbox" name="remember">
                            <span>Ingat saya</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="login-link" href="{{ route('password.request') }}">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="login-btn">
                        Login Sekarang
                    </button>
                </form>

                <div class="login-footer">
                    Kembali ke <a href="{{ route('home') }}">halaman utama website</a>
                </div>
            </div>
        </div>

    </div>

</body>
</html>