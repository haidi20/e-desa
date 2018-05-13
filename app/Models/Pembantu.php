<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembantu extends Model
{
    protected $table = 'pembantu';

    public $fillable = ['alternatif_id','kreteria_id','format','jenis','nilai'];

    public function kreteria(){
      return $this->belongsTo('App\Models\Kreteria');
    }

    public function alternatif(){
      return $this->belongsTo('App\Models\Alternatif');
    }

    // format untuk alpha or Delta dan jenis positif or negatif
    public function scopeFormatJenis($query,$format = null,$jenis = null){
      if ($format) {
        $query->where('format',$format);
      }
      if ($jenis) {
        $query->where('jenis',$jenis);
      }
    }
}
