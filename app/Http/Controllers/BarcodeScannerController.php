<?php

namespace App\Http\Controllers;
use App\Model\Masjid;
use App\Model\Pengelola;
use App\Model\Kajian;
use App\Model\User;
use App\Model\PendaftaranKajian;
use Illuminate\Http\Request;
use Auth;
use DB;

class BarcodeScannerController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index($kajian_id)
  {
      $user = Auth::user();
      if ($user->level == 1) {
          $kajian = Kajian::where('id',$kajian_id)->first();
          $masjid = Masjid::where('id',$kajian->masjid_id)->first();
      }else{
        $pengelola = Pengelola::where('user_id',$user->id)->first();
        $masjid = Masjid::where('id',$pengelola->masjid_id)->first();
        $kajian = Kajian::where('id',$kajian_id)->where('masjid_id',$masjid->id)->first();
      }

      if ($kajian != null || $user->level == 1) {
          $kajian = Kajian::where('id',$kajian_id)->first();
          $data = compact('kajian');
          return view('frontend.barcode-scanner',$data);
      }

      return redirect()->back();


  }

  public function cari(Request $request){


        if ($request->ajax()) {
             $query = $request->get('query');
               $kajian_id = $request->get('id');
               $pendaftar = '';
               $user = '';

               $kajian = Kajian::where('id',$kajian_id)->first();

            if ($query != '') {
               $pendaftar = PendaftaranKajian::where('barcode',$query)->where('kajian_id',$kajian_id)->first();
               if ($pendaftar != '') {

                   $user = User::where('id',$pendaftar->user_id)->first();
                   $data = compact('user','pendaftar','kajian');

               }
            }



           $data = compact('user','pendaftar','kajian');
           return view('frontend.pengecekan-ajax',$data);
      }
    }


  public function verifikasi(Request $request){
        if ($request->ajax()) {
            $user_id = $request->get('user_id');
            $kajian_id = $request->get('kajian_id');
           $pendaftar =  PendaftaranKajian::where('user_id',$user_id)->where('kajian_id',$kajian_id)->first();

          if ($pendaftar != '') {
            $pendaftar->update([
              'status_pendaftaran'=> 'hadir'
            ]);
            $output = '
              <p align="center">berasil di verifikasi</p>
            ';
          }else {
            $output = '
              <p align="center"> </p>
            ';
          }

                    $data = array(
                      'verifikasi'=> $output,

                    );
                    return $data;
                  }

            }

}
