<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table = 'sekolah';

    public function scopeKondisi($query){
      $query->where('kecamatan_id',request('kecamatan_id'))
            ->where('pendidikan_id', request('pendidikan_id'));
    }
}
