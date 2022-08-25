<form action=""  class="form-inline ml-2">
    <div class="field">
        <div class="control is-expanded has-icons-right">


            <input id="pencarian" type="text" class="form-control mr-sm-2"

            @if( request()->get('cari_masjid') )
            value="{{request()->get('cari_masjid')}}"
            @elseif( request()->get('cari_judul') )
            value="{{request()->get('cari_judul')}}"
            @elseif( request()->get('cari_pendaftar') )
            value="{{request()->get('cari_pendaftar')}}"
            @elseif( request()->get('cari_user') )
            value="{{request()->get('cari_user')}}"
            @endif


            placeholder="<?php if(Route::currentRouteName()=="table-masjid"){ echo "Cari masjid";}
            elseif(Route::currentRouteName()=="verifikasi_user"){ echo "Cari Pendaftar";}
            elseif(Route::currentRouteName()=="user"){ echo "Cari User";}
            else{ echo "Cari kajian";} ?>"

             name="<?php if (Route::currentRouteName()=="table-masjid"){ echo "cari_masjid";}
             elseif(Route::currentRouteName()=="verifikasi_user"){ echo "cari_pendaftar";}
             elseif(Route::currentRouteName()=="user"){ echo "cari_user";}
             else{ echo "cari_judul";} ?>"

            <span class="icon is-medium is-right">

            </span>
        </div>
    </div>
    <button id="submit" type="submit" hidden></button>
</form>
