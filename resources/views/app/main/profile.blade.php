<!DOCTYPE html>
<html lang="en" class="translated-ltr">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=0,initial-scale=1,maximum-scale=1, minimum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>Profil</title>
    <link href="{{asset('public')}}/Lay/css/layui.css" rel="stylesheet">
    <link href="{{asset('public')}}/css/main.css" rel="stylesheet">
    <link href="{{asset('public')}}/layer_mobile/need/layer.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/profile.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
   


    <style>
         body {
            background: #f1f1f1;
            font-family: 'Roboto', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .sign-out-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        .sign-out-button {
            width: 120px;
            font-weight: 400;
            height: 30px;
            line-height: 25px;
            font-size: 14px;
            display: inline-block;
            background: #36c726;
            color: #fff;
            border: 1px groove #fff;
            border-radius: 25px;
        }
        .card-container {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin: 20px 0;
        }
        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex: 1;
            padding: 20px;
            text-align: center;
            position: relative;
        }
        .card h2 {
            font-size: 16px;
            color: #333;
            margin: 0;
        }
        .card p {
            font-size: 14px;
            color: #666;
            margin: 5px 0 0;
        }
        .card .icon {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 40px;
            height: 40px;
        }
        .card.balance {
            background-color: #ffffff;

            background-size: cover;
        }
        .card.income {
            background-color: #ffffff;

            background-size: cover;
        }
    </style>
     <script src="https://kit.fontawesome.com/a227f43b8a.js" crossorigin="anonymous"></script>
</head>
<body style="min-height: 100%; width: 100%; background-size: 100% auto; background:#f1f1f1; ">
<div class="indexdiv"></div>

<div style="max-width:450px; margin:0 auto;position:relative;">
    <div class="top1">
    </div>
    <div style="background: url('{{asset('public')}}/ui3/profile.png'); background-size: cover; background-position: center; height:90px; padding-bottom: 30px; overflow: hidden; position:relative;">
    
</div>

    <div style="position:absolute; top:85px; left:30px; z-index:100;">
        <div style="height: 65px; line-height: 65px; margin: 0 auto; width: 65px; text-align: center; border-radius: 100px; background: #fff; ">
            <img src="{{asset(setting('logo'))}}" style="height: 60px; border-radius: 100px;">
        </div>
    </div>
    <div style="text-align: center;width: 100%; margin: 0 auto; background:#fff; height: auto; overflow: hidden; position:relative;">
        <div style="width: 30%; float: left;">
            <div style="padding: 5px; padding-top: 1px; color: #000; font-weight: bold; font-size: 14px; margin-top: 50px;" id="uid">
                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{auth()->user()->phone}}</font></font>
            </div>
        </div>
        <div style="float:left; width:70%;">
            <div style="width: 32%; float: left; text-align: left;" id="Recharge" onclick="window.location.href='{{route('user.recharge')}}'">
                <div style="padding-right:0px; width:100%;">
                    <div style="padding: 10px;">
                        <div style="padding: 5px; padding-top:10px;">
                            <div style="text-align: center; height: 35px;">
                                <i class="fa-duotone fa-money-simple-from-bracket fa-2x" style="--fa-primary-color: #bababa; --fa-secondary-color: #36c726;"></i>
                            </div>
                            <div style="text-align: center; line-height: 15px; font-size: 12px;">
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    Topup
                                </font></font>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: 2%; float: left; padding-bottom: 10px; height: 73px; border-radius: 2px !important; text-align: left; overflow: hidden;">
                &nbsp;
            </div>
            <div style="width: 32%; float: left; text-align: left;" id="Withdraw" onclick="window.location.href='{{route('user.withdraw')}}'">
                <div style="padding-left:0px; padding-right: 0px; width: 100%;">
                    <div style="padding: 10px;">
                        <div style="padding: 5px; padding-top:10px;">
                            <div style="text-align: center; height: 35px;">
                                <i class="fa-duotone fa-money-bill-transfer fa-2x" style="--fa-primary-color: #bababa; --fa-secondary-color: #36c726;"></i>
                            </div>
                            <div style="text-align: center; line-height: 15px; font-size: 13px; ">
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    Penarikan
                                </font></font>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="width: 2%; float: left; padding-bottom: 10px; height: 73px; border-radius: 2px !important; text-align: left; overflow: hidden;">
                &nbsp;
            </div>
            <div style="width: 32%; float: left; text-align: left;" id="Record" onclick="window.location.href='{{route('user.promo')}}'">
                <div style="padding-left:0px; padding-right: 0px; width: 100%;">
                    <div style="padding: 10px;">
                        <div style="padding: 5px; padding-top:10px;">
                            <div style="text-align: center; height: 35px;">
                                <i class="fa-duotone fa-calendar-check fa-2x" style="--fa-primary-color: #bababa; --fa-secondary-color: #36c726;"></i>
                            </div>
                            <div style="text-align: center; line-height: 15px; font-size: 13px; ">
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                   Bonus
                                </font></font>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div class="card-container">
        <div class="card balance">
           
            <h2>Rp {{number_format(auth()->user()->balance)}}</h2>
            <p>Saldo tersedia</p>
        </div>
        <div class="card income">
           
            <h2>
                <?php
                $totalIncome = \App\Models\UserLedger::where('user_id', auth()->id())->where('reason', 'my_commission')->sum('amount');
                ?>
                Rp {{number_format($totalIncome)}}
            </h2>
            <p>Pendapatan</p>
        </div>
    </div>

    <div style="height: auto; overflow: hidden; margin-top:5px; font-size:13px; background:#fff; padding-top:10px; padding-bottom:20px;">
        <div style="height:45px;line-height:45px; text-align:left;">
            <div style=" margin-left:15px;">
                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Semua menu</font></font>
            </div>
        </div>
        <div>
            <a href="/adi-farm.apk" style="text-decoration: none;" download>
    <div style="float:left;width: 25%; text-align:center;" id="down">
        <div style="height:45px;">
            <i class="fa-duotone fa-download fa-2x" style="--fa-primary-color: #bababa; --fa-secondary-color: #36c726;"></i>
        </div>
        <div>
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                    Unduh aplikasi
                </font>
            </font>
        </div>
    </div>
