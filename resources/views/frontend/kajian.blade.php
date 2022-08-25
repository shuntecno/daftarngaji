@extends('layouts.app-dashboard')
        <!-- Left Panel -->
@section('content')
    <aside id="left-panel" class="left-panel mb-0">
        <nav class="navbar navbar-expand-sm navbar-default d-flex flex-column">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">Daftar Ngaji</a>
                <!-- <a class="navbar-brand hidden" href="./">M<img src="" alt="Logo"></a> -->
            </div>
            <div id="main-menu" class="collapse navbar-collapse mt-4 ">

            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <div class="header-menu ">
          <nav class="navbar navbar-expand-sm navbar-default d-flex flex-column mb-0">
              <div class="container">
                  <a class="navbar-brand" href="{{ url('/') }}"></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                      <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <!-- Left Side Of Navbar -->
                      <ul class="navbar-nav mr-auto">

                      </ul>

                      <!-- Right Side Of Navbar -->
                      <ul class="navbar-nav ml-auto">
                          <!-- Authentication Links -->
                          @guest
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                              </li>
                              @if (Route::has('register'))
                                  <li class="nav-item">
                                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                  </li>
                              @endif
                          @else
                              <li class="nav-item dropdown">
                                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                      {{ Auth::user()->nama }}
                                  </a>

                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}
                                      </a>



                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                      </form>
                                  </div>
                              </li>
                          @endguest
                      </ul>
                  </div>
              </div>
          </nav>


        </div>

        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Table</a></li>
                            <li class="active">Basic table</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3 ml-0 d-inline">
            <div class="animated fadeIn">

                <div class="row d-flex justify-content-center">

                    <!-- content -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <strong class="card-title">Tabel Kajian</strong>
                                <a class="btn btn-success" href="{{route('kajian/create',$masjid->id)}}" role="button">Tambah Kajian</a>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">No</th>
                                      <th scope="col">Judul Kajian</th>
                                      <th scope="col">Pengisi Kajian</th>
                                      <th scope="col">Edit</th>
                                    </tr>
                                  </thead>
                                  @foreach($kajian as $data)
                                <tbody>
                                  <td>{{$loop->iteration}}</td>
                                  <td>{{$data->judul_kajian}}</td>
                                  <td>{{$data->nama_ustadz}}</td>
                                </tbody>
                                @endforeach
                                </table>

                            </div>
                        </div>
                    </div>



                </div>

              </div>
            </div>
</div>
 <!-- Right Panel -->
@endsection
