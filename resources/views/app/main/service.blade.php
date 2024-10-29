<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Layanan Pelanggan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{asset('public')}}/Lay/css/layui.css" rel="stylesheet">
    <link href="{{asset('public')}}/css/main.css" rel="stylesheet">
    <style type="text/css">
        body, div, p, a, font {
            font-family: 'Roboto', sans-serif; /* Apply Roboto font to all text elements */
        }
        .topname {
            line-height: 46px;
            font-size: 14px;
            width: 75%;
            text-align: center;
            color: #fff;
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            margin: auto;
            font-weight: bold;
        }
        div {
            cursor: pointer;
        }
        .typeitem {
            color: #888;
            float: left;
            margin-left: 3%;
            cursor: pointer;
            font-family: 'Roboto', sans-serif;
            font-size: 13px;
            margin-top: 10px;
            margin-bottom: 2px;
        }
        .typeitemover {
            margin-top: 10px;
            color: #085efa;
            border-bottom: 1px solid #085efa;
            margin-bottom: 1px;
            float: left;
            margin-left: 3%;
            cursor: pointer;
            font-family: 'Roboto', sans-serif;
            font-size: 13px;
        }
    </style>
</head>
<body style="background-size: 100% auto; background: #f1f1f1;">
<div style="width: 100%; margin: 0 auto; background: #1fc745; border-bottom: 0px solid #1fc745;" class="top">
    <div style="float:left; text-align:left; line-height:46px;width:50%;" id="btnClose">
        <img onclick="window.location.href='{{route('dashboard')}}'"
             style="width: 20px;margin-left: 10px;margin-top: 15px;" src="{{asset('public/left.png')}}" alt="Back">
    </div>
    <div class="topname">Layanan Pelanggan</div>
</div>
<div style="max-width:450px; margin:0 auto;">
    <div style="width: 100%; margin: 0 auto; text-align: center; margin-top: 50px; position: relative; height: auto; overflow: hidden;">
       
    </div>
    <!-- Telegram Channel Link -->
    <a href="https://t.me/+95k7gRxb3tc3Yjll" style="text-decoration: none; color: inherit;">
        <div style="width: 100%; margin: 0 auto; background: #fff; height: 55px; margin-top: 10px; line-height: 55px; height: auto; overflow: hidden; display: flex; align-items: center;" id="btnTelegram">
            <div style="float: left; width: 25%; text-align: center;">
                <img src="{{ asset('public') }}/ui1/kf/3.png" style="height: 35px;">
            </div>
            <div style="float: left; width: 65%;">Channel Telegram</div>
            <div style="float: left; width: 10%;">
                <img src="{{ asset('public') }}/ui/jt.png" style="height: 20px;">
            </div>
        </div>
    </a>
     <a href="https://t.me/+2-dU7bdMHYExNmRl" style="text-decoration: none; color: inherit;">
        <div style="width: 100%; margin: 0 auto; background: #fff; height: 55px; margin-top: 10px; line-height: 55px; height: auto; overflow: hidden; display: flex; align-items: center;" id="btnTelegram">
            <div style="float: left; width: 25%; text-align: center;">
                <img src="{{ asset('public') }}/ui1/kf/3.png" style="height: 35px;">
            </div>
            <div style="float: left; width: 65%;">Grup Telegram</div>
            <div style="float: left; width: 10%;">
                <img src="{{ asset('public') }}/ui/jt.png" style="height: 20px;">
            </div>
        </div>
    </a>
  
    <div style="width: 100%; margin: 0 auto; background: #fff; height: auto; overflow: hidden; margin-top: 10px; margin-bottom:15px;">
        <div style="padding: 15px; color: #272727; font-size: 20px; text-align: center;">9:00-18:00 WIB</div>
        <div style="padding: 10px; color: #272727; font-size: 14px; text-align: center;">Waktu layanan pelanggan online</div>
        <div style="padding:25px; color:#000; font-size:12px; text-align:left;">
            <p>1. Jika Anda memiliki pertanyaan tentang kami, silakan hubungi layanan pelanggan melalui Internet dan kami akan menjawab semua pertanyaan Anda.</p>
            <p>2. Jika layanan pelanggan online tidak merespons tepat waktu, mohon bersabar karena banyaknya pesan. Terima kasih atas pengertian dan dukungan Anda!</p>
        </div>
    </div>
</div>
</body>
</html>
