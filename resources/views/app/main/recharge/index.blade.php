<html>
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Topup Saldo</title>
    <link href="{{asset('public')}}/Lay/css/layui.css" rel="stylesheet">
    <link href="{{asset('public')}}/css/main.css" rel="stylesheet">
    <link href="{{asset('public')}}/layer_mobile/need/layer.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/recharge.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .active {
            background: #fff;
            color: #1fc745 !important
        }
        select {
            width: 100%;
            height: 30px;
            background: transparent;
            border: none;
            color: gray;
        }
        .gradient-divider {
            height: 20px;
            background: linear-gradient(to bottom, #bff0ac, #fff);
        }
    </style>
</head>
<body style="background-size: 100% auto; background: #fff;">
<div class="top" style="background: #bff0ac; border: 0px !important;">
    <div style="float:left; line-height:46px;width:50%; height:46px;cursor:pointer;" id="btnClose">
        <img onclick="window.location.href='{{route('dashboard')}}'"
             style="width: 20px;margin-left: 10px;margin-top: 15px;" src="{{asset('public/left.png')}}" alt="">
    </div>
    <div class="topname" style="line-height: 50px; font-weight: bold; color: #fff;"><font
            style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                Topup Saldo
            </font></font></div>
    <div style="float:right; text-align:right; line-height:46px;width:50%;" id="log" onclick="window.location.href='{{route('recharge.history.preview')}}'">
        <img src="{{asset('public')}}/imgss/iconlog.png"
             style="height: 27px;  margin-right: 10px; margin-bottom: 2px; border-radius: 50px;margin-top: 10px;">
    </div>
</div>

<div style=" max-width:450px; margin:0 auto; position:relative;">
    <div style=" height:auto; overflow:hidden;">
        <div style="width: 100%; margin: 0 auto; background: #1476ff; ">
            <div
                style="width: 100%; position: absolute; left: 0%; top: 30px; margin-top: 5px; padding-bottom: 3px; border-radius: 2px; height: auto; overflow: hidden;">
                <div
                    style="width: 100%; margin: 0 auto; padding-top: 10px; padding-bottom: 10px; height: auto; overflow: hidden; background: #bff0ac ">
                    <div style=" width: 95%; margin: 0 auto; ">
                        <div
                            style="width: 100%; margin: 0 auto; margin-top: 10px; padding-top: 10px; padding-bottom: 10px; height: auto; overflow: hidden; ">
                            <div style="padding-left:5px; padding-bottom:10px;">
                                <font style="font-weight: normal; color: #000;"><font
                                        style="vertical-align: inherit;"><font style="vertical-align: inherit;">Masukkan jumlah topup </font></font></font>
                                <font style="color: #000; " class="small-font"><font
                                        style="vertical-align: inherit;"><font style="vertical-align: inherit;">（Minimal
                                            Rp 50,000）</font></font></font>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('depositSubmit') }}" id="depositSubmit" method="post">
                        @csrf
                        <input type="hidden" name="custom_token" value={{mt_rand(1000000000000, 9999999999999)}}>
                    <div
                        style="text-align: center; width: 95%; margin: 0 auto; margin-bottom: 15px; margin-top: 15px; height: auto; overflow: hidden; ">
                        <div class="inputdiv" style="height: auto; overflow: hidden;">
                            <div style="width: 50px; color: #bff0ac; padding-left: 5px; background: #fff; "><font
                                    style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        <b>{{setting('currency')}}</b>
                                    </font></font></div>
                            <input type="number" id="amount" autocomplete="off" maxlength="6" pattern="[0-9]*" inputmode="numeric"
                                   style="font-size: 14px; padding-left:10px; color: #000;  background: #fff;"
                                   name="amount"
                                   placeholder="Masukkan jumlah topup" class="layui-input"
                                   autocomplete="off">
                        </div>
                    </div>
                </form>
                </div>

                <div class="gradient-divider"></div>

                <div
                    style="width: 100%; margin: 0 auto; background: none; padding-bottom: 15px; height: auto; overflow: hidden; ">

                    <div
                        style="text-align: center; width: 98%; margin: 0 auto; margin-bottom: 15px; margin-top: 35px; height: auto; overflow: hidden;">
                        <button class="layui-btn" id="Recharge"
                                onclick="deposit()"
                                style="width: 90%; font-weight: bold; font-size: 14px; color: #fff; height: 45px; line-height: 45px; border-radius: 100px; border: 0px; background: #36c726; "
                                type="button" value="Isi ulang sekarang"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">
                                    LANJUTKAN
                                </font></font></button>
                    </div>

                </div>

                <div
                    style="width: 100%; margin: 0 auto; background: none; margin-top: 10px; height: auto; overflow: hidden;">
                    <div
                        style="width: 98%; margin: 0 auto; background: #fff; padding-bottom: 10px; border-radius: 3px;  ">
                        <div style="height:35px; line-height:35px; text-align:left;">
                            <span style="margin-left:5%; color:#000; font-weight:bold;"><font
                                    style="vertical-align: inherit;"><font style="vertical-align: inherit;">Informasi topup</font></font></span>
                        </div>
                        <div style="text-align: left; padding: 20px; padding-top: 0px; height: auto; overflow: hidden; color: #000;" id="payinfo">
                            <p class="p1" style="margin-top: 0px; margin-bottom: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 13px; line-height: normal; ">1. Topup dibuka setiap hari selama 24 jam (terkecuali ada gangguan / perbaikan)</p>
                            <p class="p1" style="margin-top: 0px; margin-bottom: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 13px; line-height: normal; ">2. Harap transfer sesuai dengan jumlah yang tertera di halaman pembayaran</p>
                            <p class="p1" style="margin-top: 0px; margin-bottom: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 13px; line-height: normal; ">3. Minimum topup adalah sebesar Rp 50,000</p>
                            <p class="p1" style="margin-top: 0px; margin-bottom: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 13px; line-height: normal; ">4. Setelah pembayaran berhasil, saldo akan otomatis terisi tanpa harus konfirmasi ke customer service</p>
                            <p class="p1" style="margin-top: 0px; margin-bottom: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 13px; line-height: normal; ">5. Kesalahan transfer tidak menjadi tanggung jawab platform</p>
                            <p class="p1" style="margin-top: 0px; margin-bottom: 0px; font-variant-numeric: normal; font-variant-east-asian: normal; font-variant-alternates: normal; font-kerning: auto; font-optical-sizing: auto; font-feature-settings: normal; font-variation-settings: normal; font-stretch: normal; font-size: 13px; line-height: normal; ">6. Jangan pernah melakukan topup selain di website / aplikasi resmi dari ADI Farming </p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('alert-message')
<script>

document.getElementById('amount').addEventListener("keyup", function(e) {
    var val = e.target.value;
    var length = e.target.value.toString().length;
  if (length > 8) {
    document.getElementById('amount').value=Math.floor(val / 10);
  }
});
    
    function getAmount(_this, amount) {
        document.querySelector('input[name="amount"]').value = amount;

        var elements = document.querySelectorAll('.item')
        for (let i = 0; i < elements.length; i++) {
            if (elements[i].querySelector('div').classList.contains('active')) {
                elements[i].querySelector('div').classList.remove('active')
            }
        }
        _this.querySelector('div').classList.add('active')
    }


    function deposit(){

        var amount = document.getElementById('amount').value;
        if (amount == ''){
            message("Masukkan jumlah topup");
            return 0;
        }

        var button = document.getElementById('Recharge');
        button.innerText = 'Proses';
        button.disabled = true;
        document.querySelector('form').submit();
        
    }
</script>
</body>
</html>
