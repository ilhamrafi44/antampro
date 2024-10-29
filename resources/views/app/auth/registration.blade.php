<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register an account - Adstro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('public')}}/Lay/css/layui.css">
    <link href="{{asset('public')}}/css/main.css" rel="stylesheet">
    <link href="{{asset('public')}}/register.css" rel="stylesheet">
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
            padding: 8px 70px; 
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
        .form-item i.fa-envelope {
            left: 10px;
        }
        .form-item i.fa-eye, .form-item i.fa-eye-slash {
            right: 10px;
            cursor: pointer;
        }
        .forgot-password {
            display: flex;
            justify-content: center;
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
        .vvcode {
            text-align: center;
            margin-top: 10px;
            font-style: italic;
            filter: blur(1px);
            font-size: 28px;
        }
    </style>
</head>
<?php $code = rand(1111, 9999); ?>
<body>

<div class="container">
    <img src="{{asset(setting('logo'))}}" class="logo" alt="Logo">
    <div class="form-container">
        <div class="form-title">Daftarkan Akun</div>
        <form id="registration-form" action="{{url('register')}}" method="post" onsubmit="return loginAuth()">
            @csrf
            <div class="form-item">
                <i class="fa fa-phone"></i>
                <input type="tel" id="phone" name="phone" placeholder="Masukkan nomor HP Anda" autocomplete="off" pattern="[0-9]*" inputmode="numeric" maxlength="15">
            </div>
            <div class="form-item">
                <i class="fa fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" autocomplete="off" maxlength="20">
            </div>
            <div class="form-item">
                <i class="fa fa-lock"></i>
                <input type="password" id="password1" name="confirm_password" placeholder="Konfirmasi kata sandi" autocomplete="off" maxlength="20">
            </div>
            <div class="form-item">
                <i class="fa fa-envelope"></i>
                <input type="text" id="invitation" name="ref_by" placeholder="Kode Undangan" autocomplete="off" maxlength="6" pattern="[0-9]*" inputmode="numeric" value="{{isset($ref_by) && !empty($ref_by) && $ref_by != null ? $ref_by : ''}}">
            </div>
            <div class="form-item">
                <i class="fa fa-envelope"></i>
                <input type="text" id="code" name="verification" placeholder="Kode verifikasi" autocomplete="off" maxlength="4" pattern="[0-9]*" inputmode="numeric">
                <div style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%);">
                    <h2 class="vvcode">{{$code}}</h2>
                </div>
            </div>
            <div class="forgot-password">
                <a href="{{url('login')}}">Sudah punya akun? Login sekarang</a>
            </div>
            <button type="submit" class="submit-btn">BUAT AKUN</button>
            @include('alert-message')
        </form>
    </div>
</div>

<script>
    var code = '{{$code}}';
    function loginAuth() {
        let verification = document.querySelector('input[name="verification"]').value;
        if (verification != code) {
            alert('Kode verifikasi salah');
            return false;
        }
        return true;
    }
</script>
<script>
    document.getElementById('phone').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    document.getElementById('invitation').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    document.getElementById('code').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>

</body>
</html>
