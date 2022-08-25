<div class="logo mx-auto" style="width: 200px;">
    <img src="<?php echo e(asset('daftarngaji/logo.png')); ?>">
</div>
<ul class="nav justify-content-center mt-2">
    <li class="nav-item">
        <a class="nav-link active" href="<?php echo e(url('/')); ?>">Beranda</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('list-masjid')); ?>">Masjid</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('list-kajian')); ?>">Kajian</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Akun</a>
        <div class="dropdown-menu">
            <?php if(auth()->guard()->guest()): ?>
            <a class="dropdown-item" href="<?php echo e(route('login')); ?>">Masuk</a>
            <?php if(Route::has('register')): ?>
            <a class="dropdown-item" href="<?php echo e(route('register')); ?>">Daftar</a>
            <?php endif; ?>
            <?php else: ?>
            <a class="dropdown-item" href="<?php echo e(route('profil-user')); ?>">Pengaturan Akun</a>
            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Logout</a>
                          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                              <?php echo csrf_field(); ?>
                          </form>
        </div>
    </li>
      <?php endif; ?>
</ul>
<?php /**PATH F:\backup_xampp\htdocs\daftar_ngaji\resources\views/layouts/navbar-view.blade.php ENDPATH**/ ?>