<?php

namespace App\Http\Controllers\Auth;
// use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Model\Pengelola;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function authenticated(Request $request, $user)
    {
       // dd($request);
      $user_id = $user->id;
      if($user->HasRole('superadmin')){
        return redirect()->route('dashboard');
      }elseif ($user->HasRole('admin')) {
        $pengelola = Pengelola::where('user_id', $user_id)->first();
        $masjid_id = $pengelola->masjid_id;

    return redirect()->action('MasjidController@detail', ['id' => $masjid_id]);
      }

      return redirect('/')->with(['success' => 'Login Berhasil']);;
    }

    // protected function sendFailedLoginResponse(Request $request)
    // {
    //
    // }

    // protected function credentials(Request $request){
    //
    //     return ['email'=> $request->{$this->username()},'password' => $request->password];
    //
    // }
}
