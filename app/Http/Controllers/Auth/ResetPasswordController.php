<?php

namespace App\Http\Controllers\Auth;
 use \Illuminate\Notifications\Notifiable;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Model\User;
use App\Model\PasswordReset;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function reset_password($token)
    {
      $data = compact('token');
      return view('auth.passwords.reset',$data);
    }

    public function reset_password_post(Request $request)
    {

      $messages = [
        'required' => ':attribute harus terisi',
        'confirmed' => 'konfirmasi :attribute tidak cocok',
        'unique' => ':attribute telah terdaftar',
        'min' => [
            'numeric' => 'The :attribute must be at least :min.',
            'file' => 'The :attribute must be at least :min kilobytes.',
            'string' => ':attribute harus lebih dari :min karakter.',
            'array' => 'The :attribute must have at least :min items.',
            // 'numeric' => ':attribute harus berupa angka',
        ],

      ];
      $request->validate([

       'password' => ['required','min:6','confirmed'],

        ], $messages);
          // return $request;

      // if ($request->password != $request->password_confirmation) {
      //   return redirect()->back()->with('danger', 'Password Tidak Sama');
      // }



     $reset_password =  PasswordReset::whereToken($request->token)->first();

      try {
        $reset_password->user_id;
      } catch (\Exception $e) {
        return redirect()->route('login')->with('warning', 'Expire Link');
      }

      $user  = User::whereId($reset_password->user_id)->first();
      // return $user;

      try {
        $user->update([
          'password'=>bcrypt($request->password)
        ]);
        $reset_password->delete();
      } catch (\Exception $e) {
        return redirect()->back()->with('warning', 'Password Gagal diganti');
      }

      return redirect()->route('login')->with('success', 'Password Berhasil direset');

    }
}
