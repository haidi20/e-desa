<?php

// namespace App\Supports\Helpers ;

use App\Models\Hasil ;

if ( ! function_exists('proses_normalisasi') )
{
  function proses_normalisasi($maks,$nilai){
    return $nilai;
  }
}

if ( ! function_exists('nilai_maksimal') )
{
    function nilai_maksimal($nilai){
      $hasil = [];

      foreach ($nilai as $index => $item) {
        $hasil[] = $item ;
      }

      return max($hasil);
    }
}
