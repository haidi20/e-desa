<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = "file";

    public $fillable = ['penduduk_id', 'fungsi'];

    public function scopeKondisi($query, $penduduk, $fungsi)
    {
    	return $query->where(['penduduk_id' => $penduduk, 'fungsi' => $fungsi]);
    }
}
