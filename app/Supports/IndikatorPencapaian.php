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
      $jawSatu              = $this->jawaban->kondisiRumus(2,1);
      $jawDua               = $this->jawaban->kondisiRumus(3,1);
      $rumus                = $this->rumus->duaSatu(
                                  $jawSatu,$jawDua
                            );
      $hasil                = $rumus == 1?1:0 ;
      return $hasil;
  }

  public function duaDua(){
      $jawSatu              = $this->jawaban->kondisiRumus(9,1);
      $jawDua               = $this->jawaban->kondisiRumus(10,1);
      $rumus                = $this->rumus->DuaDua(
                                  $jawSatu,$jawDua
                              );
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

  public function empat(){
      $jawSatu              = $this->jawaban->kondisiRumus(11,1);
      $rumus                = $jawSatu;
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

  public function limaSatu(){
      $jawSatu              = $this->jawaban->kondisiRumus(12,1);
      $rumus                = $jawSatu;
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

  public function limaDua(){
      $jawSatu              = $this->jawaban->kondisiRumus(13,1);
      $rumus                = $this->rumus->LimaDua($jawSatu);
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

  public function tujuhSatu(){
      $jawSatu              = $this->jawaban->kondisiRumus(14,1);
      $rumus                = $this->rumus->TujuhSatu($jawSatu);
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

  public function tujuhDua(){
      $jawSatu              = $this->jawaban->kondisiRumus(15,1);
      $rumus                = $this->rumus->TujuhDua($jawSatu);
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

  public function sepuluh(){
      $jawSatu              = $this->jawaban->kondisiRumus(16,1);
      $jawDua               = $this->jawaban->kondisiRumus(17,1);
      $rumus                = $this->$rumus->Sepuluh(
                                  $jawSatu,$jawDua
                              );
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

  public function empatBelas(){
      $jawSatu              = $this->jawaban->kondisiRumus(18,1);
      $jawDua               = $this->jawaban->kondisiRumus(19,1);
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

      $jawSatu              = $this->jawaban->kondisiRumus(27,1);
      $jawDua               = $this->jawaban->kondisiRumus(28,1);
      $jawTiga              = $this->jawaban->kondisiRumus(29,1);
      $jawEmpat             = $this->jawaban->kondisiRumus(30,1);
      $jawLima              = $this->jawaban->kondisiRumus(31,1);
      $jawEnam              = $this->jawaban->kondisiRumus(32,1);
      $jawTujuh             = $this->jawaban->kondisiRumus(33,1);
      $jawDelapan           = $this->jawaban->kondisiRumus(34,1);
      $jawSembilan          = $this->jawaban->kondisiRumus(35,1);
      $jawSepuluh           = $this->jawaban->kondisiRumus(36,1);
      $jawSebelas           = $this->jawaban->kondisiRumus(37,1);
      $jawDuabelas          = $this->jawaban->kondisiRumus(38,1);
      $jawTigabelas         = $this->jawaban->kondisiRumus(39,1);
      $jawEmpatbelas        = $this->jawaban->kondisiRumus(40,1);
      $jawLimabelas         = $this->jawaban->kondisiRumus(41,1);
      $jawEnambelas         = $this->jawaban->kondisiRumus(42,1);
      $jawTujuhbelas        = $this->jawaban->kondisiRumus(43,1);
      $jawDelapanbelas      = $this->jawaban->kondisiRumus(44,1);
      $jawSembilanbelas     = $this->jawaban->kondisiRumus(45,1);
      $jawDuapuluh          = $this->jawaban->kondisiRumus(46,1);
      $jawDuasatu           = $this->jawaban->kondisiRumus(47,1);
      $jawDuadua            = $this->jawaban->kondisiRumus(48,1);
      $jawDuatiga           = $this->jawaban->kondisiRumus(49,1);
      $jawDuaempat          = $this->jawaban->kondisiRumus(50,1);
      $jawDualima           = $this->jawaban->kondisiRumus(51,1);
      $jawDuaenam           = $this->jawaban->kondisiRumus(52,1);
      $jawDuatujuh          = $this->jawaban->kondisiRumus(53,1);
      $jawDuadelapan        = $this->jawaban->kondisiRumus(54,1);
      $jawDuasembilan       = $this->jawaban->kondisiRumus(55,1);
      $jawTigapuluh         = $this->jawaban->kondisiRumus(56,1);

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

  public function tujuhBelas(){
      $jawSatu              = $this->jawaban->kondisiRumus(58,1);
      $jawDua               = $this->jawaban->kondisiRumus(59,1);
      $jawTiga              = $this->jawaban->kondisiRumus(60,1);
      $jawEmpat             = $this->jawaban->kondisiRumus(61,1);
      $jawLima              = $this->jawaban->kondisiRumus(62,1);
      $jawEnam              = $this->jawaban->kondisiRumus(63,1);

      $data                 = [
          $jawSatu, $jawDua, $jawTiga,
          $jawEmpat, $jawLima, $jawEnam
      ];

      $rumus                = $this->rumus->tujuhBelas($data);
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

  public function delapanBelas(){
      $jawSatu              = $this->jawaban->kondisiRumus(65,1);
      $jawDua               = $this->jawaban->kondisiRumus(67,1);

      $rumus                = $this->rumus->delapanBelas($jawSatu,$jawDua);
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

  public function sembilanBelas(){
      $jawSatu              = $this->jawaban->kondisiRumus(68,1);
      $jawDua               = $this->jawaban->kondisiRumus(69,1);

      $rumus                = $this->rumus->sembilanBelas($jawSatu,$jawDua);
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

  public function duaPuluh(){
      $jawSatu              = $this->jawaban->kondisiRumus(72,1);
      $jawDua               = $this->jawaban->kondisiRumus(73,1);
      $jawTiga              = $this->jawaban->kondisiRumus(74,1);
      $jawEmpat             = $this->jawaban->kondisiRumus(75,1);
      $jawLima              = $this->jawaban->kondisiRumus(76,1);
      $jawEnam              = $this->jawaban->kondisiRumus(77,1);

      $data                 = [
          $jawSatu, $jawDua, $jawTiga,
          $jawEmpat, $jawLima, $jawEnam
      ];

      $rumus                = $this->rumus->duaPuluh($data);
      $hasil                = $rumus == 1?1:0;
      return $hasil;
  }

  public function duaPuluhSatu(){
      $jawSatu              = $this->jawaban->kondisiRumus(78,1);

      $rumus                = $this->rumus->duaPuluhSatu($jawSatu);
      $hasil                = $rumus == 1 ?1:0;
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
