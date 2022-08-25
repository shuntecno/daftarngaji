@extends('layouts.app')
@section('content')
<div class="modal fade" id="persetujuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-family: sans-serif;">Persetujuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Dengan menyetujui penyataan ini pendaftar bersedia untuk mengikuti semua protokol
            kesehatan yang ditetapkan oleh pemerintah maupun pengelola Kajian dan bila melanggar pendaftar bersedia menerima sanksi yang ditetapkan
          oleh Pengelola aplikasi</p>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="checkbox" >
            <label class="form-check-label" for="defaultCheck1">
              <p>Saya setuju</p>
            </label>
          </div>
      </div>
      @if($kajian != null)
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a id="daftar" href="{{route('daftar-kajian',$kajian->id)}}" class="btn btn-success disabled" >Daftar Sekarang</a>
      </div>
    @endif
    </div>
  </div>
</div>

  <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-6 offset-lg-3 offset-md-1" id="main" style="padding-right: 0;padding-left: 0;">
                  @include('layouts.navbar-view')

                  @if(!empty($success))
                    <div class="alert alert-success alert-block konten mr-2 ml-2">

                        <strong class="d-flex justify-content-center">{{ $success }}</strong>
                    </div>
                  @endif
                  @if(!empty($danger))
                    <div class="alert alert-danger alert-block konten mr-2 ml-2">

                        <strong class="d-flex justify-content-center">{{ $danger }}</strong>
                    </div>
                  @endif

                  @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block konten mr-2 ml-2">

                        <strong class="d-flex justify-content-center">{{ $message }}</strong>
                    </div>
                  @endif

                  @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block konten mr-2 ml-2">

                        <strong class="d-flex justify-content-center">{{ $message }}</strong>
                    </div>
                  @endif
                <div class="row no-gutters d-flex justify-content-center">



                @if($kajian == null)
                <div class="mt-3 mb-3 pt-5 row no-gutters d-flex justify-content-center" style="height: 200px;">

                  <h4 class="konten">- Tidak ada Kajian -</h4>
                  </div>
                @else
                @if($kajian->kategori_id == '2')
                <div class="col-lg-12 col-md-12 mb-0 col-12 thumb d-flex justify-content-center">
                      <img class="kajian-info img-thumbnail"
                          src="{{asset('daftarngaji/soljum.png')}}"
                           alt="Another alt text">
                </div>
                @else
                <div class="col-lg-12 col-md-12 mb-0 col-12 thumb d-flex justify-content-center">
                      <img class="kajian-info img-thumbnail"
                          src="{{ \URL::to('/storage/foto_banner')}}/{{$kajian->foto_banner}}"
                           alt="Another alt text">
                </div>
                @endif
              </div>
                <div class="konten info-konten ">
                @if($kajian->kategori_id == '2')
                  <h3>{{$kajian->judul_kajian}}</h3>
                <table class="table table-bordered">

                    <tbody>

                      <tr>
                        <th scope="row"><p>Masjid</p></th>
                        <td><p>{{$masjid->nama_masjid}}</p></td>

                      </tr>
                      <tr>
                        <th scope="row"><p>Alamat Masjid</p></th>
                        <td><p>{{$masjid->alamat_masjid}}</p></td>

                      </tr>
                      <tr>
                        <tr>
                          <th scope="row"><p>Waktu Kajian</p></th>
                          <td><p>{{date('d-m-Y, H:i', strtotime($kajian->waktu_kajian))}}</p></td>
                        </tr>
                        <th scope="row"><p>Kuota Ikwan</p></th>
                        <td><p>{{$kajian->batas_jumlah_ikhwan}}</p></td>

                      </tr>

                    </tbody>
                    @else

                    <h3>{{$kajian->judul_kajian}}</h3>
                    <p><p>{!! $kajian->deskripsi_kajian !!}</p></p>
                    <table class="table table-sm d-flex_ align-items-center table-bordered">
                    <tbody>
                      <tr>
                        <th scope="row"><p>Nama Ustadz</p></th>
                        <td><p>{{$kajian->nama_ustadz}}</p></td>
                      </tr>
                      <tr>
                        <th scope="row"><p>Masjid</p></th>
                        <td><p>{{$masjid->nama_masjid}}</p></td>

                      </tr>
                      <tr>
                        <th scope="row"><p>Alamat Masjid</p></th>
                        <td><p>{{$masjid->alamat_masjid}}</p></td>

                      </tr>
                      <tr>
                        <tr>
                          <th scope="row"><p>Waktu Kajian</p></th>
                          <td><p>{{date('d-m-Y, H:i', strtotime($kajian->waktu_kajian))}}</p></td>
                        </tr>
                        <th scope="row"><p>Kuota Ikwan</p></th>
                        <td><p>{{$kajian->batas_jumlah_ikhwan}}</p></td>

                      </tr>
                      <tr>
                        <th scope="row"><p>Kuota Akwat</p></th>
                        <td><p>{{$kajian->batas_jumlah_akhwat}}</p></td>

                      </tr>
                    </tbody>
                    @endif
                  </table>

                    @if($user != '')
                    @if($pendaftar != null)
                    <div class="visible-print text-center mt-4 mb-2">
                        {!! QrCode::size(250)->generate($pendaftar->barcode); !!}
                        <p class="mt-2">QRcode Ini Digunakan Sebagai Tiket Untuk Mengikuti Kegiatan </p>
                    </div>

                    @elseif(!empty($danger))
                    <button type="button" disabled class="btn-daftar btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModalCenter">
                      Daftar Sekarang
                    </button>
                    @else
                    <button type="button" class="btn-daftar btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModalCenter">
                      Daftar Sekarang
                    </button>
                    @endif
                    @else
                    <a href="{{route('login')}}" type="button" class="  btn btn-primary btn-block">
                      Daftar Sekarang
                    </a>
                    @endif
                    @endif
                </div>
                  @include('layouts.footer')
            </div>
        </div>
</div>
@endsection
@push('scripts')
@include('UserView.js')
@endpush
