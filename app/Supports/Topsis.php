<?php

namespace App\Supports;

use App\Models\Hasil;
use App\Models\Kreteria;

class Topsis {
  public function __construct(){
    $this->kreteria = Kreteria::orderBy('kode')->get();
  }

  public function normalisasiProses(){
    $pembagi = $this->pembagiProses();

    $normalisasi = [];
    foreach ($pembagi as $index => $item) {
      $hasil = Hasil::where('kreteria_id',$index)->get();
      $normalisasi[] = proses_normalisasi_topsis($pembagi,$hasil);
    }

    return $normalisasi;
  }

  public function pembagiProses(){
    $pembagi = [];

    foreach ($this->kreteria as $index => $item) {
      $hasil = Hasil::where('kreteria_id',$item->id)->get() ;
      $pembagi[$item->id] = number_format(sqrt(array_sum(proses_pangkat($hasil))),5);
    }

    return $pembagi ;
  }
}
