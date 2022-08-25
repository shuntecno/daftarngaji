
<?php $__env->startSection('content'); ?>

<div class="r">
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- PAGE CONTAINER-->

    <div class="page-container">
        <?php echo $__env->make('layouts.header-desktop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row m-t-25 d-flex justify-content-center">
                      <div class="col-sm-6 col-lg-3">
                          <div class="overview-item overview-item--c1">
                              <div class="overview__inner">
                                  <div class="overview-box clearfix">
                                      <div class="icon">
                                          <i class="zmdi zmdi zmdi-account-o"></i>
                                      </div>
                                      <div class="text">
                                          <h2><?php echo e($jamaah); ?></h2>
                                          <h5 class="text-light">user</h5>
                                      </div>
                                  </div>
                                <div class="overview-chart d-flex align-items-end flex-column">
                                    <div class="mt-auto p-2 mb-4">
                                      <a href="<?php echo e(route('user')); ?>" class="btn btn-danger" role="button" aria-disabled="true">Aksi</a>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-6 col-lg-3">
                          <div class="overview-item overview-item--c2">
                              <div class="overview__inner">
                                  <div class="overview-box clearfix">
                                      <div class="icon">
                                          <i class="zmdi zmdi zmdi-pin-account"></i>
                                      </div>
                                      <div class="text">
                                          <h2><?php echo e($pendaftar); ?></h2>
                                          <h5 class="text-light">pendaftar</h5>
                                      </div>
                                  </div>
                                  <div class="overview-chart d-flex align-items-end flex-column">
                                    <div class="mt-auto p-2 mb-4">
                                        <a href="<?php echo e(route('verifikasi_user')); ?>" class="btn btn-danger" role="button" aria-disabled="true">Aksi</a>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-sm-6 col-lg-3">
                          <div class="overview-item overview-item--c3">
                              <div class="overview__inner">
                                  <div class="overview-box clearfix">
                                      <div class="icon">
                                          <i class="zmdi zmdi-calendar-note"></i>
                                      </div>
                                      <div class="text">
                                          <h2><?php echo e($kajian); ?></h2>
                                          <h5 class="text-light">kajian</h5>
                                      </div>
                                  </div>
                                  <div class="overview-chart d-flex align-items-end flex-column">
                                    <div class="mt-auto p-2 mb-4">

                                    </div>

                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\backup_xampp\htdocs\daftar_ngaji\resources\views/frontend/dashboard.blade.php ENDPATH**/ ?>