<html lang="en" class="translated-ltr">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=0,initial-scale=1,maximum-scale=1, minimum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>Produk investasi</title>
    <link href="{{asset('public')}}/Lay/css/layui.css" rel="stylesheet">
    <link href="{{asset('public')}}/css/main.css" rel="stylesheet">
    <link href="{{asset('public')}}/layer_mobile/need/layer.css" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style type="text/css">
        .body, * {
            font-family: 'Roboto', sans-serif;
        }
        .layui-carousel > [carousel-item] > * {
            display: none;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #f1f1f1;
            transition-duration: .3s;
            -webkit-transition-duration: .3s;
        }

        .top1 {
            position: fixed;
            background: #fff;
            z-index: 10000;
            width: 100%;
            height: 30px;
            top: -30px;
        }

        .navtab {
            cursor: pointer;
        }

        .gray {
            -webkit-filter: grayscale(100%);
            -moz-filter: grayscale(100%);
            -ms-filter: grayscale(100%);
            -o-filter: grayscale(100%);
            filter: grayscale(100%);
            filter: blue;
        }

        .topname {
            line-height: 46px;
            font-weight: 700;
            font-size: 16px;
            width: 50%;
            text-align: center;
            color: #fff;
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            margin: auto;
        }

        div#div1 {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            z-index: -1;
        }

        div#div1 > img {
            height: 100%;
            width: 100%;
            border: 0;
        }

        .indexdiv {
            background: #000000;
            position: fixed;
            left: 0px;
            top: 0px;
            bottom: 0px;
            width: 100%;
            height: 100%;
            z-index: 101;
            filter: alpha(opacity=95);
            opacity: 0.95 !important;
            display: none;
        }

        .small-font {
            font-size: 12px;
            -webkit-transform-origin-x: 0;
            -webkit-transform: scale(0.90);
        }

        .smallsize-font {
            font-size: 10.8px;
        }

        .cmbtn {
            width: 60%;
            cursor: pointer;
            font-size: 14px;
            height: 40px;
            line-height: 40px;
            margin-top: 20px;
            border-radius: 20px !important;
            color: #fff;
            margin: 0 auto;
            background: #000;
            border: 1px groove #fff;
        }


        .typeover {
            background: linear-gradient(to right, #00A478, #000);
            border-width: 0px;
            border-color: #FCC12D;
            border-style: solid;
            color: #fff !important;
        }

        .type {
            background: linear-gradient(to right, #aaa, #ccc);
            border-width: 0px;
            border-color: rgb(9, 30, 76);
            border-style: solid;
        }
        .typeover {
            background: linear-gradient(to right, #FFF, #36c726) !important;
        }
        .body {
            background: #f1f1f1;
            font-family: 'Roboto', sans-serif;
    </style>
</head>
<body style="min-height: 100%; width: 100%; background-size: 100% auto;  background: #f1f1f1; ">
<input type="hidden" id="proid" value="0">
<input type="hidden" id="ptype" value="1">

<div class="indexdiv"></div>
<div style=" max-width:450px; margin:0 auto; position:relative;">
    <div class="top1">
    </div>
    <div style=" position: fixed; top: 50%; left: 50%; display:none; transform: translate(-50%,-50%); text-align: center; margin: 0 auto; z-index: 102; height:490px; width: 100%; max-width:450px;  "
         id="showinfo">
        <div style="position: relative; width: 100%; text-align: center; background: #35C75A; height: auto; margin: 0 auto; width: 95%; box-shadow: 0 0.8vw 2.667vw 1px rgb(0 0 0 / 56%); background-size: 100% 100%; height: 420px; border-radius: 10px; color: #000; ">
            <div style="font-weight:bold; padding:20px; padding-left:15px; padding-bottom:30px; padding-top:35px; text-align:left; color:#fff; font-size:20px; "
                 id="pname">
                &nbsp;
            </div>
            <div style="width: 100%; margin-bottom: 14px; margin-top: 50px; padding-top:0px; padding-bottom:25px; height: auto; overflow: hidden;">
                <div style="float: left; width: 50%; height: auto; overflow: hidden; " onclick="">
                    <button id="qx1" class="cmbtn"
                            style="color: #aaa; width: 80%; margin: 0 auto; border: 0px; background: #eee; height: 40px; line-height: 40px; border-radius: 25px; ">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                Eliminates
                            </font></font></button>
                </div>
                <div style="float: left; width: 50%; height: auto; overflow: hidden; ">
                    <button id="Confirm1" class="cmbtn"
                            style="color: #fff; background: #35C75A; width: 80%; margin: 0 auto; height: 40px; line-height: 40px; border-radius: 25px; ">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                I confirm
                            </font></font></button>
                </div>
            </div>

        </div>
    </div>



    <div style="text-align: center; margin-bottom: 10px; position:relative; ">
        <div style="position: absolute; left: 50%; top: 10px; font-weight: bold; font-size: 16px; color: #fff; transform: translateX(-50%);">
    <font style="vertical-align: inherit;">
        <font style="vertical-align: inherit;"></font>
    </font>
</div>

        <div>
            <img src="{{asset('public')}}/ui3/bannerproduct.jpeg" style="width: 100%; height: 145px; ">

            <div id="in1"
                 style="position: absolute; text-align: center; color: #fdfffd; right: 1%; top: 55px; height: 50px; width: 200px; background-size: 100% 100%; ">
                <div style="margin-top:7px; font-size:17px; font-weight:bold;" id="number1"><font
                        style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            {{\App\Models\Purchase::where('user_id', auth()->id())->where('status', 'active')->count()}}
                        </font></font></div>
                <div style="font-size:14px;"><font style="vertical-align: inherit;"><font
                            style="vertical-align: inherit;">Kepemilikan aset</font></font></div>
            </div>
        </div>
    </div>

    <div style="width: 98%; margin:0 auto; height: auto; overflow: hidden; padding-top:10px; display:block;">
        <div class="typeitem type typeover" value="0"
             onclick="menuActive(this, 'product')"
             style="width: 50%; font-weight:bold; float: left; height: 45px; line-height: 45px; border-top-left-radius: 5px; text-align: center; color: #fff;  ">
            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                   Pertanian ADI
                </font></font></div>
        <div class="typeitem type " value="1"
             onclick="menuActive(this, 'myproduct')"
             style="width: 50%; font-weight: bold; float: left; height: 45px; line-height: 45px; border-top-right-radius: 5px; text-align: center; color: #fdfffd; ">
            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Kepemilikan asset
                </font></font></div>
    </div>


    <div style="text-align: center; width: 98%; margin: 0 auto; margin-bottom: 70px; background: #fff; border-radius: 5px; " id="list">
        @foreach(\App\Models\Package::where('status', 'active')->get() as $element)
            <?php
            $myVIP = \App\Models\Purchase::where('user_id', auth()->id())->where('package_id', $element->id)->where('status', 'active')->first();
            ?>

        <div class="buy" value="1" imgurl="{{asset('public')}}/ui3/g/1.png" day="5" price="0.00" hour_income="5.00" day_income="5.00"
             total_income="25.00" pname="MaxiCharger A"
             style="background: #fff; width: 98%; margin: 0 auto; border-radius: 5px; padding-top:10px; padding-left:5px; padding-bottom:10px; height: auto; overflow: hidden;">
            <div style="float:left; width:25%; display: flex; justify-content:center; align-items:center;  "><img
                    src="{{asset($element->photo)}}" style="width:100%;border-radius: 5px;margin-top:10px;"></div>
            <div style="float:left; width:75%; text-align:left; position:relative;">
                @if($myVIP)
                    <div style="position: absolute; background: #CACEC9; color: #fff; text-align: center; border-radius: 30px; line-height:30px; right: 10px; bottom: 40px; width: 70px; height: 30px;">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Terjual</font></font>
                    </div>
                @else
                    <div style="position: absolute; background: #36c726; color: #fff; text-align: center; border-radius: 30px; line-height:30px; right: 10px; bottom: 40px; width: 70px; height: 30px;" onclick="buyProduct('{{$element->id}}')">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;" id="buyBtn{{$element->id}}">Membeli</font></font>
                    </div>
                    @endif

                <div style="padding-left:10px; font-size:12px;">
                    <div style="height:auto; line-height:30px; font-weight:bold; font-size:16px;height: auto; overflow: hidden; color:#1E2022;font-family: HarmonyOS Sans SC; ">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$element->name}}</font></font></div>
                    <div style="height: 18px; line-height: 18px; "><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">Harga: </font></font><font
                            style="font-weight:bold; color:#000;"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">Rp {{number_format($element->price)}}</font></font></font></div>
                    <div style="height: 18px; line-height: 18px; "><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">Masa durasi: </font></font><font
                            style="font-weight:bold; color:#000;"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">{{$element->validity}}</font></font></font><font
                            style="vertical-align: inherit;"><font style="vertical-align: inherit;"> hari</font></font>
                    </div>
                    <div style="height: 18px; line-height: 18px; "><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">Komisi harian: </font></font><font
                            style="font-weight:bold; color:#000;"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">Rp {{number_format($element->commission_with_avg_amount / $element->validity)}}</font></font></font></div>
                    <div style="height: 18px; line-height: 18px; "><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">Total profit: </font></font><font
                            style="font-weight:bold; color:#000;"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">Rp {{number_format($element->commission_with_avg_amount)}}</font></font></font></div>
                    <div style="height: 28px; line-height:38px; "><font style="font-weight:bold; color:#000;"><font
                                style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$element->title}}</font></font></font></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>


    <div style="text-align: center; width: 98%; margin: 0 auto; margin-bottom: 70px; background: #fff; border-radius: 5px; " id="mylist">
        @foreach(\App\Models\Package::whereIn('id', my_vips())->get() as $element)
        @php
            $purchase = \App\Models\Purchase::latest()->select('created_at','validity')->where(['user_id'=>auth()->user()->id, 'package_id'=>$element->id])->first();
        @endphp
        <div class="buy" value="1" imgurl="{{asset('public')}}/ui3/g/1.png" day="5" price="0.00" hour_income="5.00" day_income="5.00"
             total_income="25.00" pname="MaxiCharger A"
             style="background: #fff; width: 98%; margin: 0 auto; border-radius: 5px; padding-top:10px; padding-left:5px; padding-bottom:10px; height: auto; overflow: hidden;">
            <div style="float:left; width:25%; display: flex; justify-content:center; align-items:center;  "><img
                    src="{{asset($element->photo)}}" style="width:100%;border-radius: 5px;margin-top:10px;"></div>
            <div style="float:left; width:75%; text-align:left; position:relative;">
                <div style="position: absolute; background: #7DD06B; color: #fff; text-align: center; border-radius: 30px; line-height:30px; right: 10px; bottom: 40px; width: 70px; height: 30px;">
                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Aktif</font></font>
                </div>

                <div style="padding-left:10px; font-size:12px;">
                    <div style="height:auto; line-height:30px; font-weight:bold; font-size:16px;height: auto; overflow: hidden; color:#1E2022;font-family: HarmonyOS Sans SC; ">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$element->name}}</font></font></div>
                    <div style="height: 18px; line-height: 18px; "><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">Harga: </font></font><font
                            style="font-weight:bold; color:#000;"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">Rp {{number_format($element->price)}}</font></font></font></div>
                    <div style="height: 18px; line-height: 18px; "><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">Masa durasi: </font></font><font
                            style="font-weight:bold; color:#000;"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">{{$element->validity}}</font></font></font><font
                            style="vertical-align: inherit;"><font style="vertical-align: inherit;"> hari</font></font>
                    </div>
                    <div style="height: 18px; line-height: 18px; "><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">Komisi harian: </font></font><font
                            style="font-weight:bold; color:#000;"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">Rp {{number_format($element->commission_with_avg_amount / $element->validity)}}</font></font></font></div>
                    <div style="height: 18px; line-height: 18px; "><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">Total profit: </font></font><font
                            style="font-weight:bold; color:#000;"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">Rp {{number_format($element->commission_with_avg_amount)}}</font></font></font></div>
                                    <div style="height: 18px; line-height: 18px; "><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">Mulai: </font></font><font
                            style="font-weight:bold; color:#000;"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">{{$purchase->created_at}}</font></font></font></div>
                                    
                                    <div style="height: 18px; line-height: 18px; "><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">Berakhir: </font></font><font
                            style="font-weight:bold; color:#000;"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">{{$purchase->validity}}</font></font></font></div>
                                    
                    <div style="height: 28px; line-height:38px; "><font style="font-weight:bold; color:#000;"><font
                                style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$element->title}}</font></font></font></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <img style="position: fixed;
    display: none;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;" src="{{asset('public/loading.gif')}}" class="loading" alt="">
    @include('app.layout.menu')
</div>
@include('alert-message')
<script>
    function buyProduct(id){
        document.querySelector('.loading').style.display = 'block';
        document.getElementById('buyBtn'+id).innerHTML = 'Process'
        window.location.href = '{{url('purchase/confirmation')}}'+'/'+id;
    }
</script>

<script>
    function menuActive(_this, menuName){
        var elements = document.querySelectorAll('.typeitem');
        for (let i=0;i<elements.length;i++){
            if (elements[i].classList.contains('typeover')){
                elements[i].classList.remove('typeover')
            }
        }
        _this.classList.add('typeover')

        if (menuName == 'product'){
            document.getElementById('list').style.display='block';
            document.getElementById('mylist').style.display='none';
        }
        if (menuName == 'myproduct'){
            document.getElementById('list').style.display='none';
            document.getElementById('mylist').style.display='block';
        }
    }
</script>
</body>
</html>
