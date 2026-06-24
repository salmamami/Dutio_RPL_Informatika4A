<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login DUTIO</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, sans-serif;
        }

        body{
            background: linear-gradient(
                135deg,
                #5B624D,
                #6E755F
            );
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .login-card{
            background:#F8F5E9;
            padding:40px;
            width:420px;
            border-radius:20px;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
        }

        .brand{
            display:flex;
            align-items:center;
            justify-content:center;
            gap:15px;
            margin-bottom:30px;
        }

        .brand img{
            width:80px;
            height:80px;
            object-fit:contain;
        }

        .brand-text{
            text-align:left;
        }

        .brand-text h1{
            color:#556B2F;
            font-size:42px;
            font-weight:800;
            line-height:1;
            margin:0;
        }

        .brand-text p{
            color:#777;
            font-size:14px;
            margin-top:5px;
        }

        .alert-error{
            background:#FEE2E2;
            color:#B91C1C;
            border:1px solid #FCA5A5;
            padding:12px;
            border-radius:10px;
            margin-bottom:20px;
            text-align:center;
            font-size:14px;
        }

        .form-group{
            margin-bottom:18px;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-weight:bold;
            color:#333;
        }

        input{
            width:100%;
            padding:12px;
            border:2px solid #D8D2BE;
            border-radius:10px;
            font-size:14px;
            background:#FFFFFF;
        }

        input:focus{
            outline:none;
            border-color:#556B2F;
        }

        .password-wrapper{
            position:relative;
        }

        .password-wrapper input{
            padding-right:45px;
        }

        .toggle-password{
            position:absolute;
            right:15px;
            top:50%;
            transform:translateY(-50%);
            cursor:pointer;
            color:#777;
        }

        .forgot-password{
            text-align:right;
            margin-top:-5px;
            margin-bottom:20px;
        }

        .forgot-password a{
            color:#556B2F;
            text-decoration:none;
            font-size:14px;
            font-weight:bold;
        }

        .forgot-password a:hover{
            text-decoration:underline;
        }

        button{
            width:100%;
            padding:12px;
            background:#556B2F;
            color:white;
            font-weight:bold;
            border:none;
            border-radius:10px;
            font-size:16px;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            transform:translateY(-2px);
            background:#465724;
            box-shadow:0 8px 20px rgba(85,107,47,0.3);
        }

        .footer-text{
            text-align:center;
            margin-top:20px;
            color:#7A7A7A;
            font-size:12px;
        }
    </style>
</head>
<body>

<div class="login-card">

    <div class="brand">
        <img src="{{ asset('assets/img/dutio-logo.png') }}" alt="Logo DUTIO">

        <div class="brand-text">
            <h1>DUTIO</h1>
            <p>Sistem Manajemen Piket Asrama</p>
        </div>
    </div>

    @if(session('error'))
        <div class="alert-error">
            <i class="fas fa-exclamation-circle"></i>
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <div class="form-group">
            <label>Email</label>
            <input
                type="email"
                name="email"
                placeholder="Masukkan email"
                required>
        </div>

        <div class="form-group">
            <label>Password</label>

            <div class="password-wrapper">
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required>

                <i class="fas fa-eye toggle-password"
                   onclick="togglePassword()"></i>
            </div>
        </div>

        <div class="forgot-password">
            <a href="/forgot-password">
                Lupa Password?
            </a>
        </div>

        <button type="submit">
            Login
        </button>

    </form>

    <p class="footer-text">
        © 2026 DUTIO - Informatika 4A
    </p>

</div>

<script>
function togglePassword() {
    const password = document.getElementById('password');
    const icon = document.querySelector('.toggle-password');

    if (password.type === 'password') {
        password.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        password.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>

</body>
</html>