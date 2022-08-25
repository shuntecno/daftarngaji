<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Masjid extends Model
{
  protected $guarded = [];
  protected $table = 'masjid';


  public function scopeFilter($query, $request)
  {
    if (($request->has('cari')) && ($request->cari != '')) {
      return $query->where('nama_masjid', 'like', '%'.$request->cari.'%');
    }
  }

  public function kajian() {
      return $this->hasMany('App\Model\Kajian');
  }

  public function kategori() {
      return $this->belongsTo('App\Model\Kategori','kategori_id');
  }

}
