@extends('layouts.app-dashboard')
@section('content')

<div class="modal fade" id="hapus-slider" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">


      </div>
      <div class="modal-body">
          <h5>Hapus Slider ini ?</h5>
<!-- <input type="" name="kajian_id" id="id-kajian" value="" /> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <form class="" action="{{route('slider/hapus')}}" method="post">
            @csrf
            <input type="hidden" name="id" id="slider-id" value="" />
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
                  <div class="mb-2 d-flex justify-content-end mt-2">

                    <div class="col-md-6 d-flex justify-content-end">
                      <a href="{{route('tambah/slider')}}" class="btn btn-success" role="button" aria-disabled="true">Tambah Slider</a>
                    </div>
                  </div>
                  <div class="row d-flex justify-content-end">



                            <div class="table-responsive table--no-card m-b-30 ml-2 mr-2">

                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama Gambar</th>
                                            <th>link</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                      @if($slider->count() != 0)
                                      @foreach($slider as $data => $hasil)
                                    <tbody>
                                        <tr>

                                            <td>{{$data + $slider->firstitem()}}</td>
                                            <td>
                                              <div class="col-12">
                                                  <img src="{{ \URL::to('/storage/slider')}}/{{$hasil->gambar}}" class="rounded float-left" >
                                              </div>

                                            </td>
                                            <td>{{$hasil->nama_foto}}</td>
                                            <td>{{$hasil->link}}</td>
                                            <td>
                                                <div class="table-data-feature d-flex justify-content-start">
                                                        <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="{{url('edit/slider',$hasil->id)}}">
                                                            <i class="zmdi zmdi-edit" style="color:orange"></i>
                                                        </a>

                                                      <a class="item hapus-slider " data-toggle="tooltip" data-placement="top" title="Hapus" data-id="{{$hasil->id}}">
                                                          <i class="fa fa-trash" style="color:red"></i>
                                                      </a>
                                            </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                    @else
                                    <tbody>
                                        <td colspan="5" class="text-center">Tidak Ada slider</td>
                                    </tbody>
                                    @endif
                                </table>
                                <div class=" d-flex justify-content-center mt-0 pb-3 mt-3">
                                    {{ $slider->links() }}
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
      $(".hapus-slider").click(function(){
          var slider_id = $(this).data('id');
            console.log(slider_id);
            $("#slider-id").val(slider_id);
          $("#hapus-slider").modal("show");

      });
  });


  </script>
@endpush
