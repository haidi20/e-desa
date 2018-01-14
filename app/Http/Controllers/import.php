<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use DB;
use Excel;

class import extends Controller {

  public function run(){
    $path = storage_path('file/kecamatan.xlsx');
    $data = Excel::load($path)->get();
    $input = [];
    foreach ($data as $index => $item) {
      $input[] = array('id'=> $index,'nama' => $item->nama);
    }

    $inputt = DB::table('kecamatan')->insert($input);
    echo $inputt?'berhasil':'gagal';
  }
}
