<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KunciController extends Controller
{
    public function index(){
      return view('kunci.index');
    }

    public function detail(){
      return view('kunci.detail');
    }

    public function simpan(){
      return 'bisa simpan';
    }
}
