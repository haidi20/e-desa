<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KartuKeluargaController extends Controller
{
    public function index()
    {
    	return view('kartukeluarga.index');
    }

    public function create()
    {
    	return view('kartukeluarga.form');
    }
}
