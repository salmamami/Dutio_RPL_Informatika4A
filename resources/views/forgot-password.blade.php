```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password DUTIO</title>

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

        .card{
            width:420px;
            background:#F8F5E9;
            padding:40px;
            border-radius:20px;
            text-align:center;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
        }

        .icon{
            width:90px;
            height:90px;
            margin:0 auto 20px;
            background:#556B2F;
            color:white;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:38px;
        }

        h2{
            color:#556B2F;
            margin-bottom:10px;
        }

        p{
            color:#666;
            line-height:1.7;
            margin-bottom:30px;
        }

        .contact-box{
            background:#EFEAD7;
            padding:15px;
            border-radius:12px;
            margin-bottom:25px;
            color:#444;
            font-size:14px;
        }

        .btn{
            display:inline-block;
            width:100%;
            padding:12px;
            background:#556B2F;
            color:white;
            text-decoration:none;
            border-radius:10px;
            font-weight:bold;
            transition:0.3s;
        }

        .btn:hover{
            background:#465724;
        }
    </style>
</head>
<body>

    <div class="card">

        <div class="icon">
            <i class="fas fa-key"></i>
        </div>

        <h2>Lupa Password?</h2>

        <p>
            Jangan khawatir. Jika Anda tidak dapat mengakses akun DUTIO,
            silakan hubungi koordinator untuk melakukan reset password.
        </p>

        <div class="contact-box">
            <strong>DUTIO Support</strong><br>
            Hubungi Koordinator Asrama untuk bantuan reset akun.
        </div>

        <a href="/login" class="btn">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Login
        </a>

    </div>

</body>
</html>
```
