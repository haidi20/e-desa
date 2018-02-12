<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';

    public function scopeKondisi($query){
        if (request('kecamatan')) {
            $query->where('id',request('kecamatan'));
        }
    }
}
