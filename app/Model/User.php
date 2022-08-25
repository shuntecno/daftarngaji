<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable implements MustVerifyEmail
{
  use Notifiable;
    use HasRoles;

    protected $guarded = [];


    protected $table = 'users';

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function kajian(){

      return $this->hasMany('App\Model\Kajian');

    }

    public function pendaftaran_kajian(){

      return $this->hasMany('App\Model\PendaftaranKajian');

    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sanksi() {
        return $this->hasOne('App\Model\Sanksi','user_id','id');
    }
}
