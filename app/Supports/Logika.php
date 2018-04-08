<?php

namespace App\Supports ;

use App\Models\Hasil;
use App\Models\Kreteria;
use App\Models\Alternatif;

class Logika {

  public function __construct(Kreteria $kreteria,Alternatif $alternatif){
    $this->kreteria   = Kreteria::orderBy('kode')->get();
    $this->alternatif = Alternatif::all();
  }

  public function cariHasilNilai($kode){
    return Hasil::where('kreteria_id',$kode)->pluck('nilai');
  }

  public function normalisasi(){
    $ciMaks   = [];
    $arrayCiMaks = [];
    $arrayCiNilai = [];
    $ciHasil  = [];

    foreach ($this->kreteria as $index => $item) {
      $arrayCiMaks[] = [
        'kode'  => $item->kode,
        'nilai' => nilai_maksimal($this->cariHasilNilai($item->id))
      ];
      // $arrayCiNilai = [
      //   'kode'  => $item->kode,
      //   'nilai' => $this->cariHasilNilai($item->id)
      // ];
      // $ciMaks[]   = proses_normalisasi('',$arrayCiNilai);
    }

    return $arrayCiMaks ;
  }

  public function sekolah(){
    $kreteria     = $this->kreteria ;
    $alternatif   = $this->alternatif;
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

  public function inputan($id){
    $kreteria     = $this->kreteria ;
    $nilai        = [];

    foreach ($kreteria as $index => $item) {
      $nilai[$item->id] = Hasil::where('alternatif_id',$id)
                                ->where('kreteria_id',$item->id)
                                // ->orderBy('kreteria_id')
                                ->orderBy('nilai')
                                ->value('nilai');
                              // ->get();
    }
    return $nilai;
  }
}
