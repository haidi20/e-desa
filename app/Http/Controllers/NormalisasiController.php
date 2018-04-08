<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Supports\Logika;

class NormalisasiController extends Controller
{
    public function __construct(Logika $logika){
      $this->logika = $logika ;
    }

    public function index(){
      return $this->logika->normalisasi();

      session()->put('aktif','normalisasi');
      session()->put('aktiff','');

      return view('normalisasi.index');
    }
}
