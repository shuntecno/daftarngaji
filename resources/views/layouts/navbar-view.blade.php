<div class="logo mx-auto" style="width: 200px;">
    <img src="{{asset('daftarngaji/logo.png')}}">
</div>
<ul class="nav justify-content-center mt-2">
    <li class="nav-item">
        <a class="nav-link active" href="{{ url('/') }}">Beranda</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('list-masjid')}}">Masjid</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('list-kajian')}}">Kajian</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Akun</a>
        <div class="dropdown-menu">
            @guest
            <a class="dropdown-item" href="{{ route('login') }}">Masuk</a>
            @if (Route::has('register'))
            <a class="dropdown-item" href="{{ route('register') }}">Daftar</a>
            @endif
            @else
            <a class="dropdown-item" href="{{ route('profil-user') }}">Pengaturan Akun</a>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Logout</a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
        </div>
    </li>
      @endguest
</ul>
