<nav class="navbar navbar-light bg-light d-flex justify-content-end bd-highlight konten" style="background-color: #fff !important; ">
  @if(Route::currentRouteName()!="list-masjid")
    <div class="btn-group">
      <button id="filter" type="button" class="btn btn-secondary  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16">
  <path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
</svg>
    </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

        <li><a  type="submit" class="hari-ini dropdown-item" href="#">Hari Ini</a></li>
        <li><a  type="submit" class="minggu-ini dropdown-item" href="#">Minggu Ini</a></li>
        <li><a  type="submit" class="bulan-ini dropdown-item" href="#">Bulan Ini</a></li>
          <li><a  type="submit" class="bulan-ini dropdown-item" href="list-kajian">Semua</a></li>

      </div>

    </div>
    @endif
  <form action=""  class="form-inline">
      <div class="field">
          <div class="control is-expanded has-icons-right">


              <input id="pencarian" type="text" class="form-control mr-sm-2"

              @if( request()->get('cari_masjid') )
              value="{{request()->get('cari_masjid')}}"
              @elseif( request()->get('cari_judul') )
              value="{{request()->get('cari_judul')}}"
              @endif


              placeholder="<?php if(Route::currentRouteName()=="list-masjid"){ echo "Cari masjid";}
              else{ echo "Cari kajian";} ?>"

               name="<?php if (Route::currentRouteName()=="list-masjid"){ echo "cari_masjid";}
               else{ echo "cari_judul";} ?>"

              <span class="icon is-medium is-right">
                  <i class="fas fa-lg fa-search"></i>
              </span>
          </div>
      </div>
      <button id="submit" type="submit" hidden></button>
  </form>
  </nav>
