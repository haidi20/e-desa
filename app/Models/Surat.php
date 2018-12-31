<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';

    public function penduduk()
    {
    	return $this->belongsTo('App\Models\Penduduk');
    }

    public function getNamaPendudukAttribute()
    {
    	if($this->penduduk){
    		return $this->penduduk->nik.'-'.$this->penduduk->nama;
    	}
    }
}
