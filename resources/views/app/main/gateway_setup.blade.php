<html>
<head>
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="{{asset('public')}}/Lay/css/layui.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/bank.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <title>Akun bank</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        select{
            display: block !important;
        }
        select#payment_method {
            width: 100%;
            padding: 10px 0;
            border: none;
            margin-bottom: 12px;
            background: #00000026;
            color: gray;
            border-radius: 6px;
            padding-left: 8px;
        }
    </style>
</head>
<body style="background: rgb(241, 241, 241);">
<div style=" max-width:450px; margin:0 auto; height:auto; overflow:hidden;">
    <div class="top" style="background: #1fc745; ">
        <div style="float:left; line-height:46px;width:50%;">
            <img onclick="window.location.href='{{route('profile')}}'" style="width: 20px;margin-left: 10px;margin-top: 15px;" src="{{asset('public/left.png')}}" alt="">
        </div>
        <font class="topname" id="topname1" style="color: #fff;"><font style="vertical-align: inherit;"><font
                    style="vertical-align: inherit;">Manajemen bank</font></font></font>
        <div style="float:right; text-align:right; line-height:46px;width:50%;">

        </div>
    </div>
    @php
        $user = Auth::user();
        $bank_id = $user->bank_id;
        $gateway_name = $user->gateway_name;
        $gateway_number = $user->gateway_number;
        $withdraw = App\Models\Withdrawal::where('user_id',$user->id)->where('status','approved')->count();
        $bank = App\Models\Bank::where('id',$bank_id)->first();
    @endphp

    <div style=" max-width:450px; margin:0 auto; height:auto; overflow:hidden;">
        <form action="{{route('setup.gateway.submit')}}" method="post">
            @csrf
        <div class="layui-form layui-tab-content" style="padding:10px 10px; margin-top:50px;">
            <div style="background: #fff; border-radius: 10px;">
                <form class="layui-form" style="padding:10px;">
                    <div style="padding-top: 10px;">&nbsp;</div>
                    <div id="l1"
                         style=" text-align: left; padding-bottom: 10px;  color: #0F0F0F; "><font
                            style="vertical-align: inherit;"><font style="vertical-align: inherit;">*Pilih bank / wallet</font></font></div>

                    <div>
                        @if($withdraw > 0)
                        <input value="{{$bank? $bank->name : ''}}" readonly class="layui-input">
                        @else
                        <select name="bank_id" id="payment_method" >
                            <option value="">Pilih bank</option>
                            @foreach(\App\Models\Bank::get() as $element)
                                <option {{$bank_id == $element->id ? 'selected':''}} value="{{$element->id}}">{{$element->name}}</option>
                            @endforeach
                        </select>
                        
                        @endif
                    </div>

                    <div style=" text-align: left; padding-bottom: 10px; color: #0F0F0F; "><font
                            style="vertical-align: inherit;"><font style="vertical-align: inherit;">*Nama pemilik
                                </font></font></div>
                    <div class="layui-form-item" style="height:45px;">
                        <div class="inputdiv">
                            <input type="text" {{$withdraw > 0 ? 'readonly':''}} value="{{$gateway_name? $gateway_name : ''}}" id="uname" maxlength="49" autocomplete="new-password"
                                   name="gateway_name"
                                   style="color:#000;border:0px;" placeholder="Masukkan nama pemilik"
                                   class="layui-input">
                        </div>
                    </div>
                    <div style=" text-align: left; padding-bottom: 10px; color: #0F0F0F; "
                         id="v1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">*Nomor rekening / wallet</font></font></div>
                    <div class="layui-form-item" style="height:45px;">
                        <div class="inputdiv">
                            <input {{$withdraw > 0 ? 'readonly':''}} value="{{$gateway_number? $gateway_number : ''}}" type="text" id="bankcard"
                                   style="color:#000;border:0px;"
                                   name="gateway_number"
                                   placeholder="Masukkan nomor rekening" class="layui-input">
                        </div>
                    </div>


                </form>
            </div>
            @if($withdraw == 0)
            <div class="layui-form-item" style="margin-top:25px; text-align:center;">
                <font style="vertical-align: inherit;">
                    <font style="vertical-align: inherit;">
                        <input class="layui-btn" id="add" value="Perbarui" style="width: 60%; height: 45px; line-height: 45px; border-radius: 25px; color: #fff; font-weight: bold; background: #36c726; font-size: 16px; border: 0px; " type="button" onclick="submitBank()">
                    </font>
                </font>
            </div>
            @endif
        </div>
        </form>
    </div>
</div>

<img style="position: fixed;
    display: none;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;" src="{{asset('public/loading.gif')}}" class="loading" alt="">
<div class="layui-layer-move"></div>
@include('alert-message')
<script>
    function submitBank(){
        document.querySelector('.loading').style.display = 'block';
        document.querySelector('form').submit();
    }
</script>
</body>
</html>
