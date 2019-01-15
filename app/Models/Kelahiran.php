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

    public function getAlamatPendudukAttribute()
    {
    	if($this->penduduk){
    		return $this->penduduk->dusun->nama;
    	}
    }

    public function getAlasanPersetujuanAttribute()
    {
        if($this->persetujuan == 1){
            return 'Disetujui';
        }elseif($this->persetujuan == 2){
            return 'Tidak disetujui';
        }else{
            return 'Belum ada persetujuan';
        }
    }
}
