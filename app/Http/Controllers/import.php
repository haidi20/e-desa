<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use DB;
use Excel;

class import extends Controller {

  public function hapus(){
    //delete
    DB::table('kategori')->delete();
    DB::table('kecamatan')->delete();
    DB::table('pendidikan')->delete();

    //truncate
    DB::table('kategori')->truncate();
    DB::table('kecamatan')->truncate();
    DB::table('pendidikan')->truncate();
  }

  public function run(){
    $kecamatan      = storage_path('file/kecamatan.xlsx');
    $kategori       = storage_path('file/kategori.xlsx');

    $dataKecamatan  = Excel::load($kecamatan)->get();
    $dataKategori   = Excel::load($kategori)->get();

    $inputKecamatan = [];
    $inputKategori  = [];

    foreach ($dataKecamatan as $index => $item) {
      $inputKecamatan[] = array('nama' => $item->nama);
    }
    foreach ($dataKategori as $index => $item) {
      $inputKategori[] = array( 'nama' => $item->nama);
    }

    $hapus = $this->hapus();

    $masukKecamatan   = DB::table('kecamatan')->insert($inputKecamatan);
    $masukKategori    = DB::table('kategori')->insert($inputKategori);
    $masukPendidikan  = DB::table('pendidikan')->insert([
      ['nama' => 'Sekolah Dasar'],
      ['nama' => 'Sekolah Menengah Pertama']
    ]);

    if ($masukKecamatan && $masukKategori && $masukPendidikan) {
      return 'berhasil 3 table';
    }else{
      return 'gagal 3 table';
    }
  }
}
