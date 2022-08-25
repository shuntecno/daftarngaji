<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Sanksi;
use Auth;
use Storage;
use Hash;
use Mail;
class UserController extends Controller
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
        $search =  $request->input('cari_user');
        if($search!=""){
                  $jamaah = User::with('sanksi')->where(function ($query) use ($search){

                      $query->orderBy('created_at','DESC')
                            ->where('level','4')
                            ->where('nama', 'like', '%'.$search.'%')
                            ->orWhere('no_ktp', 'like', '%'.$search.'%');
                  })
                  ->paginate(10);
                  $jamaah->appends(['cari_user' => $search]);
              }else{
            $jamaah = User::with('sanksi')->orderBy('created_at','DESC')->where('level','4')->paginate(10);
          }

        $data = compact('jamaah','user');
        return view('frontend.user',$data);
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
    public function profil()
    {
         $user = Auth::user();
              $data = compact('user');
          return view('UserView.profil-user',$data);
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {




      $user = User::where('id',$id)->first();
     //
     $data = compact('user');
          return view('frontend.edit-user',$data);
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
        'confirmed' => 'konfirmasi :attribute tidak cocok',
        'unique' => ':attribute telah terdaftar',
        // 'numeric' => ':attribute harus berupa angka',
        'min' => [
            'numeric' => 'The :attribute must be at least :min.',
            'file' => 'The :attribute must be at least :min kilobytes.',
            'string' => ':attribute harus lebih dari :min karakter.',
            'array' => 'The :attribute must have at least :min items.',
        ],

      ];
      $request->validate([
       'nama' => ['required', 'string'],
       'email' => ['required', 'string'],
         'tempat_lahir' => ['required'],
        'tanggal_lahir' => ['required','date'],
        // 'jenis_kelamin' => ['required'],

        'alamat' => ['required'],
        'no_telp' => ['required','numeric'],
        'no_ktp' => ['required','numeric'],

        ], $messages);


      $users_pass = User::where('id',$id)->first();
       $user = User::find($id);

       if ($request->hasfile('foto_ktp')) {
               $file = $request->file('foto_ktp');
               // $extension = $file->getClientOriginalExtension();
               $name_file = $file->getClientOriginalName();
                // getting image extension
               $filename = time().$name_file;
               Storage::putFileAs('public/foto_ktp',$file, $filename);
            }else{
               $filename = $user->foto_ktp  ;
            }


     $user->nama = $request->nama;
     $user->email = $request->email;
     if ($request->password != null) {
       $user->password  = Hash::make($request->password);
     }else{
       $user->password = $users_pass->password;
     }

     $user->tempat_lahir = $request->tempat_lahir;
     $user->tanggal_lahir = $request->tanggal_lahir;
     $user->seks = $request->seks;
     $user->alamat = $request->alamat;
     $user->no_telp = $request->no_telp;
     $user->no_ktp = $request->no_ktp;
     $user->foto_ktp = $filename;
     $user->level = '4';
     // $user->assignRole('user');
     // dd($user);
     // return $user;
     $success = $user->save();

        return redirect()->action('UserController@index')->with(['success' => 'User Berhasil diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // return redirect()->action('UserController@index')->with(['success' => 'User Berhasil dihapus']);
       // return $request;
          Sanksi::where('user_id',$request->id)->delete();
          User::where('id',$request->id)->delete();
            return redirect()->action('UserController@index')->with(['success' => 'User Berhasil dihapus']);
    }
}
