<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Kajian;
use App\Model\PendaftaranKajian;
use App\Model\Masjid;
use App\Model\Kategori;
use App\Model\Pengelola;
use Carbon\Carbon;
use Auth;
use Storage;
class KajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
      $kajian =  Kajian::orderBy('created_at','DESC')->get();

      $data = compact('kajian');

        return view('frontend.kajian',$data);
    }

    public function info_kajian(Request $request)
    {
      if($request->ajax())
     {
      $kajian_id = $request->get('id');
      $kajian =  Kajian::where('id',$kajian_id)->first();
      $pendaftar = PendaftaranKajian::where('kajian_id',$kajian_id)->count();

      $count_pendaftar_ikhwan = PendaftaranKajian::join('users','pendaftaran_kajian.user_id','users.id')
             ->where('pendaftaran_kajian.kajian_id',$kajian->id)
             ->where('users.seks','L')
             ->count();

     $count_pendaftar_akhwat = PendaftaranKajian::join('users','pendaftaran_kajian.user_id','users.id')
             ->where('pendaftaran_kajian.kajian_id',$kajian->id)
             ->where('users.seks','P')
             ->count();

      $data = compact('kajian','pendaftar','count_pendaftar_akhwat','count_pendaftar_ikhwan');
      return view('frontend.kajian-ajax',$data);
     }

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function detail_ikhwan(Request $request,$id)
     {
       $kajian = Kajian::where('id',$id)->first();
      $kategoris = Kategori::orderBy('created_at','DESC')->get();
      $masjid = Masjid::where('id',$kajian->masjid_id)->first();
      $search =  $request->input('cari_pendaftar_ikhwan');


     $count_pendaftar_ikhwan = PendaftaranKajian::join('users','pendaftaran_kajian.user_id','users.id')
               ->where('pendaftaran_kajian.kajian_id',$kajian->id)
              ->where('users.seks','L')
              ->count();


                if($search!=""){

                  $pendaftar_ikhwan = PendaftaranKajian::join('users','pendaftaran_kajian.user_id','users.id')
                          ->where('pendaftaran_kajian.kajian_id',$kajian->id)
                          ->where('users.seks','L')
                          ->where('users.nama', 'like', '%'.$search.'%')
                          ->orWhere('users.no_ktp', 'like', '%'.$search.'%')
                          ->paginate(10);

                      }else{
                        $pendaftar_ikhwan = PendaftaranKajian::join('users','pendaftaran_kajian.user_id','users.id')
                                ->where('pendaftaran_kajian.kajian_id',$kajian->id)
                                ->where('users.seks','L')
                                ->paginate(10);
                  }


  $data = compact('kajian','kategoris','masjid','pendaftar_ikhwan','count_pendaftar_ikhwan');
       return view('frontend.detail_kajian_ikhwan',$data);
     }



     public function detail_akhwat(Request $request,$id)
     {


        $kajian = Kajian::where('id',$id)->first();
       $kategoris = Kategori::orderBy('created_at','DESC')->get();
       $masjid = Masjid::where('id',$kajian->masjid_id)->first();
       $search =  $request->input('cari_pendaftar_akhwat');



      $count_pendaftar_akhwat = PendaftaranKajian::join('users','pendaftaran_kajian.user_id','users.id')
                ->where('pendaftaran_kajian.kajian_id',$kajian->id)
               ->where('users.seks','P')
               ->count();


                 if($search!=""){

                   $pendaftar_akhwat = PendaftaranKajian::join('users','pendaftaran_kajian.user_id','users.id')
                           ->where('pendaftaran_kajian.kajian_id',$kajian->id)
                           ->where('users.seks','P')
                           ->where('users.nama', 'like', '%'.$search.'%')
                           ->orWhere('users.no_ktp', 'like', '%'.$search.'%')
                           ->paginate(2);

                       }else{
                         $pendaftar_akhwat = PendaftaranKajian::join('users','pendaftaran_kajian.user_id','users.id')
                                 ->where('pendaftaran_kajian.kajian_id',$kajian->id)
                                 ->where('users.seks','P')
                                 ->paginate(10);
                   }


   $data = compact('kajian','kategoris','masjid','pendaftar_akhwat','count_pendaftar_akhwat');
        return view('frontend.detail_kajian_akhwat',$data);
     }

    public function create($id)
    {
      $user = Auth::user();

      // return $id;
      $kategoris = Kategori::orderBy('created_at','DESC')->get();
      $masjids = Masjid::where('id',$id)->get();

    $pengelola = Pengelola::where('masjid_id',$id)->where('user_id',$user->id)->first();

    if ($pengelola != null  ||  $user->level == 1) {
      $data = compact('kategoris','masjids');
         return view('frontend.form_tambah_kajian',$data);
    }else {
        return redirect()->back();
    }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $waktu_kajian =  Carbon::parse($request->waktu_kajian);
      if ($request->pendaftaran_dibuka != null) {
        $pendaftaran_dibuka =  Carbon::parse($request->pendaftaran_dibuka);
      }else {
        $pendaftaran_dibuka =  Carbon::parse($request->waktu_kajian)->subDays(2);
      }
      if ($request->pendaftaran_ditutup != null) {
        $pendaftaran_ditutup =  Carbon::parse($request->pendaftaran_ditutup);
      }else {
          $pendaftaran_ditutup =  Carbon::parse($request->waktu_kajian)->subHour(5);
      }

      if ($request->kategori_id == '2') {

        $messages = [
          'required' => ':attribute harus terisi',
          'date' => ':attribute bukan data yang valid.',
          'numeric' => ':attribute harus berupa angka',
          'batas_jumlah_ikhwan.max' => ":attribute adalah :max orang",
        ];
          $request->validate([
         'waktu_kajian' =>  ['required'],
         'batas_jumlah_ikhwan' =>  ['required','numeric','max:100000'],
          ], $messages);

        $kajian = Kajian::create([
          'kategori_id'=>$request->kategori_id,
          'judul_kajian'=>'Sholat Jumat',
          'deskripsi_kajian'=>nl2br(htmlspecialchars('-')),
          'nama_ustadz'=>'-',
          'waktu_kajian'=>$waktu_kajian,
          'pendaftaran_dibuka' =>$pendaftaran_dibuka,
          'pendaftaran_ditutup' =>$pendaftaran_ditutup,
          'batas_jumlah_akhwat'=>0,
          'batas_jumlah_ikhwan'=>$request->batas_jumlah_ikhwan,
          'foto_banner'=>'soljum.png',
          'masjid_id'=>$request->masjid_id,
        ]);
              // $request = compact('request','iklan','user');

        return redirect()->action('MasjidController@detail', ['id' => $kajian->masjid_id])->with(['success' => 'Kajian Berhasil ditambahkan']);

      }



    // $date_now =  Carbon::now();

      $messages = [
        'required' => ':attribute harus terisi',
        'date' => ':attribute bukan data yang valid.',
        'mimes' => ':attribute harus berupa file :values.',
        'numeric' => ':attribute harus berupa angka',
        'foto_banner.max' => "batas maximum ukuran file adalah :max kilobytes",
        'batas_jumlah_ikhwan.max' => ":attribute adalah :max orang",
        'batas_jumlah_akhwat.max' => ":attribute adalah :max orang",
        'min' => [
            'numeric' => 'The :attribute must be at least :min.',
            'file' => 'The :attribute must be at least :min kilobytes.',
            'string' => ':attribute harus lebih dari :min karakter.',
            'array' => 'The :attribute must have at least :min items.',

        ],
      ];
        $request->validate([
       'kategori_id' => ['required'],
       'judul_kajian' => ['required', 'max:255'],
       'deskripsi_kajian' => ['required'],
       'nama_ustadz' => ['required', 'max:255'],
       'waktu_kajian' =>  ['required'],
       'batas_jumlah_ikhwan' =>  ['required','numeric','max:100000'],
       'batas_jumlah_akhwat' =>  ['required','numeric','max:100000'],


       'foto_banner' =>  ['required','mimes:jpeg,jpg,png','max:5120'],


        ], $messages);



            if ($request->hasfile('foto_banner')) {
                    $file = $request->file('foto_banner');
                    // $extension = $file->getClientOriginalExtension();
                    $name_file = $file->getClientOriginalName();
                     // getting image extension
                    $filename = time().$name_file;
                  Storage::putFileAs('public/foto_banner',$file, $filename);


              }


              $kajian = Kajian::create([
                'kategori_id'=>$request->kategori_id,
                'judul_kajian'=>$request->judul_kajian,
                'deskripsi_kajian'=>$request->deskripsi_kajian,
                'nama_ustadz'=>$request->nama_ustadz,
                'waktu_kajian'=>$waktu_kajian,
                'pendaftaran_dibuka' =>$pendaftaran_dibuka,
                'pendaftaran_ditutup' =>$pendaftaran_ditutup,
                'batas_jumlah_akhwat'=>$request->batas_jumlah_akhwat,
                'batas_jumlah_ikhwan'=>$request->batas_jumlah_ikhwan,
                'foto_banner'=>$filename,
                'masjid_id'=>$request->masjid_id,
              ]);
                    // $request = compact('request','iklan','user');

              return redirect()->action('MasjidController@detail', ['id' => $kajian->masjid_id])->with(['success' => 'Kajian Berhasil ditambahkan']);






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

      $user = Auth::user();
      if ($user->level == 1) {
          $kategoris = Kategori::orderBy('created_at','DESC')->get();
          $kajian = Kajian::where('id',$id)->first();
          $masjid = Masjid::where('id',$kajian->masjid_id)->first();
      }else {
        $kategoris = Kategori::orderBy('created_at','DESC')->get();
        $pengelola = Pengelola::where('user_id',$user->id)->first();
        $masjid = Masjid::where('id',$pengelola->masjid_id)->first();
        $kajian = Kajian::where('id',$id)->where('masjid_id',$masjid->id)->first();
      }




  if ($kajian != null  ||  $user->level == 1) {

    $data = compact('kategoris','kajian','masjid');
       return view('frontend.edit-kajian',$data);
  }else {
      return redirect()->back();
  }

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
      $waktu_kajian =  Carbon::parse($request->waktu_kajian);
       if ($request->pendaftaran_dibuka != null) {
         $pendaftaran_dibuka =  Carbon::parse($request->pendaftaran_dibuka);
       }else {
         $pendaftaran_dibuka =  Carbon::parse($request->waktu_kajian)->subDays(2);
       }
       if ($request->pendaftaran_ditutup != null) {
         $pendaftaran_ditutup =  Carbon::parse($request->pendaftaran_ditutup);
       }else {
           $pendaftaran_ditutup =  Carbon::parse($request->waktu_kajian)->subHour(5);
       }


       if ($request->kategori_id == '2') {

         $messages = [
           'numeric' => ':attribute harus berupa angka',
           'batas_jumlah_ikhwan.max' => ":attribute adalah :max orang",
         ];
           $request->validate([
          'batas_jumlah_ikhwan' =>  ['numeric','max:100000'],
           ], $messages);


           $kajian = Kajian::find($id);

           $kajian->judul_kajian = 'Sholat Jumat';
           $kajian->deskripsi_kajian = '-';
           $kajian->nama_ustadz = '-';
           $kajian->waktu_kajian = $waktu_kajian;
           $kajian->pendaftaran_dibuka = $pendaftaran_dibuka;
           $kajian->pendaftaran_ditutup = $pendaftaran_ditutup;
           $kajian->batas_jumlah_akhwat = 0;
           $kajian->batas_jumlah_ikhwan = $request->batas_jumlah_ikhwan;
           $kajian->foto_banner = 'soljum.png';
           $kajian->masjid_id = $request->masjid_id;

           // return $kajian;
            $kajian->save();

             // $request = compact('request','iklan','user');

       return redirect()->action('MasjidController@detail', ['id' => $request->masjid_id])->with(['success' => 'kajian berhasil di edit']);

       }

       $messages = [
         'mimes' => ':attribute harus berupa file :values.',
         'numeric' => ':attribute harus berupa angka',
         'foto_banner.max' => "batas maximum ukuran file adalah :max kilobytes",
         'batas_jumlah_ikhwan.max' => ":attribute adalah :max orang",
         'batas_jumlah_akhwat.max' => ":attribute adalah :max orang",
         'min' => [
             'numeric' => 'The :attribute must be at least :min.',
             'file' => 'The :attribute must be at least :min kilobytes.',
             'string' => ':attribute harus lebih dari :min karakter.',
             'array' => 'The :attribute must have at least :min items.',

         ],
       ];
         $request->validate([
        'judul_kajian' => ['max:255'],
        'nama_ustadz' => ['max:255'],
        'batas_jumlah_ikhwan' =>  ['numeric','max:100000'],
        'batas_jumlah_akhwat' =>  ['numeric','max:100000'],
        'foto_banner' =>  ['mimes:jpeg,jpg,png','max:5120'],
         ], $messages);

       $kajian = Kajian::find($id);

      if ($request->hasfile('foto_banner')) {
              $file = $request->file('foto_banner');
              // $extension = $file->getClientOriginalExtension();
              $name_file = $file->getClientOriginalName();
               // getting image extension
              $filename = time().$name_file;
            Storage::putFileAs('public/foto_banner',$file, $filename);
        }else {
          $filename = $kajian->foto_banner;
        }
        if($request->kategori_id == null){
            $kajian->kategori_id = $kajian->kategori_id;
        }else {
          $kajian->kategori_id = $request->kategori_id;
        }
            $kajian->judul_kajian = $request->judul_kajian;
            $kajian->deskripsi_kajian = $request->deskripsi_kajian;
            $kajian->nama_ustadz = $request->nama_ustadz;
            $kajian->waktu_kajian = $waktu_kajian;
            $kajian->pendaftaran_dibuka = $pendaftaran_dibuka;
            $kajian->pendaftaran_ditutup = $pendaftaran_ditutup;
            $kajian->batas_jumlah_akhwat = $request->batas_jumlah_akhwat;
            $kajian->batas_jumlah_ikhwan = $request->batas_jumlah_ikhwan;
            $kajian->foto_banner = $filename;
            $kajian->masjid_id = $request->masjid_id;

            // return $kajian;
             $kajian->save();

              // $request = compact('request','iklan','user');

        return redirect()->action('MasjidController@detail', ['id' => $request->masjid_id])->with(['success' => 'kajian berhasil di edit']);





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       // return $request;
  $kajian = Kajian::where('id',$request->id);

  $pendaftar = PendaftaranKajian::whereIn('kajian_id',$kajian->get()->pluck('id'));


  try {
      $pendaftar->delete();
  } catch (\Exception $e) {

  }

  try {
      $kajian->delete();
  } catch (\Exception $e) {

  }


      return redirect()->back()->with(['success' => 'kajian berhasil di Hapus']);

    }
}
