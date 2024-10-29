<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/a227f43b8a.js" crossorigin="anonymous"></script>
<style>
.nav, .nav * {
    font-family: 'Roboto', sans-serif;
    font-style: inherit; 
    font-weight: inherit;
    color: inherit; 
}
</style>


<nav class="nav" style="background-size:100% 100%; height:60px; ">
    <div onclick="window.location.href='{{route('dashboard')}}'" @if(\Route::currentRouteName() == 'dashboard') style="color: #4CAF50 !important; font-weight: bold;" @endif>
        @if(\Route::currentRouteName() == 'dashboard')
            <img src="{{asset('public')}}/ui3/nav/home.png" style="height: 28px;    filter: hue-rotate(45deg);"> <br>
            <span id="nav_btn1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Utama</font></font></span>
        @else
            <img src="{{asset('public')}}/ui3/nav/home.png" class="gray" style="height: 28px;"> <br>
            <span id="nav_btn1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Utama</font></font></span>
        @endif
    </div>
    <div class="navtab " onclick="window.location.href='{{route('vip')}}'" @if(\Route::currentRouteName() == 'vip') style="color: #4CAF50 !important; font-weight: bold;" @endif>
        @if(\Route::currentRouteName() == 'vip')
            <img src="{{asset('public')}}/ui3/nav/purchase.png" class="" style="height: 28px;filter: hue-rotate(45deg);"> <br>
            <span id="nav_btn2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Produk</font></font></span>
        @else
            <img src="{{asset('public')}}/ui3/nav/purchase.png" class="gray" style="height: 28px;"> <br>
            <span id="nav_btn2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Produk</font></font></span>
        @endif
    </div>
    <div class="navtab" onclick="window.location.href='{{route('user.team')}}'" @if(\Route::currentRouteName() == 'user.team') style="color: #4CAF50 !important; font-weight: bold;" @endif>
        @if(\Route::currentRouteName() == 'user.team')
            <img src="{{asset('public')}}/ui3/nav/reward.png" class="" style="height:28px;filter: hue-rotate(45deg);"> <br>
            <span id="nav_btn3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cashback</font></font></span>
        @else
            <img src="{{asset('public')}}/ui3/nav/reward.png" class="gray" style="height:28px width:28px;"> <br>
            <span id="nav_btn3"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cashback</font></font></span>
        @endif
    </div>
    <div class="navtab" onclick="window.location.href='{{route('profile')}}'" @if(\Route::currentRouteName() == 'profile') style="color: #4CAF50 !important; font-weight: bold;" @endif>
        @if(\Route::currentRouteName() == 'profile')
            <img src="{{asset('public')}}/ui3/nav/profile.png" class="" style="height: 28px;filter: hue-rotate(45deg);"> <br>
            <span id="nav_btn4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Profil</font></font></span>
        @else
            <img src="{{asset('public')}}/ui3/nav/profile.png" class="gray" style="height: 28px;"> <br>
            <span id="nav_btn4"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Profil</font></font></span>
        @endif
    </div>
</nav>
