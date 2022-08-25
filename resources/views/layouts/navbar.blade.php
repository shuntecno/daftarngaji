<!-- HEADER MOBILE-->

<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
              <div class="d-flex flex-row">
                <a class="logo" href="{{route('home')}}">
                    <img src="{{asset('daftarngaji/logo.png')}}" alt="Daftar Ngaji"  width="60" height="70"/>
                </a>
                <h4 class="text-warning align-self-end ml-2" >Daftar ngaji</h4>
              </div>

                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
              @if(Auth::user()->level == 1)
                <li>
                    <a class="js-arrow" href="{{route('dashboard')}}" style="<?php if(Route::currentRouteName()=="dashboard"){ echo "color:blue";}?>">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>

                <li>
                    <a href="{{route('table-masjid')}}" style="<?php if(Route::currentRouteName()=="table-masjid"){ echo "color:blue";}?>">
                        <i class="fas fa-mosque"></i>Masjid</a>
                </li>
                <li>
                    <a href="{{route('user')}}" style="<?php if(Route::currentRouteName()=="user"){ echo "color:blue";}?>">
                        <i class="fas fa-user"></i>User</a>
                </li>
                <li>
                    <a href="{{route('verifikasi_user')}}" style="<?php if(Route::currentRouteName()=="verifikasi_user"){ echo "color:blue";}?>">
                        <i class="fa fa-users"></i>Pendaftar</a>
                </li>
                <li>
                    <a href="{{route('slider')}}" style="<?php if(Route::currentRouteName()=="slider"){ echo "color:blue";}?>">
                        <i class="fa fa-file-image-o"></i>Slider</a>
                </li>
                @else
                <li>
                    <a href="{{route('home')}}">
                        <i class="fa fa-calendar-o"></i>kajian</a>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</header>

<!-- END HEADER MOBILE -->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo ">
      <div class="d-flex align-items-center">
        <a href="{{route('home')}}">
            <img src="{{asset('daftarngaji/logo.png')}}" alt="Daftar Ngaji"  width="60" height="70"/>
        </a>
        <h3 class="text-warning align-self-end ml-2" >Daftar ngaji</h3>
      </div>

    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                @if(Auth::user()->level == 1)
                <li>
                    <a class="js-arrow" href="{{route('dashboard')}}" style="<?php if(Route::currentRouteName()=="dashboard"){ echo "color:blue";}?>">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>

                <li>
                    <a href="{{route('table-masjid')}}" style="<?php if(Route::currentRouteName()=="table-masjid"){ echo "color:blue";}?>">
                        <i class="fas fa-mosque"></i>Masjid</a>
                </li>
                <li>
                    <a href="{{route('user')}}" style="<?php if(Route::currentRouteName()=="user"){ echo "color:blue";}?>">
                        <i class="fas fa-user"></i>User</a>
                </li>
                <li>
                    <a href="{{route('verifikasi_user')}}" style="<?php if(Route::currentRouteName()=="verifikasi_user"){ echo "color:blue";}?>">
                        <i class="fa fa-users"></i>Pendaftar</a>
                </li>
                <li>
                    <a href="{{route('slider')}}" style="<?php if(Route::currentRouteName()=="slider"){ echo "color:blue";}?>">
                        <i class="fa fa-file-image-o"></i>Slider</a>
                </li>
                @else
                <li>
                    <a href="{{route('home')}}">
                        <i class="fa fa-calendar-o"></i>kajian</a>
                </li>
                @endif

            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
