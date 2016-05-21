<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Divisi extends Model
{
    use SoftDeletes;

    // public function pegawai()
    // {
    // 	return $this->hasMany('App\pegawai');
    // }
}
