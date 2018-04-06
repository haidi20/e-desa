<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalisaController extends Controller
{
    public function index(){
      session()->put('aktif','analisa');
      return view('analisa.index');
    }
}
