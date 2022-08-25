<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Kajian;
use App\Model\Masjid;
use App\Model\Pengelola;
use App\Model\Slider;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $user = Auth::user();
      $masjid = Masjid::orderBy('created_at','DESC')->limit(4)->get();
      $kajian = Kajian::orderBy('created_at','DESC')->limit(4)->get();
      $slider = Slider::orderBy('created_at','DESC')->limit(4)->get();


      $data = compact('masjid','kajian','slider');


      if ($user == '') {
          return view('landing-page.index',$data);
      }else {
        if($user->HasRole('superadmin')){
          return redirect()->route('dashboard');
        }elseif ($user->HasRole('admin')) {
          $pengelola = Pengelola::where('user_id', $user->id)->first();
          $masjid_id = $pengelola->masjid_id;

      return redirect()->action('MasjidController@detail', ['id' => $masjid_id]);
    }else {
      return view('landing-page.index',$data);
    }
      }





    }
}
