<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DusunController extends Controller
{
    public function index()
    {
    	return view('dusun.index');
    }

    public function create()
    {
    	return view('dusun.form');
    }
}
