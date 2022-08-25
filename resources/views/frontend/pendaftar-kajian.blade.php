@extends('layouts.app-dashboard')
@section('content')

<div class="modal fade" id="hapus-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">


      </div>
      <div class="modal-body">
          <h5>Hapus User ini ?</h5>
<!-- <input type="" name="kajian_id" id="id-kajian" value="" /> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <form class="" action="{{route('user/destroy')}}" method="post">
            @csrf
            <input type="hidden" name="id" id="user-id" value="" />
            <button type="submit" class="btn btn-success">Iya</button>
        </form>

      </div>
    </div>
  </div>
</div>

<div class="">
    @include('layouts.navbar')
    <!-- PAGE CONTAINER-->
    <div class="page-container">
        @include('layouts.header-desktop')
          <div class="main-content">
            @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block konten mr-2 ml-2">
                <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong class="d-flex justify-content-center">{{ $message }}</strong>
              </div>
            @endif
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                  <div class="row d-flex justify-content-center">
                        <div class="col-lg-7 mt-2">
                            <div class="table-responsive table--no-card m-b-30">

                        </div>
                        <div class=" d-flex justify-content-center">

                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript">

// // $(function () {
// //      $(".hapus-user").click(function () {
// //          var my_id_value = $(this).data('id');
// //          $("#id-user").val(my_id_value);
// //      })
// //  });
//
//  $(document).ready(function(){
//      $(".hapus-user").click(function(){
//          var user_id = $(this).data('id');
//          console.log(user_id);
//            $("#user-id").val(user_id);
//          $("#hapus-user").modal("show");
//
//      });
//  });
</script>

@endpush
