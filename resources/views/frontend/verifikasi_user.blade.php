@extends('layouts.app-dashboard')
@section('content')

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
                            <div class="mb-2 d-flex justify-content-between mt-2">
                              <div class="col-md-6">
                                  @include('layouts.search-dashboard')
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
                                      @if($users->count() != 0)
                                      @foreach($users as $data => $hasil)
                                    <tbody>
                                        <tr>
                                            <td>{{$data + $users->firstitem()}}</td>
                                            <td>{{$hasil->nama}}</td>
                                            <td>
                                              <div class="table-data-feature">
                                                    <a  class="info item"  data-toggle="tooltip" data-placement="top" title="Detail" href="#" data-id="{{$hasil->id}}" >
                                                        <i class="fa fa-info-circle"></i>
                                                    </a>
                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                    @endforeach
                                  @else
                                  <tbody>
                                      <td colspan="3" class="text-center">Tidak Ada pendaftar</td>
                                  </tbody>
                                  @endif
                                </table>
                                <div class=" d-flex justify-content-center mt-2 mb-2">
                                    {{ $users->links() }}
                                </div>
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
    $(".info").click(function(){
        var id = $(this).data('id');
        console.log(id);
         get_info_pendaftar(id);
    });
});

function get_info_pendaftar(id)
{
  $.ajax({
      url:"{{route('pendaftar-info')}}",
      method:'POST',
      data:{
        '_token': '{{csrf_token()}}',
        id:id,  },
      success:function(data){

      console.log(data);
      $('#info-pendaftar').html(data);
        $("#info").modal("show");

      }
  });
}

</script>
@endpush
