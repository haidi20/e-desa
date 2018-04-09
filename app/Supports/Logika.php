<?php

namespace App\Supports ;

use App\Models\Hasil;
use App\Models\Kreteria;
use App\Models\Alternatif;
use App\Models\Normalisasi;

class Logika {

  public function __construct(Kreteria $kreteria,Alternatif $alternatif){
    $this->kreteria   = Kreteria::orderBy('kode')->get();
    $this->alternatif = Alternatif::all();
  }

  public function hasilNilai($kode){
    return Hasil::kreteriaAlternatif()->where('kreteria_id',$kode)->get();
  }

  public function hasilNilaiKode($kode){
    return Hasil::kreteriaAlternatif()->hasilNilaiKode($kode)->get();
  }

  public function normalisasiProses(){

    foreach ($this->kreteria as $index => $item) {
      $ciMaks[] = [
        'kreteria'  => $item->id,
        'nilai' => nilai_maksimal($this->hasilNilai($item->id),'maksimal')
      ];
      $ciHasil = $this->hasilNilaiKode($item->id);
      $ciNorm[] = proses_normalisasi($ciMaks,$ciHasil) ;
    }

    return $ciNorm ;
  }

  public function normalisasi(){
    $alternatif   = $this->alternatif;
    $nilai        = [];

    foreach ($alternatif as $index => $item) {
      $nilai[$item->id] = Normalisasi::alternatifKreteria($item->id)->pluck('nilai','kreteria_id');
    }

    return $nilai ;
  }

  public function sekolah(){
    $alternatif   = $this->alternatif;
    $nilai        = [];

    foreach ($alternatif as $index => $item) {
      $nilai[$item->id] = Hasil::alternatifKreteria($item->id)->pluck('nilai','kreteria_id');
    }

    return $nilai ;
  }

  public function inputan($id){
    $kreteria     = $this->kreteria ;
    $nilai        = [];

    foreach ($kreteria as $index => $item) {
      $nilai[$item->id] = Hasil::where('kreteria_id',$item->id)
                                ->where('alternatif_id',$id)
                                ->orderBy('nilai')
                                ->value('nilai');
    }
    return $nilai;
  }
}
