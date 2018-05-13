<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Peringkat;

use App\Supports\Topsis;

// metode SAW 
class KinerjaController extends Controller
{
    public function index(){
      session()->put('aktif','kinerja');
      session()->put('aktiff','');

      $kinerja = Peringkat::orderBy('alternatif_id')->where('jenis','saw')->get();

      return view('kinerja.index',compact('kinerja'));
    }
}
