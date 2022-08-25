@if($user != '')

<p>Nama : {{$user->nama}}</p>
<p>Alamat : {{$user->alamat}}</p>
@if($user->seks == 'L')
<p>Jenis Kelamin : Laki - Laki</p>
@else
<p>Jenis Kelamin : Perempuan</p>
@endif
<p>No Telpon : {{$user->no_telp}}</p>
<p>No Ktp : {{$user->no_ktp}}</p>
<p>Status Pendaftaran : {{$pendaftar->status_pendaftaran}}</p>
@if($pendaftar->status_pendaftaran != 'hadir')
<button id="verifikasi" type="button" class="btn btn-primary" data-user_id="{{$user->id}}" data-kajian_id="{{$kajian->id}}">verifikasi</button>
@endif
@else
<div class="d-flex justify-content-center">
  <h4 class="d">data tidak ditemukan</h4>
</div>
@endif
