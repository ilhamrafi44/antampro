<html>
<head>
    <title>{{env('APP_NAME')}}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" type="text/css" href="{{asset('public')}}/Abouts/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="{{asset('public')}}/Abouts/style-new.css" media="all">
    <style>
        .sectionHeading .logo {
            display: block;
            height: 164px;
            width: 250px;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            margin: 0 auto 60px;
            font-size: 34px;
        }
    </style>
</head>
<body>
<div style="display: flex;justify-content: space-between;padding: 15px;position: fixed;left: 0;top: 0;width: 100%;overflow: hidden;z-index: 88;background: linear-gradient( 180deg, #60d333 0%, #60d333 100%);">
    <div><img onclick="window.location.href='{{url('dashboard')}}'" style="width: 20px;" src="https://img.icons8.com/ios-glyphs/30/double-left--v1.png" alt=""></div>
    <div style="font-size: 18px;">About us</div>
    <div></div>
</div>
<section class="section" style="margin-top: 50px;">
    <div class="main-container">
        <section class="sectionHeading">
            <div class="container">
                <h1 class="title light color-white">About Us</h1>
                <p class="desc bold">
                    You now have the power to move things
                </p>
            </div>
        </section>
    </div>
</section>

<section class="page-content">
    <div class="container">
        <p>
            Living in the city, we never have enough time to do all the
            things we want to do.
        </p>
        <p>
            {{env('APP_NAME')}} can change the way you move things, how you shop and
            lets you access your city like never before. We’re an app
            that connects you to the nearest delivery partner who can
            make purchases, pick up items from any store or restaurant
            in the city and bring them to you.
        </p>
        <p>
            It’s never easy to make purchases or drop off packages when
            you get busy with work, get stuck in traffic, or you might
            even end up forgetting about it completely.
        </p>
        <p>
            All you need to do is,<br>Tell us where to go, what needs
            to be done and when.<br>What happens next? Sit back, and
            let us worry about your task-at-hand.<br>You could say
            that we are always on the move for you.
        </p>

    </div>
</section>
<div style="padding:40px;"></div>
</body>
</html>
