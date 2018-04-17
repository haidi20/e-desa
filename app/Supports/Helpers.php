<?php

if ( ! function_exists('proses_pengurutan') )
{
  function proses_pengurutan($x){
    for ($i=0; $i < count($x) ; $i++) {
      for ($j=0; $j < count($x) ; $j++) {
        if ($x[$i]['nilai'] > $x[$j]['nilai']) {
          $temp['nilai'] = $x[$i]['nilai'];
          $x[$i]['nilai'] = $x[$j]['nilai'];
          $x[$j]['nilai'] = $temp['nilai'];

          $temp['alternatif'] = $x[$i]['alternatif'];
          $x[$i]['alternatif'] = $x[$j]['alternatif'];
          $x[$j]['alternatif'] = $temp['alternatif'];
        }
        $x[$i] = [
          'nilai'=>$x[$i]['nilai'],
          'alternatif'=> $x[$i]['alternatif'],
          'peringkat' => $i + 1
        ];
      }
    }

    return $x ;
  }
}

if ( ! function_exists('proses_pengalian_bobot') )
{
    function proses_pengalian_bobot($bobot,$nilai){
      $hasill = [];

      foreach ($nilai as $key => $value) {
        if ($nilai[$key]['nilai'] == 0 || $nilai[$key]['nilai'] == null) {
          $hasil = 0;
          $hasill[] = [
            'alternatif'  => $nilai[$key]['alternatif_id'],
            'kreteria'    => $nilai[$key]['kreteria_id'],
            'nilai'       => number_format($hasil,4)
          ];
        }else{
          $hasil = $nilai[$key]['nilai'] * $bobot;
          $hasill[] = [
            'alternatif'  => $nilai[$key]['alternatif_id'],
            'kreteria'    => $nilai[$key]['kreteria_id'],
            'nilai'       => number_format($hasil,4)
          ];
        }
      }

      return $hasill ;
    }
}

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
          if ($nilai != 0 || $nilai != null) {
            $hasill[$alternatif] = [
              'kreteria' => $kreteriaHasil,
              'alternatif' => $alternatif,
              'nilai' => number_format($nilai / $maksimal,4)
            ] ;
          }else{
            $hasill[$alternatif] = [
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

      return $hasil ;
      // return max($hasil) ;
    }
}
