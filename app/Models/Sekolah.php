<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table = 'sekolah';

    public function scopeKondisi($query){

      if (request('kuisioner')) {
        $query->where('kecamatan_id',request('kecamatan'))
              ->where('pendidikan_id',request('pendidikan'));
      }else{
        if (request('pendidikan')) {
          $query->where('pendidikan_id',request('pendidikan'));
        }
        if (request('kecamatan')) {
          $query->where('kecamatan_id',request('kecamatan'));
        }
        if (request('sekolah')) {
          $query->where('id',request('sekolah'));
        }
      }


    }
}
