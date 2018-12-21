<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    protected $table = 'kartu_keluarga';

    public function penduduk()
    {
    	return $this->belongsTo('App\Models\Penduduk');
    }

    public function detail()
    {
        return $this->hasMany('App\Models\DetailKartuKeluarga', 'kartukeluarga_id', 'id');
    }

    public function scopeKecualiPendudukid($query, $id)
    {
        return $query->where('penduduk_id', '<>', $id);
    }

    public function getNamaPendudukAttribute()
    {
    	if($this->penduduk){
    		return $this->penduduk->nama;
    	}
    }
}
