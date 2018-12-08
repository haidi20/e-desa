<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index()
    {
    	return view('surat.index');
    }

    public function create()
    {
    	return view('surat.form');
    }
}
