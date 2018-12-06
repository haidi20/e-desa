<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function create()
    {
    	return $this->form();
    }

    public function form($id=null)
    {
    	return view('pengguna.form-biodata');
    }
}
