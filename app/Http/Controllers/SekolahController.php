<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Sekolah;

class SekolahController extends Controller
{
    public function baca(){
      return Sekolah::kondisi()->get();
    }

    public function index(){
      $sekolah = Sekolah::kondisi()->paginate(10);

      return view('sekolah.index',compact('sekolah'));
    }

    public function create(){
      return $this->form();
    }

    public function edit($id){
      return $this->form($id);
    }

    public function form($id = null){
      return view('sekolah.form');
    }
}
