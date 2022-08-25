@extends('layouts.app')
@section('content')
<div class="container">



        <div class="row">
            <div class="col-md-10 col-lg-6 offset-lg-3 offset-md-1" id="main" style="padding-right: 0;padding-left: 0;">
                  @include('layouts.navbar-view')
                <h3 class="text-center mt-4">Daftar</h3>

                <div class="konten">
                  <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group row  @error('nama') is-invalid @enderror">
                          <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Sesuai Identitas') }}</label>

                          <div class="col-md-6 d-flex align-items-center">
                              <input id="name" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}"  autofocus>
                              @error('nama')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                              @enderror

                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Email') }}</label>

                          <div class="col-md-6">
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >

                              @error('email')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                          <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >
                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                          <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                          </div>
                      </div>


                     <div class="form-group row">
                          <label for="tempat-lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tempat Lahir') }}</label>

                          <div class="col-md-6">
                              <input id="tempat-lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                              @error('tempat_lahir')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                         <label class="col-md-4 col-form-label text-md-right">Tanggal Lahir</label>

                         <div class="col-md-6">

                           <input type="text"
                              id="tanggal-lahir"
                             name="tanggal_lahir"
                              class="datepicker-here form-control @error('tanggal_lahir') is-invalid @enderror"
                              data-language='en'
                              data-position='top left'
                              value="{{ old('tanggal_lahir') }}" required/>

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
                            <label class="radio">
                                  <input type="radio" value="L" name="seks" checked>
                                  Laki-laki
                              </label>
                              <label class="radio">
                                  <input type="radio" value="P" name="seks">
                                  Perempuan
                              </label>
                               <!-- <select class="selectpicker form-control" name="jenis_kelamin">
                                    <option>-- Pilih Jenis Kelamin --</option>
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                  </select> -->
                          </div>
                      </div>

                      <div class="form-group row">
                          <label  class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                          <div class="col-md-6">
                              <input type="text" class="form-control  @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}">
                              @error('alamat')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>


                      <div class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right ">{{ __('No Handphone') }}</label>

                          <div class="col-md-6">
                              <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{ old('no_telp') }}" >
                              @error('no_telp')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label class="col-md-4 col-form-label text-md-right ">{{ __('No KTP') }}</label>

                          <div class="col-md-6">
                              <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" value="{{ old('no_ktp') }}" >
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
                                <input type="file" class="form-control-file  @error('foto_ktp') is-invalid @enderror"  name="foto_ktp" value="{{ old('foto_ktp') }}" required>
                                @error('foto_ktp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>

                          </div>
                      </div>




                      <div class="form-group row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Register') }}
                              </button>
                          </div>
                      </div>
                  </form>
                </div>

                  @include('layouts.footer')

            </div>
        </div>

</div>

@endsection
@push('scripts')
<script type="text/javascript">

      $('#tanggal-lahir').datepicker({
        format: 'DD-MM-YYYY',
        minDate: new Date(1945, 1 - 1, 31),
        maxDate: new Date(2010, 12 - 1, 31),
      });
    </script>
@endpush