</a>

            <div style="float: left; width: 25%; text-align: center;" class="tabs" onclick="window.location.href='{{route('user.card')}}'">
                <div style="height:45px;">
                   <i class="fa-duotone fa-money-check-pen fa-2x" style="--fa-primary-color: #bababa; --fa-secondary-color: #36c726;"></i>
                </div>
                <div>
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                       Akun bank
                    </font></font>
                </div>
            </div>
            <div style="float: left; width: 25%; text-align: center;" class="tabs" onclick="window.location.href='{{route('user.change-password')}}'">
                <div style="height:45px;">
                    <i class="fa-duotone fa-lock-keyhole fa-2x" style="--fa-primary-color: #36c726; --fa-primary-opacity: 0.4; --fa-secondary-color: #bababa; --fa-secondary-opacity: 0.4;"></i>
                </div>
                <div>
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                       Ubah password
                    </font></font>
                </div>
            </div>

            <div style="float: left; width: 25%; text-align: center;" class="tabs" onclick="window.location.href='{{route('service')}}'">
                <div style="height:45px;">
                    <i class="fa-duotone fa-headset fa-2x" style="--fa-primary-color: #bababa; --fa-secondary-color: #36c726; --fa-secondary-opacity: 0.4;"></i> 
                </div>
                <div>
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                       Customer service
                    </font></font>
                </div>
            </div>
        </div>
    </div>
    <div style="height: auto; overflow: hidden; font-size:13px; background:#fff; padding-top:10px; padding-bottom:20px;">
        <div>
            <div style="float:left;width: 25%; text-align:center;" id="down" onclick="window.location.href='{{route('user.withdraw.preview')}}'">
                <div style="height:45px;">
                    <i class="fa-duotone fa-boxes-packing fa-2x" style="--fa-primary-color: #36c726; --fa-primary-opacity: 0.4; --fa-secondary-color: #bababa;"></i>
                </div>
                <div>
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                       Riwayat penarikan
                    </font></font>
                </div>
            </div>
            <div style="float: left; width: 25%; text-align: center;" class="tabs" onclick="window.location.href='{{route('recharge.history.preview')}}'">
                <div style="height:45px;">
                    <i class="fa-duotone fa-boxes-packing fa-2x" style="--fa-primary-color: #36c726; --fa-primary-opacity: 0.4; --fa-secondary-color: #bababa;"></i>
                </div>
                <div>
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                       Riwayat topup
                    </font></font>
                </div>
            </div>
            <div style="float: left; width: 25%; text-align: center;" class="tabs" onclick="window.location.href='{{route('promo.history')}}'">
                <div style="height:45px;">
                    <i class="fa-duotone fa-boxes-packing fa-2x" style="--fa-primary-color: #36c726; --fa-primary-opacity: 0.4; --fa-secondary-color: #bababa;"></i>
                </div>
                <div>
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        Riwayat checkin
                    </font></font>
                </div>
            </div>

            <div style="float: left; width: 25%; text-align: center;" class="tabs" onclick="window.location.href='{{route('history')}}'">
                <div style="height:45px;">
                    <i class="fa-duotone fa-boxes-packing fa-2x" style="--fa-primary-color: #36c726; --fa-primary-opacity: 0.4; --fa-secondary-color: #bababa;"></i>
                </div>
                <div>
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        Riwayat profit
                    </font></font>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <div  style="height: auto; overflow: hidden; font-size:13px; background:#fff; padding-top:10px; padding-bottom:20px; display: flex;justify-content: center;">
        <div>
            <div style="float: left; width: 100%; text-align: center;" class="tabs" onclick="window.location.href='{{route('transactions')}}'">
                <div style="height:45px;">
                    <i class="fa-duotone fa-boxes-packing fa-2x" style="--fa-primary-color: #36c726; --fa-primary-opacity: 0.4; --fa-secondary-color: #bababa;"></i>
                </div>
                <div>
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                        Mutasi saldo
                    </font></font>
                </div>
            </div>
        </div>
    </div>
    
    <div class="sign-out-container">
        <input id="outlogin" class="sign-out-button" value="Keluar" onclick="window.location.href='{{url('logout')}}'" type="button">
    </div>
</div>
@include('app.layout.menu')
</body>
</html>
