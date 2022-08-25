<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use Auth;

class ChangePasswordController extends Controller
{
    public function ganti_password_form(){

      return view('UserView.ganti-password');

    }

    public function dashboard_ganti_password_form(){

      return view('frontend.dashboard-ganti-password');

    }

    public function ganti_password(Request $request){

        if (!(Hash::check($request->get('password_lama'),Auth::user()->password))) {
          return redirect()->back()->with(['danger' => 'password lama anda salah']);
        }else {


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


          // if ($request->password != $request->password_confirmation) {
          //   return redirect()->back()->with('danger', 'Password Tidak Sama');
          // }

            $user  = Auth::user();

            try {
              $user->update([
                'password'=>bcrypt($request->password)
              ]);

            } catch (\Exception $e) {
              return redirect()->back()->with('warning', 'Password Gagal diganti');
            }

            return redirect()->back()->with('success', 'Password Berhasil ganti');

        }

    }


}
