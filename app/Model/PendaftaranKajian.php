<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PendaftaranKajian extends Model
{
  protected $guarded = [];
  protected $table = 'pendaftaran_kajian';


  public function user() {
      return $this->belongsTo('App\Model\User', 'user_id');
  }

  public function kajian() {
      return $this->belongsTo('App\Model\Kajian', 'kajian_id');
  }

  public function getJumlahPendaftarIkhwanAttribute()
    {
        return PendaftaranKajian::where('kajian_id',$this->kajian_id)->get();
        return User::where('seks','L');
    }

  public function getJumlahPendaftarAkhwatAttribute()
    {
          return PendaftaranKajian::where('kajian_id',$this->kajian_id)->get();
          return User::where('seks','P');
    }


}
