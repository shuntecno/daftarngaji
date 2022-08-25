<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use App\Model\PasswordReset;
use App\Model\User;
use Mail;

class ForgotPasswordController extends Controller
{

  public function forgot_store(Request $request)
  {

   $faker = \Faker\Factory::create('id_ID');

    $jenis = 'email';
    $user =  User::whereEmail($request->email)->first();

    
    // return $jenis;
    try {
      $user->nama;
    } catch (\Exception $e) {
      return redirect()->route('forgot')->with(['danger' => 'Email/No WhatsApp']);
    }

    $password_reset = PasswordReset::create([
      'user_id'=>$user->id,
      'token'=> str_replace('-', '', $faker->uuid)
    ]);

    if ($jenis=='email') {
      $this->send_email_link_reset($password_reset,$user);
    }

     return redirect()->route('login')->with(['success' => 'Pesan Berhasil Dikirim']);
  }



  public function send_email_link_reset($password_reset,$user)
  {
    Mail::send('email.send_link_reset', ['password_reset'=>$password_reset,'user'=>$user],
    function ($message) use ($password_reset,$user) {
      $message->getHeaders()->addTextHeader('x-mailgun-native-send', 'true');
      $message->from('daftarngaji@gmail.com', 'Daftar Ngaji');
      $message->to($user->email, $user->nama);
      $message->subject('Daftar Ngaji');
  });
}

}
