
<?php $__env->startSection('content'); ?>
<div class="">
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- PAGE CONTAINER-->
    <div class="page-container">
        <?php echo $__env->make('layouts.header-desktop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <div class="main-content">
            <?php if($message = Session::get('success')): ?>
              <div class="alert alert-success alert-block konten mr-2 ml-2">
                <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong class="d-flex justify-content-center"><?php echo e($message); ?></strong>
              </div>
            <?php endif; ?>
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                  <div class="row">

                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header">Edit User</div>
                            <div class="card-body">
                              <form method="POST" action="<?php echo e(route('user/update',$user->id)); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Nama User')); ?></label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nama" value="<?php echo e($user->nama); ?>"  autocomplete="nama">

                                            <?php $__errorArgs = ['nama'];
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
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                        <div class="col-md-6">
                                            <input id="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e($user->email); ?>" >

                                            <?php $__errorArgs = ['email'];
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
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Password</label>

                                        <div class="col-md-6">
                                            <input id="email" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" >

                                            <?php $__errorArgs = ['password'];
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
                                         <label for="tempat-lahir" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Tempat Lahir')); ?></label>

                                         <div class="col-md-6">
                                             <input id="tempat-lahir" type="text" class="form-control <?php $__errorArgs = ['tempat_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tempat_lahir" value="<?php echo e($user->tempat_lahir); ?>" >
                                             <?php $__errorArgs = ['tempat_lahir'];
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
                                        <label class="col-md-4 col-form-label text-md-right"><?php echo e(__('Tanggal Lahir')); ?></label>

                                        <div class="col-md-6">

                                            <input type="text "
                                              name="tanggal_lahir"
                                              value="<?php echo e($user->tanggal_lahir); ?>"
                                               class="datepicker-here form-control <?php $__errorArgs = ['tanggal_lahir'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               data-language='en'
                                               data-position='top left'/>
                                               <?php $__errorArgs = ['tanggal_lahir'];
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
                                        <label class="col-md-4 col-form-label text-md-right"><?php echo e(__('Jenis Kelamin')); ?></label>

                                        <div class="col-md-6">
                                            <?php if($user->seks != 'P'): ?>
                                          <label class="radio">
                                                <input type="radio" value="L" name="seks"  checked>
                                                Laki-laki
                                            </label>
                                            <label class="radio">
                                                <input type="radio" value="P" name="seks">
                                                Perempuan
                                            </label>
                                            <?php else: ?>
                                            <label class="radio">
                                                  <input type="radio" value="L" name="seks" >
                                                  Laki-laki
                                              </label>
                                              <label class="radio">
                                                  <input type="radio" value="P" name="seks"  checked>
                                                  Perempuan
                                              </label>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-4 col-form-label text-md-right">
                                            <label for="textarea-input" class="form-control-label">Alamat</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea name="alamat" id="alamat" rows="3" name="alamat"  class="form-control <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e($user->alamat); ?></textarea>
                                            <?php $__errorArgs = ['alamat'];
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

                                     <!-- <div  class="form-group row" alamat-data="<?php echo e($user->alamat); ?>">
                                         <label  class="col-md-4 col-form-label text-md-right"><?php echo e(__('Alamat')); ?></label>

                                         <div class="col-md-6">
                                             <input type="text"  class="form-control" name="alamat" value="<?php echo e($user->alamat); ?>" rows="3" required autocomplete="">

                                         </div>
                                     </div> -->
                                     <div class="form-group row">
                                         <label class="col-md-4 col-form-label text-md-right"><?php echo e(__('No Handphone')); ?></label>

                                         <div class="col-md-6">
                                             <input type="text" class="form-control <?php $__errorArgs = ['no_telp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="no_telp" value="<?php echo e($user->no_telp); ?>"  autocomplete="">
                                             <?php $__errorArgs = ['no_telp'];
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
                                         <label class="col-md-4 col-form-label text-md-right"><?php echo e(__('No KTP')); ?></label>

                                         <div class="col-md-6">
                                             <input type="text" class="form-control <?php $__errorArgs = ['no_ktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="no_ktp" value="<?php echo e($user->no_ktp); ?>"  autocomplete="">
                                             <?php $__errorArgs = ['no_ktp'];
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
                                         <label class="col-md-4 col-form-label text-md-right"><?php echo e(__('Foto KTP')); ?></label>

                                         <div class="col-md-6">

                                             <div class="form-group">
                                               <label for="exampleFormControlFile1">Pilih Gambar</label>
                                               <!-- <input type="file" class="form-control-file"  name="foto_ktp"> -->
                                               <input type="file" name="foto_ktp" id="preview-foto-ktp" />
                                               <img src="<?php echo e(asset('storage/foto_ktp/')); ?>/<?php echo e($user->foto_ktp); ?>" id="foto-ktp" width="300" alt="Preview Gambar" class="mt-2"/>
                                             </div>

                                         </div>
                                     </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                <?php echo e(__('Update')); ?>

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
<script type="text/javascript">
function bacaFotoKtp(input) {
 if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#foto-ktp').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
 }
}

$("#preview-foto-ktp").change(function(){
   bacaFotoKtp(this);
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\backup_xampp\htdocs\daftar_ngaji\resources\views/frontend/edit-user.blade.php ENDPATH**/ ?>