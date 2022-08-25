
<?php $__env->startSection('content'); ?>

<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div id="info-pendaftar" class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

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
                  <div class="row d-flex justify-content-center">
                        <div class="col-lg-7 mt-2">
                            <div class="mb-2 d-flex justify-content-between mt-2">
                              <div class="col-md-6">
                                  <?php echo $__env->make('layouts.search-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                              </div>
                            </div>
                            <div class="table-responsive table--no-card m-b-30">

                                <table class="table table-borderless table-striped table-earning ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pendaftar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                      <?php if($users->count() != 0): ?>
                                      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data => $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo e($data + $users->firstitem()); ?></td>
                                            <td><?php echo e($hasil->nama); ?></td>
                                            <td>
                                              <div class="table-data-feature">
                                                    <a  class="info item"  data-toggle="tooltip" data-placement="top" title="Detail" href="#" data-id="<?php echo e($hasil->id); ?>" >
                                                        <i class="fa fa-info-circle"></i>
                                                    </a>
                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php else: ?>
                                  <tbody>
                                      <td colspan="3" class="text-center">Tidak Ada pendaftar</td>
                                  </tbody>
                                  <?php endif; ?>
                                </table>
                                <div class=" d-flex justify-content-center mt-2 mb-2">
                                    <?php echo e($users->links()); ?>

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
    $(".info").click(function(){
        var id = $(this).data('id');
        console.log(id);
         get_info_pendaftar(id);
    });
});

function get_info_pendaftar(id)
{
  $.ajax({
      url:"<?php echo e(route('pendaftar-info')); ?>",
      method:'POST',
      data:{
        '_token': '<?php echo e(csrf_token()); ?>',
        id:id,  },
      success:function(data){

      console.log(data);
      $('#info-pendaftar').html(data);
        $("#info").modal("show");

      }
  });
}

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\backup_xampp\htdocs\daftar_ngaji\resources\views/frontend/verifikasi_user.blade.php ENDPATH**/ ?>