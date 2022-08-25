
<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-lg-6 offset-lg-3 offset-md-1" id="main" style="padding-right: 0;padding-left: 0;">

            <?php echo $__env->make('layouts.navbar-view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if($message = Session::get('success')): ?>
              <div class="alert alert-success alert-block konten mr-2 ml-2">
                <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong class="d-flex justify-content-center"><?php echo e($message); ?></strong>
              </div>
            <?php endif; ?>
            <?php if($message = Session::get('warning')): ?>
            <div class="alert alert-warning alert-block konten mr-2 ml-2">
              <button type="button" class="close" data-dismiss="alert">×</button>
                <strong class="d-flex justify-content-center"><?php echo e($message); ?></strong>
            </div>
            <?php endif; ?>
            <?php if($message = Session::get('danger')): ?>
            <div class="alert alert-danger alert-block konten mr-2 ml-2">
              <button type="button" class="close" data-dismiss="alert">×</button>
                <strong class="d-flex justify-content-center"><?php echo e($message); ?></strong>
            </div>
            <?php endif; ?>

                <h3 class="text-center mt-4">Masuk</h3>

                <div class="konten">

                    <form method="post" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">email</label>

                            <div class="col-md-6">
                              <input  class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" value="<?php echo e(old('email')); ?>"  >
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <div class="invalid-feedback">
                                <?php echo e($message); ?>

                              </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                            <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputPassword1" placeholder="Kata Sandi" name="password">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <div class="invalid-feedback">
                                <?php echo e($message); ?>

                              </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Masuk</button>
                              <?php if(Route::has('password.request')): ?>
                                  <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                      <?php echo e(__('Lupa password?')); ?>

                                  </a>
                              <?php endif; ?>
                            </div>
                        </div>


                    </form>

                </div>
                  <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              </div>
            </div>
          </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\backup_xampp\htdocs\daftar_ngaji\resources\views/auth/login.blade.php ENDPATH**/ ?>