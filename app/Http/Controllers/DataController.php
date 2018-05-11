<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kinerja;
use App\Models\Pembantu;
use App\Models\Peringkat;
use App\Models\Normalisasi;

use App\Supports\Logika;
use App\Supports\Topsis;

use Auth;

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

// start function supports

// function jalur
  public function jalur($lanjut = null){
    // jika role topsis maka lanjut ke alpha positif
    if ($this->jenis('nama') == 'topsis' && !$lanjut) {
      return redirect()->route('topsis.input.alphaPositif');
    }else{
      // kalo selain role topsis maka langsung kembali ke fitur aplikasi yang sekolah or kreteria
      if (session()->get('controller') == 'sekolah') {
        return redirect()->route('sekolah.index');
      }
      else if (session()->get('controller') == 'kreteria') {
        return redirect()->route('kreteria.index');
      }
    }
  }

// function JENIS
  public function jenis($jenis){
    $nama = Auth::user()->nama;
    if ($jenis == 'nama') {
      return $nama ;
    }elseif($jenis == 'status'){
      if ($nama == 'saw') {
        return 'kinerja';
      }else{
        return 'terbobot';
      }
    }
  }

// end function supports

// NORMALISASI UNTUK SAW DAN TOPSIS
  public function inputNormalisasi(){
    if ($this->jenis('nama') == 'saw') {
      $normalisasiProses = $this->logika->normalisasiProses();
    }elseif($this->jenis('nama') == 'topsis'){
      $normalisasiProses  = $this->topsis->normalisasiProses();
    }

    foreach ($normalisasiProses as $index => $item) {
      foreach ($item as $key => $value) {
        $nilai      = $value['nilai'];
        $kreteria   = $value['kreteria'];
        $alternatif = $value['alternatif'];

        $normalisasi = Normalisasi::FirstOrCreate([
          'jenis'         => $this->jenis('nama'),
          'kreteria_id'   =>$kreteria,
          'alternatif_id' =>$alternatif
        ]);
        $normalisasi->nilai = $nilai;
        $normalisasi->save();
      }
    }

    return redirect()->route('input.kinerja');
  }

// input data KINERJA untuk SAW dan TERBOBOT untuk TOPSIS
  public function inputKinerja(){
    $kinerjaProses  = $this->logika->kinerjaProses($this->jenis('nama'));
    $kinerja        = [];

    foreach ($kinerjaProses as $key => $value) {
      foreach ($value as $index => $item) {
        $nilai          = $item['nilai'];
        $kreteria_id    = $item['kreteria'];
        $alternatif_id  = $item['alternatif'];
        $jenis          = $this->jenis('status');

        $kinerja        = Kinerja::firstOrCreate(compact('alternatif_id','kreteria_id','jenis'));
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

// untuk kondisi jika ada perubahan nilai dari kreteria atau sekolah
// karena sangat mempengaruhi perhitungan
    return $this->jalur();
  }

  public function inputAlpha($data,$jenis,$format){
    foreach ($data as $index => $item) {
      $pembantu = Pembantu::firstOrCreate([
        'kreteria_id' => $index,
        'jenis'       => $jenis,
        'format'      => $format
      ]);
      $pembantu->nilai = $item;
      $pembantu->save();
    }
  }

  public function inputAlphaPositif(){
    $data = $this->topsis->alphaPositif();

    $this->inputAlpha($data,'positif','alpha');

    return redirect()->route('topsis.input.alphaNegatif');
  }

  public function inputAlphaNegatif(){
    $data = $this->topsis->alphaNegatif();

    $this->inputAlpha($data,'negatif','alpha');

    return $this->jalur('lanjut');
  }
}
