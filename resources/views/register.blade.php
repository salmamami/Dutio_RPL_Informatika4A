<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Dutio</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

<div class="login-card">

    {{-- BRAND --}}
    <div class="brand">
        <img src="{{ asset('assets/img/dutio-logo.png') }}" alt="Dutio Logo">

        <div class="brand-text">
            <h1>Dutio</h1>
            <p>Buat akun untuk bergabung dengan Dutio</p>
        </div>
    </div>


    {{-- ERROR MESSAGE --}}
    @if ($errors->any())
        <div class="alert-error">
            {{ $errors->first() }}
        </div>
    @endif



    {{-- FORM REGISTER --}}
    <form method="POST" action="{{ route('register') }}">
        @csrf


        {{-- NAMA --}}
        <div class="form-group">

            <label for="name">Nama</label>

            <div class="input-group">
                <i class="fa-regular fa-user"></i>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama lengkap"
                    required
                >
            </div>

        </div>



        {{-- EMAIL --}}
        <div class="form-group">

            <label for="email">Email</label>

            <div class="input-group">
                <i class="fa-regular fa-envelope"></i>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="nama@email.com"
                    required
                >
            </div>

        </div>



        {{-- PASSWORD --}}
        <div class="form-group">

            <label for="password">Password</label>

            <div class="password-wrapper">

                <i class="fa-solid fa-lock input-icon"></i>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Buat password"
                    required
                >

            </div>

        </div>



        {{-- CONFIRM PASSWORD --}}
        <div class="form-group">

            <label for="password_confirmation">
                Konfirmasi Password
            </label>

            <div class="password-wrapper">

                <i class="fa-solid fa-lock input-icon"></i>

                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Ulangi password"
                    required
                >

            </div>

        </div>



        {{-- BUTTON --}}
        <button type="submit">
            Daftar
        </button>


    </form>



    {{-- FOOTER --}}
    <div class="footer-text">

        Sudah punya akun?

        <a href="{{ route('login') }}">
            Masuk di sini
        </a>

    </div>


</div>


</body>
</html>