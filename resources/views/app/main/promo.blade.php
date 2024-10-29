<html>
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Bonus Harian</title>
    <link href="{{asset('public')}}/Lay/css/layui.css" rel="stylesheet">
    <link href="{{asset('public')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('public')}}/css/main.css" rel="stylesheet">
    <link href="{{asset('public')}}/css/meun.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/checkin.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<style>
    body {
            font-family: 'Roboto', sans-serif;
        }
    
</style>
</head>
<body style="background-size: 100% auto; background: #fff; ">
<div class="indexdiv"></div>
<div style="width: 100%; margin: 0 auto; background: #36c726; border-bottom: 0px solid #117546; " class="top">
    <div style="float:left; text-align:left; line-height:46px;width:50%;" id="btnClose">
        <img onclick="window.location.href='{{route('dashboard')}}'" style="width: 20px;margin-left: 10px;margin-top: 15px;" src="{{asset('public/left.png')}}" alt="">
    </div>
    <font class="topname" style="color: #fff;"><font style="vertical-align: inherit;"><font
                style="vertical-align: inherit;">
               Bonus harian
            </font></font></font>
    <div style="float:right; text-align:right; line-height:46px;width:50%;">
    </div>
</div>
<div style=" max-width:450px; margin:0 auto;">
    <div style=" height:auto;  width:100%; margin:0 auto; background:#fff;  overflow:hidden; margin-top:50px;  ">
        <div style="background: #fff; min-height: 5em;">
          
        </div>
        <div style="width: 100%; max-width: 450px; background: #fff; height: 220px; width: 100%; line-height: 35px; color: #000; text-align: center; font-size: 13px; border: 0px; border-radius: 20px; height: auto; overflow: hidden;">

            <div style="background: #36c726; height: 60px; ">
                <div style="width: 100%; height:70px; line-height:70px; text-align: center; height: auto; overflow: hidden; color: #000">
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                           <b>Jumlah bonus harian anda : </b></font></font><font id="dayss"
                                                                       style="font-weight: bold; color: #000;"><font
                            style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Rp {{number_format(setting('checkin'))}}</b></font></font></font>
                </div>
            </div>

            <div style="background: #fff; width: 95%; margin: 0 auto; border-radius: 20px; margin-top:5px; padding-top:2px;">

                <div style="height: auto; overflow: hidden;">
                    <div style="width: 50%; float: left; ">
                        <div style="color: #000; font-size: 20px;"><font
                                style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;"></font></font><font id="amount">Rp {{number_format(auth()->user()->balance)}}</font></div>
                        <div style="color: #000; font-size: 14px;"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">Saldo saat ini</font></font></div>
                    </div>

                    <div style="width: 50%; float: left;">
                        <div style="color: #000; font-size: 20px; "><font
                                style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;"></font></font><font id="check_income">
                                <?php
                                    $totalCheckin = \App\Models\Checkin::where('user_id', auth()->id())->sum('amount');
                              ?>
                                Rp {{number_format($totalCheckin)}}
                            </font></div>
                        <div style="color: #000; font-size: 14px;"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">Total bonus</font></font></div>
                    </div>
                </div>
            </div>

            <div style="width:100%;position:relative; margin:0 auto; margin-top:30px;height:auto;overflow:hidden;border:0px;">
                <div id="checkin"
                     onclick="checkin()"
                     style="width: 70%; margin: 0 auto; text-align: center; height: 40px; line-height: 40px; color: #fff; border-radius: 100px; background: #36c726; ">
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            Ambil
                        </font></font></div>
            </div>
        </div>
    </div>
    <div style=" width:100%; margin-top:10px;  height: auto; overflow: hidden; ">
        <div style="color: #000; width: 70%; margin: 0 auto; margin-top: 10px; font-weight: bold; text-align: left; height: 30px; line-height: 30px; font-size: 14px; ">
            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Informasi bonus
                </font></font></div>
        <div style="margin-top:10px; text-align:center; color:#999;width:100%; font-size:12px; ">
            <div style=" padding:10px; text-align:left; width: 70%; margin:0 auto; font-size: 12px; "><font
                    style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        1. Setiap check in kamu bisa mendapatkan Rp {{number_format(setting('checkin'))}}. </font></font><br><br><font style="vertical-align: inherit;"><font
                        style="vertical-align: inherit;">
                        2. Check in hanya tersedia 1 kali setiap 24 jam. </font></font><br><br><font style="vertical-align: inherit;"><font
                        style="vertical-align: inherit;">
                        3. Setelah 24 jam, kamu dapat melakukan check in lagi.</font></font><br><br>
            </div>
        </div>
    </div>
</div>
@include('alert-message')
<img style="position: fixed;
    display: none;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;" src="{{asset('public/loading.gif')}}" class="loading" alt="">
<script>
    function checkin(){
        document.querySelector('.loading').style.display = 'block';
        window.location.href='{{route('user.checkin')}}'
    }
</script>

</body>
</html>
