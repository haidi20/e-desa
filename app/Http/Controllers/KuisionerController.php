<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KuisionerController extends Controller
{
    public function index(){
      return view('admin.kuisioner.index');
    }
}
