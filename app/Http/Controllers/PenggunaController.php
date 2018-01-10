<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenggunaController extends Controller
{
    public function reset(){
      return view('pengguna.reset');
    }

    public function konfirmasi(){
      return view('pengguna.konfirmasi');
    }

    public function index(){
      return view('pengguna.index');
    }

    public function create(){
      return view('pengguna.form');
    }
}
