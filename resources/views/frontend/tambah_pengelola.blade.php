@extends('layouts.app-dashboard')
@section('content')
<div class="">
    @include('layouts.navbar')
    <!-- PAGE CONTAINER-->
    <div class="page-container">
        @include('layouts.header-desktop')
          <div class="main-content">
            @if ($message = Session::get('danger'))
              <div class="alert alert-danger alert-block konten mr-2 ml-2">
                <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong class="d-flex justify-content-center">{{ $message }}</strong>
              </div>
            @endif
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                  <div class="row">

                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-header">Tambah Pengelola</div>
                            <div class="card-body">
                              <form method="POST" action="{{ route('store_pengelola') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Pengelola') }}</label>

                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}"  autocomplete="nama">

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
                                            <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >

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
                                      <label for="password" class="col-md-4 col-form-label text-md-right">Level Pengelola</label>
                                        <div class="col-md-6">
                                          <select name='level' class="form-control">
                                            <option value="2">
                                              Pengelola Biasa
                                            </option>
                                            <option value="5">
                                              Validator
                                            </option>
                                            <option value="6">
                                               Admin Kajian
                                            </option>
                                          </select>
                                        </div>
                                      </div>

                                    <div hidden class="form-group row">
                                      <label for="password" class="col-md-4 col-form-label text-md-right">ID Masjid</label>
                                        <div class="col-md-6">
                                          <select name='masjid_id' class="form-control">
                                            <option value="{{$masjid->id}}">
                                              {{$masjid->nama_masjid}}
                                            </option>
                                          </select>
                                        </div>
                                      </div>


                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-success">
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
