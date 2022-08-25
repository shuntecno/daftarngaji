@extends('layouts.app')
@section('content')
    <div class="container">



            <div class="row">
                <div class="col-md-10 col-lg-6 offset-lg-3 offset-md-1" id="main" style="padding-right: 0;padding-left: 0;">

                      @include('layouts.navbar-view')

                      @if($masjid == null)
                      <div class="mt-3 mb-3 pt-5 row no-gutters d-flex justify-content-center" style="height: 200px;">

                        <h4 class="konten">- Tidak ada masjid -</h4>
                        </div>

                      @else
                      <div class="fb-profile-block">
                          <div class="fb-profile-block-thumb cover-container" style="background-image: url('{{ \URL::to('/storage/foto_masjid')}}/{{$masjid->foto_masjid}}');"></div>
                          <div class="profile-img">
                              <a href="#">
                                  <img src="{{ \URL::to('/storage/logo_masjid')}}/{{$masjid->logo_masjid}}" alt="" title="">
                              </a>
                          </div>
                          <div class="profile-name">
                              <h2>{{$masjid->nama_masjid}}</h2>
                          </div>

                          <!-- <div class="fb-profile-block-menu">
                              <div class="block-menu">
                                  <ul>
                                      <li><a href="#">Timeline</a></li>
                                      <li><a href="#">about</a></li>
                                      <li><a href="#">Friends</a></li>
                                      <li><a href="#">Photos</a></li>
                                      <li><a href="#">More...</a></li>
                                  </ul>
                              </div>
                              <div class="block-menu">
                                  <ul>
                                      <li><a href="#">Timeline</a></li>
                                      <li><a href="#">about</a></li>
                                      <li><a href="#">Friends</a></li>
                                      <li><a href="#">Photos</a></li>
                                      <li><a href="#">More...</a></li>
                                  </ul>
                              </div>
                          </div> -->
                      </div>
                      <div class="konten info-konten mb-4">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th scope="row"><p>Nama Masjid</p></th>
                              <td><p>{{$masjid->nama_masjid}}</p></td>

                            </tr>
                            <tr>
                              <th scope="row"><p>Alamat</p></th>
                              <td><p>{{$masjid->alamat_masjid}}</p></td>
                            </tr>
                          </tbody>
                          </table>
                      </div>

                      <h3 class="text-center mt-0">Kajian-kajian</h3>

                      <div class="row no-gutters">
                        @if($kajian->count() > 0)
                        @foreach($kajian as $data)
                        @if($data->kategori_id == '2')
                        <div class="col-lg-6 col-md-6 mb-0 col-12 thumb d-flex justify-content-center">
                          <a class="thumbnail" style="margin-top: 15px; margin-bottom: 15px;" href="{{url('detail-kajian',$data->id)}}">
                              <img class="kajian img-thumbnail"
                                  src="{{asset('daftarngaji/soljum.png')}}"
                                   alt="Another alt text">
                          </a>
                        </div>
                        @else
                        <div class="col-lg-6 col-md-6 mb-0 col-12 thumb d-flex justify-content-center">
                          <a class="thumbnail" style="margin-top: 15px; margin-bottom: 15px;" href="{{url('detail-kajian',$data->id)}}">
                              <img class="kajian img-thumbnail"
                                  src="{{ \URL::to('/storage/foto_banner')}}/{{$data->foto_banner}}"
                                   alt="Another alt text">
                          </a>
                        </div>
                        @endif
                            @endforeach
                            @else
                            <div class="col-lg-12 col-md-12 mb-0 col-12 d-flex justify-content-center">
                              <h4 class="konten">- Tidak ada Kajian -</h4>
                            </div>


                            @endif
                      </div>
                      <div class="d-flex justify-content-center konten">
                          {{ $kajian->links() }}
                      </div>
                        @endif
                      <!-- <center>
                          <button class="btn btn-secondary btn-sm mt-4">Lihat Lebih</button>
                      </center> -->
                        @include('layouts.footer')
                </div>
            </div>

    </div>
    @endsection
