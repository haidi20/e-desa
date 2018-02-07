<?php

namespace App\Supports;

class Rumus
{
  public function DuaSatu($jawSatu,$jawDua){
      if ($jawSatu != 0 && $jawDua != 0) {
          $rumus = ($jawDua / $jawSatu) * 100 ;
      }else{
          $rumus = 0;
      }

      return kondisi_sekolah($rumus,$jawSatu,$jawDua);
  }

  public function DuaDua($jawSatu, $jawDua){
      return $jawDua / $jawSatu;
  }

  public function LimaDua($jawSatu){
      return  $jawSatu >= 6 ? 1: 0 ;
  }

  public function TujuhSatu($jawSatu){
      return $jawSatu >= 2 ? 1: 0 ;
  }

  public function TujuhDua($jawSatu){
      return $jawSatu >= 2 ? 1: 0 ;
  }

  public function Sepuluh($jawSatu,$jawDua){
      if ($jawSatu == 1 && $jawDua == 1) {
          return 1;
      }else{
          return 0;
      }
  }

  public function empatBelas($jawSatu,$jawDua){
      $perkalian = $jawSatu * $jawDua ;
      if ($perkalian >= 3) {
          return 1;
      }else{
          return 0;
      }
  }

  public function limaBelas($data){
      /*CATATAN
      /r = rumus
      /s = semua
      /j = jumlah
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
          $a_buku     [$index]  = kondisi_sekolah($r_buku[$index]);
      }

      return $a_buku;


      //
      // return array_sum($s_buku) == 6?1:0;


  }

  public function tujuhBelas($data){
      $jawSatu      = $data[0] >= 1 ?1:0;
      $jawDua       = $data[1] >= 1 ?1:0;
      $jawTiga      = $data[2] >= 1 ?1:0;
      $jawEmpat     = $data[3] >= 1 ?1:0;
      $jawLima      = $data[4] >= 1 ?1:0;
      $jawEnam      = $data[5] >= 1 ?1:0;

      if ($jawSatu == 1 && $jawDua == 1 && $jawTiga == 1 && $jawEmpat == 1 && $jawLima == 1 && $jawEnam == 1){
          return 1;
      }else{
          return 0;
      }
  }

  public function delapanBelas($jawSatu, $jawDua){
      if ($jawSatu >= 100 && $jawDua >= 10) {
          return 1;
      }else{
          return 0;
      }
  }

  public function sembilanBelas($jawSatu, $jawDua){
      if ($jawSatu == $jawDua) {
          return 1;
      }else{
          if ($jawDua > $jawSatu) {
              return 0;
          }else{
              return 1;
          } // belum fiks
      }
  }

  public function duaPuluh($data){
      if ($data[0] >= 18 && $data[1] >= 18 && $data[2] >= 24 && $data[3] >= 27 && $data[4] >= 27 && $data[5] >= 27) {
          return 1;
      }else{
          return 0;
      }
  }

  public function duaPuluhSatu($jawSatu){
      return $jawSatu == 1 ?1:0;
  }

}

// $bukuSatu = $data[0] + $data[6] + $data[12] +
//             $data[18]+ $data[24];
// $bukuDua  = $data[1] + $data[7] + $data[13] +
//             $data[19]+ $data[25];
// $bukuTiga = $data[2] + $data[8] + $data[14] +
//             $data[20]+ $data[26];
// $bukuEmpat= $data[3] + $data[9] + $data[15] +
//             $data[21]+ $data[27];
// $bukuLima = $data[4] + $data[10] + $data[16] +
//             $data[22]+ $data[28];
// $bukuEnam = $data[5] + $data[11] + $data[17] +
//             $data[23]+ $data[29];
//
// $r_bukuSatu   = $bukuSatu >= (10 * 5)? 1: 0;
// $r_bukuDua    = $bukuDua  >= (10 * 5)? 1: 0;
// $r_bukuTiga   = $bukuTiga >= (10 * 5)? 1: 0;
// $r_bukuEmpat  = $bukuEmpat>= (10 * 5)? 1: 0;
// $r_bukuLima   = $bukuLima >= (10 * 5)? 1: 0;
// $r_bukuEnam   = $bukuEnam >= (10 * 5)? 1: 0;
//
// $s_buku       = array($r_bukuSatu,$r_bukuDua,$r_bukuTiga,$r_bukuEmpat,$r_bukuLima,$r_bukuEnam);
//
// return array_sum($s_buku) == 6?1:0;
