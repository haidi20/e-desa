<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelahiranController extends Controller
{
    public function index()
    {
    	return view('kelahiran.index');
    }

    public function create()
    {
    	return view('kelahiran.form');
    }
}
