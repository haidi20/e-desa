<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $table = 'hasil';

    public function alternatif(){
      return $this->belongsTo('App\Models\Alternatif');
    }
}
