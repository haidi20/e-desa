<?php

namespace App\Supports ;

use App\Models\Hasil;
use App\Models\Kreteria;
use App\Models\Alternatif;

class Logika {
  public function sekolah(){
    $hasil        = Hasil::all();
    $kreteria     = Kreteria::orderBy('kode')->get();
    $alternatif   = Alternatif::all();
    $nilai        = [];

    foreach ($alternatif as $index => $item) {
      foreach ($kreteria as $key => $value) {
        $nilai[$item->id] = Hasil::where('alternatif_id',$item->id)
                                  ->orderBy('kreteria_id')
                                  ->pluck('nilai','kreteria_id');
                                // ->get();
      }
    }

    return $nilai ;
  }
}
