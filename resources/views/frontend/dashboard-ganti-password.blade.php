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
                           @if($message = Session::get('danger'))
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
                                           <div class="card-header">Ganti Pasword</div>
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
                                   </div>

                                 </div>
                               </div>
                           </div>
                       </div>
                   </div>
                  </div>
@endsection
@push('scripts')

@endpush
