<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KunciController extends Controller
{
    public function index(){
      return view('admin.kunci.index');
    }
}
