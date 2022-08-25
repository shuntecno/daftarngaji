@extends('layouts.app-dashboard')
@section('content')
@push('style')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endpush
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
                            <div class="card-header">Edit Kajian</div>
                            <div class="card-body">
                              <form method="POST" action=" {{route('kajian/update',$kajian->id)}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label  class="col-md-4 col-form-label text-md-right">Kategori</label>

                                        <div class="col-md-6 mb-0">
                                          <select id="kategori_id" name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                                            @if($kajian->kategori_id == '1')
                                            <option selected value="1" >Kajian</option>
                                            <option value="2">Sholat Jumat</option>
                                            @else
                                            <option value="1" >Kajian</option>
                                            <option selected value="2">Sholat Jumat</option>
                                            @endif
                                          </select>
                                          @error('kategori_id')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                        </div>

                                    </div>


                                    <div id="judul_kajian" class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Judul Kajian</label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control  @error('judul_kajian') is-invalid @enderror" name="judul_kajian" value="{{$kajian->judul_kajian}}" >
                                            @error('judul_kajian')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="deskripsi_kajian" class="form-group row">
                                        <div class="col-md-4 col-form-label text-md-right">
                                            <label for="textarea-input" class="form-control-label">Deskripsi Kajian</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea id="summernote" name="deskripsi_kajian"  rows="3" class="form-control @error('deskripsi_kajian') is-invalid @enderror" value="{{ old('deskripsi_kajian') }}">{!! $kajian->deskripsi_kajian !!}</textarea>
                                            @error('deskripsi_kajian')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="nama_ustadz" class="form-group row ">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Nama Ustadz</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control @error('nama_ustadz') is-invalid @enderror" name="nama_ustadz" value="{{$kajian->nama_ustadz}}">
                                            @error('nama_ustadz')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                       <label class="col-md-4 col-form-label text-md-right">Waktu Kajian</label>

                                       <div class="col-md-6">

                                           <input type="text "
                                             name="waktu_kajian"
                                             readonly="readonly"
                                              class="datepicker-here form-control @error('waktu_kajian') is-invalid @enderror"
                                              data-language='en'
                                               data-timepicker="true"
                                              data-time-format='hh:ii aa'
                                              value="{{$kajian->waktu_kajian}}"

                                              />
                                              <small id="emailHelp" class="form-text text-muted text-justify">jadwal kajian akan otomatis di buka 2 hari sebelum jadwal kajian dan diakhiri 5 jam sebelum kajian dimulai</small>
                                              @error('waktu_kajian')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                       </div>
                                   </div>
                                   <div class="form-group row">
                                      <label class="col-md-4 col-form-label text-md-right">Pendaftaran di Buka</label>

                                      <div class="col-md-6">

                                          <input type="text "
                                            name="pendaftaran_dibuka"
                                            readonly="readonly"
                                             class="datepicker-here form-control @error('pendaftaran_dibuka') is-invalid @enderror"
                                             data-language='en'
                                              data-timepicker="true"
                                             data-time-format='hh:ii aa'
                                             placeholder ="{{$kajian->pendaftaran_dibuka}}"

                                             data-position='top left'/>
                                             <small id="emailHelp" class="form-text text-muted text-justify">custom pembukaan pendaftaran</small>
                                             @error('pendaftaran_dibuka')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                             @enderror
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                     <label class="col-md-4 col-form-label text-md-right">Pendaftaran di Tutup</label>

                                     <div class="col-md-6">

                                         <input type="text "
                                           name="pendaftaran_ditutup"
                                           readonly="readonly"
                                            class="datepicker-here form-control @error('pendaftaran_ditutup') is-invalid @enderror"
                                            data-language='en'
                                             data-timepicker="true"
                                            data-time-format='hh:ii aa'
                                            placeholder ="{{$kajian->pendaftaran_ditutup}}"

                                            data-position='top left'/>
                                            <small id="emailHelp" class="form-text text-muted text-justify">custom penutupan pendaftaran</small>
                                            @error('pendaftaran_ditutup')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                     </div>
                                 </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Batas Jumlah Ikhwan</label>
                                        <div class="col-md-6">
                                            <input  type="text" class="form-control @error('batas_jumlah_ikhwan') is-invalid @enderror" name="batas_jumlah_ikhwan" value="{{$kajian->batas_jumlah_ikhwan}}">
                                            @error('batas_jumlah_ikhwan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="batas_jumlah_akhwat" class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Batas Jumlah Akhwat</label>
                                        <div class="col-md-6">
                                            <input  type="text" class="form-control  @error('batas_jumlah_akhwat') is-invalid @enderror" name="batas_jumlah_akhwat" value="{{$kajian->batas_jumlah_akhwat}}" >
                                            @error('batas_jumlah_akhwat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                  <div hidden class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Nama Masjid</label>

                                        <div class="col-md-6">
                                          <select name='masjid_id' class="form-control">
                                              <option value="{{$kajian->masjid_id}}">
                                                  {{$masjid->nama_masjid}}</option>
                                              </select>
                                        </div>
                                    </div>
                                    <div id="foto_banner" class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">Foto Banner</label>

                                        <div class="col-md-6">

                                            <div class="form-group">
                                              <!-- <input type="file" class="form-control-file @error('foto_banner') is-invalid @enderror"  name="foto_banner"> -->
                                              <input type="file" name="foto_banner" id="preview-foto-banner" />
                                              <img src="{{ \URL::to('/storage/foto_banner')}}/{{$kajian->foto_banner}}" id="foto-banner" width="300" alt="Preview Gambar" class="mt-2"/>
                                              <small  class="form-text text-muted text-justify">disarankan gambar memiliki dimensi 1080 x 1080</small>
                                              @error('foto_banner')
                                                <small class="text-danger font-weight-bold">{{ $message }}</small>
                                              @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <!-- test -->


                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                submit
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
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script type="text/javascript">
function bacaFotoBanner(input) {
 if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#foto-banner').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
 }
}

$("#preview-foto-banner").change(function(){
   bacaFotoBanner(this);
});


var namaUztads = document.getElementById('nama_ustadz');
var judulKajian = document.getElementById('judul_kajian');
var deskripsiKajian = document.getElementById('deskripsi_kajian');
var batasJumlahAkwat = document.getElementById('batas_jumlah_akhwat');
var fotoBanner = document.getElementById('foto_banner');
var kategoriId = document.getElementById('kategori_id');
var soljum = document.getElementById('soljum');
var kajian = document.getElementById('kajian');

$(document).on('change', '#kategori_id', function() {
  // Does some stuff and logs the event to the console
  console.log('ok');
console.log($(this).val());
if ($('#kategori_id').val() == 2) {
  judulKajian.setAttribute('hidden','');
  deskripsiKajian.setAttribute('hidden','');
  namaUztads.setAttribute('hidden','');
  batasJumlahAkwat.setAttribute('hidden','');
  fotoBanner.setAttribute('hidden','');
}else{
  judulKajian.removeAttribute("hidden")
  deskripsiKajian.removeAttribute("hidden")
  namaUztads.removeAttribute("hidden")
  batasJumlahAkwat.removeAttribute("hidden")
  fotoBanner.removeAttribute("hidden")
}

});

if ($('#kategori_id').val() == 2) {
  judulKajian.setAttribute('hidden','');
  deskripsiKajian.setAttribute('hidden','');
  namaUztads.setAttribute('hidden','');
  batasJumlahAkwat.setAttribute('hidden','');
  fotoBanner.setAttribute('hidden','');
}else{
  judulKajian.removeAttribute("hidden")
  deskripsiKajian.removeAttribute("hidden")
  namaUztads.removeAttribute("hidden")
  batasJumlahAkwat.removeAttribute("hidden")
  fotoBanner.removeAttribute("hidden")
}

$('#summernote').summernote({
  toolbar: [
    // [groupName, [list of button]]
    ['style', ['bold', 'italic', 'underline', 'clear']],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
    ['height', ['height']]
  ],
  height: 200,
});


</script>
@endpush
