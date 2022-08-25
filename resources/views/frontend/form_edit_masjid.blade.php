@extends('layouts.app-dashboard')
  @section('content')
               <div class="">
                   @include('layouts.navbar')
                   <!-- PAGE CONTAINER-->
                   <div class="page-container">
                       @include('layouts.header-desktop')
                         <div class="main-content">
                           <div class="section__content section__content--p30">
                               <div class="container-fluid">
                                 <div class="row">

                                   <div class="col-lg-9">
                                       <div class="card">
                                           <div class="card-header">Edit Masjid</div>
                                           <div class="card-body">
                                               <form method="POST" action="{{ route('masjid/update',$masjid->id) }}" enctype="multipart/form-data">
                              @csrf

                              <div class="form-group row">
                                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Masjid') }}</label>

                                  <div class="col-md-6">
                                      <input  type="text" class="form-control @error('nama_masjid') is-invalid @enderror" name="nama_masjid" value="{{ $masjid->nama_masjid }}">

                                      @error('nama_masjid')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Masjid') }}</label>

                                  <div class="col-md-6">
                                      <input type="text"  class="form-control @error('alamat_masjid') is-invalid @enderror" name="alamat_masjid" value="{{ $masjid->alamat_masjid }}">

                                      @error('alamat_masjid')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>




                              <div class="form-group row">
                                  <label class="col-md-4 col-form-label text-md-right">{{ __('Logo Masjid') }}</label>

                                  <div class="col-md-6">

                                      <div class="form-group ">
                                        <small  class="form-text text-muted text-justify">disarankan gambar memiliki dimensi 1600 x 1583</small>
                                        <input type="file" name="logo_masjid" id="preview-logo-masjid" />
                                        <img src="{{ \URL::to('/storage/logo_masjid')}}/{{$masjid->logo_masjid}}" id="logo-masjid" width="300" alt="Preview Gambar" class="mt-2" />
                                        @error('logo_masjid')
                                              <small class="text-danger font-weight-bold">{{ $message }}</small>
                                        @enderror
                                      </div>

                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label class="col-md-4 col-form-label text-md-right">{{ __('Foto Masjid') }}</label>

                                  <div class="col-md-6">

                                      <div class="form-group ">
                                        <input type="file" name="foto_masjid" id="preview-foto-masjid" />
                                        <img src="{{ \URL::to('/storage/foto_masjid')}}/{{$masjid->foto_masjid}}" id="foto-masjid" width="300" alt="Preview Gambar" class="mt-2"/>
                                        <small  class="form-text text-muted text-justify">disarankan gambar memiliki dimensi 850 x 315</small>
                                        @error('foto_masjid')
                                              <small class="text-danger font-weight-bold">{{ $message }}</small>
                                        @enderror
                                      </div>

                                  </div>
                              </div>
                              <!-- test -->


                              <div class="form-group row mb-0">
                                  <div class="col-md-6 offset-md-4">
                                      <button type="submit" class="btn btn-primary">
                                          {{ __('Submit') }}
                                      </button>
                                  </div>
                              </div>
                          </form>

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
function bacaFotoMasjid(input) {
 if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#foto-masjid').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
 }
}

$("#preview-foto-masjid").change(function(){
   bacaFotoMasjid(this);
});

function bacaLogoMasjid(input) {
 if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#logo-masjid').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
 }
}

$("#preview-logo-masjid").change(function(){
   bacaLogoMasjid(this);
});



</script>
@endpush
