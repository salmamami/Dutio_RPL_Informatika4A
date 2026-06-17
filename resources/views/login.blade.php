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
            background:#F8F5E9;
            padding:40px;
            width:400px;
            border-radius:15px;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
        }

        .login-card h2{
            text-align:center;
            margin-bottom:30px;
            color:#4F46E5;
        }

        .form-group{
            margin-bottom:20px;
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
            font-size:52px;
            font-weight:800;
            letter-spacing:2px;
            color:#556B2F;
            margin-bottom:10px;
        }

        .subtitle{
            text-align:center;
            color:#7A7A7A;
            font-size:15px;
            margin-bottom:30px;
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

    <div class="logo">
        <i class="fas fa-clipboard-check"></i> DUTIO
    </div>

    <div class="subtitle">
        Sistem Manajemen Piket Asrama
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