<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hasil;
use App\Models\Kreteria;
use App\Models\Alternatif;

use App\Supports\Logika;

class NormalisasiController extends Controller
{
    public function __construct(Logika $logika){
      $this->logika = $logika ;
    }

    public function index(){
      $kreteria     = Kreteria::orderBy('kode')->get();
      $alternatif   = Alternatif::all();
      $hasil        = Hasil::berdasarkanAlternatif()->get();
      return $hasilNormalisasi  = $this->logika->normalisasi();

      session()->put('aktif','normalisasi');
      session()->put('aktiff','');

      return view('normalisasi.index',compact(
        'kreteria','normalisasi','hasil'
      ));
    }
}
