<?php

namespace App\Http\Controllers\Topsis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Kinerja;
use App\Models\Kreteria;
use App\Models\Alternatif;

use App\Supports\Topsis;

class TerbobotController extends Controller
{
    public function __construct(Topsis $topsis){
      $this->topsis = $topsis;
    }

    public function index(){
      session()->put('aktiff','');
      session()->put('aktif','terbobot');

      $kreteria     = Kreteria::orderBy('kode')->get();
      $terbobot     = $this->topsis->kinerja('terbobot');
      $kinerja      = Kinerja::where('jenis','terbobot')->groupBy('alternatif_id')->get();

      return view('terbobot.index',compact('kreteria','kinerja','terbobot'));
    }
}
