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
    $isi          = [];

    foreach ($alternatif as $index => $item) {
      foreach ($kreteria as $key => $value) {
        $isi[$value->id] = Hasil::where('alternatif_id',$item->id)
                                ->where('kreteria_id',$value->id)
                                ->orderBy('kreteria_id')
                                ->value('nilai');
      }
    }

    return $isi ;
  }
}
