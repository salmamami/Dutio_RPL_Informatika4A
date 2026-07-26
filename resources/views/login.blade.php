<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dutio</title>

    {{-- Icon font (untuk .input-icon / .input-group i) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- CSS Login --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@600;700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="login-card">

        {{-- BRAND --}}
        <div class="brand">
            <img src="{{ asset('assets/img/dutio-logo.png') }}" alt="Dutio Logo">
            <div class="brand-text">
                <h1>Dutio</h1>
                <p>Masuk untuk melanjutkan ke akun kamu</p>
            </div>
        </div>

        {{-- ERROR MESSAGE --}}
        @if ($errors->any())
            <div class="alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('status'))
            <div class="alert-error">
                {{ session('status') }}
            </div>
        @endif

        {{-- FORM LOGIN --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf

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
                        autofocus
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
                        placeholder="Masukkan password"
                        required
                    >
                </div>
            </div>

            {{-- SUBMIT --}}
            <button type="submit">Masuk</button>

        </form>

        <div class="login-info">
            <i class="fa-solid fa-circle-info"></i>
            <span>Hubungi Koordinator</span> untuk mendapatkan akun DUTIO
        </div>

    </div>

</body>
</html>
