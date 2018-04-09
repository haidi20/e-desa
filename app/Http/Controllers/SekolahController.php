<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hasil;
use App\Models\Kinerja;
use App\Models\Kreteria;
use App\Models\Peringkat;
use App\Models\Alternatif;
use App\Models\Normalisasi;

use App\Supports\Logika;

class SekolahController extends Controller
{

    public function __construct(Logika $logika){
      $this->logika = $logika;
    }

    public function index(){
      $kreteria   = Kreteria::orderBy('kode')->get();
      $sekolah    = Hasil::berdasarkanAlternatif()->get();
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
      $hasilFind = Hasil::where('alternatif_id',$id)->get();

      if (count($hasilFind)) {
        session()->flashInput($hasilFind->toArray());
        $action = Route('sekolah.update',$id);
        $method = "PUT";
      }else{
        $action = Route('sekolah.store');
        $method = "POST";
      }

      $alternatif     = Alternatif::all();
      $alternatif_id  = $id;
      $kreteria       = Kreteria::orderBy('kode')->get();
      $hasil          = Hasil::kreteriaAlternatif($id)->get();
      $nilai          = $this->logika->inputan($id);

      return view('sekolah.form',compact(
        'action','method','alternatif','hasil','kreteria','nilai','alternatif_id'
      ));
    }

    public function store(){
      return $this->save();
    }

    public function update($id){
      return $this->save($id);
    }

    public function save($id = null){
      $hasil = [];

      $array = request('nilai');

      // input data ke table hasil
      foreach ($array as $index => $item) {
        $nilai = $item;
        $kreteria_id = $index;
        $alternatif_id = request('alternatif');

        $hasil = Hasil::FirstOrCreate(compact('alternatif_id','kreteria_id'));
        $hasil->nilai = $nilai;
        $hasil->jenis = 'analisa';
        $hasil->save();
      }

      // return $hasil;

      return redirect()->route('input.normalisasi');
    }

    public function destroy($id){
      $hasil = Hasil::where('alternatif_id',$id);
      $hasil->delete();
      $normalisasi = Normalisasi::where('alternatif_id',$id);
      $normalisasi->delete();

      return redirect()->back();
    }
}
