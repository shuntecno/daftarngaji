@extends('layouts.app')
@section('content')
<div class="container">



        <div class="row">
            <div class="col-md-10 col-lg-6 offset-lg-3 offset-md-1" id="main" style="padding-right: 0;padding-left: 0;">

                @include('layouts.navbar-view')



                <h3 class="text-center mt-4">Masjid</h3>
                  @include('layouts.header-view')
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
                        <a href="{{route('list-kajian')}}" class="btn btn-secondary btn-sm mt-4">Lihat Lebih</a>
                    </center> -->



                  @else

                  <div class=" mt-3 mb-3 d-flex justify-content-center">
                      <h4 class="konten">- Tidak ada Masjid -</h4>
                  </div>


                  @endif

                    </div>
                    <div class="d-flex justify-content-center konten">
                      {{ $masjid->links() }}
                    </div>
                    </div>




                <!-- <center>
                    <button class="btn btn-secondary btn-sm mt-4">Lihat Lebih</button>
                </center> -->

                  @include('layouts.footer')

            </div>
        </div>

</div>

@endsection
