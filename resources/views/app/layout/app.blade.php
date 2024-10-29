<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}</title>
    <!-- Google Fonts & Font Awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('public/v2')}}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('public/v2')}}/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('public/v2')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('public/v2')}}/assets/css/v2.css">
    <link rel="stylesheet" href="{{asset('public/v2')}}/developer.css">
    <style>
        .menu-area ul.menu li a {
            color: rgb(186, 186, 186); /* Inactive color */
        }
        .menu-area ul.menu li.active a {
            color: #C79626; /* Active color */
        }
        .menu-icon {
            font-size: 20px; /* Adjust icon size as needed */
        }
    </style>
</head>
<body>
@include('alert-message')
<div class="menu-area">
    <ul class="menu" style="margin: 0;">
        <li class="menu-item active">
            <a href="{{route('dashboard')}}">
                <span class="menu-content">
                    <span class="menu-icon">
                        <i class="fa fa-home"></i> <!-- Font Awesome Home Icon -->
                    </span>
                    <span class="menu-name">home</span>
                </span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('user.mining')}}">
                <span class="menu-content">
                    <span class="menu-icon">
                        <i class="fa fa-gem"></i> <!-- Font Awesome Mining Icon -->
                    </span>
                    <span class="menu-name">mining</span>
                </span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('user.team')}}">
                <span class="menu-content">
                    <span class="menu-icon">
                        <i class="fa fa-users"></i> <!-- Font Awesome Team Icon -->
                    </span>
                    <span class="menu-name">team</span>
                </span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('my.profile')}}">
                <span class="menu-content">
                    <span class="menu-icon">
                        <i class="fa fa-user"></i> <!-- Font Awesome Profile Icon -->
                    </span>
                    <span class="menu-name">mine</span>
                </span>
            </a>
        </li>
    </ul>
</div>
<!-- Scripts -->
<script src="{{asset('public/v2')}}/assets/js/jquery-3.7.1.min.js"></script>
<script src="{{asset('public/v2')}}/assets/js/owl.carousel.min.js"></script>
<script src="{{asset('public/v2')}}/assets/js/script.js"></script>
</body>
</html>
