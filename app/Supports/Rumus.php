<?php

namespace App\Supports;

class Rumus
{

  public function DuaSatu($jawSatu,$jawDua){
      return $jawDua / $jawSatu;
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
      */

      $bukuSatu = $data[0] + $data[6] + $data[12] +
                  $data[18]+ $data[24];
      $bukuDua  = $data[1] + $data[7] + $data[13] +
                  $data[19]+ $data[25];
      $bukuTiga = $data[2] + $data[8] + $data[14] +
                  $data[20]+ $data[26];
      $bukuEmpat= $data[3] + $data[9] + $data[15] +
                  $data[21]+ $data[27];
      $bukuLima = $data[4] + $data[10] + $data[16] +
                  $data[22]+ $data[28];
      $bukuEnam = $data[5] + $data[11] + $data[17] +
                  $data[23]+ $data[29];

      $r_bukuSatu   = $bukuSatu >= (10 * 5)? 1: 0;
      $r_bukuDua    = $bukuDua  >= (10 * 5)? 1: 0;
      $r_bukuTiga   = $bukuTiga >= (10 * 5)? 1: 0;
      $r_bukuEmpat  = $bukuEmpat>= (10 * 5)? 1: 0;
      $r_bukuLima   = $bukuLima >= (10 * 5)? 1: 0;
      $r_bukuEnam   = $bukuEnam >= (10 * 5)? 1: 0;
      
      $s_buku       = array($r_bukuSatu,$r_bukuDua,$r_bukuTiga,$r_bukuEmpat,$r_bukuLima,$r_bukuEnam);

      return array_sum($s_buku) == 6?1:0;
  }

}
