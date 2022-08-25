<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Mail;
use App\Model\User;
use App\Mail\KonfirmasiEmail;
use Storage;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //
    //     return Validator::make($data, [
    //         'nama' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:5', 'confirmed'],
    //         'tempat_lahir' => ['required', 'string', 'max:255'],
    //         'tanggal_lahir' => ['required', 'string', 'max:255'],
    //         'jenis_kelamin' => ['required'],
    //         'no_telp' => ['required', 'string', 'max:255'],
    //         'no_ktp' => ['required', 'string', 'max:255'],
    //         'foto_ktp' => ['required','mimes:jpg,png,jpeg,gif']
    //     ]);
    // }



    public function register(Request $request)
    {

      // return $request


             $messages = [
               'required' => ':attribute harus terisi',
               'confirmed' => 'konfirmasi :attribute tidak cocok',
               'unique' => ':attribute telah terdaftar',
               'mimes' => ':attribute harus berupa file :values.',
               'date' => ':attribute bukan data yang valid.',
               'foto_ktp.max' => "batas maximum ukuran file adalah :max kilobytes.",
               'min' => [
                   'numeric' => 'The :attribute must be at least :max.',
                   'file' => 'The :attribute must be at least :min kilobytes.',
                   'string' => ':attribute harus lebih dari :min karakter.',
                   'array' => 'The :attribute must have at least :min items.',
                   // 'numeric' => ':attribute harus berupa angka',
               ],

             ];
             $request->validate([
              'nama' => ['required', 'string', 'max:255'],
              'email' => ['required', 'string', 'max:255', 'unique:users'],
                'tempat_lahir' => ['required', 'max:255'],
               'tanggal_lahir' => ['required','date'],
               // 'jenis_kelamin' => ['required'],
              'password' => ['required','min:6','confirmed'],
               'alamat' => ['required'],
               'no_telp' => ['required','numeric'],
               'no_ktp' => ['required','numeric'],
               'foto_ktp' => ['required','mimes:jpeg,jpg,png','max:5120']
               ], $messages);


  $role = Role::where('id',1)->first();


      $user = new User;

  // if ($request->file('foto_ktp')) {
  //   $foto_ktp = $request->file('foto_ktp')->move('foto-ktp/',$request->file('foto_ktp'));
  // }
  if ($request->hasfile('foto_ktp')) {
          $file = $request->file('foto_ktp');
          $extension = $file->getClientOriginalExtension(); // getting image extension
          $filename = time() . '.' . $extension;
          Storage::putFileAs('public/foto_ktp',$file, $filename);

//see above line.. path is set.(uploads/appsetting/..)->which goes to public->then create
//a folder->upload and appsetting, and it wil store the images in your file.


        }

        // $user = User::create([
        //   'nama' => $request->nama,
        //   'email' => $request->email,
        //   'no_telp' => $request->no_telp,
        //   'tempat_lahir' => $request->tempat_lahir,
        //   'alamat' => $request->alamat,
        //   'no_ktp' => $request->no_ktp,
        //   'level' => '1',
        //   'password' => Hash::make($request->password),
        //   'tanggal_lahir' => $request->tanggal_lahir,
        //   'foto_ktp' => $filename,
        //   'seks' => $request->seks,
        //  ]);


    $user->nama = $request->nama;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->tempat_lahir = $request->tempat_lahir;
    $user->tanggal_lahir = $request->tanggal_lahir;
    $user->seks = $request->seks;
    $user->alamat = $request->alamat;
    $user->no_telp = $request->no_telp;
    $user->no_ktp = $request->no_ktp;
    $user->foto_ktp = $filename;
    $user->level = '3';
    $user->register_token = Str::random(40);
    $user->assignRole('user');

    // return $user;
    // dd($user);

    $user->save();

      // return $user;

    Mail::send('email.verifikasi_email',
    [
      'user'=>$user,
    ],
    function ($message) use ($user) {

      $message->getHeaders()->addTextHeader('x-mailgun-native-send', 'true');
      $message->from('daftarngaji@gmail.com', 'Daftar Ngaji');
      $message->to($user->email, $user->nama);
      $message->subject('Pendaftara Berhasil'); // for HTML rich messages
    });


    // Mail::to($user['email'])->send(new KonfirmasiEmail($user));
      return redirect('login')->with(['warning' => 'Silahkan Cek Email Untuk Konfirmasi Akun Anda']);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    // protected function create(array $data)
    // {
    //
    // }

    public function konfirmasiemail($email, $register_token){

    $user =  User::Where(['email'=>$email,'register_token'=>$register_token])->first();

    if ($user != null) {
       User::Where(['email'=>$email,'register_token'=>$register_token])->update(['register_status'=>'1','register_token'=>' ']);
        return redirect('login')->with(['success' => 'Pendaftaran berhasil silahkan Login ke Akun Anda']);
    }

    return redirect('login')->with(['warning' => 'Token expired']);



    }

}
