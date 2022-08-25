@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-lg-6 offset-lg-3 offset-md-1" id="main" style="padding-right: 0;padding-left: 0;">

            @include('layouts.navbar-view')

            @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block konten mr-2 ml-2">
                <button type="button" class="close" data-dismiss="alert">×</button>
                  <strong class="d-flex justify-content-center">{{ $message }}</strong>
              </div>
            @endif
            @if($message = Session::get('warning'))
            <div class="alert alert-warning alert-block konten mr-2 ml-2">
              <button type="button" class="close" data-dismiss="alert">×</button>
                <strong class="d-flex justify-content-center">{{ $message }}</strong>
            </div>
            @endif
            @if($message = Session::get('danger'))
            <div class="alert alert-danger alert-block konten mr-2 ml-2">
              <button type="button" class="close" data-dismiss="alert">×</button>
                <strong class="d-flex justify-content-center">{{ $message }}</strong>
            </div>
            @endif

                <h3 class="text-center mt-4">Masuk</h3>

                <div class="konten">

                    <form method="post" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">email</label>

                            <div class="col-md-6">
                              <input  class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email" value="{{ old('email') }}"  >
                            @error('email')
                              <div class="invalid-feedback">
                                {{$message}}
                              </div>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Kata Sandi" name="password">
                            @error('password')
                              <div class="invalid-feedback">
                                {{$message}}
                              </div>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"></label>

                            <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">Masuk</button>
                              @if (Route::has('password.request'))
                                  <a class="btn btn-link" href="{{ route('password.request') }}">
                                      {{ __('Lupa password?') }}
                                  </a>
                              @endif
                            </div>
                        </div>


                    </form>

                </div>
                  @include('layouts.footer')
              </div>
            </div>
          </div>

@endsection
