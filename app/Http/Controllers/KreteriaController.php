<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kreteria;

class KreteriaController extends Controller
{
    public function index(){
      $kreteria = Kreteria::orderBy('kode')->get();

      session()->put('aktif','kreteria');

      return view('kreteria.index',compact('kreteria'));
    }

    public function create(){
      return $this->form();
    }

    public function edit($id){
      return $this->form($id);
    }

    public function form($id = null){
      $kreteriaFind = Kreteria::find($id);

      if ($kreteriaFind) {
        session()->flashInput($kreteriaFind->toArray());
        $action = route('kreteria.update',$id);
        $method = 'PUT';
      }else{
        $action = route('kreteria.store');
        $method = 'POST';
      }

      return view('kreteria.form',compact('action','method'));
    }

    public function store(){
      return $this->save();
    }

    public function update($id){
      return $this->save($id);
    }

    public function save($id = null){
      if ($id) {
        $kreteria = Kreteria::find($id);
      }else{
        $kreteria = new Kreteria;
      }

      $kreteria->kode = request('kode');
      $kreteria->nama = request('nama');
      $kreteria->attribute = request('attribute');
      $kreteria->bobot = request('bobot');
      $kreteria->save();

      return redirect()->route('kreteria.index');
    }

    public function destroy($id){
      $kreteria = Kreteria::find($id);
      $kreteria->delete();

      return redirect()->back();
    }
}
