<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    protected $table = 'mutasi';

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
}
