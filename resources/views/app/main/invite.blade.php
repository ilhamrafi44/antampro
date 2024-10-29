<html xmlns="http://www.w3.org/1999/xhtml" style="font-size: 47.0667px;">
<head><title>
        Invite
    </title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('public')}}/ui/css/common.css">
    <link rel="stylesheet" href="{{asset('public')}}/ui/css/signin.css">
    <link href="{{asset('public')}}/ui/css/swiper.min.css" rel="stylesheet">
    <link href="{{asset('public')}}/ui/css/lease.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&amp;display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Prompt', sans-serif;
        }

        table, th, td {
            font-size: 12px !important;
            padding: 10px;
            border-top: 1px solid #eee;
        }

        table {
            width: 100%;
            padding: 16px 3px;
            text-align: center;
        }

        tbody {
            width: 100%;
            padding: 0px;
            margin: 0px;
            text-align: center;
        }

        input:focus {
            outline: none !important;
            border-color: #719ECE;
        }
    </style>

    <link href="{{asset('public')}}/ui/css/invite.css" rel="stylesheet">
    <style>
        .whatbtn {
            position: relative;
        }

        .whatbtn img {
            height: 20px;
            filter: invert(1);
            position: relative;
            top: 6px;
        }
    </style>

    <style>
        .kf {
            width: 1.1rem;
            height: 1.1rem;
            background: #FFFFFF;
            -webkit-box-shadow: 0px 0px 0.2rem rgb(0 0 0 / 10%);
            box-shadow: 0px 0px 0.2rem rgb(0 0 0 / 10%);
            border-radius: 50%;
            position: fixed;
            right: 0.3rem;
            top: 60%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            z-index: 29;
        }

        .kf i {
            width: 0.5rem;
            height: 0.5rem;
            background: url({{asset('public')}}/img/download.png) no-repeat;
            background-size: 0.5rem 0.5rem;
        }
        .invitation {
            padding-top: 2px;
        }
    </style>
</head>
<body style="visibility: visible;">

<div style="display: flex;justify-content: space-between;padding: 15px;position: fixed;left: 0;top: 0;width: 100%;overflow: hidden;z-index: 88;background: linear-gradient( 180deg, #60d333 0%, #60d333 100%);">
    <div><img onclick="window.location.href='{{url('dashboard')}}'" style="width: 20px;" src="https://img.icons8.com/ios-glyphs/30/double-left--v1.png" alt=""></div>
    <div style="font-size: 18px;">Invite Friends</div>
    <div></div>
</div>

<form method="post" action="" id="form1">
    <div>
        <div class="invitation">
            <div class="box" style="height: 250px; margin-top: 60px;">
                <h3 style="margin-top:30px;">My invitation link</h3>

                <div style="text-align: center; padding-top: 0px;">
                    <input type="text" id="refLink" value="{{url('register').'?inviteUsername='.auth()->user()->username}}"
                           readonly="" class="form-control"
                           style="padding: 7px 20px; margin-bottom:12px; text-align: center; border: solid #b8b6b6 1px; border-radius: 8px; height: 29px; width: 78%;">
                </div>

                <div class="btn" onclick="copyLink('{{url('register').'?inviteUsername='.auth()->user()->username}}')" style="margin-top: 8px;">Copy invitation</div>
                <div style="display: flex;">

                    <div class="btn whatbtn" style="width: 45%; margin-top: 8px;">
                        <a href=""
                           class="share/whatsapp/share" style="font-size: 12px; color: white; text-decoration: none;">
                            <img src="{{asset('public')}}/img/whats.png">Share on Whatsapp</a>
                    </div>
                    <div class="btn  whatbtn" style="width: 45%; margin-top: 8px;">
                        <a href=""
                           id="ShareOnTelegram" style="font-size: 12px; color: white; text-decoration: none;">
                            <img src="{{asset('public')}}/img/download1.png">Share on Telegram</a>
                    </div>
                </div>
            </div>
            <div class="box2" style="height: 400px;">
                <h3>Invitation rule description</h3>
                <div>

                    <p> Direct recommendation (Level 1): {{setting('first_ref')}}% </p>

                    <p> Indirect recommendation (Level 2): {{setting('second_ref')}}% </p>

                    <!--<p> Indirect recommendation (Level 3):  {{setting('third_ref')}}% </p>-->


                </div>
            </div>

        </div>


        <div class="loading">
            <div>
                <div class="loader"></div>
                <p>loading...</p>
            </div>
        </div>
        <div class="msgbox" style="height: auto; z-index: 9999;">
            <img src="{{asset('public')}}/img/pic.png?1" alt="">
            <p style="padding-bottom: 10px;"></p>
        </div>
    </div>
</form>
@include('alert-message')
<script>
    function copyLink(text)
    {
        const body = document.body;
        const input = document.createElement("input");
        body.append(input);
        input.style.opacity = 0;
        input.value = text.replaceAll(' ', '');
        input.select();
        input.setSelectionRange(0, input.value.length);
        document.execCommand("Copy");
        input.blur();
        input.remove();
        message('Improver Copied...')
    }
</script>
</body>
</html>
