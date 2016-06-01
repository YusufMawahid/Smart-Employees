<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends  Authenticatable
{
    protected $fillable = ['id','email','password','roles','nama','photo'];
    protected $hidden = ['password','remember_token'];

    public function chats()
    {
      return $this->hasMany('App\Chat');
    }
}
