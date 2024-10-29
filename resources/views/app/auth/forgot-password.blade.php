<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Lupa Password - Antam Pro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('public')}}/Lay/css/layui.css">
    <link href="{{asset('public')}}/css/main.css" rel="stylesheet">
    <link href="{{asset('public')}}/login.css" rel="stylesheet">
    <style>
        body {
            background: #f8f8f8;
            font-family: Arial, sans-serif;
            color: #333;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .dummy-logo-left {
            position: absolute;
            top: 10px;
            width: auto;
            height: 30px;
        }
        
        .dummy-logo-right {
            position: absolute;
            top: 10px;
            width: 80px;
            height: 40px;
        }
        
        .dummy-logo-left {
            left: 25px;
        }
        .dummy-logo-right {
            right: 25px;
        }
        .container {
            max-width: 400px;
            width: 90%;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 5px;
            box-sizing: border-box;
        }
        .logo {
            width: 150px;
            margin-bottom: 20px;
        }
        .form-title {
            font-size: 24px;
            color: #36c726;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-container {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-item {
            width: 100%;
            margin-bottom: 20px;
            position: relative;
        }
        .form-item input {
            width: 100%;
            padding: 8px 70px 8px 70px;
            height: 40px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }
        .form-item i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            color: #36c726;
        }
        .form-item i.fa-phone {
            left: 10px;
        }
        .form-item i.fa-lock {
            left: 10px;
        }
        .form-item i.fa-eye, .form-item i.fa-eye-slash {
            right: 10px;
            cursor: pointer;
        }
        .forgot-password {
            display: flex;
            justify-content: flex-end;
            width: 100%;
            margin-bottom: 20px;
            color: #36c726;
        }
        .submit-btn, .register-btn {
            width: 100%;
            height: 45px;
            border: none;
            border-radius: 5px;
            background: #36c726;
            color: #FFF;
            font-weight: 600;
            cursor: pointer;
            margin-bottom: 10px;
        }
        .submit-btn {
            margin-top: 20px;
        }
        .separator {
            width: 100%;
            text-align: center;
            margin: 20px 0;
            color: #36c726;
            display: flex;
            align-items: center;
        }
        .separator::before, .separator::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #ddd;
        }
        .separator:not(:empty)::before {
            margin-right: .25em;
        }
        .separator:not(:empty)::after {
            margin-left: .25em;
        }
        .register-container {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-item input::placeholder {
            color: #a9a9a9; 
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="container">
    <img src="{{asset(setting('logo'))}}" class="logo" alt="Logo">
    <div class="form-container">
        <div class="form-title">Pemulihan Akun</div>
        <form action="{{ route('password.email') }}" method="post">
            @csrf
            <div class="form-item">
                <i class="fa fa-phone"></i>
                <input type="tel" id="phone" name="phone" placeholder="Masukkan nomor HP anda" autocomplete="off" pattern="[0-9]*" inputmode="numeric" maxlength="15">
            </div>
            <button type="submit" class="submit-btn">KIRIM OTP</button>
        </form>
        <div class="separator">Atau</div>
        <button class="register-btn" onclick="window.location.href='{{url('register')}}'">DAFTAR</button>
    </div>
</div>
@include('alert-message')
<script>
    document.getElementById('phone').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>
</body>
</html>
