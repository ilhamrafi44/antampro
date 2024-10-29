<!DOCTYPE html>
<html lang="en" class="translated-ltr">
<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=0,initial-scale=1,maximum-scale=1, minimum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>Homepage</title>
    <link href="{{asset('public')}}/Lay/css/layui.css" rel="stylesheet">
    <link href="{{asset('public')}}/css/main.css" rel="stylesheet">
    <link href="{{asset('public')}}/layer_mobile/need/layer.css" rel="stylesheet">
    <link href="{{asset('public')}}/index.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a227f43b8a.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: #f1f1f1;
            font-family: 'Roboto', sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 450px;
            margin: 0 auto;
            padding: 0; 
        }
        .header {
            background-color: #36c726;
            padding: 10px 0;
            text-align: center;
            color: #fff;
            font-size: 24px;
        }
        .logo-banner-wrapper {
            position: relative;
            text-align: center;
            margin-bottom: 20px;
        }
        .logo-banner-wrapper img.logo {
            width: 100px;
            margin: 0 auto;
            display: block;
            z-index: 2;
            position: relative;
        }
        .logo-banner-wrapper .banner-decor {
            width: 100%;
            height: 50px;
            background: linear-gradient(to bottom, #f1f1f1 0%, transparent 100%);
            position: absolute;
            top: 100px;
            z-index: 1;
        }
        .banner-image {
            width: 100%;
            height: 190px;
            border-radius: 10px;
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
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
</head>
<body style="min-height: 100%; width: 100%; background-size: 100% auto; background: #f1f1f1; ">


<div style="max-width:450px; margin:0 auto;">
    <div class="container">
        <div class="logo-banner-wrapper">
            <img src="{{asset('public')}}/ui3/antm.png" class="banner-image" alt="Banner Image">
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
    <div style="text-align: center; background: #fff; width: 100%; margin: 0 auto; margin-top: 10px; border-radius: 5px !important; height: auto; overflow: hidden; position: relative;">
        <div class="divWrap" style="padding: 10px; padding-top: 5px; padding-bottom: 5px;">
            <div style="float: left; width: 10%; font-size: 12px; color: #1476ff;">
                <img src="{{asset('public')}}/ui3/ti.png" style="height:20px;margin-right:5px;">
            </div>
            <div class="div" style="float:left; width:80%; color:#000;">
                <marquee behavior="" direction="">
                    Platform adi invest  , platrom investasi pertanian yang sudah legal.
                </marquee>
            </div>
        </div>
    </div>
    <div style="height: auto; overflow: hidden; margin-top:5px; font-size:12px; background:#fff; padding-top:10px; padding-bottom:10px;">
        <div style="height:90px;">
            <div style="float:left;width: 25%; text-align:center;" id="Recharge" onclick="window.location.href='{{route('user.recharge')}}'">
                <div style="height:45px;">
                    <i class="fa-duotone fa-money-simple-from-bracket fa-2x" style="--fa-primary-color: #bababa; --fa-secondary-color: #36c726;"></i>
                </div>
                <div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Topup saldo</font></font></div>
            </div>
            <div style="float: left; width: 25%; text-align: center;" id="Withdraw" onclick="window.location.href='{{route('user.withdraw')}}'">
                <div style="height:45px;">
                    <i class="fa-duotone fa-money-bill-transfer fa-2x" style="--fa-primary-color: #bababa; --fa-secondary-color: #36c726;"></i>
                </div>
                <div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Penarikan</font></font></div>
            </div>
            <div style="float: left; width: 25%; text-align: center;" id="cs" onclick="window.location.href='{{route('service')}}'">
                <div style="height:45px;">
                <i class="fa-duotone fa-headset fa-2x" style="--fa-primary-color: #bababa; --fa-secondary-color: #36c726; --fa-secondary-opacity: 0.4;"></i>                </div>
                <div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Customer service</font></font></div>
            </div>
            <div style="float: left; width: 25%; text-align: center;" id="down">
    <div style="height:45px;">
        <i class="fa-duotone fa-download fa-2x" style="--fa-primary-color: #bababa; --fa-secondary-color: #36c726;"></i>
    </div>
    <div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Unduh aplikasi</font></font></div>
</div>

<script>
   document.getElementById('down').addEventListener('click', function() {
            const link = document.createElement('a');
            link.href = '/adi-farm.apk';
            link.download = 'adi-farm.apk';
            document.body.appendChild(link); // Tambahkan elemen <a> ke body
            link.click(); // Klik elemen <a> untuk memulai unduhan
            document.body.removeChild(link); // Hapus elemen <a> setelah klik
        });
</script>

        </div>
        <div>
            <div style="float:left;width: 25%; text-align:center;" id="ck" onclick="window.location.href='{{route('user.promo')}}'">
                <div style="height:45px;">
                    <i class="fa-duotone fa-calendar-check fa-2x" style="--fa-primary-color: #bababa; --fa-secondary-color: #36c726;"></i>
                </div>
                <div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Checkin harian</font></font></div>
            </div>
            <div style="float: left; width: 25%; text-align: center;" id="task2" onclick="window.location.href='{{route('task')}}'">
                <div style="height:45px;">
                    <i class="fa-duotone fa-list-check fa-2x" style="--fa-primary-color: #bababa; --fa-secondary-color: #36c726;"></i>
                </div>
                <div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Daftar tugas</font></font></div>
            </div>
            <div style="float: left; width: 25%; text-align: center;" id="about" data-toggle="modal" data-target="#videoModal">
    <div style="height:45px;">
        <i class="fa-duotone fa-messages-question fa-2x" style="--fa-primary-color: #bababa; --fa-secondary-color: #36c726;"></i>
    </div>
    <div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Tutorial</font></font></div>
</div>

            <div style="float: left; width: 25%; text-align: center;" id="out" onclick="window.location.href = '{{url('logout')}}'">
                <div style="height:45px;">
                    <i class="fa-duotone fa-left-from-bracket fa-2x" style="--fa-primary-color: #bababa; --fa-secondary-color: #36c726;"></i>
                </div>
                <div><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Keluar aplikasi</font></font></div>
            </div>
        </div>
    </div>
    <div style="margin-top:15px;">
        
         <!-- Swiper -->
           <div class="swiper mySwiper mb-4">
          <div class="swiper-wrapper">
              
              
            
            <div class="swiper-slide">
              <a href="">
              <img class="img-fluid rounded" src="{{asset('public/imgs/1.jpg')}}" alt="" />
              </a>
            </div>
            
            
            <div class="swiper-slide">
              <a href="">
              <img class="img-fluid rounded" src="{{asset('public/imgs/2.jpg')}}" alt="" />
              </a>
            </div>
            
            <div class="swiper-slide">
              <a href="">
              <img class="img-fluid rounded" src="{{asset('public/imgs/3.jpg')}}" alt="" />
              </a>
            </div>
            
          
            
          </div>
        </div>
        <br>
        <br>
        <br>
</div>

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="videoModalLabel">Tutorial Topup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Browser anda tidak didukung
      </div>
    </div>
  </div>
</div>

</div>
@include('app.layout.menu')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
      var swiper = new Swiper(".mySwiper", {
        spaceBetween: 15,
        slidesPerView: 1,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        // pagination: {
        //   el: ".swiper-pagination",
        //   clickable: true,
        // },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
</body>
</html>
