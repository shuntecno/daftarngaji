
<?php $__env->startSection('content'); ?>
<div class="container">



        <div class="row">
            <div class="col-md-10 col-lg-6 offset-lg-3 offset-md-1" id="main" style="padding-right: 0;padding-left: 0;">


                  <?php echo $__env->make('layouts.navbar-view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success alert-block konten mr-2 ml-2">
                      <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
                        <strong class="d-flex justify-content-center"><?php echo e($message); ?></strong>
                    </div>
                  <?php endif; ?>
                  <?php if($message = Session::get('warning')): ?>
                    <div class="alert alert-warning alert-block konten mr-2 ml-2">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong class="d-flex justify-content-center"><?php echo e($message); ?></strong>
                    </div>
                  <?php endif; ?>

                    <div class="carousel-inner">

                      <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="carousel-item <?php echo e($key == 0 ? 'active' : ''); ?>">
                        <a href="<?php echo e($data->link); ?>" class="slider d-block w-100"><img src="<?php echo e(\URL::to('/storage/slider')); ?>/<?php echo e($data->gambar); ?>" class="slider d-block w-100" alt="..." ></a>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="">

                <h3 class="text-center mt-4">Masjid</h3>

                <div class="container">
                  <div class="row d-flex justify-content-center">
                    <?php if($masjid->count() > 0): ?>
                      <?php $__currentLoopData = $masjid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <div class="col-lg-5 col-md-4 col-xs-6 thumb d-flex justify-content-center">
                <a class="thumbnail" style="margin-top: 15px; margin-bottom: 15px;" href="<?php echo e(url('detail-masjid',$data->id)); ?>">
                    <img class="img-thumbnail" style="width: 12rem; height: 12rem;"
                         src="<?php echo e(\URL::to('/storage/logo_masjid')); ?>/<?php echo e($data->logo_masjid); ?>"
                         alt="Another alt text">
                </a>
              </div>
                        <!-- <div class="col-md-3 mb-3">
                            <a href="<?php echo e(url('detail-masjid',$data->id)); ?>"><img src="<?php echo e(\URL::to('/storage/logo_masjid')); ?>/<?php echo e($data->logo_masjid); ?>" class="img-fluid"></a>
                        </div> -->

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- <center>
                            <a href="<?php echo e(route('list-masjid')); ?>" class="btn btn-secondary btn-sm mt-4">Lihat Lebih</a>
                        </center> -->
                    </div>
                    <?php else: ?>
                      <div class="mt-3 mb-3 row no-gutters d-flex justify-content-center">
                        <h4 class="konten">- Tidak ada Masjid -</h4>
                      </div>
                    <?php endif; ?>
                    </div>


                <h3 class="text-center mt-4">Kajian Terbaru</h3>

                <div class="row no-gutters d-flex justify-content-center">
                  <?php if($kajian->count() > 0): ?>
                  <?php $__currentLoopData = $kajian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php if($data->kategori_id == '2'): ?>
                  <div class="col-lg-6 col-md-6 mb-0 col-12 thumb d-flex justify-content-center">
                    <a class="thumbnail" style="margin-top: 15px; margin-bottom: 15px;" href="<?php echo e(url('detail-kajian',$data->id)); ?>">
                        <img class="kajian img-thumbnail"
                            src="<?php echo e(asset('daftarngaji/soljum.png')); ?>"
                             alt="Another alt text">
                    </a>
                  </div>
                  <?php else: ?>
                  <div class="col-lg-6 col-md-6 mb-0 col-12 thumb d-flex justify-content-center">
                    <a class="thumbnail" style="margin-top: 15px; margin-bottom: 15px;" href="<?php echo e(url('detail-kajian',$data->id)); ?>">
                        <img class="kajian img-thumbnail"
                            src="<?php echo e(\URL::to('/storage/foto_banner')); ?>/<?php echo e($data->foto_banner); ?>"
                             alt="Another alt text">
                    </a>
                  </div>
                  <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- <center>
                        <a href="<?php echo e(route('list-kajian')); ?>" class="btn btn-secondary btn-sm mt-4">Lihat Lebih</a>
                    </center> -->
                </div>

                  <?php else: ?>

                  <div class="mt-3 mb-3 row no-gutters d-flex justify-content-center">

                    <h4 class="konten">- Tidak ada Kajian -</h4>
                    </div>
                  <?php endif; ?>
                </div>
                  <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
<!--  -->

        </div>


</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\backup_xampp\htdocs\daftar_ngaji\resources\views/landing-page/index.blade.php ENDPATH**/ ?>