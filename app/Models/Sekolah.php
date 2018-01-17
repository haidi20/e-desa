<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table = 'sekolah';

    public function scopeKondisi($query){

      if (request('kuisioner')) {
        $query->where('kecamatan_id',request('kecamatan_id'))
              ->where('pendidikan_id',request('pendidikan_id'));
      }else{
        if (request('kecamatan_id')) {
          $query->where('kecamatan_id',request('kecamatan_id'));
        }
        if (request('pendidikan_id')) {
          $query->where('pendidikan_id',request('pendidikan_id'));
        }
      }


    }
}
