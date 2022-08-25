<h1>Daftar Ngaji</h1>
<hr>
<p>Nama Pendaftar : {{$user->nama}} </p>
<p>Judul Kajian : {{$kajian->judul_kajian}}</p>
<p>Waktu Kajian : {{date('d-m-Y h:i a', strtotime($kajian->waktu_kajian))}}</p>
<p>Nama Masjid : {{$masjid->nama_masjid}}</p>
<p>Alamat Masjid : {{$masjid->alamat_masjid}}</p>
<p>Kode Barcode : {{$pendaftaran_kajian->barcode}}</p>
</hr>
