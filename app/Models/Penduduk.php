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

    public function getNamaDusunAttribute()
    {
    	if($this->dusun){
    		return $this->dusun->nama;
    	}
    }
}
