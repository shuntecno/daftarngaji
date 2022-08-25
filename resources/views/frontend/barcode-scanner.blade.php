@extends('layouts.app-dashboard')
@push('style')
<link href="{{asset('barcode/css/style.css')}}" rel="stylesheet">
@endpush
@section('content')
      <div class="modal fade" id="preview" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Data Pendaftar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div id="asw" class="modal-body">
              <div id="status" class="">
                  <p>cfdsf</p>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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
            <div class="container d-flex justify-content-center">
       <div class="d-inline-flex p-7 bd-highlight">
     <div class="panel panel-heading">
         <div class="panel-heading d-flex justify-content-center">
             <div class="navbar-form navbar-right  col-lg-9 col-md-9">
               <div class="d-flex justify-content-center">
                     <select class="btn btn-primary btn-lg dropdown-toggle mb-4 btn-sm" id="camera-select">Pilih Kamera</select>
               </div>
                 <div class="form-group d-flex justify-content-center">
                     <input type="hidden" id="image-url" type="text" class="form-control" placeholder="Image url">
                     <button hidden title="Decode Image" class="btn btn-secondary ml-2 mr-2" id="decode-img" type="button" data-toggle="tooltip"><span class="fa fa-play"></span></button>
                     <button hidden title="Image shoot" class="btn btn-info btn-sm disabled" id="grab-img" type="button" data-toggle="tooltip"><span class="glyphicon glyphicon-picture"></span></button>
                     <button title="Play" class="btn btn-success ml-2 mr-2" id="play" type="button" data-toggle="tooltip"><span class="fa fa-play"></span></button>
                     <button  title="Pause" class="btn btn-warning ml-2 mr-2" id="pause" type="button" data-toggle="tooltip"><span class="fa fa-pause"></span></button>
                     <button title="Stop streams" class="btn btn-danger ml-2 mr-2  " id="stop" type="button" data-toggle="tooltip"><span class="fa fa-stop"></span></button>
                  </div>
                  <div class="thumbnail" id="result" hi>
                      <div class="well d-flex justify-content-center" style="overflow: hidden;" >
                          <img hidden id="scanned-img" src="{{asset('barcode/barcode.png')}}" class="img-fluid" alt="Responsive image">
                      </div>
                      <div class="caption d-flex justify-content-center">
                          <!-- <h6>Hasil Scan</h6> -->
                          <p hidden id="scanned-QR"></p>
                      </div>
                          <div class="d-flex align-items-center mb-2 col-xs-2">
                                <input id="data-pendaftar" class="form-control col-xs-2" type="text" name="barcode" value="" data-id="{{$kajian->id}}">
                                  <input id="kajian_id"  class="form-control" type="hidden" name="kajian_id" >
                                <button id="cari" class="btn btn-success my-2 my-sm-0 btn-sm">Cari</button>
                          </div>
                          <div id="status">

                          </div>
                </div>
             </div>
         </div>

             <div class="col">
               <div class="row d-flex justify-content-center">
                 <div class="well" style="position: relative;display: inline-block;">
                     <canvas width="320" height="240" id="webcodecam-canvas"></canvas>
                     <div class="scanner-laser laser-rightBottom" style="opacity: 0.5;"></div>
                     <div class="scanner-laser laser-rightTop" style="opacity: 0.5;"></div>
                     <div class="scanner-laser laser-leftBottom" style="opacity: 0.5;"></div>
                     <div class="scanner-laser laser-leftTop" style="opacity: 0.5;"></div>
                 </div>
               </div>
               <div class="mt-5">
                 <p id="error_selfie" style="font-size: 12px" style="display: none;"></p>
                 <span id="notice_selfie" style="font-size: 12px;">* Mohon untuk <b style="color: red;">Allow/Izinkan</b> penggunaan <b style="color: red;">kamera</b> pada perangkat Anda
                 <br> * Pastikan Anda menggunakan Perangkat Android dengan <b style="color: red;">Versi 8 Ke atas</b>
               </div>
                 <div class="well d-flex justify-content-center" style="width: 100%;">
                     <label hidden id="zoom-value" width="100">Zoom: 2</label>
                     <input hidden id="zoom" onchange="Page.changeZoom();" type="range" min="10" max="30" value="20">
                     <label hidden id="brightness-value" width="100">Brightness: 0</label>
                     <input hidden id="brightness" onchange="Page.changeBrightness();" type="range" min="0" max="128" value="0">
                     <label hidden id="contrast-value" width="100">Contrast: 0</label>
                     <input hidden id="contrast" onchange="Page.changeContrast();" type="range" min="0" max="64" value="0">
                     <label hidden id="threshold-value" width="100">Threshold: 0</label>
                     <input hidden id="threshold" onchange="Page.changeThreshold();" type="range" min="0" max="512" value="0">
                     <label hidden id="sharpness-value" width="100">Sharpness: off</label>
                     <input hidden id="sharpness" onchange="Page.changeSharpness();" type="checkbox">
                     <label hidden id="grayscale-value" width="100">grayscale: off</label>
                     <input hidden id="grayscale" onchange="Page.changeGrayscale();" type="checkbox">
                     <br>
                     <label hidden id="flipVertical-value" width="100">Flip Vertical: off</label>
                     <input hidden id="flipVertical" onchange="Page.changeVertical();" type="checkbox">
                     <label hidden id="flipHorizontal-value" width="100">Flip Horizontal: off</label>
                     <input hidden id="flipHorizontal" onchange="Page.changeHorizontal();" type="checkbox">
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
<script type="text/javascript" src="{{asset('barcode/js/filereader.js')}}"></script>

  <!-- Using jquery version: -->

  <script type="text/javascript" src="{{asset('barcode/js/jquery.js')}}"></script>
   <script type="text/javascript" src="{{asset('barcode/js/qrcodelib.js')}}"></script>
   <!-- <script type="text/javascript" src="{{asset('barcode/js/webcodecamjquery.js')}}"></script> -->
   @include('frontend.js.webcodecamjquery')
   <script type="text/javascript" src="{{asset('barcode/js/mainjquery.js')}}"></script>

