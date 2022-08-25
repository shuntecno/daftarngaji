<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\User;
use Storage;
use Auth;
use Mail;
class VerifikasiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {



        $search =  $request->input('cari_pendaftar');
        if($search!=""){
                  $users = User::where(function ($query) use ($search){
                      $query->where('nama', 'like', '%'.$search.'%')
                            ->where('level','3')
                            ->orWhere('no_ktp', 'like', '%'.$search.'%');
                  })
                  ->paginate(10);
                  $users->appends(['cari_pendaftar' => $search]);
              }else{
                $users = User::orderBy('created_at','DESC')->where('level','3')->paginate(10);
          }
        $data = compact('users');
        return view('frontend.verifikasi_user',$data);
    }

    public function details($id)
    {

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

         $user = User::find($id);

         if ($request->hasfile('foto_ktp')) {
                 $file = $request->file('foto_ktp');
                 $extension = $file->getClientOriginalExtension(); // getting image extension
                 $filename = time() . '.' . $extension;
                 Storage::putFileAs('public/foto_ktp',$file, $filename);

       //see above line.. path is set.(uploads/appsetting/..)->which goes to public->then create
       //a folder->upload and appsetting, and it wil store the images in your file.


     }else {
       $filename = $user->foto_ktp;
     }


           $user->nama = $user->nama;
           $user->email = $user->email;
           // $user->password = Hash::make($user->password);
           $user->tempat_lahir = $user->tempat_lahir;
           $user->tanggal_lahir = $user->tanggal_lahir;
           $user->seks = $user->seks;
           $user->alamat = $user->alamat;
           $user->no_telp = $user->no_telp;
           $user->no_ktp = $user->no_ktp;
           $user->foto_ktp = $filename;
           $user->level = '4';

            // return $user;

           $success = $user->save();


           Mail::send('email.verifikasi_admin',
           [
             'user'=>$user,
           ],
           function ($message) use ($user) {

             $message->getHeaders()->addTextHeader('x-mailgun-native-send', 'true');
             $message->from('daftarngaji@gmail.com', 'Daftar Ngaji');
             $message->to($user->email, $user->nama);
             $message->subject('Verifikasi Akun'); // for HTML rich messages
           });


           return redirect('verifikasi_user');




    }


    public function info_pendaftar(Request $request)
    {
      if($request->ajax())
     {
              $user = User::where('id',$request->id)->first();
              $data = compact('user');
              return view('frontend.pendaftar-ajax',$data);
    }

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
