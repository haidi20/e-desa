<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use DB;
use Excel;

class import extends Controller {

  public function run(){
    $kecamatan      = storage_path('file/kecamatan.xlsx');
    $kategori       = storage_path('file/kategori.xlsx');

    $dataKecamatan  = Excel::load($kecamatan)->get();
    $dataKategori   = Excel::load($kategori)->get();

    $inputKecamatan = [];
    $inputKategori  = [];

    foreach ($dataKecamatan as $index => $item) {
      $inputKecamatan[] = array('id'=> $index,'nama' => $item->nama);
    }
    foreach ($dataKategori as $index => $item) {
      $inputKategori[] = array('id' => $index, 'nama' => $item->nama);
    }

    $masukKecamatan   = DB::table('kecamatan')->insert($inputKecamatan);
    $masukKategori    = DB::table('kategori')->insert($inputKategori);
    $masukPendidikan  = DB::table('pendidikan')->insert([
      ['id' => 1,'nama' => 'Sekolah Dasar'],
      ['id' => 2,'nama' => 'Sekolah Menengah Pertama']
    ]);

    if ($masukKecamatan && $masukKategori && $masukPendidikan) {
      return 'berhasil 3 table';
    }else{
      return 'gagal 3 table';
    }
  }
}
