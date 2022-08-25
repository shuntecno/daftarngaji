<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Sanksi;
use Carbon\Carbon;


class SanksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $sanksi = new Sanksi;
        $date_now =  Carbon::now()->addHour(8);
        $waktu_berakhir =  Carbon::parse($date_now)->addDay(7);
        $sanksi->user_id = $request->id;
        $sanksi->waktu_berakhir = $waktu_berakhir;

        $sanksi->save();

        return redirect()->action('UserController@index')->with(['success' => 'User Berhasil Suspend']);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      Sanksi::where('user_id',$request->id)->delete();
      return redirect()->action('UserController@index')->with(['success' => 'User Berhasil Diaktifkan']);
    }
}
