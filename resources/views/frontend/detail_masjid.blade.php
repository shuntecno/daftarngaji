@extends('layouts.app-dashboard')
@section('content')
<div class="modal fade" id="hapus-kajian" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">


      </div>
      <div class="modal-body">
          <h5>Hapus Kajian ini ?</h5>
<!-- <input type="" name="kajian_id" id="id-kajian" value="" /> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
        <form class="" action="{{route('kajian/destroy')}}" method="post">
            @csrf
            <input type="hidden" name="id" id="kajian-id" value="" />
            <button type="submit" class="btn btn-success">Iya</button>
        </form>

      </div>
    </div>
  </div>
</div>
<!--  -->

<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div id="info-kajian" class="modal-body">

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
                  <div class="row">
                      <div class="col-lg-12">
                        <aside class="profile-nav alt">
                            <section class="card">
                                <div class="cover card-header user-header alt bg-dark" style="background-image: url('{{ \URL::to('/storage/foto_masjid')}}/{{$masjid->foto_masjid}}');">
                                    <div class="media d-flex align-items-center">
                                        <a href="#">
                                            <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{ \URL::to('/storage/logo_masjid')}}/{{$masjid->logo_masjid}}">
                                        </a>
                                        <div class="media-body ">
                                            <h3 class="text-light display-6">{{$masjid->nama_masjid}}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class=" mt-3 mb-3 col-lg-12 co-10 border-bottom">
                                    <p class="mb-2">{{$masjid->alamat_masjid}}</p>
                                </div>
                                <!-- <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        Jumlah Kajian :
                                    </li>
                                </ul> -->

                                <div class="mb-2 d-flex justify-content-between mt-2">
                                    <div class="col-md-6">
                                        @include('layouts.search-dashboard')
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end">
                                      @if(Auth::user()->level == 1 || Auth::user()->level == 6)
                                      <a href="{{route('kajian/create',$masjid->id)}} " class="btn btn-success mr-2 ml-2" role="button" aria-disabled="true">Tambah Kajian</a>
                                      @endif
                                    </div>


                                </div>

                                  <div class="table-responsive table--no-card m-b-30">

                                      <table class="table table-borderless table-striped table-earning">
                                          <thead>
                                              <tr>
                                                  <th>No</th>
                                                  <th>judul kajian</th>
                                                  <th>pengisi kajian</th>
                                                  <th>Aksi</th>
                                              </tr>
                                          </thead>
                                            @if($kajian->count() != 0)
                                            @foreach($kajian as $data => $hasil)

                                          <tbody>
                                              <tr>
                                                  <td>{{$data + $kajian->firstitem()}}</td>
                                                  <td>{{$hasil->judul_kajian}}</td>
                                                  <td>{{$hasil->nama_ustadz}}</td>
                                                  <td>
                                                          @if(Auth::user()->level == 1)
                                                            <div class="table-data-feature">

                                                                  <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="{{route('kajian/edit',$hasil->id)}}">
                                                                      <i class="zmdi zmdi-edit" style="color:orange"></i>
                                                                  </a>
                                                                  <a href="#" class="item hapus-kajian"  data-toggle="tooltip" data-placement="top" title="Hapus" data-id="{{$hasil->id}}">
                                                                      <i class="fa fa-trash" style="color:red"></i>
                                                                  </a>
                                                                  <a  class="info item"  data-toggle="tooltip" data-placement="top" title="Detail" href="#" data-id="{{$hasil->id}}" >
                                                                      <i class="fa fa-info-circle"></i>
                                                                  </a>

                                                                  <a  class="item"  data-toggle="tooltip" data-placement="top" title="Scan QR code"  href="{{route('barcode-scanner',$hasil->id)}}">
                                                                      <i class="fa fa-qrcode"  style="color:blue"></i>
                                                                  </a>

                                                              </div>
                                                              @elseif(Auth::user()->level == 6)
                                                                <div class="table-data-feature">

                                                                      <a class="item" data-toggle="tooltip" data-placement="top" title="Edit" href="{{route('kajian/edit',$hasil->id)}}">
                                                                          <i class="zmdi zmdi-edit" style="color:orange"></i>
                                                                      </a>
                                                                      <a href="#" class="item hapus-kajian"  data-toggle="tooltip" data-placement="top" title="Hapus" data-id="{{$hasil->id}}">
                                                                          <i class="fa fa-trash" style="color:red"></i>
                                                                      </a>
                                                                      <a  class="info item"  data-toggle="tooltip" data-placement="top" title="Detail" href="#" data-id="{{$hasil->id}}" >
                                                                          <i class="fa fa-info-circle"></i>
                                                                      </a>
                                                                </div>
                                                          @elseif(Auth::user()->level == 5)
                                                          <div class="table-data-feature">
                                                                <a  class="info item"  data-toggle="tooltip" data-placement="top" title="Detail" href="#" data-id="{{$hasil->id}}" >
                                                                    <i class="fa fa-info-circle"></i>
                                                                </a>

                                                                <a  class="item"  data-toggle="tooltip" data-placement="top" title="Scan QR code"  href="{{route('barcode-scanner',$hasil->id)}}">
                                                                    <i class="fa fa-qrcode"  style="color:blue"></i>
                                                                </a>


                                                            </div>
                                                          @else
                                                          <div class="table-data-feature">
                                                                <a  class="info item"  data-toggle="tooltip" data-placement="top" title="Detail" href="#" data-id="{{$hasil->id}}" >
                                                                    <i class="fa fa-info-circle"></i>
                                                                </a>
                                                            </div>
                                                          @endif
                                                      <!-- </div> -->
                                                  </td>
                                              </tr>
                                          </tbody>
                                          @endforeach
                                          @else
                                          <tbody>
                                              <td colspan="4" class="text-center">Tidak Ada Kajian</td>
                                          </tbody>
                                          @endif

                                      </table>

                              </div>
                              <div class=" d-flex justify-content-center mt-0 pb-3">
                                  {{ $kajian->links() }}
                              </div>
                            </section>
                        </aside>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@include('frontend.kajian-js')
@endpush
