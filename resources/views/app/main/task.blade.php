<html lang="en">
<head>
    <style class="vjs-styles-defaults">
        .video-js {
            width: 300px;
            height: 150px;
        }

        .vjs-fluid {
            padding-top: 56.25%
        }
    </style>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=0,initial-scale=1,maximum-scale=1, minimum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>Daftar Tugas</title>
    <link href="{{asset('public')}}/Lay/css/layui.css" rel="stylesheet">
    <link href="{{asset('public')}}/css/main.css" rel="stylesheet">
    <link href="{{asset('public')}}/layer_mobile/need/layer.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/task.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <style>
     body {
            font-family: 'Roboto', sans-serif;
        }
        .receiveno {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 104px;
            height: 32px;
            line-height: 32px;
            background: #486D48;
            border-radius: 5px;
            color: #fff;
        }
        .claim {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 104px;
            height: 32px;
            line-height: 32px;
            background: #43ad43;
            border-radius: 5px;
            color: #fff;
        }
        .not {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 104px;
            height: 32px;
            line-height: 32px;
            background: #808080;
            border-radius: 5px;
            color: #fff;
        }
    </style>
</head>
<body
    style="min-height: 100%; width: 100%; background: url({{asset('public')}}/ui3//tabg.png) no-repeat; background-size: 100% 300%;">
<div class="indexdiv"></div>

<div style=" max-width:450px; margin:0 auto; position:relative;">
    <div class="top1">
    </div>
    <div class="top" style="background: #36c726 ">
        <div style="float:left; line-height:46px;width:50%;cursor:pointer;" id="btnClose">
            <img onclick="window.location.href='{{route('dashboard')}}'"
                 style="width: 20px;margin-left: 10px;margin-top: 15px;" src="{{asset('public/left.png')}}" alt="">
        </div>
        <font class="topname" id="title" style="color: #fff; text-overflow: ellipsis; overflow: hidden; "><font
                style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                    Daftar Tugas
                </font></font></font>
        <div style="float:right; text-align:right; line-height:46px;width:50%;">
        </div>
    </div>

    <div style=" width: 100%; margin: 0 auto;  ">
        <div
            style="width: 100%; margin-top: 50px; height:200px; background: url({{asset('public')}}/ui3/task.png) no-repeat; background-size: 100% 100%; position: relative; ">
            <div
                style=" position:absolute; left:20px; bottom:50px; color: #000; font-size: 30px; text-align: center; border-radius: 5px; height: 80px; margin: 0 auto;  overflow: hidden; ">
                
            </div>
        </div>
    </div>

    <div style=" position:absolute; width:100%;  margin-top: 0px;  text-align: center; margin-bottom: 60px;  ">
        <div
            style="text-align: center; background:#fff; width: 100%; margin: 0 auto; margin-top: 0px; border-top-right-radius: 30px; border-top-left-radius: 30px; padding-bottom: 15px; height: auto; overflow: hidden; position: relative; ">
            <div
                style="text-align: center;  width: 100%; margin: 0 auto; margin-top: 10px; height: auto; overflow: hidden; position: relative; ">

                @foreach(\App\Models\Task::orderBy("invest", 'asc')->get() as $key=>$element)
                    <?php
                        $submittedTask = \App\Models\TaskRequest::where('user_id', auth()->id())->where('task_id', $element->id)->first();
                    ?>
                <div
                    style="background: #f1f1f1; width: 95%; margin: 0 auto; margin-top: 10px; height: auto; padding-top: 10px; padding-bottom: 10px; overflow: hidden; position: relative; border-radius: 10px;">
                    <div style="width:75%;text-align:left;">
                        <div style="padding: 10px;"><font style="vertical-align: inherit;"><font
                                    style="vertical-align: inherit;">{{$key+1}}. Undang teman untuk membeli aset adstro dan dapatkan bonus </font></font></div>
                    </div>
                    <div style="width:100%;text-align:center;">
                        <div style="float:left;width:50%">
                            <div id="task4_income"
                                 style="padding-left: 10px; padding-top: 10px; padding-bottom: 5px; color: #36c726; font-size: 16px; ">
                                <font style="vertical-align: inherit;"><font
                                        style="vertical-align: inherit;">Rp {{number_format($element->bonus)}}</font></font></div>
                            <div style="padding-left: 10px; padding-bottom: 10px; "><font
                                    style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hadiah</font></font>
                            </div>
                        </div>

                        <div style="float:left;width:50%">
                            <div id="task4_income_lq"
                                 style="padding-left: 10px; padding-top: 10px; padding-bottom: 5px; color: #36c726; font-size: 16px; ">
                                <font style="vertical-align: inherit;"><font
                                        style="vertical-align: inherit;">
                                        @if ($submittedTask)
                                            Tugas berhasil
                                        @else
                                        Rp {{number_format($totalDeposit)}} / Rp {{number_format($element->invest)}}
                                        @endif
                                        </font></font></div>
                            <div style="padding-left: 10px; padding-bottom: 10px;"><font
                                    style="vertical-align: inherit;"><font style="vertical-align: inherit;">Investasi tim LV 1</font></font></div>
                        </div>
                    </div>
                    @if($submittedTask)
                    <div class="receiveno" id="Receive1"  style="font-size:12px;"><font
                            style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                Sudah diterima
                            </font></font></div>
                    @else
                        @if($totalDeposit >= $element->invest)
                        <div class="claim" id="Receive1" onclick="claimReward({{$element->id}})"  style="font-size:12px; background:#36c726"><font
                                style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                    Ambil
                                </font></font></div>
                        @else
                            <div class="not" id="Receive1"  style="font-size:12px;"><font
                                    style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                       Belum memenuhi
                                    </font></font></div>
                        @endif
                    @endif
                </div>
                @endforeach

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
    function claimReward(id){
        document.querySelector('.loading').style.display = 'block';
        window.location.href = "{{url('apply-for-task-commission')}}"+"/"+id;
    }
</script>
</body>
</html>
