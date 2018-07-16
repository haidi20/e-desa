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
    $x      = [];

    foreach ($alternatif as $index => $item) {
      $jumlah = Kinerja::where('alternatif_id',$item->alternatif_id)
                       ->where('jenis','kinerja')
                       ->sum('nilai');
      $x[] = [
        'nilai'=>number_format($jumlah,4),
        'alternatif' => $item->alternatif_id,
      ];
    }

    $hasil = proses_pengurutan($x);

    return $hasil ;
  }

// memunculkan data kinerja untuk SAW dan data terbobot untuk TOPSIS //
  public function kinerjaProses($jenis){
    $ciNilai = [];

    foreach ($this->kreteria as $index => $item) {
      $normalNilai = Normalisasi::where('kreteria_id',$item->id)
                                ->kondisiJenis($jenis)
                                ->get();
      $ciNilai[] = proses_pengalian_bobot($item->bobot,$normalNilai);
    }

    return $ciNilai ;
  }

  public function normalisasiProses(){
    $ciMaksMin      = [];
    $ciNormalisasi  = [];

    foreach ($this->kreteria as $index => $item) {
      $hasilNilai     = Hasil::where('kreteria_id',$item->id)->get();
      $hasilNilaiKode = Hasil::kreteriaAlternatif($item->id)->get();

      $attribute = kondisi_attribute($hasilNilaiKode);

      $ciMaksMin[] = [
        'kreteria'  => $item->id,
        // variable attribute untuk menentukan kondisi nilai maks atau min
        'nilai'     => nilai_maksmin($hasilNilai,$attribute),
        'attribute' => $attribute
      ];

      $ciNormalisasi[] = proses_normalisasi($ciMaksMin,$hasilNilaiKode) ;
    }

    return $ciNormalisasi;
  }

// memunculkan data normalisasi untuk jenis SAW dan TOPSIS
  public function normalisasi($jenis){
    $alternatif = $this->alternatif;
    $nilai      = [];

    foreach ($alternatif as $index => $item) {
      $nilai[$item->id] = Normalisasi::alternatifKreteria($item->id)
                                    ->kondisiJenis($jenis)
                                    ->pluck('nilai','kreteria_id');
    }

    return $nilai ;
  }

  public function sekolah(){
    $alternatif = $this->alternatif;
    $nilai      = [];

    foreach ($alternatif as $index => $item) {
      $nilai[$item->id] = Hasil::kondisiAlternatif($item->id)->pluck('nilai','kreteria_id');
    }

    return $nilai ;
  }

  public function inputan($id,$keyword){
    $kreteria     = $this->kreteria ;
    $nilai        = [];

    foreach ($kreteria as $index => $item) {
      $nilai[$item->id] = Hasil::kondisiKreteria($item->id,$id,$keyword)
                                ->value('nilai');
    }

    return $nilai;
  }
}
