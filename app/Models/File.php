<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = "file";

    public $fillable = ['penduduk_id', 'fungsi'];
}
