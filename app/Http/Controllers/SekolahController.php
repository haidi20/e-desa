<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use session ;

class SekolahController extends Controller
{
    public function index(){
      session()->put('aktif','sekolah') ;
      return view('sekolah.index');
    }
}
