<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';

    public function scopeKondisiRumus($query,$pertanyaan,$sekolah){
        return $query->where('pertanyaan_id',$pertanyaan)
                     ->where('sekolah_id',$sekolah)
                     ->value('isi');
    }
}
