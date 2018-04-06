<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    public function index(){
      session()->put('aktif','alternatif');
      return view('alternatif.index');
    }
}
