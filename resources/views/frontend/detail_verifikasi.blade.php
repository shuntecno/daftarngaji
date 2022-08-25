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
                  <div class="row d-flex justify-content-center">

                    <form method="POST" action=" {{ route('verifikasi_user/update',$users->id) }} " enctype="multipart/form-data">
                        @csrf
                    <div class="card border-light pr-4 pl-4" style="width: 25rem;">
                        <img class="card-img-top" src="{{ \URL::to('/storage/foto_ktp')}}/{{$users->foto_ktp}}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Nama : {{$users->nama}}</h5>
                          <p class="card-text">Alamat : {{$users->alamat}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">Tempat Lahir : {{$users->tempat_lahir}}</li>
                          <li class="list-group-item">Tanggal lahir : {{date('d-m-Y', strtotime($users->tanggal_lahir))}}</li>
                          @if($users->seks == 'L')
                          <li class="list-group-item">Jenis Kelamin : Laki-Laki</li>
                          @else
                            <li class="list-group-item">Jenis Kelamin : Perempuan</li>
                          @endif
                          <li class="list-group-item">Nomor Telpon : {{$users->no_telp}}</li>
                          <li class="list-group-item">Nomor Ktp : {{$users->no_ktp}}</li>
                          <!-- <li class="list-group-item">Status : {{$users->level}}</li> -->
                          @if($users->level == 4)
                          <li class="list-group-item">Status Akun : Aktif</li>
                          @else
                          <li class="list-group-item">Status Akun : Belum Aktif</li>
                          @endif
                        </ul>
                        <div class="card-body d-flex justify-content-center">
                          <button type="submit" class="btn btn-primary">
                              {{ __('Verifikasi') }}
                        </div>
                      </div>


                </div>
                  </form>
            </div>
        </div>
    </div>
  </div>
@endsection
