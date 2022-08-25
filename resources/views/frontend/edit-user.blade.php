@extends('layouts.app-dashboard')
@section('content')
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

                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header">Edit User</div>
                            <div class="card-body">
                              <form method="POST" action="{{ route('user/update',$user->id) }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama User') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$user->nama}}"  autocomplete="nama">

                                            @error('nama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                        <div class="col-md-6">
                                            <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" >

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Password</label>

                                        <div class="col-md-6">
                                            <input id="email" class="form-control @error('password') is-invalid @enderror" name="password" >

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                         <label for="tempat-lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tempat Lahir') }}</label>

                                         <div class="col-md-6">
                                             <input id="tempat-lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{$user->tempat_lahir}}" >
                                             @error('tempat_lahir')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                             @enderror
                                         </div>
                                     </div>

                                     <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                                        <div class="col-md-6">

                                            <input type="text "
                                              name="tanggal_lahir"
                                              value="{{$user->tanggal_lahir}}"
                                               class="datepicker-here form-control @error('tanggal_lahir') is-invalid @enderror"
                                               data-language='en'
                                               data-position='top left'/>
                                               @error('tanggal_lahir')
                                                   <span class="invalid-feedback" role="alert">
                                                       <strong>{{ $message }}</strong>
                                                   </span>
                                               @enderror

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                                        <div class="col-md-6">
                                            @if($user->seks != 'P')
                                          <label class="radio">
                                                <input type="radio" value="L" name="seks"  checked>
                                                Laki-laki
                                            </label>
                                            <label class="radio">
                                                <input type="radio" value="P" name="seks">
                                                Perempuan
                                            </label>
                                            @else
                                            <label class="radio">
                                                  <input type="radio" value="L" name="seks" >
                                                  Laki-laki
                                              </label>
                                              <label class="radio">
                                                  <input type="radio" value="P" name="seks"  checked>
                                                  Perempuan
                                              </label>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-4 col-form-label text-md-right">
                                            <label for="textarea-input" class="form-control-label">Alamat</label>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea name="alamat" id="alamat" rows="3" name="alamat"  class="form-control @error('alamat') is-invalid @enderror">{{$user->alamat}}</textarea>
                                            @error('alamat')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                     <!-- <div  class="form-group row" alamat-data="{{$user->alamat}}">
                                         <label  class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                                         <div class="col-md-6">
                                             <input type="text"  class="form-control" name="alamat" value="{{$user->alamat}}" rows="3" required autocomplete="">

                                         </div>
                                     </div> -->
                                     <div class="form-group row">
                                         <label class="col-md-4 col-form-label text-md-right">{{ __('No Handphone') }}</label>

                                         <div class="col-md-6">
                                             <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{$user->no_telp}}"  autocomplete="">
                                             @error('no_telp')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                             @enderror
                                         </div>
                                     </div>

                                     <div class="form-group row">
                                         <label class="col-md-4 col-form-label text-md-right">{{ __('No KTP') }}</label>

                                         <div class="col-md-6">
                                             <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" value="{{ $user->no_ktp }}"  autocomplete="">
                                             @error('no_ktp')
                                                 <span class="invalid-feedback" role="alert">
                                                     <strong>{{ $message }}</strong>
                                                 </span>
                                             @enderror
                                         </div>
                                     </div>

                                     <div class="form-group row">
                                         <label class="col-md-4 col-form-label text-md-right">{{ __('Foto KTP') }}</label>

                                         <div class="col-md-6">

                                             <div class="form-group">
                                               <label for="exampleFormControlFile1">Pilih Gambar</label>
                                               <!-- <input type="file" class="form-control-file"  name="foto_ktp"> -->
                                               <input type="file" name="foto_ktp" id="preview-foto-ktp" />
                                               <img src="{{asset('storage/foto_ktp/')}}/{{$user->foto_ktp}}" id="foto-ktp" width="300" alt="Preview Gambar" class="mt-2"/>
                                             </div>

                                         </div>
                                     </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Update') }}
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
function bacaFotoKtp(input) {
 if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
        $('#foto-ktp').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
 }
}

$("#preview-foto-ktp").change(function(){
   bacaFotoKtp(this);
});
</script>
@endpush
