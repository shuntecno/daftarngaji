    @if($kajian->kategori_id == '2')
    <div class="card-body text-left mb-3"><img id="foto-banner" class="card-img-top mb-3" src="{{asset('daftarngaji/soljum.png')}}" alt="Card image cap">
    <div class="mb-3">
      <p class="font-weight-bold ">Waktu Kajian : {{date('d-m-Y h:i a', strtotime($kajian->waktu_kajian))}}</p>
      <p></p>
    </div>
      <div class="mb-3">
        <p id="batas-jumlah-ikhwan" class="font-weight-bold">Batas Jumlah Ikhwan : {{$kajian->batas_jumlah_ikhwan}}</p>
        <div class="mt-4">
          <a href="{{route('kajian/detail/ikhwan',$kajian->id)}}" class="">Jumlah Pendaftar Ikhwan : {{$count_pendaftar_ikhwan}}</a>
        </div>

      </div>
    </div>
  @else
  <div class="card-body text-left mb-3"><img id="foto-banner" class="card-img-top mb-3" src="{{ \URL::to('/storage/foto_banner')}}/{{$kajian->foto_banner}}" alt="Card image cap">

    <div class="mb-3">
      <p class="font-weight-bold ">Judul Kajian : </p>
      <p>{{$kajian->judul_kajian}}</p>
    </div>
    <div class="mb-3">
      <p class="font-weight-bold ">Deskripsi Kajian : </p>
      <p>{!! $kajian->deskripsi_kajian !!}</p>
    </div>
    <div class="mb-3">
      <p class="font-weight-bold ">Nama Ustadz : </p>
      <p>{{$kajian->nama_ustadz}}<p/>
    </div>

  <div class="mb-3">
    <p class="font-weight-bold ">Waktu Kajian : {{date('d-m-Y h:i a', strtotime($kajian->waktu_kajian))}}</p>
    <p></p>
  </div>
    <div class="mb-3">
      <p id="batas-jumlah-ikhwan" class="font-weight-bold">Batas Jumlah Ikhwan : {{$kajian->batas_jumlah_ikhwan}}</p>
      <p id="batas-jumlah-akhwat" class="font-weight-bold">Batas Jumlah Akhwat : {{$kajian->batas_jumlah_akhwat}}</p>
      <div class="mt-4">
        <a href="{{route('kajian/detail/ikhwan',$kajian->id)}}" class="">Jumlah Pendaftar Ikhwan : {{$count_pendaftar_ikhwan}}</a>
        <a href="{{route('kajian/detail/akhwat',$kajian->id)}}" class="">Jumlah Pendaftar Akhwat : {{$count_pendaftar_akhwat}}</a>
      </div>

    </div>
  </div>
  @endif
