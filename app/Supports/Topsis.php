<?php

namespace App\Supports;

use App\Models\Hasil;
use App\Models\Kinerja;
use App\Models\Pembantu;
use App\Models\Kreteria;
use App\Models\Alternatif;

class Topsis {
  public function __construct(){
    $this->kreteria     = Kreteria::orderBy('kode')->get();
    $this->alternatif   = Alternatif::orderBy('id')->get();
  }

  public function peringkatProses(){
    $x      = [];

    foreach ($this->alternatif as $index => $item) {
      $delta  = Pembantu::formatJenis('delta')
                        ->where('alternatif_id',$item->id)
                        ->pluck('nilai');

      // peringkat = menjumlahkan delta plus dan delta min pada topsis
      $peringkat = proses_peringkat_topsis($delta);

      $x[]   = [
        'nilai' => $peringkat,
        'alternatif' => $item->id
      ];
    }

    $hasil = proses_pengurutan($x);

    return $hasil ;
  }

  public function alphaProses($maksmin){
    $hasil = [];

    foreach ($this->kreteria as $index => $item) {
      $hasil[$item->id] = nilai_maksmin(Kinerja::where('kreteria_id',$item->id)->get(),$maksmin);
    }

    return $hasil;
  }

  public function deltaProses($jenis){
    $alphaPositif = Pembantu::formatJenis('alpha',$jenis)->pluck('nilai');

    foreach ($this->alternatif as $index => $item) {
      $terbobot         = Kinerja::where('jenis','terbobot')->where('alternatif_id',$item->id)->pluck('nilai');
      $hasil[$item->id] = proses_delta($terbobot,$alphaPositif);
    }

    return $hasil;
  }

  public function Kinerja($jenis){
    $alternatif = Alternatif::all();
    $hasil      = [];

    foreach ($alternatif as $index => $item) {
      $hasil[$item->id] = Kinerja::alternatifKreteria($item->id)
                                 ->where('jenis',$jenis)
                                 ->pluck('nilai','kreteria_id');
    }

    return $hasil ;
  }

  public function normalisasiProses(){
    $pembagi      = $this->pembagiProses();
    $normalisasi  = [];

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
