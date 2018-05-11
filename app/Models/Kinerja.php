<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kinerja extends Model
{
    protected $table = 'kinerja';

    public $fillable = ['kreteria_id','alternatif_id','jenis','nilai'];

    public function alternatif(){
      return $this->belongsTo('App\Models\Alternatif');
    }

    public function kreteria(){
      return $this->belongsTo('App\Models\Kreteria');
    }

    public function scopeALternatifKreteria($query,$id){
      $query->where('alternatif_id',$id)
            ->orderBy('kreteria_id');
    }

    public function scopeKondisiJenis($query,$jenis){
      $query->where('jenis',$jenis);
    }
}
