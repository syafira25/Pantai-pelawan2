<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Wisatawan | Pantai Pelawan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body {
            font-family:'Poppins', sans-serif;
            min-height:100vh;
            background:
                linear-gradient(rgba(8,36,20,0.7), rgba(8,36,20,0.7)),
                url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e');
            background-size:cover;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .register-container {
            width:100%;
            max-width:1100px;
            display:grid;
            grid-template-columns:1fr 1fr;
            background:rgba(255,255,255,0.1);
            backdrop-filter:blur(15px);
            border-radius:25px;
            overflow:hidden;
            box-shadow:0 20px 60px rgba(0,0,0,0.2);
        }

        .left {
            padding:50px;
            color:white;
            background:linear-gradient(135deg,#14532d,#22c55e);
        }

        .left h1 {
            font-size:38px;
            margin-bottom:15px;
        }

        .left p {
            font-size:14px;
            line-height:1.7;
        }

        .right {
            background:white;
            padding:50px;
        }

        h2 {
            color:#14532d;
            margin-bottom:20px;
        }

        input {
            width:100%;
            height:50px;
            margin-bottom:15px;
            border-radius:12px;
            border:1px solid #ddd;
            padding:0 15px;
        }

        input:focus {
            border-color:#22c55e;
            outline:none;
            box-shadow:0 0 0 3px rgba(34,197,94,0.2);
        }

        button {
            width:100%;
            height:50px;
            background:linear-gradient(135deg,#14532d,#22c55e);
            border:none;
            color:white;
            border-radius:12px;
            font-weight:bold;
            cursor:pointer;
        }

        .link {
            margin-top:15px;
            text-align:center;
            font-size:13px;
        }

        a {
            color:#16a34a;
            text-decoration:none;
            font-weight:600;
        }

        .error {
            color:red;
            font-size:13px;
            margin-bottom:10px;
        }

        @media(max-width:900px){
            .register-container{
                grid-template-columns:1fr;
            }
        }
    </style>
</head>
<body>

<div class="register-container">

    <div class="left">
        <h1>Daftar Sekarang</h1>
        <p>
            Buat akun untuk melakukan pemesanan tiket wisata,
            memberikan ulasan, serta menikmati layanan digital
            Pantai Pelawan secara lebih mudah dan praktis.
        </p>
    </div>

    <div class="right">
        <h2>Register Wisatawan</h2>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <input type="text" name="name" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>

            <button type="submit">Register</button>
        </form>

        <div class="link">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login</a>
        </div>
    </div>

</div>

</body>
</html>