<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hasil;
use App\Models\Kreteria;
use App\Models\Alternatif;

use App\Supports\Logika;

class SekolahController extends Controller
{

    public function __construct(Logika $logika){
      $this->logika = $logika;
    }

    public function index(){
      $kreteria   = Kreteria::orderBy('kode')->get();
      $sekolah    = Hasil::orderBy('alternatif_id')->groupBy('alternatif_id')->get();
      $nilai      = $this->logika->sekolah() ;

      session()->put('aktif','sekolah');
      session()->put('aktiff','dasar');

      return view('sekolah.index',compact('nilai','kreteria','sekolah'));
    }

    public function create(){
      return $this->form();
    }

    public function edit($id){
      return $this->form($id);
    }

    public function form($id = null){
      $hasilFind = Hasil::find($id);

      if ($hasilFind) {
        session()->flashInput($hasilFind->toArray());
        $action = Route('sekolah.update',$id);
        $method = "PUT";
      }else{
        $action = Route('sekolah.store');
        $method = "POST";
      }

      $alternatif = Alternatif::all();
      $kreteria = Kreteria::all();

      return view('sekolah.form',compact('action','method','alternatif','kreteria'));
    }

    public function store(){
      return $this->save();
    }

    public function update($id){
      return $this->save($id);
    }

    public function save($id = null){
      if ($id) {
        $hasil = Hasil::find($id);
      }else{
        $hasil = new Hasil;
      }

      $hasil->alternatif_id = request('alternatif');
      $hasil->kreteria_id = request('kreteria');
      $hasil->jenis = 'analisa';
      $hasil->nilai = request('nilai');
      $hasil->save();

      return redirect()->route('sekolah.index');
    }

    public function destroy($id){
      $hasil = Hasil::find($id);
      $hasil->delete();

      return redirect()->back();
    }
}
