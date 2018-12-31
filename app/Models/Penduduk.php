<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Penduduk extends Model
{
    protected $table = 'penduduk';

    public function dusun()
    {
    	return $this->belongsTo('App\Models\Dusun');
    }

    public function mutasi()
    {
        return $this->hasOne('App\Models\Mutasi');
    }

    public function kartukeluarga()
    {
        return $this->hasOne('App\Models\KartuKeluarga', 'penduduk_id');
    }

    public function detailkartukeluarga()
    {
        return $this->hasOne('App\Models\DetailKartuKeluarga', 'penduduk_id');
    }

    public function kematian()
    {
        return $this->hasOne('App\Models\Kematian', 'penduduk_id');
    }

    public function kelahiran()
    {
        return $this->hasOne('App\Models\Kelahiran', 'penduduk_id');
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

    public function getAnakKeberapaAttribute()
    {
        if($this->kelahiran){
            return $this->kelahiran->anak_ke;
        }
    }

    public function getTempatLahirAttribute()
    {
        if($this->kelahiran){
            return $this->kelahiran->tempat_lahir;
        }
    }

    public function getNamaDusunAttribute()
    {
    	if($this->dusun){
    		return $this->dusun->nama;
    	}
    }

    public function getAlamatTujuanAttribute()
    {
        if($this->mutasi){
            return $this->mutasi->alamat_pergi;
        }
    }

    public function getNamaAlamatAttribute()
    {
        if($this->dusun){
            return $this->dusun->alamat;
        }
    }

    public function getTanggalKematianAttribute()
    {
        if($this->kematian){
            return $this->kematian->tanggal;
        }
    }

    public function getTempatKematianAttribute()
    {
        if($this->kematian){
            return $this->kematian->tempat;
        }
    }

    public function getAlasanKematianAttribute()
    {
        if($this->kematian){
            return $this->kematian->alasan;
        }
    }

    public function getHariKematianAttribute()
    {
        if($this->kematian){
            $tanggal = Carbon::parse($this->kematian->tanggal);
            $tanggal = $tanggal->format('l');
            $tanggal = config('library.day.'.$tanggal);
            return $tanggal;
        }
    }

    public function getStatusKepalakeluargaAttribute()
    {
        return $this->kk_status == 1 ? 'Ya' : 'Tidak';
    }

    public function getNamaKepalaKeluargaAttribute()
    {
        if($this->kk_status == 1){
            return $this->nama;
        }else{
            if($this->detailkartukeluarga){
                return $this->detailkartukeluarga->nama_kepala_keluarga;
            }
        }
    }

    public function getNikKepalaKeluargaAttribute()
    {
        if($this->kk_status == 1){
            return $this->nik;
        }else{
            if($this->detailkartukeluarga){
                return $this->detailkartukeluarga->nik_kepala_keluarga;
            }
        }
    }

    public function getNomorKartuKeluargaAttribute()
    {
        if($this->kk_status == 1){
            if($this->kartukeluarga){
                return $this->kartukeluarga->nomor;
            }
        }else{
            if($this->detailkartukeluarga){
                return $this->detailkartukeluarga->nomor_kartu_keluarga;
            }
        }
    }

    public function getClassStatusKeadaanAttribute()
    {
        if($this->status_keadaan == 'kematian'){
            return 'bg-danger bg-lighten-4';
        }elseif($this->status_keadaan == 'pindah'){
            return 'bg-warning bg-lighten-4';
        }
    }
}
