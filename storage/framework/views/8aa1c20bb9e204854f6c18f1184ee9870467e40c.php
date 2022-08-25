
               <?php $__env->startSection('content'); ?>
               <div class="">
                   <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                   <!-- PAGE CONTAINER-->
                   <div class="page-container">
                       <?php echo $__env->make('layouts.header-desktop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                         <div class="main-content">
                           <div class="section__content section__content--p30">
                               <div class="container-fluid">
                                 <div class="row">

                                   <div class="col-lg-9">
                                       <div class="card">
                                           <div class="card-header">Tambah Masjid</div>
                                           <div class="card-body">
                                               <form method="POST" action="<?php echo e(route('masjid/store')); ?>" enctype="multipart/form-data">
                              <?php echo csrf_field(); ?>

                              <div class="form-group row">
                                  <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Nama Masjid')); ?></label>

                                  <div class="col-md-6">
                                      <input id="name" type="text" class="form-control <?php $__errorArgs = ['nama_masjid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nama_masjid" value="<?php echo e(old('nama_masjid')); ?>">

                                      <?php $__errorArgs = ['nama_masjid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                          <span class="invalid-feedback" role="alert">
                                              <strong><?php echo e($message); ?></strong>
                                          </span>
                                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="email" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Alamat Masjid')); ?></label>

                                  <div class="col-md-6">
                                      <input id="email" class="form-control <?php $__errorArgs = ['alamat_masjid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="alamat_masjid" value="<?php echo e(old('alamat_masjid')); ?>" >

                                      <?php $__errorArgs = ['alamat_masjid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                          <span class="invalid-feedback" role="alert">
                                              <strong><?php echo e($message); ?></strong>
                                          </span>
                                      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                  </div>
                              </div>


                              <div class="form-group row">
                                  <label class="col-md-4 col-form-label text-md-right"><?php echo e(__('Logo Masjid')); ?></label>

                                  <div class="col-md-6">

                                      <div class="form-group ">

                                        <input type="file" class="form-control-file <?php $__errorArgs = ['logo_masjid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="logo_masjid" value="<?php echo e(old('logo_masjid')); ?>">
                                        <small  class="form-text text-muted text-justify">disarankan gambar memiliki dimensi 1600 x 1583</small>
                                        <?php $__errorArgs = ['logo_masjid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <small class="text-danger font-weight-bold"><?php echo e($message); ?></small>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                      </div>

                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label class="col-md-4 col-form-label text-md-right"><?php echo e(__('Foto Masjid')); ?></label>

                                  <div class="col-md-6">

                                      <div class="form-group ">

                                        <input type="file" class="form-control-file <?php $__errorArgs = ['foto_masjid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="foto_masjid">
                                         <small  class="form-text text-muted text-justify">disarankan gambar memiliki dimensi 850 x 315</small>
                                        <?php $__errorArgs = ['foto_masjid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <small class="text-danger font-weight-bold"><?php echo e($message); ?></small>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                      </div>

                                  </div>
                              </div>
                              <!-- test -->


                              <div class="form-group row mb-0">
                                  <div class="col-md-6 offset-md-4">
                                      <button type="submit" class="btn btn-primary">
                                          <?php echo e(__('Submit')); ?>

                                      </button>
                                  </div>
                              </div>
                          </form>

                                           </div>
                                       </div>
                                   </div>

                                 </div>
                               </div>
                           </div>
                       </div>
                   </div>
               <?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\backup_xampp\htdocs\daftar_ngaji\resources\views/frontend/form_tambah_masjid.blade.php ENDPATH**/ ?>