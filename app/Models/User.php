<?php

namespace App\Models;

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
        $query->with(array('sekolah' => function($sekolah){
            if (request('kecamatan')) {
                $sekolah->where('kecamatan_id',request('kecamatan'));
            }
            if (request('sekolah')) {
                $sekolah->where('id',request('sekolah'));
            }
        }));
    }
}
