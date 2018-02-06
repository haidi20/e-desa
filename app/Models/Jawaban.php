<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';
    public $fillable = ['pertanyaan_id','sekolah_id','isi'];

    public function scopeKondisiRumus($query,$pertanyaan,$sekolah){
        return $query->where('pertanyaan_id',$pertanyaan)
                     ->where('sekolah_id',$sekolah)
                     ->value('isi');
    }

    public function scopeKondisiKuisioner($query){
        return $query->where('sekolah_id',1);
    }
}
