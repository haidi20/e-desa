<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kreteria;
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

      $kreteria     = Kreteria::berdasarkan()->get();
      $normalisasi  = Normalisasi::berdasarkanAlternatif()->get();
      $nilai        = $this->logika->normalisasi('saw') ;

      return view('normalisasi.index',compact(
        'kreteria','normalisasi','nilai'
      ));
    }
}
