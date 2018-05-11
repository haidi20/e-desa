<?php

// mulai perhitungan untuk topsis
if ( ! function_exists('proses_normalisasi_topsis') )
{
  function proses_normalisasi_topsis($pembagi,$hasil){
    $data = [];

    foreach ($pembagi as $key => $value) {
      foreach ($hasil as $index => $item) {
        if ($item->kreteria_id == $key) {
          if ($item->nilai != 0) {
            $nilai = number_format($item->nilai / $value,5);
          }else{
            $nilai = 0;
          }
          $data[] = [
            'alternatif' => $item->alternatif_id,
            'kreteria'   => $item->kreteria_id,
            'nilai'         => $nilai
          ];
        }
      }
    }

    return $data;
  }
}

if ( ! function_exists('proses_pangkat') )
{
  function proses_pangkat($nilai){
    foreach ($nilai as $index => $item) {
      $nilaii[] = pow($item->nilai,2);
    }

    return $nilaii ;
  }
}
// akhir perhitungan untuk topsis

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
        }else{
          $hasil = $nilai[$key]['nilai'] * $bobot;
        }
        $hasill[] = [
          'alternatif'  => $nilai[$key]['alternatif_id'],
          'kreteria'    => $nilai[$key]['kreteria_id'],
          'nilai'       => number_format($hasil,4)
        ];
      }

      return $hasill ;
    }
}

if ( ! function_exists('proses_normalisasi') )
{
  function proses_normalisasi($maks,$hasil){
    $hasill = [];

    foreach ($hasil as $index => $item) {
      $nilai = number_format($hasil[$index]['nilai'],4) ;
      $alternatif = $hasil[$index]['alternatif_id'];
      $kreteriaHasil = $hasil[$index]['kreteria_id'] ;

      foreach ($maks as $key => $value) {
        $maksimal = $value['nilai'] ;
        $kreteriaMaks = $value['kreteria'];

        if ($kreteriaHasil == $kreteriaMaks) {
          if ($nilai != 0 || $nilai != null) {
            $nilai = $nilai / $maksimal ;
          }else{
            $nilai = 0;
          }
          $hasill[$alternatif] = [
            'kreteria' => $kreteriaHasil,
            'alternatif' => $alternatif,
            'nilai' => number_format($nilai,4)
          ] ;
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
