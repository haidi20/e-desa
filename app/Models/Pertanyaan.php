<?php

namespace App\Models;

use DB;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';

    public function jawaban(){
        return $this->hasMany('App\Models\Jawaban');
    }

    // scope
    public function scopeKondisi($query){
        if (request('tab')) {
          $query->where('penyedia_id',request('tab'));
        }
    }

    // public function scopeJawaban($query){
    //     $query->join('jawaban','pertanyaan.id','=','jawaban.pertanyaan_id');
    // }
    // end scope
}
