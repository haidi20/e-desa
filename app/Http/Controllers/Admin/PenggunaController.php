<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenggunaController extends Controller
{
    public function reset(){
      return view('admin.pengguna.reset');
    }

    public function konfirmasi(){
      return view('admin.pengguna.konfirmasi');
    }

    public function index(){
      return view('admin.pengguna.index');
    }

    public function create(){
      return view('admin.pengguna.form');
    }
}