<script type="text/javascript" src="{{asset('barcode/js/qrcodelib.js')}}"></script>
<!-- <script type="text/javascript" src="{{asset('barcode/js/webcodecamjs.js')}}"></script> -->
   @include('frontend.js.webcodecamjs')
<script type="text/javascript" src="{{asset('barcode/js/main.js')}}"></script>

<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<script type="text/javascript">


// $(document).ready(function(){
//   $('#test').on('input', function() {
//     console.log('test');
//   });
// });

$(document).ready(function(){

      // get_data_pendaftar();

  function get_data_pendaftar(query,id)
  {
    $.ajax({
        url:"{{route('live-search-pendaftar')}}",
        method:'POST',
        data:{
          '_token': '{{csrf_token()}}',
          query:query,
          id:id,  },
        success:function(data){
          $('#asw').html(data);
          $("#preview").modal("show");
        }
    });
  }



$(document).on('click','#cari', function(){

        var id = $('#data-pendaftar').data('id');
        var query = $('#data-pendaftar').val();
        console.log(id);
        // console.log(query);
        get_data_pendaftar(query,id);
      })
});

$(document).ready(function(){

verifikasi_pendaftar();

function verifikasi_pendaftar(user_id,kajian_id)
{
$.ajax({
  url:"{{route('verifikasi-pendaftar')}}",
  method:'POST',
  data:{
    '_token': '{{csrf_token()}}',
    user_id:user_id,
    kajian_id:kajian_id,  },
  dataType:'json',
  success:function(data){
    // console.log(data1);
    $('#status').html(data.verifikasi);
    setTimeout(function(){
      $('#status').html('<p align="center"> </p>');
    }, 2000);
  }
});
}


$(document).on('click','#verifikasi', function(){
  var user_id = $(this).data('user_id');
  var kajian_id = $(this).data('kajian_id');
  // console.log(user_id);
  // console.log(kajian_id);
  verifikasi_pendaftar(user_id,kajian_id)
  var query = $('#data-pendaftar').val('');
$('#preview').modal('toggle');


})
});

</script>
@endpush
