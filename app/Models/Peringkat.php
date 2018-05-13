<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peringkat extends Model
{
    protected $table = 'peringkat';

    public $fillable = ['alternatif_id','nilai','peringkat','jenis'];

    public function alternatif(){
      return $this->belongsTo('App\Models\Alternatif');
    }
}
