<!-- HEADER DESKTOP-->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">

                <div class="header-button">

                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="<?php echo e(asset('dashboard-tem/images/user-avatar-with-check-mark.png')); ?>" alt="John Doe" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?php echo e(Auth::user()->nama); ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="<?php echo e(asset('dashboard-tem/images/user-avatar-with-check-mark.png')); ?>" alt="John Doe" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#"><?php echo e(Auth::user()->nama); ?></a>
                                        </h5>
                                        <span class="email"><?php echo e(Auth::user()->email); ?></span>
                                    </div>
                                </div>

                                <div class="account-dropdown__footer">
                                  <a href="<?php echo e(route('dashboard-ganti-password')); ?>"><i class="zmdi zmdi-lock"></i>Ganti Pasword</a>
                                  <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="zmdi zmdi-power"></i>Logout</a></a>
                                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                                    <?php echo csrf_field(); ?>
                                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER DESKTOP-->
<?php /**PATH F:\backup_xampp\htdocs\daftar_ngaji\resources\views/layouts/header-desktop.blade.php ENDPATH**/ ?>