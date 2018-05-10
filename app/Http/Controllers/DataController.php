<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kinerja;
use App\Models\Peringkat;
use App\Models\Normalisasi;

use App\Supports\Logika;
use App\Supports\Topsis;

class DataController extends Controller
{
  public function __construct(Logika $logika,Topsis $topsis){
    $this->logika = $logika;
    $this->topsis = $topsis;
  }

  public function dataSekolah(){
    $id = request('alter');
    $nilai  = $this->logika->inputan($id,'ajax');

    return $nilai ;
  }

  public function inputNormalisasiTopsis(){
    $normalisasi  = $this->topsis->normalisasi();
    $hasil        = [] ;

    foreach ($normalisasi as $key => $value) {
      foreach ($value as $index => $item) {
        $nilai      = $item['nilai'];
        $kreteria   = $item['kreteria'];
        $alternatif = $item['alternatif'];
        $jenis      = 'topsis';

        $normalisasi = Normalisasi::FirstOrCreate([
          // 'jenis'         => $jenis,
          'kreteria_id'   =>$kreteria,
          'alternatif_id' =>$alternatif
        ]);
        $normalisasi->nilai = $nilai;
        $normalisasi->jenis = $jenis;
        $normalisasi->save();
      }
    }

    return $hasil;
  }

  public function inputNormalisasi(){
    $normalisasiProses = $this->logika->normalisasiProses();

    // inptu data ke table normalisasi
    foreach ($normalisasiProses as $index => $item) {
      foreach ($item as $key => $value) {
        $nilai      = $value['nilai'];
        $kreteria   = $value['kreteria'];
        $alternatif = $value['alternatif'];
        $jenis      = 'saw';

        $normalisasi = Normalisasi::FirstOrCreate([
          // 'jenis'         =>$jenis,
          'kreteria_id'   =>$kreteria,
          'alternatif_id' =>$alternatif
        ]);
        $normalisasi->nilai = $nilai;
        $normalisasi->jenis = $jenis;
        $normalisasi->save();
      }
    }

    return redirect()->route('input.kinerja');
  }

  public function inputKinerja(){
    $kinerjaProses  = $this->logika->kinerjaProses();
    $kinerja        = [];

    foreach ($kinerjaProses as $key => $value) {
      foreach ($value as $index => $item) {
        $nilai          = $item['nilai'];
        $kreteria_id    = $item['kreteria'];
        $alternatif_id  = $item['alternatif'];

        $kinerja        = Kinerja::firstOrCreate(compact('alternatif_id','kreteria_id'));
        $kinerja->nilai = $nilai;
        $kinerja->save();

      }
    }

    return redirect()->route('input.peringkat') ;
  }

  public function inputPeringkat(){
    $peringkatProses = $this->logika->peringkatProses();

    foreach ($peringkatProses as $key => $value) {
      $nilai = $value['nilai'];
      $juara = $value['peringkat'];
      $alternatif_id = $value['alternatif'];

      $peringkat = Peringkat::firstOrCreate(compact('alternatif_id'));
      $peringkat->nilai = $nilai;
      $peringkat->peringkat = $juara;
      $peringkat->save();
    }

    if (session()->get('controller') == 'sekolah') {
      return redirect()->route('sekolah.index');
    }
    else if (session()->get('controller') == 'kreteria') {
      return redirect()->route('kreteria.index');
    }


  }
}
