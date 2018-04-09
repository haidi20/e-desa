<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hasil;
use App\Supports\Logika;
use App\Models\Peringkat;

class KinerjaController extends Controller
{
    public function __construct(Logika $logika){
      $this->logika = $logika;
    }

    public function index(){
      $kinerja = Peringkat::all();

      session()->put('aktif','kinerja');
      session()->put('aktiff','');

      return view('kinerja.index',compact('kinerja'));
    }
}
