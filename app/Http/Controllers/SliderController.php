<?php

namespace App\Http\Controllers;
use App\Model\Slider;
use Storage;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }
     
    public function index()
    {
      $slider = Slider::orderBy('created_at','DESC')->paginate(10);

    $data = compact('slider');

      return view('frontend.slider',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('frontend.tambah-slider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      // return $request;
      $messages = [
        'required' => ':attribute harus terisi',
        'mimes' => ':attribute harus berupa file :values.',
        'gambar.max' => "batas maximum ukuran file adalah :max kilobytes.",
      ];
        $request->validate([
       'gambar' =>  ['required','mimes:jpeg,jpg,png','max:5120'],

        ], $messages);

        $slider = new Slider;

        $file = $request->file('gambar');
        $nama_foto = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename = time() . '.' . $extension;
        Storage::putFileAs('public/slider',$file, $filename);

        $slider->nama_foto = $nama_foto;
        $slider->gambar = $filename;
        $slider->link = $request->link;

        $slider->save();

        return redirect('slider')->with(['success' => 'Slider Berhasil Ditambahkan']);
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
        $slider = Slider::where('id',$id)->first();

        $data = compact('slider');

        return view('frontend.edit-slider',$data);
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
      $slider = Slider::where('id',$id)->first();
      if ($request->gambar != '') {

        $messages = [
          'mimes' => ':attribute harus berupa file :values.',
          'gambar.max' => "batas maximum ukuran file adalah :max kilobytes.",
        ];
          $request->validate([
         'gambar' =>  ['mimes:jpeg,jpg,png','max:5120'],

          ], $messages);

        $file = $request->file('gambar');

        $nama_foto = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $filename = time() . '.' . $extension;
        Storage::putFileAs('public/slider',$file, $filename);
      }else {
        $nama_foto = $slider->nama_foto;
        $filename = $slider->gambar;
      }


      $slider->nama_foto = $nama_foto;
      $slider->gambar = $filename;
      $slider->link = $request->link;

      $slider->save();

      return redirect('slider')->with(['success' => 'Slider Berhasil Di Edit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {


        $slider = Slider::where('id',$request->id)->first();

        $slider->delete();

        return redirect('slider')->with(['success' => 'Slider Berhasil Dihapus']);


    }
}
