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

<div class="modal fade" id="suspend-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">


      </div>
      <div class="modal-body">
          <h5>Suspend User ini ?</h5>
<!-- <input type="" name="kajian_id" id="id-kajian" value="" /> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <form  action="{{route('user/suspend')}}" method="post">
            @csrf
            <input type="hidden" name="id" id="user-id-suspend" value="" />
            <button type="submit" class="btn btn-success">Iya</button>
        </form>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="aktifkan-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">


      </div>
      <div class="modal-body">
          <h5>Aktifkan User ini ?</h5>
<!-- <input type="" name="kajian_id" id="id-kajian" value="" /> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <form  action="{{route('user/aktifkan')}}" method="post">
            @csrf
            <input type="hidden" name="id" id="user-id-aktifkan" value="" />
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
                        <div class="col-lg-12 mt-2">
                          @include('layouts.search-dashboard')
                            <div class="table-responsive table--no-card m-b-30">
                              <div class="col-md-6 mb-2">
                              </div>
                                <table class="table table-borderless table-striped table-earning ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jamaah</th>
                                            <th>Email</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Tempat Lahir</th>
                                            <th>Seks</th>
                                            <th>Alamat</th>
                                            <th>No Telpon</th>
                                            <th>No Ktp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                      @if($jamaah->count() != 0)
                                      @foreach($jamaah as $data => $hasil)
                                    <tbody>
                                        <tr>
                                            <td>{{$data + $jamaah->firstitem()}}</td>
                                            <td>{{$hasil->nama}}</td>
                                            <td>{{$hasil->email}}</td>
                                            <td>{{$hasil->tanggal_lahir}}</td>
                                            <td>{{$hasil->tempat_lahir}}</td>
                                            <td>{{$hasil->seks}}</td>
                                            <td>{{$hasil->alamat}}</td>
                                            <td>{{$hasil->no_telp}}</td>
                                            <td>{{$hasil->no_ktp}}</td>
                                            <td>
                                              <!-- <div class="btn-group ">
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Action
                                                </button>
                                                <div class="dropdown-menu">
                                                  <a class="btn btn-primary dropdown-item  d-flex justify-content-center" href="#">details</a>
                                                  <a class="dropdown-item d-flex justify-content-center" href="{{route('user/edit',$hasil->id)}}">edit</a>
                                                  <a href="#" data-target="#hapus-user" class="hapus-user d-flex justify-content-center btn btn-danger" data-id="{{$hasil->id}}">Hapus</a>
                                                </div>
                                                  </div> -->
                                                  <div class="table-data-feature">
                                                        <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="{{route('user/edit',$hasil->id)}}">
                                                            <i class="zmdi zmdi-edit" style="color:orange"></i>
                                                        </a>
                                                        <a class="item hapus-user" data-toggle="tooltip" data-placement="top" title="Hapus" data-id="{{$hasil->id}}">
                                                            <i class="fa fa-trash" style="color:red"></i>
                                                        </a>
                                                        @if($hasil->sanksi != null)
                                                        <a class="item aktifkan-user" data-toggle="tooltip" data-placement="top" title="Batalkan Suspend" data-id="{{$hasil->id}}">
                                                            <i class="fa fa-ban" style="color:grey"></i>
                                                        </a>
                                                        @else
                                                        <a class="item suspend-user" data-toggle="tooltip" data-placement="top" title="Suspend" data-id="{{$hasil->id}}">
                                                            <i class="fa fa-ban" style="color:red"></i>
                                                        </a>
                                                        @endif
                                                    </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                    @else
                                    <tbody>
                                        <td colspan="10" class="text-center">Tidak Ada User</td>
                                    </tbody>
                                    @endif
                                </table>

                        <div class=" d-flex justify-content-center mt-2 mb-2">
                            {{ $jamaah->links() }}
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


 $(document).ready(function(){
     $(".hapus-user").click(function(){
         var user_id = $(this).data('id');
         console.log(user_id);
           $("#user-id").val(user_id);
         $("#hapus-user").modal("show");

     });
 });


 $(document).ready(function(){
     $(".suspend-user").click(function(){
         var user_id = $(this).data('id');
         console.log(user_id);
           $("#user-id-suspend").val(user_id);
         $("#suspend-user").modal("show");

     });
 });

 $(document).ready(function(){
     $(".aktifkan-user").click(function(){
         var user_id = $(this).data('id');
         console.log(user_id);
           $("#user-id-aktifkan").val(user_id);
         $("#aktifkan-user").modal("show");

     });
 });
</script>

@endpush
