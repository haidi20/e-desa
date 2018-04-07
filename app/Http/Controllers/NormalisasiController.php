<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NormalisasiController extends Controller
{
    public function index(){
      session()->put('aktif','normalisasi');
      session()->put('aktiff','');
      return view('normalisasi.index');
    }
}
