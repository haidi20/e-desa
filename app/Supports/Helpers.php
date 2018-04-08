<?php

// namespace App\Supports\Helpers ;

if ( ! function_exists('nilai_maksimal') )
{
    function nilai_maksimal($nilai){
      $array = [];

      foreach ($nilai as $index => $item) {
        $array[] = $item->nilai ;
      }

      return max($array) ;
    }
}
