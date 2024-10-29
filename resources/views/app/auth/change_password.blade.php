<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Update Password - Antam Pro</title>
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
        .form-item i.fa-lock {
            left: 10px;
        }
        .submit-btn {
            width: 100%;
            height: 45px;
            border: none;
            border-radius: 5px;
            background: #36c726;
            color: #FFF;
            font-weight: 600;
            cursor: pointer;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .form-item input::placeholder {
            color: #a9a9a9; /* Warna abu yang lebih gelap */
            font-size: 13px;
        }
    </style>
</head>
<body>
<img src="{{asset('public')}}/antam.png" class="dummy-logo-left" alt="Dummy Logo Left">
<img src="{{asset('public')}}/UBS.png" class="dummy-logo-right" alt="Dummy Logo Right">
<div class="container">
    <img src="{{asset(setting('logo'))}}" class="logo" alt="Logo">
    <div class="form-container">
        <div class="form-title">Ubah Password Baru</div>
        <form action="{{route('reset-password')}}" method="post">
            @csrf
            <div class="form-item">
                <i class="fa fa-lock"></i>
                <input type="password" id="password" name="password" placeholder="Password baru" autocomplete="off">
            </div>
            <div class="form-item">
                <i class="fa fa-lock"></i>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password" autocomplete="off">
            </div>
            <button type="submit" class="submit-btn">UBAH</button>
        </form>
    </div>
</div>
@include('alert-message')
<script>
    function auth() {
        document.querySelector('form').submit();
    }
</script>
</body>
</html>
