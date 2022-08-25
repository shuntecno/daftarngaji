<?php

namespace App\Http\Controllers\User;
use Mail;
use App\Model\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class VeriifikasiEmailController extends Controller
{
  public function konfirmasi_email($email, $register_token){



  $user =  User::Where(['email'=>$email,'register_token'=>$register_token])->first();

  if ($user != null) {
     User::Where(['email'=>$email,'register_token'=>$register_token])->update(['register_status'=>'1','register_token'=>' ']);

     if (Auth::check()){
       return redirect('profil-user')->with(['success' => 'Verifikasi Email berhasil']);

       }else {
       return redirect('login')->with(['success' => 'Verifikasi Email berhasil silahkan Login ke Akun anda']);

     }

  }


       if (Auth::check()){
         return redirect('profil-user')->with(['warning' => 'Token Expired']);

         }else {
         return redirect('login')->with(['warning' => 'Token Expired']);

}

}


  public function verifikasi_email()
  {
     $user = Auth::user();

     if ($user->register_status == '1') {
       return redirect('profil-user')->with(['success' => 'Email Anda telah diverifikasi']);
     }

    Mail::send('email.verifikasi_email',
    [
      'user'=>$user,
    ],
    function ($message) use ($user) {

      $message->getHeaders()->addTextHeader('x-mailgun-native-send', 'true');
      $message->from('daftarngaji@gmail.com', 'Daftar Ngaji');
      $message->to($user->email, $user->nama);
      $message->subject('Verifikasi Email'); // for HTML rich messages
    });


    // Mail::to($user['email'])->send(new KonfirmasiEmail($user));
    if (Auth::check()){
  return redirect('profil-user')->with(['warning' => 'Silahkan Cek Email Untuk Konfirmasi Akun Anda']);

}else {
  return redirect('login')->with(['warning' => 'Silahkan Cek Email Untuk Konfirmasi Akun Anda']);

    }




}
}
