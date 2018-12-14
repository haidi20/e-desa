<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    protected $table = 'kematian';

    public function penduduk()
    {
    	return $this->belongsTo('App\Models\Penduduk');
    }

	public function getNamaPendudukAttribute()
    {
    	if($this->penduduk){
    		return $this->penduduk->nama;
    	}
    }

    public function getAlamatPendudukAttribute()
    {
    	if($this->penduduk){
    		return $this->penduduk->dusun->nama;
    	}
    }
}
