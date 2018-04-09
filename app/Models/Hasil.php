<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $table = 'hasil';

    public $fillable = ['kreteria_id','alternatif_id','nilai'];

    public function alternatif(){
      return $this->belongsTo('App\Models\Alternatif');
    }

    public function kreteria(){
      return $this->belongsTo('App\Models\Kreteria');
    }

    public function scopeBerdasarkanAlternatif($query){
      $query->orderBy('alternatif_id')->groupBy('alternatif_id');
    }

    public function scopeHasilNilaiKode($query,$kode){
      $query->where('kreteria_id',$kode)
            ->join('kreteria','hasil.kreteria_id','=','kreteria.id')
            ->join('alternatif','hasil.alternatif_id','=','alternatif.id');
    }

    public function scopeKreteriaAlternatif($query){
      $query->select('alternatif_id','kreteria_id','nilai');
    }

    public function scopeAlternatifKreteria($query,$id){
      $query->where('alternatif_id',$id)
            ->orderBy('kreteria_id');
    }

}
