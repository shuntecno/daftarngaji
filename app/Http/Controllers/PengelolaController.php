<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Masjid;
use App\Model\User;
use App\Model\Pengelola;
use Illuminate\Support\Facades\Hash;
class PengelolaController extends Controller
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

    public function index($id)
    {

      $masjid = Masjid::where('id',$id)->first();
     $pengelola = Pengelola::with('user')->where('masjid_id',$id)->orderBy('created_at','DESC')->paginate(10);
      $data = compact('masjid','pengelola');


         return view('frontend.pengelola',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {




        // $user = User::where('id',$id)->first();
      $masjid = Masjid::where('id',$id)->first();

      $data = compact('masjid');
        return view('frontend.tambah_pengelola',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $pengelola_biasa = Pengelola::where('masjid_id',$request->masjid_id)->where('level','2')->count();
     $validator = Pengelola::where('masjid_id',$request->masjid_id)->where('level','5')->count();
     $admin_kajian = Pengelola::where('masjid_id',$request->masjid_id)->where('level','6')->count();
      // return $request;

      if ($request->level == '2' && $pengelola_biasa >= 8) {
        return redirect()->back()->with(['danger' => 'pengelola biasa sudah penuh']);
      }elseif ($request->level == '5' && $validator >= 2) {
        return redirect()->back()->with(['danger' => 'validator sudah penuh']);
      }elseif ($request->level == '6' && $admin_kajian >= 5) {
        return redirect()->back()->with(['danger' => 'admin kajian sudah penuh']);
      }else {
        $messages = [
          'required' => ':attribute harus terisi',

        ];
        $request->validate([
         'nama' => ['required', 'string'],
         'email' => ['required', 'string', 'max:255', 'unique:users'],

          ], $messages);
        // return $request;
        $user = new User;

      $user->nama = $request->nama;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->tempat_lahir = '-';
      $user->tanggal_lahir = '2020/12/12';
      $user->seks = "L";
      $user->alamat = '-';
      $user->no_telp = '-';
      $user->no_ktp = '-';
      $user->foto_ktp = '-';
      $user->level = $request->level;
      $user->register_token = ' ';
      $user->register_status ='1';
      $user->assignRole('admin');
      // dd($user);

      $success = $user->save();

       $pengelola = Pengelola::create([
         'user_id'=>$user->id,
         'level'=>$request->level,
         'masjid_id'=>$request->masjid_id,
       ]);
          return redirect()->action('PengelolaController@index', ['id' => $request->masjid_id])->with(['success' => 'Pengelola Berhasil di tambahkan']);
      }
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
       // return $id;
    $user = User::where('id',$id)->first();
      $pengelola = Pengelola::where('user_id',$id)->first();
   //
        $data = compact('user','pengelola');
        return view('frontend.edit-pengelola',$data);
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
      $users_pass = User::where('id',$id)->first();
       $user = User::find($id);
       $pengelola = Pengelola::where('user_id',$id)->first();

      $pengelola_biasa = Pengelola::where('masjid_id',$pengelola->masjid_id)->where('level','2')->count();
      $validator = Pengelola::where('masjid_id',$pengelola->masjid_id)->where('level','5')->count();
      $admin_kajian = Pengelola::where('masjid_id',$pengelola->masjid_id)->where('level','6')->count();
       // return $request;


       if ($request->level == '2' && $pengelola_biasa >= 8) {
         return redirect()->back()->with(['danger' => 'pengelola biasa sudah penuh']);
       }elseif ($request->level == '5' && $validator >= 2) {
         return redirect()->back()->with(['danger' => 'validator sudah penuh']);
       }elseif ($request->level == '6' && $admin_kajian >= 5) {
         return redirect()->back()->with(['danger' => 'admin kajian sudah penuh']);
       }else {
        // return $request;


       $user->nama = $request->nama;
       $user->email = $request->email;
       if ($request->password != null) {
         $user->password  = Hash::make($request->password);
       }else{
         $user->password = $users_pass->password;
       }

       $user->tempat_lahir = '-';
       $user->tanggal_lahir = '2020/12/12';
       $user->seks = "L";
       $user->alamat = '-';
       $user->no_telp = '-';
       $user->no_ktp = '-';
       $user->foto_ktp = '-';
       $user->level = $request->level;
       $user->register_token = ' ';
       $user->register_status ='1';
       $user->assignRole('admin');

       // return $user->password;

       $success = $user->save();


           $pengelola = Pengelola::where('user_id',$id)->first();

           $pengelola->level = $request->level;

             $success = $pengelola->save();

           return redirect()->action('PengelolaController@index', ['id' => $pengelola->masjid_id])->with(['success' => 'Pengelola berhasil di update']);;
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {


    $pengelola =  Pengelola::where('user_id',$request->id);

    if ($pengelola->get()->count()>0) {

        $user_id = User::whereIn('id',$pengelola->get()->pluck('user_id'));

        try {
            $user_id->delete();
        } catch (\Exception $e) {

        }
    }
    try {
        $pengelola->delete();
    } catch (\Exception $e) {

    }

      return redirect()->back()->with(['success' => 'Pengelola berhasil di hapus']);
    }
}
