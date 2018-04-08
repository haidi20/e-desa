<?php

namespace App\Supports ;

use App\Models\Hasil;
use App\Models\Kreteria;
use App\Models\Alternatif;

class Logika {

  public function __construct(Kreteria $kreteria,Alternatif $alternatif){
    $this->kreteria   = Kreteria::orderBy('kode')->get();
    $this->alternatif = Alternatif::all();

    $this->cSatu  = Kreteria::where('kode','C1')->first();
    $this->cDua   = Kreteria::where('kode','C2')->first();
    $this->cTiga  = Kreteria::where('kode','C3')->first();
    $this->cEmpat = Kreteria::where('kode','C4')->first();
    $this->cLima  = Kreteria::where('kode','C5')->first();
  }

  public function cariHasilNilai($kode){
    return Hasil::where('kreteria_id',$kode)->get();
  }

  public function normalisasi(){
    $cSatuMaks  = [];
    $cDuaMaks   = [];
    $cTigaMaks  = [];
    $cEmpatMaks = [];
    $cLimaMaks  = [];

    $cSatuMaks  = nilai_maksimal($this->cariHasilNilai($this->cSatu->id));
    $cDuaMaks   = nilai_maksimal($this->cariHasilNilai($this->cDua->id));
    $cTigaMaks  = nilai_maksimal($this->cariHasilNilai($this->cTiga->id));
    $cEmpatMaks = nilai_maksimal($this->cariHasilNilai($this->cEmpat->id));
    $cLimaMaks  = nilai_maksimal($this->cariHasilNilai($this->cLima->id));

    return $cSatuMaks;
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
