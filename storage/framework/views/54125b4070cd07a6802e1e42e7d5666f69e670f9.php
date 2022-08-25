<!-- HEADER MOBILE-->

<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
              <div class="d-flex flex-row">
                <a class="logo" href="<?php echo e(route('home')); ?>">
                    <img src="<?php echo e(asset('daftarngaji/logo.png')); ?>" alt="Daftar Ngaji"  width="60" height="70"/>
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
              <?php if(Auth::user()->level == 1): ?>
                <li>
                    <a class="js-arrow" href="<?php echo e(route('dashboard')); ?>" style="<?php if(Route::currentRouteName()=="dashboard"){ echo "color:blue";}?>">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>

                <li>
                    <a href="<?php echo e(route('table-masjid')); ?>" style="<?php if(Route::currentRouteName()=="table-masjid"){ echo "color:blue";}?>">
                        <i class="fas fa-mosque"></i>Masjid</a>
                </li>
                <li>
                    <a href="<?php echo e(route('user')); ?>" style="<?php if(Route::currentRouteName()=="user"){ echo "color:blue";}?>">
                        <i class="fas fa-user"></i>User</a>
                </li>
                <li>
                    <a href="<?php echo e(route('verifikasi_user')); ?>" style="<?php if(Route::currentRouteName()=="verifikasi_user"){ echo "color:blue";}?>">
                        <i class="fa fa-users"></i>Pendaftar</a>
                </li>
                <li>
                    <a href="<?php echo e(route('slider')); ?>" style="<?php if(Route::currentRouteName()=="slider"){ echo "color:blue";}?>">
                        <i class="fa fa-file-image-o"></i>Slider</a>
                </li>
                <?php else: ?>
                <li>
                    <a href="<?php echo e(route('home')); ?>">
                        <i class="fa fa-calendar-o"></i>kajian</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
</header>

<!-- END HEADER MOBILE -->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo ">
      <div class="d-flex align-items-center">
        <a href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(asset('daftarngaji/logo.png')); ?>" alt="Daftar Ngaji"  width="60" height="70"/>
        </a>
        <h3 class="text-warning align-self-end ml-2" >Daftar ngaji</h3>
      </div>

    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <?php if(Auth::user()->level == 1): ?>
                <li>
                    <a class="js-arrow" href="<?php echo e(route('dashboard')); ?>" style="<?php if(Route::currentRouteName()=="dashboard"){ echo "color:blue";}?>">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>

                <li>
                    <a href="<?php echo e(route('table-masjid')); ?>" style="<?php if(Route::currentRouteName()=="table-masjid"){ echo "color:blue";}?>">
                        <i class="fas fa-mosque"></i>Masjid</a>
                </li>
                <li>
                    <a href="<?php echo e(route('user')); ?>" style="<?php if(Route::currentRouteName()=="user"){ echo "color:blue";}?>">
                        <i class="fas fa-user"></i>User</a>
                </li>
                <li>
                    <a href="<?php echo e(route('verifikasi_user')); ?>" style="<?php if(Route::currentRouteName()=="verifikasi_user"){ echo "color:blue";}?>">
                        <i class="fa fa-users"></i>Pendaftar</a>
                </li>
                <li>
                    <a href="<?php echo e(route('slider')); ?>" style="<?php if(Route::currentRouteName()=="slider"){ echo "color:blue";}?>">
                        <i class="fa fa-file-image-o"></i>Slider</a>
                </li>
                <?php else: ?>
                <li>
                    <a href="<?php echo e(route('home')); ?>">
                        <i class="fa fa-calendar-o"></i>kajian</a>
                </li>
                <?php endif; ?>

            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
<?php /**PATH F:\backup_xampp\htdocs\daftar_ngaji\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>