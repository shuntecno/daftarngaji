<?php

namespace App\Http\Controllers;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Kajian;
use App\Model\Sanksi;
use App\Model\Masjid;
use App\Model\ListKajian;
use App\Model\PendaftaranKajian;
use Carbon\Carbon;
use Auth;
use Mail;
class PendaftaranKajianController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index($id)
     {



     }

    public function daftar($id)
    {


      $user = Auth::user();
      $sanksi = Sanksi::where('user_id',$user->id)->first();
      $email = Auth::user()->email;
      $kajian = Kajian::where('id',$id)->first();
      $masjid = Masjid::where('id',$kajian->masjid_id)->first();
      // $count_pendaftar_ikhwan = PendaftaranKajian::with('user')->where('kajian_id',$id)->get();

      $date_now =  Carbon::now();
    $barcode = \Carbon\Carbon::parse($date_now)->format('YmdHis');

  // $count_pendaftar_ikhwan = PendaftaranKajian::where('kajian_id',$id)->count();
  //   $count_pendaftar_ikhwan->each(function ($items) {
  //   $items->append('jumlah_pendaftar_ikhwan');
  //  });

   $count_pendaftar_ikhwan = PendaftaranKajian::join('users','pendaftaran_kajian.user_id','users.id')
          ->where('pendaftaran_kajian.kajian_id',$kajian->id)
          ->where('users.seks','L')
          ->count();

  $count_pendaftar_akhwat = PendaftaranKajian::join('users','pendaftaran_kajian.user_id','users.id')
          ->where('pendaftaran_kajian.kajian_id',$kajian->id)
          ->where('users.seks','P')
          ->count();

  $slot_ikhwan  = $kajian->batas_jumlah_ikhwan - (int)$count_pendaftar_ikhwan;
  $slot_akhwat  = $kajian->batas_jumlah_akhwat - (int)$count_pendaftar_akhwat;

  $waktu_kajian =  Carbon::parse($kajian->waktu_kajian);
  $pendaftaran_dibuka =  Carbon::parse($kajian->pendaftaran_dibuka);
  $pendaftaran_ditutup =  Carbon::parse($kajian->pendaftaran_ditutup);

  if ($sanksi != '') {
        $waktu_berakhir = Carbon::parse($sanksi->waktu_berakhir)->addHour(8);

      if ($waktu_berakhir->gt($date_now)){
        return redirect()->action('User\ListKajianController@detail', ['id' => $kajian->id])->with(['error' => 'Akun anda Sedang Dibaned']);
      }else {
        $sanksi->delete();
      }
  }


if ($pendaftaran_dibuka->gt($date_now)) {
   return redirect()->action('User\ListKajianController@detail', ['id' => $kajian->id])->with(['error' => 'Pendaftaran Belum Dibuka']);

}elseif ($date_now->gt($pendaftaran_ditutup)) {
  return redirect()->action('User\ListKajianController@detail', ['id' => $kajian->id])->with(['error' => 'Pendaftaran Telah di Tutup ']);
}else {
  if ($user->level == '4') {
    if ($user->seks == 'L' && $slot_ikhwan > 0 || $user->seks == 'P' && $slot_akhwat > 0 ) {
      $result = PendaftaranKajian::where('user_id',$user->id)->where('kajian_id',$kajian->id)->first();
      if ($result == null) {


      $pendaftaran_kajian = new PendaftaranKajian;

      $pendaftaran_kajian->user_id = $user->id;
      $pendaftaran_kajian->kajian_id = $kajian->id;
      $pendaftaran_kajian->status_pendaftaran = 'aktif';
      $pendaftaran_kajian->barcode = $barcode;
      $pendaftaran_kajian->masa_berlaku = $kajian->waktu_kajian;

    // return  $pendataran_kajian;

      $success = $pendaftaran_kajian->save();
      \QrCode::margin(2)->format('png')->size(500)
                         ->generate($barcode, public_path('images/' .'barcode' . '.png'));

      Mail::send('email.invoice-pendaftaran',
      [
        'user'=>$user,
        'barcode'=>$barcode,
        'kajian'=>$kajian,
        'masjid'=>$masjid,
        'pendaftaran_kajian'=>$pendaftaran_kajian,
      ],
      function ($message) use ($user,$pendaftaran_kajian) {

        $message->getHeaders()->addTextHeader('x-mailgun-native-send', 'true');
        $message->from('syahidshun7@gmail.com', 'Daftar Ngaji');
        $message->attach(public_path('images/' .'barcode' . '.png'), [
                     'as' => 'qrcode.png',
                     'mime' => 'application/png',
                 ]);
        $message->to($user->email, $user->nama);
        $message->subject('Pendaftaran Kajian'); // for HTML rich messages
      });


      return redirect()->action('User\ListKajianController@detail', ['id' => $kajian->id]);

    }else {
        return redirect()->action('User\ListKajianController@detail', ['id' => $kajian->id])->with(['success' => 'Anda Telah Mendaftar']);
    }

  }else {
    return redirect()->action('User\ListKajianController@detail', ['id' => $kajian->id])->with(['error' => 'Slot Tidak Tersedia']);
  }


}else {
  return redirect()->action('User\ListKajianController@detail', ['id' => $kajian->id])->with(['error' => 'Akun Anda belum di aktivasi oleh admin']);
}

}


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
