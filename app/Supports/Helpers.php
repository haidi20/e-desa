<?php

// namespace App\Supports\Helpers ;

use App\Models\Hasil ;

if ( ! function_exists('proses_normalisasi') )
{
  function proses_normalisasi($maks,$hasil){
    $hasill = [];

    foreach ($hasil as $index => $item) {
      $nilai = $hasil[$index]['nilai'] ;
      $alternatif = $hasil[$index]['alternatif_id'];
      $kreteriaHasil = $hasil[$index]['kreteria_id'] ;

      foreach ($maks as $key => $value) {
        $maksimal = $value['nilai'] ;
        $kreteriaMaks = $value['kreteria'];

        if ($kreteriaHasil == $kreteriaMaks) {
          if ($nilai != 0) {
            $hasill[] = [
              'kreteria' => $kreteriaHasil,
              'alternatif' => $alternatif,
              'nilai' => number_format($nilai / $maksimal,4)
            ] ;
          }else{
            $hasill[] = [
              'kreteria' => $kreteriaHasil,
              'alternatif' => $alternatif,
              'nilai' => 0
            ] ;
          }
        }
      }
    }



    return $hasill ;
  }
}

if ( ! function_exists('nilai_maksimal') )
{
    function nilai_maksimal($nilai){
      $hasil = [];

      foreach ($nilai as $index => $item) {
        if ($item->nilai != 0) {
          $hasil[] = $item->nilai ;
        }else{
          $hasil[] =0;
        }
      }

      return max($hasil) ;
    }
}
