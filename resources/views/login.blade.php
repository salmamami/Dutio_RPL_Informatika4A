<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Login DUTIO</title>

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
            position:relative;
            background:#F8F5E9;
            padding:30px;
            width:360px;
            border-radius:20px;
            box-shadow:0 15px 35px rgba(0,0,0,0.15);
        }

        .login-card h2{
            text-align:center;
            margin-bottom:30px;
            color:#4F46E5;
        }

        .form-group{
            margin-bottom:20px;
        }

        .forgot-password{
            text-align:right;
            margin-bottom:20px;
        }

        .forgot-password a{
            text-decoration:none;
            color:#556B2F;
            font-size:13px;
            font-weight:600;
        }

        .forgot-password a:hover{
            text-decoration:underline;
        }

        label{
            display:block;
            margin-bottom:8px;
            font-weight:bold;
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

        .alert-error{
            background:#FEE2E2;
            color:#B91C1C;
            border:1px solid #FCA5A5;
            padding:10px;
            border-radius:8px;
            margin-bottom:15px;
            text-align:center;
            font-size:14px;
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
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37,99,235,0.3);
            background:#465724;
        }

        .logo{
            text-align:center;
            font-size:38px;
            font-weight:800;
            letter-spacing:2px;
            color:#556B2F;
            margin-bottom:5px;
        }

        .logo-container{
            display:flex;
            justify-content:center;
            align-items:center;
            gap:12px;
            margin-bottom:15px;
        }

        .logo-icon{
            position:absolute;
            top:20px;
            right:20px;

            width:50px;
            height:50px;

            border-radius:12px;
            background: transparent;

            display:flex;
            justify-content:center;
            align-items:center;

            color:white;
            font-size:10px;
        }

        .logo-icon img{ 
            width:75px; 
            height:75px; 
            object-fit:contain; 
        }

        .logo-text{
            font-size:42px;
            font-weight:900;
            letter-spacing:3px;
            color:#556B2F;
        }

        .welcome-text{
            text-align:center;
            font-size:16px;
            font-weight:600;
            color:#3E4A2C;
            margin-top:10px;
            margin-bottom:6px;
            line-height:1.3;
        }

        .subtitle{
            text-align:center;
            color:#6B7280;
            font-size:13px;
            line-height:1.5;
            margin-bottom:25px;
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

    <div class="logo-container">

    <div class="logo-icon">
       <img src="{{ asset('assets/img/dutio-logo.png') }}" alt="DUTIO Logo">
    </div>

    <div class="logo-text">
        DUTIO
    </div>

</div>

    <div class="welcome-text">
        Crew & Captain, Welcome Aboard!
    </div>

    <div class="subtitle">
        Mari wujudkan sistem piket yang tertib dan terkoordinasi 🚀
    </div>

    <form method="POST" action="/login">
        @csrf

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="📧 Masukkan email">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="🔒 Masukkan password">
        </div>

        <div class="forgot-password">
            <a href="/forgot-password">Lupa Password?</a>
        </div>

        @if(session('error'))
            <div class="alert-error">
                {{ session('error') }}
            </div>
        @endif

        <button type="submit">
            Login
        </button>

    </form>

    <p class="footer-text">
        © 2026 DUTIO - Informatika 4A
    </p>

</div>

</body>
</html>