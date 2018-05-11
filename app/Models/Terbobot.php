<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Terbobot extends Model
{
    protected $table="terbobot";

    public function alternatif(){
      return $this->belongsTo('App\Models\Alternatif');
    }

    public function kreteria(){
      return $this->belongsTo('App\Models\Kreteria');
    }
}
