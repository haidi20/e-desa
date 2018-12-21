<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailKartuKeluarga extends Model
{
    protected $table = 'detail_kartu_keluarga';

    public function kartuKeluarga()
    {
    	return $this->belongsTo('App\Models\KartuKeluarga');
    }

    public function penduduk()
    {
    	return $this->belongsTo('App\Models\Penduduk');
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

    public function getNikPendudukAttribute()
    {
        if($this->penduduk){
            return $this->penduduk->nik;
        }
    }
}
