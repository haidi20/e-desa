<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index(){
      return view('admin.pengguna.index');
    }
}
