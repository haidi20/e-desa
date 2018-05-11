<?php

namespace App\Http\Controllers\Topsis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pembantu;
use App\Models\Kreteria;

use App\Supports\Topsis;

class PembantuController extends Controller
{
    public function __construct(Topsis $topsis){
      $this->topsis = $topsis;
    }

    public function alpha(){
      session()->put('aktif','A');
      session()->put('aktiff','pembantu');

      $kreteria = Kreteria::all();
      $pembantu = Pembantu::groupBy('kreteria_id')->kondisiJenis('alpha')->get();
      return $alpha    = $this->topsis->pembantu('alpha');

      return view('pembantu.alpha',compact('pembantu','kreteria','alpha'));
    }

    public function delta(){
      return 'ini function delta';
    }
}
