<form method="POST" action=" {{ route('verifikasi_user/update',$user->id) }} " enctype="multipart/form-data">
    @csrf
<div class="card-body text-left mb-3"><img id="foto-ktp" class="card-img-top mb-3" src="{{ \URL::to('/storage/foto_ktp')}}/{{$user->foto_ktp}}" alt="Card image cap">
  <div class="">
    <p class="font-weight-bold ">Nomor Ktp : </p>
    <p>{{$user->no_ktp}}</p>
  </div>
  <div class="mb-3">
    <p class="font-weight-bold ">Nama : </p>
    <p>{{$user->nama}}</p>
  </div>
  <div class="mb-3">
    <p class="font-weight-bold ">Alamat : </p>
    <p>{{$user->alamat}}<p/>
  </div>
  <div class="mb-3">
    <p class="font-weight-bold ">Tempat Lahir : </p>
    <p>{{$user->tempat_lahir}}</p>
  </div>
  <div class="mb-3">
    <p class="font-weight-bold ">Tanggal Lahir : </p>
    <p>{{date('d-m-Y', strtotime($user->tanggal_lahir))}}</p>
  </div>
  <div class="mb-3">
    <p class="font-weight-bold ">Email : </p>
    <p>{{$user->email}}</p>
  </div>
  @if($user->seks == 'L')
  <div class="mb-3">
    <p class="font-weight-bold ">Jenis Kelamin : </p>
    <p>Laki - Laki</p>
  </div>
  @else
  <div class="mb-3">
    <p class="font-weight-bold ">Jenis Kelamin : </p>
    <p>Perempuan</p>
  </div>
  @endif
  <div class="mb-3">
    <p class="font-weight-bold ">Nomor Telpon : </p>
    <p>{{$user->no_telp}}</p>
  </div>

</div>
<div class="d-flex justify-content-center">
  <button type="submit" class="btn btn-primary">
      {{ __('Verifikasi') }}
  </button>
</div>
</form>
