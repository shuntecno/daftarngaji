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


                <div class=" d-flex justify-content-center">
                  <div class="table-responsive table--no-card m-b-30">
                    <div class="col-md-6 mb-2 mt-2">
                      <form action=""  class="form-inline ml-2">
                          <div class="field">
                              <div class="control is-expanded has-icons-right">


                                  <input id="pencarian" type="text" class="form-control mr-sm-2"

                                  )
                                  value="{{request()->get('cari_pendaftar_ikhwan')}}"


                                  placeholder="Cari Pendaftar Kajian"

                                   name="cari_pendaftar_ikhwan"

                                  <span class="icon is-medium is-right">

                                  </span>
                              </div>
                          </div>
                          <button id="submit" type="submit" hidden></button>
                      </form>

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
                                <th>Status</th>
                              </tr>
                          </thead>
                            @if($pendaftar_ikhwan->count() > 0)
                            @foreach($pendaftar_ikhwan as $data => $hasil)
                          <tbody>
                              <tr>
                                  <td>{{$data + $pendaftar_ikhwan->firstitem()}}</td>
                                  <td>{{$hasil->nama}}</td>
                                  <td>{{$hasil->email}}</td>
                                  <td>{{$hasil->tanggal_lahir}}</td>
                                  <td>{{$hasil->tempat_lahir}}</td>
                                  <td>{{$hasil->seks}}</td>
                                  <td>{{$hasil->alamat}}</td>
                                  <td>{{$hasil->no_telp}}</td>
                                  <td>{{$hasil->no_ktp}}</td>
                                  <td>{{$hasil->status_pendaftaran}}</td>
                              </tr>
                          </tbody>
                          @endforeach
                          @else
                          <tbody>
                              <td colspan="11" class="text-center">Tidak Ada Pendaftar Ikhwan</td>
                          </tbody>
                          @endif
                      </table>
              </div>
              <div class=" d-flex justify-content-center">
                  {{ $pendaftar_ikhwan->appends(request()->query())->links() }}
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
