<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use DB;
use Excel;

class import extends Controller {

  public function run(){

    //delete
    DB::table('sekolah')->delete();
    DB::table('kategori')->delete();
    DB::table('penyedia')->delete();
    DB::table('kecamatan')->delete();
    DB::table('pendidikan')->delete();
    DB::table('pertanyaan')->delete();
    DB::table('keterangan')->delete();
    //end delete

    //truncate
    DB::table('sekolah')->truncate();
    DB::table('kategori')->truncate();
    DB::table('penyedia')->truncate();
    DB::table('kecamatan')->truncate();
    DB::table('pendidikan')->truncate();
    DB::table('pertanyaan')->truncate();
    DB::table('keterangan')->truncate();
    //end truncate

    //baca file
    $sekolah        = storage_path('file/sekolah.xlsx');
    $kategori       = storage_path('file/kategori.xlsx');
    $penyedia       = storage_path('file/penyedia.xlsx');
    $kecamatan      = storage_path('file/kecamatan.xlsx');
    $pendidikan     = storage_path('file/pendidikan.xlsx');
    $pertanyaan     = storage_path('file/pertanyaan.xlsx');
    $keterangan     = storage_path('file/keterangan.xlsx');

    $dataketerangan = [];

    $datasekolah    = Excel::load($sekolah)->get();
    $datakategori   = Excel::load($kategori)->get();
    $datapenyedia   = Excel::load($penyedia)->get();
    $datakecamatan  = Excel::load($kecamatan)->get();
    $datapendidikan = Excel::load($pendidikan)->get();
    $dataketerangan = Excel::load($keterangan)->get();
    $datapertanyaan = Excel::load($pertanyaan)->get();
    //end baca file

    //proses file
    $inputsekolah     = [];
    $inputkategori    = [];
    $inputkecamatan   = [];
    $inputpendidikan  = [];
    $inputpertanyaan  = [];
    $inputketerangan  = [];
    $inputpenyedia    = [];

    foreach ($datasekolah as $index => $item) {
      $inputsekolah[]     = array('nama' => $item->nama,
                                'pendidikan_id' => $item->pendidikan_id,
                                'kecamatan_id' => $item->kecamatan_id,
                                'user_id' => $item->user_id);
    }
    foreach ($datakategori as $index => $item) {
      $inputkategori[]    = array( 'nama' => $item->nama);
    }
    foreach ($datakecamatan as $index => $item) {
      $inputkecamatan[]   = array('nama' => $item->nama);
    }
    foreach ($datapendidikan as $index => $item) {
      $inputpendidikan[]  = array('nama' => $item->nama);
    }
    foreach ($datapertanyaan as $index => $item) {
      $inputpertanyaan[]  = array('ip' => $item->ip,
                                  'kode_ip' => $item->kode_ip,
                                  'keterangan_id' => $item->keterangan_id,
                                  'pilihan' => $item->pilihan,
                                  'tanya' => $item->tanya,
                                  'penyedia_id' => $item->penyedia_id,
                                  'pendidikan_id' => $item->pendidikan_id,
                                  'kategori_id' => $item->kategori_id,
                                  'sekolah_id' => $item->sekolah_id,
                                  'satuan' => $item->satuan);
    }
    foreach ($dataketerangan as $index => $item) {
      $inputketerangan[]    = array('nama' => $item->nama);
    }
    foreach ($datapenyedia as $index => $item) {
      $inputpenyedia[]      = array('nama' => $item->nama);
    }
    //end proses file

    $masuksekolah      = DB::table('sekolah')->insert($inputsekolah);
    $masukkategori     = DB::table('kategori')->insert($inputkategori);
    $masukpenyedia     = DB::table('penyedia')->insert($inputpenyedia);
    $masukkecamatan    = DB::table('kecamatan')->insert($inputkecamatan);
    $masukpendidikan   = DB::table('pendidikan')->insert($inputpendidikan);
    $masukketerangan   = DB::table('keterangan')->insert($inputketerangan);
    $masukpertanyaan   = DB::table('pertanyaan')->insert($inputpertanyaan);

    // if ($masukKecamatan && $masukKategori && $masukPendidikan && $masuksekolah && $masukpertanyaan && $masukketerangan ) {
    //   return 'berhasil 3 table';
    // }else{
    //   return 'gagal 3 table';
    // }
  }
}
