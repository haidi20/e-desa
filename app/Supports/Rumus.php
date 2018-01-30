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

}
