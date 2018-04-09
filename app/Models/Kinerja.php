<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kinerja extends Model
{
    protected $table = 'kinerja';

    public $fillable = ['kreteria_id','alternatif_id','nilai'];
}
