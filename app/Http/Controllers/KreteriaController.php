<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KreteriaController extends Controller
{
    public function index(){
      session()->put('aktif','kreteria');
      return view('kreteria.index');
    }
}
