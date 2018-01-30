<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use DB;
use Excel;

class import extends Controller {

  public function run(){

    //delete
    DB::table('sekolah')->delete();
    DB::table('jawaban')->delete();
    DB::table('kategori')->delete();
    DB::table('penyedia')->delete();
    DB::table('kecamatan')->delete();
    DB::table('pendidikan')->delete();
    DB::table('pertanyaan')->delete();
    //end delete

    //truncate
    DB::table('sekolah')->truncate();
    DB::table('jawaban')->truncate();
    DB::table('kategori')->truncate();
    DB::table('penyedia')->truncate();
    DB::table('kecamatan')->truncate();
    DB::table('pendidikan')->truncate();
    DB::table('pertanyaan')->truncate();
    //end truncate

    //baca file
    $sekolah        = storage_path('file/sekolah.xlsx');
    $jawaban        = storage_path('file/jawaban.xlsx');
    $kategori       = storage_path('file/kategori.xlsx');
    $penyedia       = storage_path('file/penyedia.xlsx');
    $kecamatan      = storage_path('file/kecamatan.xlsx');
    $pendidikan     = storage_path('file/pendidikan.xlsx');
    $pertanyaan     = storage_path('file/pertanyaan.xlsx');

    $datasekolah    = Excel::load($sekolah)->get();
    $datajawaban    = Excel::load($jawaban)->get();
    $datakategori   = Excel::load($kategori)->get();
    $datapenyedia   = Excel::load($penyedia)->get();
    $datakecamatan  = Excel::load($kecamatan)->get();
    $datapendidikan = Excel::load($pendidikan)->get();
    $datapertanyaan = Excel::load($pertanyaan)->get();
    //end baca file

    //proses file
    $inputsekolah     = [];
    $inputjawaban     = [];
    $inputkategori    = [];
    $inputkecamatan   = [];
    $inputpendidikan  = [];
    $inputpertanyaan  = [];
    $inputketerangan  = [];
    $inputpenyedia    = [];

    foreach ($datasekolah as $index => $item) {
      $inputsekolah[]     = array(
                                'nama' => $item->nama,
                                'pendidikan_id' => $item->pendidikan_id,
                                'kecamatan_id' => $item->kecamatan_id,
                                'user_id' => $item->user_id
                            );
    }
    foreach ($datajawaban as $index => $item) {
      $inputjawaban[]     = array(
                                'isi' => $item->isi,
                                'sekolah_id' => $item->sekolah_id,
                                'pertanyaan_id'=> $item->pertanyaan_id,
                                'tanggal' => $item->tanggal
                            );
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
                                  'keterangan' => $item->keterangan,
                                  'pilihan' => $item->pilihan,
                                  'tanya' => $item->tanya,
                                  'penyedia_id' => $item->penyedia_id,
                                  'pendidikan_id' => $item->pendidikan_id,
                                  'kategori_id' => $item->kategori_id,
                                  'satuan' => $item->satuan);
    }
    foreach ($datapenyedia as $index => $item) {
      $inputpenyedia[]      = array('nama' => $item->nama);
    }
    //end proses file

    $masuksekolah      = DB::table('sekolah')->insert($inputsekolah);
    $masukjawaban      = DB::table('jawaban')->insert($inputjawaban);
    $masukkategori     = DB::table('kategori')->insert($inputkategori);
    $masukpenyedia     = DB::table('penyedia')->insert($inputpenyedia);
    $masukkecamatan    = DB::table('kecamatan')->insert($inputkecamatan);
    $masukpendidikan   = DB::table('pendidikan')->insert($inputpendidikan);
    $masukpertanyaan   = DB::table('pertanyaan')->insert($inputpertanyaan);

    // if ($masukKecamatan && $masukKategori && $masukPendidikan && $masuksekolah && $masukpertanyaan && $masukketerangan ) {
    //   return 'berhasil 3 table';
    // }else{
    //   return 'gagal 3 table';
    // }
  }
}
