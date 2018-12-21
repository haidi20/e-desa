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

    public function scopePindah($query)
    {
        return $query->where('status_mutasi', 'pindah');
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
