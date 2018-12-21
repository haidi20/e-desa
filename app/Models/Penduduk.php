<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    protected $table = 'penduduk';

    public function dusun()
    {
    	return $this->belongsTo('App\Models\Dusun');
    }

    public function kartukeluarga()
    {
        return $this->hasMany('App\Models\KartuKeluarga', 'penduduk_id');
    }

    public function kematian()
    {
        return $this->hasMany('App\Models\Kematian', 'penduduk_id');
    }

    public function scopeKepalaKeluarga($query)
    {
        return $query->where('kk_status', 1);
    }

    public function scopeBukanKepalaKeluarga($query)
    {
        return $query->where('kk_status', '<>', 1);
    }

    public function scopeTidakMuncul($query, $kematian, $pindah, $kk=null)
    {
        $query->whereNotIn('id', $kematian)->whereNotIn('id', $pindah);
        if($kk){
            $query->whereNotIn('id', $kk);
        }
        return $query;
    }

    public function getNamaDusunAttribute()
    {
    	if($this->dusun){
    		return $this->dusun->nama;
    	}
    }

    public function getStatusKepalakeluargaAttribute()
    {
        return $this->kk_status == 1 ? 'Ya' : 'Tidak';
    }

    public function getClassStatusKeadaanAttribute()
    {
        if($this->status_keadaan == 'kematian' || $this->status_keadaan == 'pindah'){
            return 'bg-danger bg-lighten-2';
        }
    }
}
