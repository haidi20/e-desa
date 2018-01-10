<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KuisionerController extends Controller
{
    public function index(){
      return view('kuisioner.index');
    }

    public function store(){
      return 'kuisioner store';
    }
}
