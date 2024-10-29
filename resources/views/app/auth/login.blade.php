<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register - Platform</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    body {
        background: #f8f8f8;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        width: 100%;
        max-width: 360px;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .logo {
        width: 100px;
        margin-bottom: 20px;
    }

    .form-title {
        font-size: 20px;
        font-weight: bold;
        color: #36c726;
        margin-bottom: 30px;
    }

    .form-container {
        display: flex;
        flex-direction: column;
    }

    .form-item {
        position: relative;
        margin-bottom: 20px;
    }

    .form-item label {
        display: block;
        font-size: 14px;
        color: #666;
        margin-bottom: 5px;
        text-align: left;
    }

    .form-item input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
        box-sizing: border-box;
    }

    .captcha-container {
        display: flex;
        align-items: center;
    }

    .captcha-code {
        font-size: 18px;
        color: #333;
        margin-left: 10px;
    }

    #togglePassword {
        position: absolute;
        right: 10px;
        top: 35px;
        color: #888;
        cursor: pointer;
    }

    .submit-btn {
        width: 100%;
        padding: 12px;
        background-color: #36c726;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
    }

    .login-link {
        margin-top: 20px;
        font-size: 14px;
    }

    .login-link a {
        color: #36c726;
        text-decoration: none;
    }
    </style>
</head>

<body>
    <div class="container">
        <img src="{{asset(setting('logo'))}}" class="logo" alt="Logo">

        <div class="form-title">Masuk Platform</div>

        <form action="{{url('register')}}" method="post" class="form-container">
            @csrf
            <div class="form-item">
                <label for="phone">Nomor handphone</label>
                <input type="tel" id="phone" name="phone" placeholder="+62 Masukkan nomor ponsel Anda"
                    autocomplete="off" pattern="[0-9]*" inputmode="numeric" maxlength="15">
            </div>

            <div class="form-item">
                <label for="captcha">Captcha</label>
                <div class="captcha-container">
                    <input type="text" id="captcha" name="captcha" placeholder="Masukkan captcha" autocomplete="off">
                    <span class="captcha-code">4395</span>
                </div>
            </div>

            <div class="form-item">
                <label for="password">Kata sandi</label>
                <input type="password" id="password" name="password" placeholder="Kata sandi (≥6 karakter)"
                    autocomplete="off">
                <i class="fa fa-eye" id="togglePassword"></i>
            </div>

            <button type="submit" class="submit-btn">Mendaftar</button>

            <div class="login-link">Sudah memiliki akun? <a href="{{url('login')}}">Gabung</a></div>
        </form>
    </div>

    <script>
    // Toggle password visibility
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
    </script>
</body>

</html>
