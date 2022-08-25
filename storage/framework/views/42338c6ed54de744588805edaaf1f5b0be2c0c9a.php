<form method="POST" action=" <?php echo e(route('verifikasi_user/update',$user->id)); ?> " enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
<div class="card-body text-left mb-3"><img id="foto-ktp" class="card-img-top mb-3" src="<?php echo e(\URL::to('/storage/foto_ktp')); ?>/<?php echo e($user->foto_ktp); ?>" alt="Card image cap">
  <div class="">
    <p class="font-weight-bold ">Nomor Ktp : </p>
    <p><?php echo e($user->no_ktp); ?></p>
  </div>
  <div class="mb-3">
    <p class="font-weight-bold ">Nama : </p>
    <p><?php echo e($user->nama); ?></p>
  </div>
  <div class="mb-3">
    <p class="font-weight-bold ">Alamat : </p>
    <p><?php echo e($user->alamat); ?><p/>
  </div>
  <div class="mb-3">
    <p class="font-weight-bold ">Tempat Lahir : </p>
    <p><?php echo e($user->tempat_lahir); ?></p>
  </div>
  <div class="mb-3">
    <p class="font-weight-bold ">Tanggal Lahir : </p>
    <p><?php echo e(date('d-m-Y', strtotime($user->tanggal_lahir))); ?></p>
  </div>
  <div class="mb-3">
    <p class="font-weight-bold ">Email : </p>
    <p><?php echo e($user->email); ?></p>
  </div>
  <?php if($user->seks == 'L'): ?>
  <div class="mb-3">
    <p class="font-weight-bold ">Jenis Kelamin : </p>
    <p>Laki - Laki</p>
  </div>
  <?php else: ?>
  <div class="mb-3">
    <p class="font-weight-bold ">Jenis Kelamin : </p>
    <p>Perempuan</p>
  </div>
  <?php endif; ?>
  <div class="mb-3">
    <p class="font-weight-bold ">Nomor Telpon : </p>
    <p><?php echo e($user->no_telp); ?></p>
  </div>

</div>
<div class="d-flex justify-content-center">
  <button type="submit" class="btn btn-primary">
      <?php echo e(__('Verifikasi')); ?>

  </button>
</div>
</form>
<?php /**PATH F:\backup_xampp\htdocs\daftar_ngaji\resources\views/frontend/pendaftar-ajax.blade.php ENDPATH**/ ?>