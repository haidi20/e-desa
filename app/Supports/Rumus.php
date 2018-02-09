<?php

namespace App\Supports;

class Rumus
{

  public function duaSatu($jawSatu,$jawDua){
      if ($jawSatu != 0 && $jawDua != 0) {
          $rumus = ($jawDua / $jawSatu) * 100 ;
      }else{
          $rumus = 0;
      }

      return kondisi_sekolah($rumus);
  }

  public function duaDua($jawSatu, $jawDua){
      if ($jawSatu != 0 && $jawDua != 0) {
          $rumus = ($jawDua / $jawSatu) * 100 ;
      }else{
          $rumus = 0;
      }

      return kondisi_sekolah($rumus);
  }

  public function empat($jawSatu){
      if ($jawSatu != 0) {
          $rumus = $jawSatu == 1?100:0;
      }else{
          $rumus = 0;
      }

      return kondisi_sekolah($rumus);
  }

  public function limaSatu($jawSatu){
      if ($jawSatu != 0) {
          $rumus = $jawSatu == 1?100:0;
      }else{
          $rumus = 0 ;
      }

      return kondisi_sekolah($rumus);
  }

  public function limaDua($jawSatu){
      if ($jawSatu != 0) {
          $rumus = $jawSatu >= 6?100:0;
      }else{
          $rumus = 0 ;
      }

      return kondisi_sekolah($rumus);
  }

  public function tujuhSatu($jawSatu){
      if ($jawSatu != 0) {
          $rumus = $jawSatu >= 2?100:0;
      }else{
          $rumus = 0 ;
      }

      return kondisi_sekolah($rumus);
  }

  public function tujuhDua($jawSatu){
      if ($jawSatu != 0) {
          $rumus = $jawSatu >= 2?100:0;
      }else{
          $rumus = 0 ;
      }

      return kondisi_sekolah($rumus);
  }

  public function sepuluh($jawSatu,$jawDua){
      if ($jawSatu == 1 && $jawDua == 1) {
          $rumus = 100;
      }else{
          $rumus = 0;
      }

      return kondisi_sekolah($rumus);
  }

  public function empatBelas($jawSatu,$jawDua){
      if ($jawSatu != 0 && $jawDua != 0) {
          $perkalian = $jawSatu * $jawDua;
          if ($perkalian >= 3) {
                $rumus = 100;
          }else{
                $rumus = 0;
          }
      }else{
          $rumus = 0 ;
      }

      return kondisi_sekolah($rumus);
  }

  public function limaBelas($data){
      /*CATATAN
      /r = rumus
      /s = semua
      /j = jumlah
      /h = hasil akhir
      */

      foreach ($data as $index => $item) {
          $bukuSatu[$index]   = $data[$index][1] + $data[$index][7] + $data[$index][13] +
                      $data[$index][19]+ $data[$index][25];
          $bukuDua[$index]    = $data[$index][2] + $data[$index][8] + $data[$index][14] +
                      $data[$index][20]+ $data[$index][26];
          $bukuTiga[$index]   = $data[$index][3] + $data[$index][9] + $data[$index][15] +
                      $data[$index][21]+ $data[$index][27];
          $bukuEmpat[$index]  = $data[$index][4] + $data[$index][10] + $data[$index][16] +
                      $data[$index][22]+ $data[$index][28];
          $bukuLima[$index]   = $data[$index][5] + $data[$index][11] + $data[$index][17] +
                      $data[$index][23]+ $data[$index][29];
          $bukuEnam[$index]   = $data[$index][6] + $data[$index][12] + $data[$index][18] +
                      $data[$index][24]+ $data[$index][30];

          $r_bukuSatu [$index]  = $bukuSatu [$index]>= (10 * 5)? 1: 0;
          $r_bukuDua  [$index]  = $bukuDua  [$index]>= (10 * 5)? 1: 0;
          $r_bukuTiga [$index]  = $bukuTiga [$index]>= (10 * 5)? 1: 0;
          $r_bukuEmpat[$index]  = $bukuEmpat[$index]>= (10 * 5)? 1: 0;
          $r_bukuLima [$index]  = $bukuLima [$index]>= (10 * 5)? 1: 0;
          $r_bukuEnam [$index]  = $bukuEnam [$index]>= (10 * 5)? 1: 0;

          $j_buku     [$index]  = $r_bukuSatu [$index] + $r_bukuDua  [$index] + $r_bukuTiga [$index] +
                                  $r_bukuEmpat[$index] + $r_bukuLima [$index] + $r_bukuEnam [$index] ;

          $r_buku     [$index]  = ($j_buku[$index] / 6) * 100;
          $h_buku     [$index]  = kondisi_sekolah($r_buku[$index]);
      }

      return $h_buku;
  }

  public function tujuhBelas($data){
      foreach ($data as $index => $item) {
          $jawSatu[$index]     = $data[$index][1] >= 1 ?1:0;
          $jawDua[$index]      = $data[$index][2] >= 1 ?1:0;
          $jawTiga[$index]     = $data[$index][3] >= 1 ?1:0;
          $jawEmpat[$index]    = $data[$index][4] >= 1 ?1:0;
          $jawLima[$index]     = $data[$index][5] >= 1 ?1:0;
          $jawEnam[$index]     = $data[$index][6] >= 1 ?1:0;

          if ($jawSatu[$index] == 1 && $jawDua[$index] == 1 && $jawTiga[$index] == 1 && $jawEmpat[$index] == 1 && $jawLima[$index] == 1 && $jawEnam[$index] == 1){
              $rumus[$index] = 100;
          }else{
              $rumus[$index] = 0;
          }

          $hasil[$index] = kondisi_sekolah($rumus[$index]);
      }

      return $hasil ;
  }

  public function delapanBelas($jawSatu, $jawDua){
      if ($jawSatu >= 100 && $jawDua >= 10) {
          $rumus = 100;
      }else{
          $rumus = 0;
      }

      return kondisi_sekolah($rumus);
  }

  public function sembilanBelas($jawSatu, $jawDua){
      if ($jawSatu != 0 && $jawDua != 0) {
          if ($jawSatu == $jawDua) {
              $rumus = 100;
          }else{
              $rumus = 0;
          }
      }else{
          $rumus = 0;
      }

      return kondisi_sekolah($rumus);
  }

  public function duaPuluh($data){
      foreach ($data as $index => $item) {
          if ($data[$index][1] >= 18 && $data[$index][2] >= 18 && $data[$index][3] >= 24 &&
              $data[$index][4] >= 27 && $data[$index][5] >= 27 && $data[$index][6] >= 27) {
              $rumus[$index] = 100;
          }else{
              $rumus[$index] = 0;
          }

          $hasil[$index] = kondisi_sekolah($rumus[$index]);
      }

      return $hasil;
  }

  public function duaPuluhSatu($jawSatu){
      $rumus = $jawSatu == 1 ?1:0;

      return kondisi_sekolah($rumus);
  }

}
