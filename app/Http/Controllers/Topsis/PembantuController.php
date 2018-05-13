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

      $pembantu = Pembantu::groupBy('kreteria_id')->formatJenis('alpha')->get();
      $positif  = Pembantu::formatJenis('alpha','positif')->pluck('nilai');
      $negatif  = Pembantu::formatJenis('alpha','negatif')->pluck('nilai');

      return view('pembantu.alpha',compact(
          'pembantu','positif','negatif'
      ));
    }

    public function delta(){
      session()->put('aktif','D');
      session()->put('aktiff','pembantu');

      $pembantu = Pembantu::GroupBy('alternatif_id')->formatJenis('delta')->get();
      $positif  = Pembantu::formatJenis('delta','positif')->pluck('nilai');
      $negatif  = Pembantu::formatJenis('delta','negatif')->pluck('nilai');

      return view('pembantu.delta',compact(
        'pembantu','positif','negatif'
      ));
    }
}
