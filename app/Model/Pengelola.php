<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pengelola extends Model
{
  protected $guarded = [];
  protected $table = 'pengelola';

  public function user() {
      return $this->belongsTo('App\Model\User', 'user_id');
  }

  public function masjid() {
      return $this->belongsTo('App\Model\Masjid', 'masjid_id');
  }
}
