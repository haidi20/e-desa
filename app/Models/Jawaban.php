<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';
    public $fillable = ['pertanyaan_id','sekolah_id','isi'];

    public function sekolah(){
        return $this->belongsTo('App\Models\Sekolah');
    }

    public function scopeKondisiJawaban($query,$pertanyaan,$sekolah){
        return $query->where('pertanyaan_id',$pertanyaan)
              ->where('sekolah_id',$sekolah);
    }
}
