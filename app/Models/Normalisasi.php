<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Normalisasi extends Model
{
    protected $table = 'normalisasi';

    public $fillable = ['kreteria_id','alternatif_id','jenis','nilai'];

    public function alternatif(){
      return $this->belongsTo('App\Models\Alternatif');
    }

    public function kreteria(){
      return $this->belongsTo('App\Models\Kreteria');
    }

    public function scopeKondisiJenis($query,$jenis){
      $query->where('jenis',$jenis);
    }

    public function scopeBerdasarkanAlternatif($query){
      $query->orderBy('alternatif_id')->groupBy('alternatif_id');
    }

    public function scopeALternatifKreteria($query,$id){
      $query->where('alternatif_id',$id)
            ->orderBy('kreteria_id');
    }
}
