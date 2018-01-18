<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';

    public function keterangan(){
      return $this->belongsTo('App\Models\Keterangan');
    }
}
