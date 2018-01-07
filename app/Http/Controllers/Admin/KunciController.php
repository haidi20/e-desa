<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KunciController extends Controller
{
    public function index(){
      return view('admin.kunci.index');
    }

    public function detail(){
      return view('admin.kunci.detail');
    }

    public function simpan(){
      return 'bisa simpan';
    }
}
