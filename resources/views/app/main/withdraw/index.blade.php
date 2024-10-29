<html>
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Withdraw money</title>
    <link href="{{asset('public')}}/Lay/css/layui.css" rel="stylesheet">
    <link href="{{asset('public')}}/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/with.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a227f43b8a.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body style="background: rgb(255, 255, 255);">
<div class="top" style="background: #36c726; border: 0px !important;">
    <div style="float:left; line-height:46px;width:50%; height:46px;cursor:pointer;" id="btnClose">
        <img onclick="window.location.href='{{route('dashboard')}}'" style="width: 20px;margin-left: 10px;margin-top: 15px;" src="{{asset('public/left.png')}}" alt="">
    </div>
    <div class="topname" style="line-height: 50px; font-weight: bold; color: #fff;">
        <font style="vertical-align: inherit;">Penarikan Uang</font>
    </div>
    <div style="float:right; text-align:right; line-height:46px;width:50%;" id="log" onclick="window.location.href='{{route('user.withdraw.preview')}}'">
        <img src="{{asset('public')}}/imgss/iconlog.png" style="height: 27px;  margin-right: 10px; margin-bottom: 2px; border-radius: 50px;margin-top: 10px;">
    </div>
</div>

<div style=" max-width:450px; margin:0 auto;">
    <div style="  height:auto; overflow:hidden; ">
        <div style="width: 100%; margin: 0 auto; background: none; height: auto; overflow: hidden; ">
            <div style="color: #000; padding-left: 15px; padding-top: 70px; font-size: 22px;">
                Rp {{number_format(auth()->user()->balance)}}
                <font id="useramount" style="padding-left: 5px; font-weight: bold; font-size: 22px; padding-top: 15px;"></font>
            </div>
            <div style="padding-left: 15px; padding-top: 5px; font-weight: bold; color: #000; font-size: 12px;">
                <font style="vertical-align: inherit;">Saldo tersedia</font>
            </div>
        </div>

        <form action="{{route('user.withdraw-confirm-submit')}}" method="post">
            @csrf
            <input type="hidden" name="custom_token" value={{mt_rand(1000000000000, 9999999999999)}}>
            <div style="width: 100%; margin: 0 auto; background: #fff; padding-bottom: 3px; padding-top:10px;">
                <div style="width:95%; margin:0 auto; padding-bottom:3px;border-radius:2px; overflow:hidden;">
                    <div>
                        <div class="layui-form-item">
                            <div style="width:98%; margin:0 auto;" id="amountlist"></div>
                        </div>
                        <div style="text-align: center; width: 98%; margin: 0 auto; margin-bottom: 15px; margin-top:15px; height: auto; overflow: hidden;">
                            @php
                                $user = auth()->user();
                                $bank_id = auth()->user()->bank_id;
                                $gateway_number = auth()->user()->gateway_number;
                                $bank = App\Models\Bank::find($bank_id);
                            @endphp
                            @if (auth()->user()->bank_id && auth()->user()->gateway_number)
                               
                            <a class="inputdiv" href="{{route('user.card')}}" style="line-height: 38px; width: 100%; height: 45px; border: 0px; background-color: #fff; padding: 0 0px; z-index: 500;" id="selectcard">
                                <i class="fa-duotone fa-wallet fa-2x" style="--fa-primary-color: #bababa; --fa-secondary-color: #36c726;"></i>
                                <font style="margin-left: 10px; height: 38px; width: 100%; color: #000; text-align: left;" id="select_card">{{ $bank->name }} ({{ $gateway_number }})</font>
                            </a>
                            @else
                            <a class="inputdiv" href="{{route('user.card')}}" style="line-height: 38px; width: 100%; height: 45px; border: 0px; background-color: #fff; padding: 0 0px; z-index: 500;" id="selectcard">
                                <i class="fa-duotone fa-wallet fa-2x" style="--fa-primary-color: #bababa; --fa-secondary-color: #36c726;"></i>
                                <font style="margin-left: 10px; height: 38px; width: 100%; color: #000; text-align: left;" id="select_card">Pilih akun bank</font>
                                <div style="float: left; width: 10%; text-align: right; height: 35px; line-height: 38px; color: #000;margin-top: 10px;">
                                    <img src="https://img.icons8.com/ios-glyphs/30/chevron-right.png" style="width: 20px;" alt="">
                                </div>
                            </a>
                            @endif

                            <div style="width: 98%; margin: 0 auto; text-align: left; margin-top: 20px; color: #000; font-weight: bold;">
                                <font style="vertical-align: inherit;">Jumlah penarikan uang</font>
                            </div>
                            <div class="inputdiv" style="margin-top:25px;">
                                <div style="width:30px;color:#000;">
                                    <font style="vertical-align: inherit;">{{setting('currency')}}</font>
                                </div>
                                <input type="number" id="Amount" style="font-size: 14px; color: #000; background-color: #fff; padding-left: 10px;" name="amount" oninput="getAmount(this)" placeholder="Nominal penarikan" class="layui-input" autocomplete="off">
                            </div>

                            <div style="width: 100%; height: 25px; line-height: 30px; margin-top:10px;border-width: 0px; border-style: solid; border-radius: 2px; text-align: left;">
                                <span style="float:left;font-size:12px; color:#000;">
                                    <font style="vertical-align: inherit;">Jumlah diterima :</font>
                                    <font id="jieguo1">{{setting('currency')}} <span class="rrb">0</span></font>
                                </span>
                                <span style="color: #000; float: right; font-size: 12px;">
                                    <font style="vertical-align: inherit;">Pajak :</font>
                                    <font id="free">{{setting('withdraw_charge')}}%</font>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="text-align: center;width:98%; margin:0 auto; margin-bottom:15px;">
                <input class="layui-btn" id="Submit" type="button" onclick="submitWithdraw()" value="Penarikan" style="width: 80%; height: 45px; line-height: 45px; font-weight: bold; color: #fff; font-size: 14px; border-radius: 25px; border: 0px; background: #36c726;">
            </div>
        </form>

        <br>
        <div style="width:98%; margin:0 auto; background:#fff; margin-top:2px;">
            <div style="height: 35px; line-height: 35px; text-align: left;">
                <span style="margin-left:3%; color:#000; font-weight:bold;">Informasi penarikan</span>
            </div>
            <div style="text-align: left; padding:20px; padding-top:0px; height:auto; overflow:hidden;color:#999;" id="wiinfo">
                <p class="p1" style="margin-top: 0px; margin-bottom: 0px;">
                    <span style="color: #000000;">
                        <font style="vertical-align: inherit;">1. Minimal penarikan adalah Rp 40,000</font>
                    </span>
                </p>
                <p class="p1" style="margin-top: 0px; margin-bottom: 0px;">
                    <span style="color: #000000;">
                        <font style="vertical-align: inherit;">2. Tidak ada batas waktu dan anda dapat menarik dana kapan saja</font>
                    </span>
                </p>
                <p class="p1" style="margin-top: 0px; margin-bottom: 0px;">
                    <span style="color: #000000;">
                        <font style="vertical-align: inherit;">3. 10% dari biaya penarikan digunakan sebagai biaya perawatan platform</font>
                    </span>
                </p>
                <p class="p1" style="margin-top: 0px; margin-bottom: 0px;">
                    <span style="color: #000000;">
                        <font style="vertical-align: inherit;">4. Penarikan akan tiba dalam waktu maksimal 30 menit</font>
                    </span>
                </p>
                <p class="p1" style="margin-top: 0px; margin-bottom: 0px;">
                    <span style="color: #000000;">
                        <font style="vertical-align: inherit;">5. Masukkan informasi akun penarikan yang benar untuk menarik dana. Jika informasi dimasukkan salah, proses penarikan akan gagal</font>
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>
@include('alert-message')
<div class="layui-layer-move"></div>
<img style="position: fixed; display: none; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100%;" src="{{asset('public/loading.gif')}}" class="loading" alt="">
<script>
    var charge = '{{setting('withdraw_charge')}}';
    function getAmount(_this){
        document.querySelector('.rrb').innerHTML = _this.value - (_this.value * charge / 100);
    }

    function submitWithdraw(){
        document.querySelector('.loading').style.display = 'block';
        document.querySelector('form').submit();
    }
</script>
</body>
</html>
