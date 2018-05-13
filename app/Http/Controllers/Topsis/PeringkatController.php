<?php

namespace App\Http\Controllers\Topsis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Peringkat;

use App\Supports\Topsis;

class PeringkatController extends Controller
{
    public function __construct(Topsis $topsis){
      $this->topsis = $topsis ;
    }

    public function index(){
      session()->put('aktif','peringkat');
      session()->put('aktiff','');

      $kinerja = Peringkat::orderBy('alternatif_id')->where('jenis','topsis')->get();

      return view('kinerja.index',compact('kinerja'));
    }
}
