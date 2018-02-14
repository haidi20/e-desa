<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nama'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sekolah(){
        return $this->hasOne('App\Models\Sekolah');
    }

    public function scopeKondisi($query){
        if (request()->has('sekolah') || request()->has('kecamatan')) {
            $query->join('sekolah','users.sekolah_id','=','sekolah.id')
                  ->select('users.nama as namaUser','sekolah.*');
            if (request()->has('sekolah')) {
                $query->where('sekolah.id',request('sekolah'));
            }
            if (request()->has('kecamatan')) {
                $query->where('sekolah.kecamatan_id',request('kecamatan'));
            }
        }else{
            $query->join('sekolah','users.sekolah_id','=','sekolah.id')
                  ->select('users.nama as namaUser','sekolah.*');
        }
    }
}
