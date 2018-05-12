<?php

namespace App\Http\Controllers\Topsis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Pembantu;

use App\Supports\Topsis;

class PembantuController extends Controller
{
    public function __construct(Topsis $topsis){
      $this->topsis = $topsis;
    }

    public function alpha(){
      session()->put('aktif','A');
      session()->put('aktiff','pembantu');

      $pembantu = Pembantu::groupBy('kreteria_id')->kondisiJenis('alpha')->get();
      $positif  = Pembantu::kondisi('alpha','positif')->pluck('nilai');
      $negatif  = Pembantu::kondisi('alpha','negatif')->pluck('nilai');

      return view('pembantu.alpha',compact(
          'pembantu','positif','negatif'
      ));
    }

    public function delta(){
      session()->put('aktif','D');
      session()->put('aktiff','pembantu');

      
    }
}
