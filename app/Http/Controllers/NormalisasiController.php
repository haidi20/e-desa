<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hasil;
use App\Models\Kreteria;
use App\Models\Alternatif;
use App\Models\Normalisasi;

use App\Supports\Logika;

class NormalisasiController extends Controller
{
    public function __construct(Logika $logika){
      $this->logika = $logika ;
    }

    public function index(){

      session()->put('aktif','normalisasi');
      session()->put('aktiff','');

      $kreteria     = Kreteria::orderBy('kode')->get();
      $normalisasi  = Normalisasi::berdasarkanAlternatif()->get();
      $nilai        = $this->logika->normalisasi() ;


      return view('normalisasi.index',compact(
        'kreteria','normalisasi','nilai'
      ));
    }
}
