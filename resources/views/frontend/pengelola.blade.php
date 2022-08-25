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
        <form class="" action="{{route('pengelola/destroy')}}" method="post">
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
                          <div class="d-flex justify-content-end">
                              <a class="btn btn-success mb-2" href="{{url('tambah_pengelola',$masjid->id)}}" role="button">Tambah Pengelola</a>
                          </div>
                            <div class="table-responsive table--no-card m-b-30">

                                <table class="table table-borderless table-striped table-earning ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengelola</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                      @if($pengelola->count() != 0)
                                      @foreach($pengelola as $data => $hasil)
                                    <tbody>
                                        <tr>
                                            <td>{{$data + $pengelola->firstitem()}}</td>
                                            <td>{{$hasil->user->nama}}</td>

                                            <td>
                                              <!-- <div class="btn-group ">
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Action
                                                </button>
                                                <div class="dropdown-menu">
                                                  <a class="btn btn-primary dropdown-item  d-flex justify-content-center" href="#">details</a>
                                                  <a class="dropdown-item d-flex justify-content-center" href="{{route('pengelola/edit',$hasil->user->id)}}">edit</a>
                                                  <a href="#" data-target="#hapus-user" class="hapus-user d-flex justify-content-center btn btn-danger" data-id="{{$hasil->user->id}}">Hapus</a>
                                                </div>
                                            </div> -->

                                            <div class="table-data-feature">
                                                  <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="{{route('pengelola/edit',$hasil->user->id)}}">
                                                      <i class="zmdi zmdi-edit" style="color:orange"></i>
                                                  </a>
                                                  <a class="item hapus-user" data-toggle="tooltip" data-placement="top" title="Hapus" data-id="{{$hasil->user->id}}">
                                                      <i class="fa fa-trash" style="color:red"></i>
                                                  </a>
                                              </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                    @else
                                    <tbody>
                                        <td colspan="3" class="text-center">Tidak Ada Pengelola</td>
                                    </tbody>
                                    @endif
                                </table>

                        <div class=" d-flex justify-content-center">
                            {{ $pengelola->links() }}
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

// $(function () {
//      $(".hapus-user").click(function () {
//          var my_id_value = $(this).data('id');
//          $("#id-user").val(my_id_value);
//      })
//  });

 $(document).ready(function(){
     $(".hapus-user").click(function(){
         var user_id = $(this).data('id');
         console.log(user_id);
           $("#user-id").val(user_id);
         $("#hapus-user").modal("show");

     });
 });
</script>

@endpush
