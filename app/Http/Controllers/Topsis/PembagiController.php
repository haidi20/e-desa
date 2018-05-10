<?php

namespace App\Http\Controllers\Topsis;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Kreteria;

use App\Supports\Topsis;

class PembagiController extends Controller
{
    public function __construct(Topsis $topsis){
      return $this->topsis = $topsis;
    }

    public function index(){
      session()->put('aktif','pembagi');
      session()->put('aktiff','');

      $kreteria = Kreteria::all();
      $pembagi  = $this->topsis->pembagiProses();

      return view('pembagi.index',compact('kreteria','pembagi'));
    }
}
