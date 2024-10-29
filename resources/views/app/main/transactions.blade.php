<html>
<head>
    <meta charset="utf-8">
    <title>History</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="{{asset('public')}}/Lay/css/layui.css" rel="stylesheet">
    <link href="{{asset('public')}}/css/main.css" rel="stylesheet">
    <style type="text/css">
        .topname {
            line-height: 46px;
            font-weight: bold;
            font-size: 14px;
            width: 75%;
            text-align: center;
            color: #000;
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            margin: auto;
        }


        .typeitem {
            float: left;
            width: 50%;
            height: auto;
            overflow: hidden;
        }

        .over {
            border-bottom: 1px solid #000;
        }
        p.sposp {
            border: 1px solid #000;
            padding: 2px 12px;
            border-radius: 50px;
        }

        

/*   Pagination css  */
/*------------------*/

.pagination {
	display: -ms-flexbox;
	display: flex;
    padding-left: 0;
	gap: 12px;
	list-style: none;
	border-radius: .25rem;
	overflow: scroll;
	justify-content: center;
}

.page-link {
	position: relative;
	display: block;
	padding: .5rem .75rem;
	margin-left: -1px;
	line-height: 1.25;
	color: #f0d4ac;
	background-color: #fff;
	border: 1px solid #dee2e6;
}

.page-link:hover {
	z-index: 2;
	color: #000;
	text-decoration: none;
	background-color: #f0d4ac;
	border-color: #f0d4ac;
}

.page-link:focus {
	z-index: 2;
	outline: 0;
	box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.page-item:first-child .page-link {
	margin-left: 0;
	border-top-left-radius: .25rem;
	border-bottom-left-radius: .25rem;
}

.page-item:last-child .page-link {
	border-top-right-radius: .25rem;
	border-bottom-right-radius: .25rem;
}

.page-item.active .page-link {
	z-index: 1;
	color: #000;
	background-color: #f0d4ac;
	border-color: #f0d4ac;
}

.page-item.disabled .page-link {
	color: #6c757d;
	pointer-events: none;
	cursor: auto;
	background-color: #e6e6e6;
	border-color: #e5ecf2;
}

.pagination-lg .page-link {
	padding: .75rem 1.5rem;
	font-size: 1.25rem;
	line-height: 1.5;
}

.pagination-lg .page-item:first-child .page-link {
	border-top-left-radius: .3rem;
	border-bottom-left-radius: .3rem;
}

.pagination-lg .page-item:last-child .page-link {
	border-top-right-radius: .3rem;
	border-bottom-right-radius: .3rem;
}

.pagination-sm .page-link {
	padding: .25rem .5rem;
	font-size: .875rem;
	line-height: 1.5;
}

.pagination-sm .page-item:first-child .page-link {
	border-top-left-radius: .2rem;
	border-bottom-left-radius: .2rem;
}

.pagination-sm .page-item:last-child .page-link {
	border-top-right-radius: .2rem;
	border-bottom-right-radius: .2rem;
}

.pagination .page-item .page-link {
	padding: 6px 12px;
	box-shadow: none !important;
	color: #28292b;
	position: relative;
	z-index: 1;
	font-size: 16px;
}

.pagination .page-item.active .page-link {
	color: #000;
	background: #f0d4ac;
	border-color: #f0d4ac;
	position: relative;
	z-index: 2;
}

.pagination-sm .page-item .page-link {
	font-size: 14px;
}

.pagination-lg .page-item .page-link {
	font-size: 20px;
	padding: 6px 16px;
}
    </style>

    <link id="layuicss-layer" rel="stylesheet" href="{{asset('public')}}/Lay/css/modules/layer/default/layer.css"
          media="all">
</head>
<body style="background-size: 100% auto; background: #fff;">
<div style="width: 100%; margin: 0 auto; background:#36c726; " class="top">
    <div style="float:left; text-align:left; line-height:46px;width:50%;" id="btnClose" onclick="window.location.href='{{route('profile')}}'">
        <img style="margin-left: 15px;margin-top: 10px;" src="{{asset('public/icons8-chevron-left-30.png')}}" alt="">
    </div>
    <font class="topname" style="color: #fff;"><font style="vertical-align: inherit;"><font
                style="vertical-align: inherit;">
                Mutasi saldo
            </font></font></font>
    <div style="float:right; text-align:right; line-height:46px;width:50%;">

    </div>
</div>
<div style=" max-width:450px; margin:0 auto;margin-top: 70px;">

    <div style="">
        <ul>
            @foreach($data as $element)
                <li style="    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 5px 10px;
    background: #36c726;
    padding: 7px 16px;
    border-radius: 7px;">
                    <div>
                        <h3 style="font-weight: bold">
                            @if($element->reason == 'active')
                            Checkin harian
                            @elseif($element->reason == 'pending')
                            Tugas bonus
                            @else
                            {{reason($element->reason)}}
                            @endif
                        </h3>
                        <p>{{$element->created_at}}</p>
                    </div>
                    <div>
                        <h3 style="font-weight: bold">Rp {{number_format($element->amount)}}</h3>
                        <p>
                            @if($element->perticulation == 'Commission from antam.pro')
                            Cashback bonus
                            @elseif($element->perticulation == 'Package Commission added.')
                            Profit 
                            @elseif($element->perticulation == 'Withdraw anda berhasil disetujui.')
                            Penarikan sukses
                            @elseif($element->perticulation == 'Deposit anda berhasil disetujui.')
                            Topup sukses
                            @elseif($element->perticulation == 'active')
                            Checkin sukses
                            @elseif($element->perticulation == 'pending')
                            Tugas Berhasil
                            @else
                            {{$element->perticulation}}
                            @endif
                            
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>

        <div style="margin: 20px 10px;">
            {{ $data->appends($_GET)->onEachSide(0)->links('app.main.pagination') }}
        </div>

    </div>
    
</div>

</body>
</html>
