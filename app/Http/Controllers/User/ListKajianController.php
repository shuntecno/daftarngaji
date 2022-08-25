<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Kajian;
use App\Model\Masjid;
use App\Model\PendaftaranKajian;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;

class ListKajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $label ='';
      $search =  $request->input('cari_judul');

  if(($request->has('sort')) && ($request->sort == 'day'))
    {
      $search =  $request->input('sort');
      $range = $this->dateRange("day");
      $kajian = Kajian::where(function ($query) use ($range){
          $query->whereBetween('waktu_kajian',$range);
      })
      ->orderBy('waktu_kajian','asc')
      ->paginate(6);
      $kajian->appends(['sort' => $search]);
      $label = 'Hari Ini';
      $data = compact('kajian','label');
        return view('UserView.kajian',$data);
    }
    elseif(($request->has('sort')) && ($request->sort == 'week'))
    {
      $search =  $request->input('sort');
      $range = $this->dateRange("week");
      $kajian = Kajian::where(function ($query) use ($range){
          $query->whereBetween('waktu_kajian',$range);
      })
      ->orderBy('waktu_kajian','asc')
      ->paginate(6);
      $kajian->appends(['sort' => $search]);

      $label = 'Minggu Ini';
      $data = compact('kajian','label');
        return view('UserView.kajian',$data);
    }
    elseif(($request->has('sort')) && ($request->sort == 'month'))
    {
      $search =  $request->input('sort');
      $range = $this->dateRange("month");
      $kajian = Kajian::where(function ($query) use ($range){
          $query->whereBetween('waktu_kajian',$range);
      })
      ->orderBy('waktu_kajian','asc')
      ->paginate(6);
      $kajian->appends(['sort' => $search]);

      $label = 'Bulan Ini';
      $data = compact('kajian','label');
        return view('UserView.kajian',$data);
    }
// return $search;
      if($search!=""){
                $kajian = Kajian::where(function ($query) use ($search){
                    $query->where('judul_kajian', 'like', '%'.$search.'%')
                        ->orWhere('nama_ustadz', 'like', '%'.$search.'%');
                })
                ->paginate(6);
                $kajian->appends(['cari_judul' => $search]);
            }else{
            $kajian = Kajian::orderBy('waktu_kajian','ASC')->paginate(6);
        }

    $data = compact('kajian','label');
      return view('UserView.kajian',$data);
        
    }


    public function sorting_waktu($waktu)
    {

      if ($waktu=='day') {
        $range = $this->dateRange("day");
      }elseif ($waktu=='week') {
        $range = $this->dateRange("week");
      }elseif ($waktu=='month') {
      $range = $this->dateRange("month");
      }


   $kajian = Kajian::whereBetween('created_at', $range)->orderBy('created_at','asc')->paginate(2);
      $data = compact('kajian');
        return view('UserView.kajian',$data);
    }


    public function dateRange($time)
        {
            switch ($time) {
                case "day":
                    $time = [Carbon::now()->startOfDay()->toDateTimeString(),Carbon::now()->endOfDay()->toDateTimeString()];
                    break;
                case "week":
                    $time = [Carbon::now()->startOfWeek()->toDateTimeString(), Carbon::now()->endOfWeek()->toDateTimeString()];
                    break;
                case "month":
                    $time = [Carbon::now()->startOfMonth()->toDateTimeString(),Carbon::now()->endOfMonth()->toDateTimeString()];
                    break;
                case "year":
                    $time = [ Carbon::now()->toDateTimeString(),Carbon::now()->addDays(365)->toDateTimeString()];
                    break;
                default:
                    $time = null;
            }
            return $time;
        }






    public function detail($id)
    {



   $user = Auth::user();
   $kajian = Kajian::where('id',$id)->first();
   if($kajian == null){

     $data = compact('kajian');

       return view('UserView.detail-kajian',$data);


   }
   $masjid = Masjid::where('id',$kajian->masjid_id)->first();


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
  $date_now =  Carbon::now();

if ($user != '') {

$pendaftar = PendaftaranKajian::where('user_id',$user->id)->where('kajian_id',$id)->first();


  if ($pendaftar != '') {
    $data = compact('kajian','masjid','user','pendaftar','waktu_kajian','pendaftaran_dibuka','pendaftaran_ditutup','date_now','slot_ikhwan','slot_akhwat');
    return view('UserView.detail-kajian')->with($data)->with('success','Anda Telah Mendaftar');
  }elseif ($user->seks == 'L' && $slot_ikhwan == 0 || $user->seks == 'P' && $slot_akhwat == 0 ) {
    $data = compact('kajian','masjid','user','pendaftar','waktu_kajian','pendaftaran_dibuka','pendaftaran_ditutup','date_now','slot_ikhwan','slot_akhwat');
    return view('UserView.detail-kajian')->with($data)->with('danger','Slot Tidak Tersedia');
  }elseif ($pendaftaran_dibuka->gt($date_now)) {
    $data = compact('kajian','masjid','user','pendaftar','waktu_kajian','pendaftaran_dibuka','pendaftaran_ditutup','date_now','slot_ikhwan','slot_akhwat');
    return view('UserView.detail-kajian')->with($data)->with('danger','Pendaftaran Belum Dibuka');
  }elseif ($date_now->gt($pendaftaran_ditutup)){
    $data = compact('kajian','masjid','user','pendaftar','waktu_kajian','pendaftaran_dibuka','pendaftaran_ditutup','date_now','slot_ikhwan','slot_akhwat');
    return view('UserView.detail-kajian')->with($data)->with('danger','Pendaftaran Telah Ditutup');
  }

  $data = compact('kajian','masjid','user','waktu_kajian','pendaftaran_dibuka','pendaftaran_ditutup','date_now','count_pendaftar_ikhwan','count_pendaftar_akhwat','pendaftar');

    return view('UserView.detail-kajian',$data);

    }
    $data = compact('kajian','masjid','user','waktu_kajian','pendaftaran_dibuka','pendaftaran_ditutup','date_now','count_pendaftar_ikhwan','count_pendaftar_akhwat');

      return view('UserView.detail-kajian',$data);


}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
