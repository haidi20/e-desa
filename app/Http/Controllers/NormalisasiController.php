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
      $kreteria     = Kreteria::berdasarkan()->get();
      $normalisasi  = Normalisasi::berdasarkanAlternatif()->get();
      $nilai        = $this->logika->normalisasi() ;

      session()->put('aktif','normalisasi');
      session()->put('aktiff','');

      return view('normalisasi.index',compact(
        'kreteria','normalisasi','nilai'
      ));
    }
}
