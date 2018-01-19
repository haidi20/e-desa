<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';

    public function keterangan(){
      return $this->belongsTo('App\Models\Keterangan');
    }

    public function scopeKondisi($query){
      if (request('tab')) {
        $query->where('penyedia_id',request('tab'));
      }
    }
}
