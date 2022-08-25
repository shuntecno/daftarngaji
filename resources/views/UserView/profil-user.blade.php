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
                  @if ($message = Session::get('warning'))
                    <div class="alert alert-warning alert-block konten mr-2 ml-2">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong class="d-flex justify-content-center">{{ $message }}</strong>
                    </div>
                  @endif

                    <div class="konten d-flex justify-content-center">


                        <div class="card border-light" style="width: 25rem;">
                            <img class="card-img-top" src="{{ \URL::to('/storage/foto_ktp')}}/{{$user->foto_ktp}}" alt="Card image cap">
                            <div class="card-body">
                              <h5 class="card-title">Nama : {{$user->nama}}</h5>
                              <p class="card-text">Alamat : {{$user->alamat}}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">Tempat Lahir : {{$user->tempat_lahir}}</li>
                              <li class="list-group-item">Tanggal lahir : {{date('d-m-Y', strtotime($user->tanggal_lahir))}}</li>
                              @if($user->seks == 'L')
                              <li class="list-group-item">Jenis Kelamin : Laki-Laki</li>
                              @else
                                <li class="list-group-item">Jenis Kelamin : Perempuan</li>
                              @endif
                              <li class="list-group-item">Nomor Telpon : {{$user->no_telp}}</li>
                              <li class="list-group-item">Nomor Ktp : {{$user->no_ktp}}</li>
                              <!-- <li class="list-group-item">Status : {{$user->level}}</li> -->
                              @if($user->level == 4)
                              <li class="list-group-item">Status Akun : Aktif</li>
                              @else
                              <li class="list-group-item">Status Akun : Belum Aktif</li>
                              @endif
                            </ul>
                            <div class="card-body">
                              <a href="{{route('ganti-password')}}" class="card-link">Edit Password</a>
                              <a href="{{route('kirim-verifikasi')}}" class="card-link">Verifikasi Email</a>
                            </div>
                          </div>


                    </div>

                  @include('layouts.footer')

            </div>
        </div>

</div>

@endsection
