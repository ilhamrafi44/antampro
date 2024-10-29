<html lang="en" class="translated-ltr">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=0,initial-scale=1,maximum-scale=1, minimum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>Tim saya</title>
    <link href="{{asset('public')}}/Lay/css/layui.css" rel="stylesheet">
    <link href="{{asset('public')}}/css/main.css" rel="stylesheet">
    <link href="{{asset('public')}}/layer_mobile/need/layer.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <style type="text/css">
        body {
            font-family: 'Roboto', sans-serif;
        }
        .top1 {
            position: fixed;
            background: #fff;
            z-index: 10000;
            width: 100%;
            height: 30px;
            top: -30px;
        }

        .small-font {
            font-size: 12px;
            -webkit-transform-origin-x: 0;
            -webkit-transform: scale(0.80);
        }

        .smallsize-font {
            font-size: 9.6px;
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
            background: rgb(0, 203, 227);
        }
    </style>
</head>
<body style="min-height: 100%; width: 100%; background-size: 100% auto; background: #f1f1f1; ">
<div class="indexdiv"></div>
<div style=" max-width:450px; margin:0 auto;">
    <div class="top1">
    </div>
    <div style="height: auto; overflow: hidden; ">
        <div style="width: 100%; height: auto; overflow: hidden; position:relative;">
            <img src="{{asset('public')}}/ui3/ref1.png" style="width:100%;">
            
        </div>
    </div>


    <div style="text-align: center; margin-bottom: 10px; background: #FFF; margin-bottom:65px; ">

        <div style="height:220px; overflow: hidden; margin-top: 5px; font-size: 12px;  color: #000; padding-top: 10px; padding-bottom: 10px;">
            <div style="float:left; width:33.33%; text-align:center; height:150px;">
                <div>
                    <div style="text-align:center; width:100%;">
                        <div style="height: 60px; width: 60px; margin:0 auto; border-radius: 100px; background: #36c726; line-height: 60px; color: #FFF; font-weight: bold; font-size: 16px; ">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    LV1
                                </font></font></div>
                    </div>
                    <div style="margin-top:10px; font-weight:bold;"><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">
                                Cashback</font></font><font id="P1"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;"> {{setting('first_ref')}}%</font></font></font>
                    </div>
                    <div style="margin-top:10px;"><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">
                                Total tim </font></font><font id="task1_count"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">{{$first_level_users->count()}}</font></font></font>
                    </div>
                    <div style="margin-top:10px;"><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">
                                Investasi tim </font></font><font id="lv1_team_income"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">Rp {{number_format($totalpurchase1)}}</font></font></font>
                    </div>
                    <div style="margin-top:10px;"><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">
                                Penarikan </font></font><font id="lv1_team_income"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">Rp {{number_format($totalWithdraw1)}}</font></font></font>
                    </div>

                    <div style="margin-top:10px;">
                        <font style="vertical-align: inherit;">
                            <a style="width: 60%; font-weight: 400; height: 30px; line-height: 30px; font-size: 14px; display: inline-block; background: #36c726; color: #fff; border: 1px groove #FFF; border-radius: 25px; " type="button"  href="{{ route('user.team.member',1) }}">Detail</a>
                        </font>
                    </div>

                </div>
            </div>
            <div style="float:left; width:33.33%; text-align:center; height:150px;">
                <div style="text-align:center; width:100%;">
                    <div style="height: 60px; width: 60px; margin:0 auto; border-radius: 100px; background: #36c726; line-height: 60px; color: #FFF; font-weight: bold; font-size: 16px; ">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                LV2
                            </font></font></div>
                </div>
                <div style="margin-top: 10px; font-weight: bold;"><font style="vertical-align: inherit;"><font
                            style="vertical-align: inherit;">
                            Cashback</font></font><font id="P2"><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;"> {{setting('second_ref')}}%</font></font></font>
                </div>
                <div style="margin-top:10px;"><font style="vertical-align: inherit;"><font
                            style="vertical-align: inherit;">
                            Total tim </font></font><font id="task2_count"><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">{{$second_level_users->count()}}</font></font></font>
                </div>
                <div style="margin-top:10px;"><font style="vertical-align: inherit;"><font
                            style="vertical-align: inherit;">
                            Investasi tim </font></font><font id="lv2_team_income"><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">Rp {{number_format($totalpurchase2)}}</font></font></font>
                </div>
                <div style="margin-top:10px;"><font style="vertical-align: inherit;"><font
                            style="vertical-align: inherit;">
                            Penarikan </font></font><font id="lv2_team_income"><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">Rp {{number_format($totalWithdraw2)}}</font></font></font>
                </div>

                <div style="margin-top:10px;">
                    <font style="vertical-align: inherit;">
                        <a style="width: 60%; font-weight: 400; height: 30px; line-height: 30px; font-size: 14px; display: inline-block; background: #36c726; color: #fff; border: 1px groove #FFF; border-radius: 25px; " type="button"  href="{{ route('user.team.member',2) }}">Detail</a>
                    </font>
                </div>

            </div>
            <div style="float:left; width:33.33%; text-align:center; height:150px;">
                <div style="text-align:center; width:100%;">
                    <div style="height: 60px; width: 60px; margin:0 auto; border-radius: 100px; background: #36c726; line-height: 60px; color: #FFF; font-weight: bold; font-size: 16px; ">
                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                LV3
                            </font></font></div>
                </div>
                <div style="margin-top: 10px; font-weight: bold;"><font style="vertical-align: inherit;"><font
                            style="vertical-align: inherit;">
                            Cashback</font></font><font id="P3"><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;"> {{setting('third_ref')}}%</font></font></font>
                </div>
                <div style="margin-top:10px;"><font style="vertical-align: inherit;"><font
                            style="vertical-align: inherit;">
                            Total tim </font></font><font id="task3_count"><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">{{$third_level_users->count()}}</font></font></font>
                </div>
                <div style="margin-top:10px;"><font style="vertical-align: inherit;"><font
                            style="vertical-align: inherit;">
                            Investasi tim </font></font><font id="lv3_team_income"><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">Rp {{number_format($totalpurchase3)}}</font></font></font>
                </div>
                <div style="margin-top:10px;"><font style="vertical-align: inherit;"><font
                            style="vertical-align: inherit;">
                            Penarikan </font></font><font id="lv3_team_income"><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">Rp {{number_format($totalWithdraw3)}}</font></font></font>
                </div>

                <div style="margin-top:10px;">
                    <font style="vertical-align: inherit;">
                        <a style="width: 60%; font-weight: 400; height: 30px; line-height: 30px; font-size: 14px; display: inline-block; background: #36c726; color: #fff; border: 1px groove #FFF; border-radius: 25px; " type="button"  href="{{ route('user.team.member',3) }}">Detail</a>
                    </font>
                </div>
            </div>
        </div>

        <div style="height:180px; overflow: hidden; margin-top: 5px; font-size: 12px; background: #fff; color: #000; padding-top: 10px; padding-bottom: 10px;">
            <div style="float:left; width:25%">
                <img src="{{asset('public')}}/ui3/lm.png" style="height:150px; margin-top:10px;">
            </div>
            <div style="float:left; width:75%; text-align:left;">
                <div style="margin-left:20px;">
                    <div style="font-weight:bold; font-size:18px; margin-top:20px;"><font
                            style="vertical-align: inherit;"><font style="vertical-align: inherit;">Bagikan dengan mudah!</font></font></div>
                    <div style=" font-size: 12px; margin-top: 10px;"><font style="vertical-align: inherit;"><font
                                style="vertical-align: inherit;">Bagikan kode undangan dan ajak teman bergabung.</font></font></div>
                                
                     <div style="font-size: 12px; margin-top: 15px; width: 100%; overflow: hidden; height:auto; text-align:center; ">
                        <div style="border: 1px groove #36c726; float: left; width: 65%; height: 30px; line-height: 30px; text-align: center; border-radius: 25px; ">
                            <div style="font-size: 12px; float:left; width:45%"><font
                                    style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        Link undangan :
                                    </font></font></div>
                            <div style="font-size: 12px; float: left; width: 55%; overflow: hidden; text-align: left; text-overflow: ellipsis; white-space: nowrap; "
                                 id="link"><font style="vertical-align: inherit;"><font
                                        style="vertical-align: inherit;">{{url('register').'?inviteCode='.auth()->user()->ref_id}}</font></font>
                            </div>
                        </div>
                        <div style=" float: left; width: 32%; height: 30px; line-height: 30px; text-align: center; border-radius: 25px; " onclick="copyLink('{{url('register').'?inviteCode='.auth()->user()->ref_id}}')">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input
                                        id="copy" value="Salin"
                                        style="width: 60%; font-weight: 400; height: 30px; line-height: 25px; font-size: 14px; display: inline-block; background: #36c726; color: #fff; border: 1px groove #FFF; border-radius: 25px; "
                                        type="button" data-clipboard-text=""></font></font>
                        </div>
                    </div>

                    <div style="font-size: 12px; margin-top: 15px; width: 100%; overflow: hidden; height:auto; ">
                        <div style="border: 1px groove #36c726; float: left; width: 65%; height: 30px; line-height: 30px; text-align: center; border-radius: 25px; ">
                            <font><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                        Kode undangan :
                                    </font></font></font>
                            <font style="font-weight:bold; font-size:12px;" id="invitation"><font
                                    style="vertical-align: inherit;"><font
                                        style="vertical-align: inherit;">{{auth()->user()->ref_id}}</font></font></font>
                        </div>
                        <div style=" float: left; width: 32%; height: 30px; line-height: 30px; text-align: center; border-radius: 25px; " onclick="copyLink('{{auth()->user()->ref_id}}')">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input
                                        id="copy1" value="Salin"
                                        style="width: 60%; font-weight: 400; height: 30px; line-height: 25px; font-size: 14px; display: inline-block; background: #36c726; color: #fff; border: 1px groove #FFF; border-radius: 25px; "
                                        type="button" data-clipboard-text="17FLME"></font></font>
                        </div>
                    </div>
                   

                </div>

            </div>
        </div>
        <div style="background: #fff; width: 100%; margin: 0 auto; padding-bottom:20px; height: auto; overflow: hidden; position: relative; ">
            <div style="padding:15px; padding-bottom:0px; text-align:left;">
                <div style="color:#000; border-left:3px solid #000;"><font style="vertical-align: inherit;"><font
                            style="vertical-align: inherit;">&nbsp;&nbsp;Penjelasan cashback</font></font></div>
            </div>
            <div style="width:98%;margin:0 auto;">
    <div style=" text-align:left; font-size:12px;  border-radius: 10px; width: 95%; color:#666; margin: 0 auto; height: auto; overflow: hidden; margin-top: 10px; position: relative;">
        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
            Anda mengundang teman A untuk berinvestasi. </font><font style="vertical-align: inherit;">“A” adalah anggota level 1 Anda. </font><font style="vertical-align: inherit;">Anda akan menerima {{setting('first_ref')}}% cashback dari investasi anggota level 1. </font></font><br><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
            A mengundang teman B untuk berinvestasi, dan "B" adalah anggota level 2 Anda. </font><font style="vertical-align: inherit;">Anda akan menerima {{setting('second_ref')}}% cashback dari investasi anggota level 2. </font></font><br><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
            B mengundang teman C untuk  berinvestasi. </font><font style="vertical-align: inherit;">“C” adalah anggota level 3 Anda. </font><font style="vertical-align: inherit;">Anda akan menerima {{setting('third_ref')}}% cashback dari investasi anggota level 3.</font></font><br><br>
            </div>
            </div>
        </div>
    </div>
    @include('app.layout.menu')
</div>
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
        message('Berhasil salin')
    }
</script>

</body>
</html>
