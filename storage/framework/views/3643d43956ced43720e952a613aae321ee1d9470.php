
<?php $__env->startSection('content'); ?>

<div class="modal fade" id="hapus-masjid" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">


      </div>
      <div class="modal-body">
          <h5>Hapus Masjid ini ?</h5>
<!-- <input type="" name="kajian_id" id="id-kajian" value="" /> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <form class="" action="<?php echo e(route('masjid/destroy')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="id" id="masjid-id" value="" />
            <button type="submit" class="btn btn-success">Iya</button>
        </form>

      </div>
    </div>
  </div>
</div>

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
                  <div class="mb-2 d-flex justify-content-between mt-2">
                    <div class="col-md-6">
                        <?php echo $__env->make('layouts.search-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                      <a href="<?php echo e(route('masjid/create')); ?>" class="btn btn-success" role="button" aria-disabled="true">Tambah Masjid</a>
                    </div>
                  </div>
                  <div class="row d-flex justify-content-end">



                            <div class="table-responsive table--no-card m-b-30 ml-2 mr-2">

                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Masjid</th>
                                            <th>Alamat Masjid</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                      <?php if($masjid->count() != 0): ?>
                                      <?php $__currentLoopData = $masjid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data => $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo e($data + $masjid->firstitem()); ?></td>
                                            <td><?php echo e($hasil->nama_masjid); ?></td>
                                            <td><?php echo e($hasil->alamat_masjid); ?></td>
                                            <td>
                                                <div class="table-data-feature d-flex justify-content-start">
                                                      <a class="item" data-toggle="tooltip" data-placement="top" title="Tambah Pengelola" href="<?php echo e(url('pengelola',$hasil->id)); ?>">
                                                          <i class="fa fa-user-plus" style="color:green"></i>
                                                      </a>

                                                      <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo e(url('masjid/edit',$hasil->id)); ?>">
                                                          <i class="zmdi zmdi-edit" style="color:orange"></i>
                                                      </a>
                                                      <a class="item hapus-masjid" data-toggle="tooltip" data-placement="top" title="Hapus" data-id="<?php echo e($hasil->id); ?>">
                                                          <i class="fa fa-trash" style="color:red"></i>
                                                      </a>
                                                      <a class="item" data-toggle="tooltip" data-placement="top" title="Masuk" href="<?php echo e(url('masjid/detail',$hasil->id)); ?>">
                                                          <i class="fa fa-arrow-right" style="color:blue"></i>
                                                      </a>

                                                  </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                    <tbody>
                                        <td colspan="4" class="text-center">Tidak Ada Masjid</td>
                                    </tbody>
                                    <?php endif; ?>
                                </table>
                                <div class=" d-flex justify-content-center mt-0 pb-3 mt-3">
                                    <?php echo e($masjid->links()); ?>

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
  $(document).ready(function(){
      $(".hapus-masjid").click(function(){
          var masjid_id = $(this).data('id');
          console.log(masjid_id);
            $("#masjid-id").val(masjid_id);
          $("#hapus-masjid").modal("show");

      });
  });


  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\backup_xampp\htdocs\daftar_ngaji\resources\views/frontend/masjid.blade.php ENDPATH**/ ?>