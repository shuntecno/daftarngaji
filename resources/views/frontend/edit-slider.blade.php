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
                                           <div class="card-header">Edit slider</div>
                                           <div class="card-body">
                                               <form method="POST" action="{{route('edit/slider',$slider->id)}}" enctype="multipart/form-data">
                              @csrf

                              <div class="form-group row">
                                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Link') }}</label>

                                  <div class="col-md-6">
                                      <input id="name" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{$slider->link}}">

                                      @error('link')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label class="col-md-4 col-form-label text-md-right">{{ __('Foto slider') }}</label>

                                  <div class="col-md-6">

                                      <div class="form-group ">

                                        <input id="gambar-slider" type="file" class="form-control-file @error('foto_masjid') is-invalid @enderror"  name="gambar">
                                        <small  class="form-text text-muted text-justify">disarankan gambar memiliki dimensi 626 x 417</small>
                                        <img src="{{ \URL::to('/storage/slider')}}/{{$slider->gambar}}" id="preview-gambar-slider" width="300" alt="Preview Gambar" class="mt-2"/>
                                        @error('gambar')
                                          <small class="text-danger font-weight-bold">{{ $message }}</small>
                                        @enderror
                                      </div>

                                  </div>
                              </div>
                              <!-- test -->


                              <div class="form-group row mb-0">
                                  <div class="col-md-6 offset-md-4">
                                      <button type="submit" class="btn btn-primary">
                                          {{ __('Edit') }}
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
function bacaGambarSlider(input) {
 if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#preview-gambar-slider').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
 }
}

$("#gambar-slider").change(function(){
   bacaGambarSlider(this);
});


</script>
@endpush
