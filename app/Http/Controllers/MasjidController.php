<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Masjid;
use App\Model\Pengelola;
use App\Model\Kajian;
use App\Model\PendaftaranKajian;
use App\Model\User;
use Storage;
use Auth;
class MasjidController extends Controller
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


    public function index(Request $request)
    {


      $user = Auth::user();

      $search =  $request->input('cari_masjid');
      if($search!=""){
                $masjid = Masjid::where(function ($query) use ($search){
                    $query->where('nama_masjid', 'like', '%'.$search.'%')
                        ->orWhere('alamat_masjid', 'like', '%'.$search.'%')
                        ->orderBy('created_at','DESC');
                })
                ->paginate(5);
                $masjid->appends(['cari_masjid' => $search]);
            }else{
              $masjid = Masjid::orderBy('created_at','DESC')->paginate(5);
        }

      $data = compact('masjid','user');

        // return $data;

      return view('frontend.masjid',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $data = compact('user');
        return view('frontend.form_tambah_masjid',$data);
    }

    public function detail(Request $request,$id)
    {
      $search =  $request->input('cari_judul');
      $user = Auth::user();
      $pengelola = Pengelola::where('masjid_id',$id)->where('user_id',$user->id)->first();
      // $kajian = Kajian::orderBy('created_at','DESC')->where('masjid_id',$id)->paginate(10);
      $masjid = Masjid::where('id',$id)->first();

      if ($pengelola != null  ||  $user->level == 1) {
        if($search!=""){
                  $kajian = Kajian::where(function ($query) use ($search,$masjid){

                      $query->orderBy('created_at','DESC')->where('masjid_id',$masjid->id)
                            ->where('judul_kajian', 'like', '%'.$search.'%')
                            ->orWhere('nama_ustadz', 'like', '%'.$search.'%')
                            ->orderBy('created_at','DESC');
                  })
                  ->paginate(5);
                  $kajian->appends(['cari_judul' => $search]);
              }else{
              $kajian = Kajian::orderBy('created_at','DESC')->where('masjid_id',$masjid->id)->paginate(5);
          }


        $data = compact('kajian','masjid','pengelola','user');
          return view('frontend.detail_masjid',$data);


      }else {
          return redirect()->back();
      }

        // $pengelola = Pengelola::where('masjid_id',$id &&)->get();



    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $messages = [
        'required' => ':attribute harus terisi',
        'mimes' => ':attribute harus berupa file :values.',
        'foto_masjid.max' => "batas maximum ukuran file adalah :max kilobytes.",
        'logo_masjid.max' => "batas maximum ukuran file adalah :max kilobytes.",
      ];
      $request->validate([
       'nama_masjid' => ['required'],
       'alamat_masjid' => ['required'],
       'foto_masjid' => ['required','mimes:jpeg,jpg,png','max:5120'],
       'logo_masjid' => ['required','mimes:jpeg,jpg,png','max:5120'],
        ], $messages);

// $masjid = $request;
// dd($masjid->logo_masjid);
          $masjid = new Masjid;

          if ($request->hasfile('foto_masjid')) {
                  $file = $request->file('foto_masjid');
                  // $extension = $file->getClientOriginalExtension();
                  $name_file = $file->getClientOriginalName();
                   // getting image extension
                  $filename_foto = time().$name_file;
                  Storage::putFileAs('public/foto_masjid',$file, $filename_foto);

      //see above line.. path is set.(uploads/appsetting/..)->which goes to public->then create
      //a folder->upload and appsetting, and it wil store the images in your file.


            }

            if ($request->hasfile('logo_masjid')) {
                    $file = $request->file('logo_masjid');
                    // $extension = $file->getClientOriginalExtension();
                    $name_file = $file->getClientOriginalName();
                     // getting image extension
                    $filename_logo = time().$name_file;
                    Storage::putFileAs('public/logo_masjid',$file, $filename_logo);

            //see above line.. path is set.(uploads/appsetting/..)->which goes to public->then create
            //a folder->upload and appsetting, and it wil store the images in your file.
                  }
// return $filename_foto;

                  $masjid->nama_masjid = $request->nama_masjid;
                  $masjid->alamat_masjid = $request->alamat_masjid;
                  $masjid->foto_masjid = $filename_foto;
                  $masjid->logo_masjid = $filename_logo;


                  $success = $masjid->save();

                  return redirect('table-masjid')->with(['success' => 'Masjid Berhasil ditambahkan']);
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
      $masjid = Masjid::where('id',$id)->first();

      $data = compact('masjid');

      // return $data;

          return view('frontend.form_edit_masjid',$data);
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

      $messages = [
        'required' => ':attribute harus terisi',
        'mimes' => ':attribute harus berupa file :values.',
        'foto_masjid.max' => "batas maximum ukuran file adalah :max kilobytes.",
        'logo_masjid.max' => "batas maximum ukuran file adalah :max kilobytes.",
      ];
      $request->validate([
       'nama_masjid' => ['required'],
       'alamat_masjid' => ['required'],
      'foto_masjid' => ['max:5120'],
      'logo_masjid' => ['max:5120'],
        ], $messages);


         // return $request;
         $masjid = Masjid::find($id);


         if ($request->hasfile('foto_masjid')) {
                 $file = $request->file('foto_masjid');
                 // $extension = $file->getClientOriginalExtension();
                 $name_file = $file->getClientOriginalName();
                  // getting image extension
                 $filename_foto = time().$name_file;
                Storage::putFileAs('public/foto_masjid/',$file, $filename_foto);
                   $masjid->foto_masjid = $filename_foto;
                   // return $filename_foto;

              }else{
                 $filename_foto = $masjid->foto_masjid  ;
              }

              if ($request->hasfile('logo_masjid')) {
                      $file = $request->file('logo_masjid');
                      // $extension = $file->getClientOriginalExtension();
                      $name_file = $file->getClientOriginalName();
                       // getting image extension
                      $filename_logo = time().$name_file;
                      Storage::putFileAs('public/logo_masjid',$file, $filename_logo);
                      $masjid->logo_masjid = $filename_logo;
                         // return  $filename_logo;
                      }else{
                         $filename_logo= $masjid->logo_masjid  ;
                      }
//
                        $masjid->nama_masjid = $request->nama_masjid;
                        $masjid->alamat_masjid = $request->alamat_masjid;
                        $masjid->foto_masjid = $filename_foto;
                        $masjid->logo_masjid = $filename_logo;

        // $masjid->update($request->all());
                        $masjid->save();
          // return  $masjid;

          return redirect('table-masjid')->with(['success' => 'Masjid Berhasil diedit']);


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
    $masjid = Masjid::where('id',$request->id)->firstOrFail();
    $kajian = Kajian::where('masjid_id',$request->id);
    $pendaftar = PendaftaranKajian::whereIn('kajian_id',$kajian->get()->pluck('id'));
    $pengelola =  Pengelola::Where('masjid_id',$request->id);

if ($pengelola->get()->count()>0) {

    $user_id = User::whereIn('id',$pengelola->get()->pluck('user_id'));

    try {
        $user_id->delete();
    } catch (\Exception $e) {

    }
}


try {
    $pendaftar->delete();
} catch (\Exception $e) {

}

try {
    $pengelola->delete();
} catch (\Exception $e) {

}

try {
    $kajian->delete();
} catch (\Exception $e) {

}

  try {
      $masjid->delete();
  } catch (\Exception $e) {

  }

      return redirect()->back()->with(['success' => 'masjid berhasil di hapus']);

    }
}
