<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
    protected $table = 'kelahiran';

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
