<?php

namespace App\Supports;

use App\Models\Jawaban;
use App\Supports\Rumus;

class IndikatorPencapaian {

  // CATATAN :
  //  jaw = jawaban
  //  kondisi -> parameter 1 = pertanyaan_id
  //          -> parameter 2 = sekolah_id

  public $rumus             = [];
  public $hasil             = [];

  function __construct(Jawaban $jawaban,Rumus $rumus){
    $this->jawaban          = $jawaban;
    $this->rumus            = $rumus;
  }

  public function duaSatu (){
      $jawSatu              = [];
      $jawDua               = [];
      $jawSatu              = $this->jawaban->kondisi(2,1);
      $jawDua               = $this->jawaban->kondisi(3,1);
      $rumus                = $this->rumus->duaSatu(
                                  $jawSatu,$jawDua
                            );
      $hasil                = $rumus == 1?1:0 ;
      return $hasil;
  }

  public function duaDua(){
      $jawSatu              = $this->jawaban->kondisi(9,1);
      $jawDua               = $this->jawaban->kondisi(10,1);
      $rumus                = $this->rumus->DuaDua(
                                  $jawSatu,$jawDua
                              );
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

  public function empat(){
      $jawSatu              = $this->jawaban->kondisi(11,1);
      $rumus                = $jawSatu;
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

  public function limaSatu(){
      $jawSatu              = $this->jawaban->kondisi(12,1);
      $rumus                = $jawSatu;
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

  public function limaDua(){
      $jawSatu              = $this->jawaban->kondisi(13,1);
      $rumus                = $this->rumus->LimaDua($jawSatu);
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

  public function tujuhSatu(){
      $jawSatu              = $this->jawaban->kondisi(14,1);
      $rumus                = $this->rumus->TujuhSatu($jawSatu);
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

  public function tujuhDua(){
      $jawSatu              = $this->jawaban->kondisi(15,1);
      $rumus                = $this->rumus->TujuhDua($jawSatu);
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

  public function sepuluh(){
      $jawSatu              = $this->jawaban->kondisi(16,1);
      $jawDua               = $this->jawaban->kondisi(17,1);
      $rumus                = $this->$rumus->Sepuluh(
                                  $jawSatu,$jawDua
                              );
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

  public function empatBelas(){
      $jawSatu              = $this->jawaban->kondisi(18,1);
      $jawDua               = $this->jawaban->kondisi(19,1);
      $rumus                = $this->rumus->empatBelas(
                                  $jawSatu,$jawDua
                              );
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

  public function limaBelas(){

      $item                 = [];
      $variable             = [];
      $data                 = [];

      $jawSatu              = $this->jawaban->kondisi(27,1);
      $jawDua               = $this->jawaban->kondisi(28,1);
      $jawTiga              = $this->jawaban->kondisi(29,1);
      $jawEmpat             = $this->jawaban->kondisi(30,1);
      $jawLima              = $this->jawaban->kondisi(31,1);
      $jawEnam              = $this->jawaban->kondisi(32,1);
      $jawTujuh             = $this->jawaban->kondisi(33,1);
      $jawDelapan           = $this->jawaban->kondisi(34,1);
      $jawSembilan          = $this->jawaban->kondisi(35,1);
      $jawSepuluh           = $this->jawaban->kondisi(36,1);
      $jawSebelas           = $this->jawaban->kondisi(37,1);
      $jawDuabelas          = $this->jawaban->kondisi(38,1);
      $jawTigabelas         = $this->jawaban->kondisi(39,1);
      $jawEmpatbelas        = $this->jawaban->kondisi(40,1);
      $jawLimabelas         = $this->jawaban->kondisi(41,1);
      $jawEnambelas         = $this->jawaban->kondisi(42,1);
      $jawTujuhbelas        = $this->jawaban->kondisi(43,1);
      $jawDelapanbelas      = $this->jawaban->kondisi(44,1);
      $jawSembilanbelas     = $this->jawaban->kondisi(45,1);
      $jawDuapuluh          = $this->jawaban->kondisi(46,1);
      $jawDuasatu           = $this->jawaban->kondisi(47,1);
      $jawDuadua            = $this->jawaban->kondisi(48,1);
      $jawDuatiga           = $this->jawaban->kondisi(49,1);
      $jawDuaempat          = $this->jawaban->kondisi(50,1);
      $jawDualima           = $this->jawaban->kondisi(51,1);
      $jawDuaenam           = $this->jawaban->kondisi(52,1);
      $jawDuatujuh          = $this->jawaban->kondisi(53,1);
      $jawDuadelapan        = $this->jawaban->kondisi(54,1);
      $jawDuasembilan       = $this->jawaban->kondisi(55,1);
      $jawTigapuluh         = $this->jawaban->kondisi(56,1);

      $data = [
          $jawSatu, $jawDua, $jawTiga, $jawEmpat, $jawLima,
          $jawEnam, $jawTujuh, $jawDelapan, $jawSembilan, $jawSepuluh,
          $jawSebelas, $jawDuabelas, $jawTigabelas, $jawEmpatbelas, $jawLimabelas,
          $jawEnambelas, $jawTujuhbelas, $jawDelapanbelas, $jawSembilanbelas, $jawDuapuluh,
          $jawDuasatu,$jawDuadua, $jawDuatiga, $jawDuaempat, $jawDualima,
          $jawDuaenam, $jawDuatujuh, $jawDuadelapan, $jawDuasembilan, $jawTigapuluh
      ];

      $rumus                = $this->rumus->limaBelas($data);
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

}

// $jawSatu, $jawDua, $jawTiga, $jawEmpat, $jawLima,
// $jawEnam, $jawTujuh, $jawDelapan, $jawSembilan, $jawSepuluh,
// $jawSebelas, $jawDuabelas, $jawTigabelas, $jawEmpatbelas, $jawLimabelas,
// $jawEnambelas, $jawTujuhbelas, $jawDelapanbelas, $jawSembilanbelas, $jawDuapuluh,
// $jawDuasatu,$jawDuadua, $jawDuatiga, $jawDuaempat, $jawDualima,
// $jawDuaenam, $jawDuatujuh, $jawDuadelapan, $jawDuasembilan, $jawTigapuluh

// 'jawSatu', 'jawDua', 'jawTiga', 'jawEmpat', 'jawLima',
// 'jawEnam', 'jawTujuh', 'jawDelapan', 'jawSembilan', 'jawSepuluh',
// 'jawSebelas', 'jawDuabelas', 'jawTigabelas', 'jawEmpatbelas', 'jawLimabelas',
// 'jawEnambelas', 'jawTujuhbelas', 'jawDelapanbelas', 'jawSembilanbelas', 'jawDuapuluh',
// 'jawDuasatu','jawDuadua', 'jawDuatiga', 'jawDuaempat', 'jawDualima',
// 'jawDuaenam', 'jawDuatujuh', 'jawDuadelapan', 'jawDuasembilan', 'jawTigapuluh'

// ['jawSatu' => $jawSatu], ['jawDua' =>$jawDua], ['jawTiga'=>$jawTiga], ['jawEmpat'=>$jawEmpat],['jawLima'=>$jawLima],
// ['jawEnam'=>$jawEnam], ['jawTujuh'=>$jawTujuh], ['jawDelapan'=>$jawDelapan], ['jawSembilan'=>$jawSembilan], ['jawSepuluh'=>$jawSepuluh],
// ['jawSebelas'=>$jawSebelas], ['jawDuabelas'=>$jawDuabelas], ['jawTigabelas'=>$jawTigabelas], ['jawEmpatbelas'=>$jawEmpatbelas], ['jawLimabelas'=>$jawLimabelas],
// ['jawEnambelas'=>$jawEnambelas], ['jawTujuhbelas'=>$jawTujuhbelas], ['jawDelapanbelas'=>$jawDelapanbelas], ['jawSembilanbelas'=>$jawSembilanbelas], ['jawDuapuluh'=>$jawDuapuluh],
// ['jawDuasatu'=>$jawDuasatu],['jawDuadua'=>$jawDuadua], ['jawDuatiga'=>$jawDuatiga], ['jawDuaempat'=>$jawDuaempat], ['jawDualima'=>$jawDualima],
// ['jawDuaenam'=>$jawDuaenam], ['jawDuatujuh'=>$jawDuatujuh], ['jawDuadelapan'=>$jawDuadelapan], ['jawDuasembilan'=>$jawDuasembilan], ['jawTigapuluh'=>$jawTigapuluh]
