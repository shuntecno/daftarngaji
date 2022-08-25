@extends('layouts.app')
@section('content')
<div class="container">



        <div class="row">
            <div class="col-md-10 col-lg-6 offset-lg-3 offset-md-1" id="main" style="padding-right: 0;padding-left: 0;">


                @include('layouts.navbar-view')


                <h3  class="text-center mt-4">Kajian {{$label}}</h3>
                @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block konten mr-2 ml-2">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong class="d-flex justify-content-center">{{ $message }}</strong>
                  </div>
                @endif
                  @include('layouts.header-view')
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



                  @else

                  <div class="mt-3 mb-3 d-flex justify-content-center">
                      <h4 class="konten">- Tidak ada Kajian -</h4>
                  </div>


                  @endif
                </div>
                <div class="d-flex justify-content-center konten">
                    {{ $kajian->links() }}
                </div>
                <!-- <center>
                    <button class="btn btn-secondary btn-sm mt-4">Lihat Lebih</button>
                </center> -->
                  @include('layouts.footer')
            </div>
        </div>

</div>
@endsection

@push('scripts')
<script type="text/javascript">
var pencarian = document.getElementById('pencarian');
$(document).ready(function(){
      $(".hari-ini").click(function(){
          pencarian.setAttribute('name',"sort");
          pencarian.setAttribute('placeholder',"hari ini");
          pencarian.setAttribute('value',"day");
          pencarian.setAttribute('hidden',"");
          document.getElementById("submit").click();

          console.log('ok');
      });

        $(".minggu-ini").click(function(){
            pencarian.setAttribute('name',"sort");
            pencarian.setAttribute('placeholder',"minggu ini");
            pencarian.setAttribute('value',"week");
            pencarian.setAttribute('hidden',"");
             document.getElementById("submit").click();
            console.log('ok');
        });
        $(".bulan-ini").click(function(){
            pencarian.setAttribute('name',"sort");
            pencarian.setAttribute('placeholder',"bulan ini");
            pencarian.setAttribute('value',"month");
            pencarian.setAttribute('hidden',"");
             document.getElementById("submit").click();
            console.log('ok');
        });


});

</script>

@endpush
