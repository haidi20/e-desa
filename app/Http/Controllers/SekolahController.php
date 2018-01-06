<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SekolahController extends Controller
{
    public function index(){
      return view('admin.sekolah.index');
    }

    public function create(){
      return $this->form();
    }

    public function edit($id){
      return $this->form($id);
    }

    public function form($id = null){
      return view('admin.sekolah.form');
    }
}
