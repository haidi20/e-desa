<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KematianController extends Controller
{
    public function index()
    {
    	return view('kematian.index');
    }

    public function create()
    {
    	return view('kematian.form');
    }
}
