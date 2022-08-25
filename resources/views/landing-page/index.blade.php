@extends('layouts.app')
@section('content')
<div class="container">



        <div class="row">
            <div class="col-md-10 col-lg-6 offset-lg-3 offset-md-1" id="main" style="padding-right: 0;padding-left: 0;">


                  @include('layouts.navbar-view')


                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                  @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block konten mr-2 ml-2">
                      <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
                        <strong class="d-flex justify-content-center">{{ $message }}</strong>
                    </div>
                  @endif
                  @if ($message = Session::get('warning'))
                    <div class="alert alert-warning alert-block konten mr-2 ml-2">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong class="d-flex justify-content-center">{{ $message }}</strong>
                    </div>
                  @endif

                    <div class="carousel-inner">

                      @foreach($slider as $key => $data)
                      <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                        <a href="{{$data->link}}" class="slider d-block w-100"><img src="{{ \URL::to('/storage/slider')}}/{{$data->gambar}}" class="slider d-block w-100" alt="..." ></a>
                      </div>
                      @endforeach

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div class="">

                <h3 class="text-center mt-4">Masjid</h3>

                <div class="container">
                  <div class="row d-flex justify-content-center">
                    @if($masjid->count() > 0)
                      @foreach($masjid as $data)

              <div class="col-lg-5 col-md-4 col-xs-6 thumb d-flex justify-content-center">
                <a class="thumbnail" style="margin-top: 15px; margin-bottom: 15px;" href="{{url('detail-masjid',$data->id)}}">
                    <img class="img-thumbnail" style="width: 12rem; height: 12rem;"
                         src="{{ \URL::to('/storage/logo_masjid')}}/{{$data->logo_masjid}}"
                         alt="Another alt text">
                </a>
              </div>
                        <!-- <div class="col-md-3 mb-3">
                            <a href="{{url('detail-masjid',$data->id)}}"><img src="{{ \URL::to('/storage/logo_masjid')}}/{{$data->logo_masjid}}" class="img-fluid"></a>
                        </div> -->

                        @endforeach
                        <!-- <center>
                            <a href="{{route('list-masjid')}}" class="btn btn-secondary btn-sm mt-4">Lihat Lebih</a>
                        </center> -->
                    </div>
                    @else
                      <div class="mt-3 mb-3 row no-gutters d-flex justify-content-center">
                        <h4 class="konten">- Tidak ada Masjid -</h4>
                      </div>
                    @endif
                    </div>


                <h3 class="text-center mt-4">Kajian Terbaru</h3>

                <div class="row no-gutters d-flex justify-content-center">
                  @if($kajian->count() > 0)
                  @foreach($kajian as $data)
                  @if($data->kategori_id == '2')
                  <div class="col-lg-6 col-md-6 mb-0 col-12 thumb d-flex justify-content-center">
                    <a class="thumbnail" style="margin-top: 15px; margin-bottom: 15px;" href="{{url('detail-kajian',$data->id)}}">
                        <img class="kajian img-thumbnail"
                            src="{{asset('daftarngaji/soljum.png')}}"
                             alt="Another alt text">
                    </a>
                  </div>
                  @else
                  <div class="col-lg-6 col-md-6 mb-0 col-12 thumb d-flex justify-content-center">
                    <a class="thumbnail" style="margin-top: 15px; margin-bottom: 15px;" href="{{url('detail-kajian',$data->id)}}">
                        <img class="kajian img-thumbnail"
                            src="{{ \URL::to('/storage/foto_banner')}}/{{$data->foto_banner}}"
                             alt="Another alt text">
                    </a>
                  </div>
                  @endif
                    @endforeach
                    <!-- <center>
                        <a href="{{route('list-kajian')}}" class="btn btn-secondary btn-sm mt-4">Lihat Lebih</a>
                    </center> -->
                </div>

                  @else

                  <div class="mt-3 mb-3 row no-gutters d-flex justify-content-center">

                    <h4 class="konten">- Tidak ada Kajian -</h4>
                    </div>
                  @endif
                </div>
                  @include('layouts.footer')
            </div>
<!--  -->

        </div>


</div>
@endsection
