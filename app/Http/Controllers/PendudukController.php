<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
    	return view('penduduk.index');
    }

    public function create()
    {
    	return view('penduduk.form');
    }
}
