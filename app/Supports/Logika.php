<?php

namespace App\Supports ;

use App\Models\Hasil;
use App\Models\Kinerja;
use App\Models\Kreteria;
use App\Models\Alternatif;
use App\Models\Normalisasi;

class Logika {

  public function __construct(Kreteria $kreteria,Alternatif $alternatif){
    $this->kreteria   = Kreteria::orderBy('kode')->get();
    $this->alternatif = Alternatif::all();
  }

  public function peringkatProses(){
    $alternatif = Hasil::groupBy('alternatif_id')->get();

    foreach ($alternatif as $index => $item) {
      $jumlah = Kinerja::where('alternatif_id',$item->alternatif_id)
                      ->sum('nilai');
      $x[] = [
        'nilai'=>number_format($jumlah,4),
        'alternatif' => $item->alternatif_id,
      ];
    }

    $hasil = proses_pengurutan($x);

    return $hasil ;
  }

  public function kinerjaProses(){
    foreach ($this->kreteria as $index => $item) {
      $normalNilai = Normalisasi::where('kreteria_id',$item->id)->get();
      $ciNilai[] = proses_pengalian_bobot($item->bobot,$normalNilai);
    }

    return $ciNilai ;
  }

  public function normalisasiProses(){
    foreach ($this->kreteria as $index => $item) {
      $hasilNilai     = Hasil::where('kreteria_id',$item->id)->get();
      $hasilNilaiKode = Hasil::kreteriaAlternatif($item->id)->get();

      $ciMaks[] = [
        'kreteria'  => $item->id,
        'nilai' => nilai_maksimal($hasilNilai,'maksimal')
      ];
      $ciNormalisasi[] = proses_normalisasi($ciMaks,$hasilNilaiKode) ;
    }

    return $ciNormalisasi ;
  }

  public function normalisasi(){
    $alternatif = $this->alternatif;

    foreach ($alternatif as $index => $item) {
      $nilai[$item->id] = Normalisasi::alternatifKreteria($item->id)->pluck('nilai','kreteria_id');
    }

    return $nilai ;
  }

  public function sekolah(){
    $alternatif = $this->alternatif;

    foreach ($alternatif as $index => $item) {
      $nilai[$item->id] = Hasil::kondisiAlternatif($item->id)->pluck('nilai','kreteria_id');
    }

    return $nilai ;
  }

  public function inputan($id,$keyword){
    $kreteria     = $this->kreteria ;

    foreach ($kreteria as $index => $item) {
      $nilai[$item->id] = Hasil::kondisiKreteria($item->id,$id,$keyword)
                                ->value('nilai');
    }

    return $nilai;
  }
}
