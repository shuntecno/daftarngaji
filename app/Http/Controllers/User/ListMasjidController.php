<?php

namespace App\Http\Controllers\User;
use App\Model\Masjid;
use App\Model\Kajian;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListMasjidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $search =  $request->input('cari_masjid');

// return $search;
      if($search!=""){
                $masjid = Masjid::where(function ($query) use ($search){
                    $query->where('nama_masjid', 'like', '%'.$search.'%');
                })
                ->paginate(6);
                $masjid->appends(['cari_masjid' => $search]);
            }else{
            $masjid = Masjid::paginate(6);
        }

    $data = compact('masjid');
      return view('UserView.masjid',$data);
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

    public function detail($id)
    {

      $masjid = Masjid::with('kajian')->where('id',$id)->first();
      if($masjid == null){
          $data = compact('masjid');
          return view('UserView.detail-masjid',$data);
      }

      $kajian = Kajian::orderBy('created_at','DESC')->where('masjid_id',$id)->paginate(4);
      $data = compact('kajian','masjid');
        return view('UserView.detail-masjid',$data);
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
        //
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
