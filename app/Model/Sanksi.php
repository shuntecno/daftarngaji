<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sanksi extends Model
{
  protected $guarded = [];
  protected $table = 'sanksi';

  public function user() {
      return $this->belongsTo('App\Model\User', 'user_id');
  }
}
