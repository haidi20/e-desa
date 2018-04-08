<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hasil;
use App\Models\Kreteria;
use App\Models\Alternatif;

use App\Supports\Logika;

class AnalisaController extends Controller
{
    public function __construct(Logika $logika){
      $this->logika = $logika;
    }

    public function index(){
      $kreteria   = Kreteria::orderBy('kode')->get();
      $sekolah    = Hasil::orderBy('alternatif_id')->groupBy('alternatif_id')->get();
      $nilai      = $this->logika->sekolah();

      session()->put('aktif','analisa');
      session()->put('aktiff','');

      return view('analisa.index',compact('nilai','kreteria','sekolah'));
    }
}
