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
            @if($message = Session::get('danger'))
            <div class="alert alert-danger alert-block konten mr-2 ml-2">
              <button type="button" class="close" data-dismiss="alert">×</button>
                <strong class="d-flex justify-content-center">{{ $message }}</strong>
            </div>
            @endif

                <h3 class="text-center mt-4">Ganti Password</h3>

                <div class="konten">
                  <div class="card-body">
                    <form method="POST" action="{{ route('ganti-password') }}">

                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password Lama') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password_lama" required autocomplete="new-password">


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                      {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                </div>
                  @include('layouts.footer')
              </div>
            </div>
          </div>

@endsection
