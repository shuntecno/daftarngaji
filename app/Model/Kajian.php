<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Kajian extends Model
{
  protected $guarded = [];
  protected $table = 'kajian';

  public function scopeFilter($query ,$request)
  {

    if (($request->has('sort')) && ($request->sort == 'day'))
     {
      $range = $this->dateRange("day");
      $query->whereBetween('waktu_kajian', $range)->orderBy('waktu_kajian','asc')->paginate(2);
    }elseif (($request->has('sort')) && ($request->sort == 'week'))
     {
      $range = $this->dateRange("week");
      $query->whereBetween('waktu_kajian', $range)->orderBy('waktu_kajian','asc');
    }elseif ($request->has('month'))
     {
      $range = $this->dateRange("month");
      $query->whereBetween('waktu_kajian', $range)->orderBy('waktu_kajian','asc');
    }elseif ($request->has('year'))
     {
      $range = $this->dateRange("year");
      $query->whereBetween('waktu_kajian', $range)->orderBy('waktu_kajian','asc');
    }


  if(($request->has('cari_ustadz')) && ($request->cari_ustadz != '')) {
   $query->where('nama_ustadz', 'like', '%'.$request->cari_ustadz.'%')->orderBy('waktu_kajian','asc')->paginate(2);
  }

  elseif(($request->has('cari_judul')) && ($request->cari_judul != '')) {
   $query->where('judul_kajian', 'like', '%'.$request->cari_judul.'%')->orderBy('waktu_kajian','asc')->paginate(2);
  }
      return $query;
  }

  public function pendaftaran_kajian(){

    return $this->hasMany('App\Model\PendaftaranKajian');

  }



}
