<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Wisatawan | Pantai Pelawan</title>
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
                linear-gradient(rgba(8, 36, 20, 0.58), rgba(8, 36, 20, 0.58)),
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
            max-width: 1180px;
            min-height: 650px;
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            border-radius: 34px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.20);
            box-shadow: 0 28px 70px rgba(0, 0, 0, 0.28);
        }

        .login-left {
            position: relative;
            padding: 58px 55px;
            color: #ffffff;
            background:
                linear-gradient(135deg, rgba(9, 60, 34, 0.96), rgba(34, 197, 94, 0.72)),
                url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1600&q=80');
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }

        .login-left::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 20% 20%, rgba(255,255,255,0.14), transparent 24%),
                radial-gradient(circle at 90% 70%, rgba(255,255,255,0.16), transparent 28%),
                linear-gradient(135deg, rgba(2, 44, 24, 0.55), rgba(34, 197, 94, 0.20));
            pointer-events: none;
        }

        .login-left::after {
            content: "";
            position: absolute;
            width: 520px;
            height: 520px;
            right: -210px;
            bottom: -150px;
            border-radius: 50%;
            border: 2px solid rgba(255, 255, 255, 0.14);
            background: rgba(255, 255, 255, 0.06);
        }

        .login-left-content {
            position: relative;
            z-index: 2;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .brand-badge {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            width: fit-content;
            padding: 12px 20px;
            border-radius: 999px;
            background: rgba(255,255,255,0.14);
            border: 1px solid rgba(255,255,255,0.20);
            box-shadow: 0 12px 28px rgba(0,0,0,0.12);
            margin-bottom: 68px;
        }

        .brand-logo {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            background: #ffffff;
            color: #14532d;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            font-weight: 800;
        }

        .brand-text strong {
            display: block;
            font-size: 16px;
            font-weight: 800;
            line-height: 1.2;
        }

        .brand-text span {
            display: block;
            font-size: 13px;
            color: rgba(255,255,255,0.82);
            margin-top: 3px;
        }

        .login-left h1 {
            font-size: 56px;
            line-height: 1.12;
            font-weight: 800;
            letter-spacing: -1px;
            margin-bottom: 18px;
            text-shadow: 0 8px 24px rgba(0,0,0,0.16);
        }

        .title-line {
            width: 80px;
            height: 6px;
            border-radius: 999px;
            background: #6ee787;
            margin-bottom: 30px;
            position: relative;
        }

        .title-line::after {
            content: "";
            position: absolute;
            right: -18px;
            top: 0;
            width: 9px;
            height: 6px;
            border-radius: 999px;
            background: rgba(110, 231, 135, 0.65);
        }

        .login-left p {
            font-size: 18px;
            line-height: 1.8;
            color: #ecfdf5;
            max-width: 590px;
        }

        .feature-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
            margin-top: 52px;
            max-width: 610px;
        }

        .feature-item {
            text-align: center;
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 14px;
            border-radius: 24px;
            background: rgba(255,255,255,0.16);
            border: 1px solid rgba(255,255,255,0.16);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            box-shadow: 0 16px 30px rgba(0,0,0,0.12);
        }

        .feature-item span {
            font-size: 13px;
            font-weight: 600;
            color: #ffffff;
        }

        .trust-badge {
            margin-top: auto;
            width: fit-content;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 22px;
            border-radius: 999px;
            background: rgba(255,255,255,0.14);
            border: 1px solid rgba(255,255,255,0.14);
            font-size: 14px;
            font-weight: 600;
            color: #ffffff;
        }

        .trust-badge-icon {
            width: 34px;
            height: 34px;
            border-radius: 12px;
            background: rgba(255,255,255,0.20);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-right {
            background: rgba(255,255,255,0.97);
            padding: 44px 42px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 470px;
            padding: 26px 0;
        }

        .login-icon {
            width: 78px;
            height: 78px;
            border-radius: 50%;
            background: #e9f7ed;
            color: #166534;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 35px;
        }

        .login-card-header {
            text-align: center;
            margin-bottom: 28px;
        }

        .login-card-header h2 {
            font-size: 32px;
            color: #14532d;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .login-card-header p {
            font-size: 14px;
            color: #6b7280;
            line-height: 1.7;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 13px 16px;
            border-radius: 14px;
            margin-bottom: 18px;
            font-size: 13px;
            line-height: 1.7;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 13px 16px;
            border-radius: 14px;
            margin-bottom: 18px;
            font-size: 13px;
            line-height: 1.7;
        }

        .alert-error ul {
            padding-left: 18px;
            margin: 0;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .input-wrap {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: #64748b;
            z-index: 1;
        }

        .form-control {
            width: 100%;
            height: 58px;
            padding: 0 18px 0 54px;
            border-radius: 17px;
            border: 1px solid #d7dee5;
            outline: none;
            font-size: 14px;
            color: #111827;
            background: #ffffff;
            font-family: 'Poppins', sans-serif;
            transition: all 0.25s ease;
        }

        .form-control:focus {
            border-color: #22c55e;
            box-shadow: 0 0 0 5px rgba(34, 197, 94, 0.12);
        }

        .form-control::placeholder {
            color: #8b95a1;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
            margin: 4px 0 20px;
        }

        .remember-box {
            display: flex;
            align-items: center;
            gap: 9px;
            color: #64748b;
            font-size: 13px;
            font-weight: 500;
        }

        .remember-box input {
            width: 16px;
            height: 16px;
            accent-color: #16a34a;
        }

        .forgot-link {
            font-size: 13px;
            color: #16a34a;
            font-weight: 800;
            text-decoration: none;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .login-btn {
            width: 100%;
            height: 60px;
            margin-top: 8px;
            border: none;
            border-radius: 18px;
            background: linear-gradient(135deg, #14532d, #22c55e);
            color: #ffffff;
            font-size: 17px;
            font-weight: 800;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            box-shadow: 0 16px 34px rgba(34, 197, 94, 0.22);
            transition: all 0.25s ease;
            position: relative;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 22px 42px rgba(34, 197, 94, 0.28);
        }

        .login-btn span {
            position: absolute;
            right: 24px;
            font-size: 23px;
            top: 50%;
            transform: translateY(-50%);
        }

        .login-footer {
            text-align: center;
            margin-top: 22px;
            font-size: 14px;
            color: #6b7280;
        }

        .login-footer a {
            color: #16a34a;
            font-weight: 800;
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        .back-home {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 48px;
            margin-top: 16px;
            border-radius: 15px;
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: #14532d;
            font-size: 14px;
            font-weight: 800;
            text-decoration: none;
            transition: 0.25s ease;
        }

        .back-home:hover {
            background: #dcfce7;
        }

        @media (max-width: 992px) {
            .login-wrapper {
                grid-template-columns: 1fr;
            }

            .login-left {
                padding: 42px 32px;
            }

            .login-right {
                padding: 42px 28px;
            }

            .brand-badge {
                margin-bottom: 40px;
            }

            .login-left h1 {
                font-size: 42px;
            }

            .feature-row {
                grid-template-columns: 1fr;
                gap: 16px;
                max-width: 100%;
            }

            .feature-item {
                display: flex;
                align-items: center;
                gap: 14px;
                text-align: left;
            }

            .feature-icon {
                margin: 0;
                width: 54px;
                height: 54px;
                border-radius: 18px;
                font-size: 21px;
            }

            .trust-badge {
                margin-top: 32px;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 16px 10px;
            }

            .login-wrapper {
                border-radius: 24px;
            }

            .login-left,
            .login-right {
                padding: 30px 20px;
            }

            .login-left h1 {
                font-size: 34px;
            }

            .login-left p {
                font-size: 15px;
            }

            .login-card-header h2 {
                font-size: 26px;
            }

            .form-control {
                height: 54px;
            }

            .login-btn {
                height: 56px;
            }
        }
    </style>
</head>
<body>

<div class="login-wrapper">

    <div class="login-left">
        <div class="login-left-content">

            <div class="brand-badge">
                <div class="brand-logo">🌴</div>
                <div class="brand-text">
                    <strong>Pantai Pelawan</strong>
                    <span>Sistem Informasi Pariwisata</span>
                </div>
            </div>

            <h1>Masuk Sekarang</h1>
            <div class="title-line"></div>

            <p>
                Masuk ke akun wisatawan untuk melakukan pemesanan tiket,
                melihat riwayat transaksi, mengakses e-ticket, serta menikmati
                layanan digital Pantai Pelawan secara lebih mudah dan praktis.
            </p>

            <div class="feature-row">
                <div class="feature-item">
                    <div class="feature-icon">🎫</div>
                    <span>Pemesanan Tiket</span>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">📄</div>
                    <span>Riwayat Pesanan</span>
                </div>

                <div class="feature-item">
                    <div class="feature-icon">🛡️</div>
                    <span>Akses E-Ticket</span>
                </div>
            </div>

        </div>
    </div>

    <div class="login-right">
        <div class="login-card">

            <div class="login-icon">👤</div>

            <div class="login-card-header">
                <h2>Login Wisatawan</h2>
                <p>Masukkan email dan password untuk mengakses akun Anda.</p>
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
                    <div class="input-wrap">
                        <span class="input-icon">✉️</span>
                        <input
                            id="email"
                            class="form-control"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Email"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-wrap">
                        <span class="input-icon">🔒</span>
                        <input
                            id="password"
                            class="form-control"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Password"
                        >
                    </div>
                </div>

                <div class="form-row">
                    <label class="remember-box" for="remember_me">
                        <input id="remember_me" type="checkbox" name="remember">
                        <span>Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            Lupa password?
                        </a>
                    @endif
                </div>

                <button type="submit" class="login-btn">
                    Login
                    <span>→</span>
                </button>
            </form>

            <div class="login-footer">
                Belum punya akun?
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Daftar sekarang</a>
                @else
                    <a href="{{ url('/register') }}">Daftar sekarang</a>
                @endif
            </div>

            <a href="{{ url('/') }}" class="back-home">
                Kembali ke Halaman Utama
            </a>

        </div>
    </div>

</div>

</body>
</html>