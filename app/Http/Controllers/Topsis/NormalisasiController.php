<?php

namespace App\Http\Controllers\Topsis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Kreteria;
use App\Models\Normalisasi;

use App\Supports\Logika;

class NormalisasiController extends Controller
{
    public function __construct(Logika $logika){
      $this->logika = $logika;
    }

    public function index(){
      session()->put('aktif','normalisasi');
      session()->put('aktiff','');

      $kreteria     = Kreteria::berdasarkan()->get();
      $normalisasi  = Normalisasi::berdasarkanAlternatif()->get();
      $nilai        = $this->logika->normalisasi('topsis');

      return view('normalisasi.index',compact(
        'kreteria','normalisasi','nilai'
      ));
    }
}
