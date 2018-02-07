<?php

namespace App\Supports;

use App\Models\Jawaban;
use App\Supports\Rumus;
use App\Models\Sekolah;

class IndikatorPencapaian {

  // CATATAN :
  //  jaw = jawaban
  //  kondisi -> parameter 1 = pertanyaan_id
  //          -> parameter 2 = sekolah_id

  public $rumus             = [];
  public $hasil             = [];

  function __construct(Jawaban $jawaban,Rumus $rumus, Sekolah $sekolah){
    $this->rumus            = $rumus;
    $this->jawaban          = $jawaban;
    $this->sekolah          = $sekolah::kondisi()->get();
  }

  public function duaSatu (){
      $jawSatu              = [];
      $jawDua               = [];

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]         = kondisi_null($this->jawaban->kondisiJawaban(2,$item->id)->value('isi'));
          $jawDua[$item->id]          = kondisi_null($this->jawaban->kondisiJawaban(3,$item->id)->value('isi'));

          $rumus[$item->id]           = number_format($this->rumus->duaSatu($jawSatu[$item->id],$jawDua[$item->id]));
      }

      $hasil = kondisi_jumlah_data($rumus);

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
      $data                 = [];

      foreach ($this->sekolah as $index => $item) {
          for ($i=1; $i <= 30 ; $i++) {
              $id = $i + 26 ;
              $data[$item->id][$i]      = $this->jawaban->kondisiJawaban($id,$item->id)->value('isi');

          }
      }
      $rumus       = $this->rumus->limaBelas($data);
      $hasil       = kondisi_jumlah_data($rumus);
      
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

// $jawSatu              = $this->jawaban->kondisiJawaban(27,$item->id)->value('isi');
// $jawDua               = $this->jawaban->kondisiJawaban(28,$item->id)->value('isi');
// $jawTiga              = $this->jawaban->kondisiJawaban(29,$item->id)->value('isi');
// $jawEmpat             = $this->jawaban->kondisiJawaban(30,$item->id)->value('isi');
// $jawLima              = $this->jawaban->kondisiJawaban(31,$item->id)->value('isi');
// $jawEnam              = $this->jawaban->kondisiJawaban(32,$item->id)->value('isi');
// $jawTujuh             = $this->jawaban->kondisiJawaban(33,$item->id)->value('isi');
// $jawDelapan           = $this->jawaban->kondisiJawaban(34,$item->id)->value('isi');
// $jawSembilan          = $this->jawaban->kondisiJawaban(35,$item->id)->value('isi');
// $jawSepuluh           = $this->jawaban->kondisiJawaban(36,$item->id)->value('isi');
// $jawSebelas           = $this->jawaban->kondisiJawaban(37,$item->id)->value('isi');
// $jawDuabelas          = $this->jawaban->kondisiJawaban(38,$item->id)->value('isi');
// $jawTigabelas         = $this->jawaban->kondisiJawaban(39,$item->id)->value('isi');
// $jawEmpatbelas        = $this->jawaban->kondisiJawaban(40,$item->id)->value('isi');
// $jawLimabelas         = $this->jawaban->kondisiJawaban(41,$item->id)->value('isi');
// $jawEnambelas         = $this->jawaban->kondisiJawaban(42,$item->id)->value('isi');
// $jawTujuhbelas        = $this->jawaban->kondisiJawaban(43,$item->id)->value('isi');
// $jawDelapanbelas      = $this->jawaban->kondisiJawaban(44,$item->id)->value('isi');
// $jawSembilanbelas     = $this->jawaban->kondisiJawaban(45,$item->id)->value('isi');
// $jawDuapuluh          = $this->jawaban->kondisiJawaban(46,$item->id)->value('isi');
// $jawDuasatu           = $this->jawaban->kondisiJawaban(47,$item->id)->value('isi');
// $jawDuadua            = $this->jawaban->kondisiJawaban(48,$item->id)->value('isi');
// $jawDuatiga           = $this->jawaban->kondisiJawaban(49,$item->id)->value('isi');
// $jawDuaempat          = $this->jawaban->kondisiJawaban(50,$item->id)->value('isi');
// $jawDualima           = $this->jawaban->kondisiJawaban(51,$item->id)->value('isi');
// $jawDuaenam           = $this->jawaban->kondisiJawaban(52,$item->id)->value('isi');
// $jawDuatujuh          = $this->jawaban->kondisiJawaban(53,$item->id)->value('isi');
// $jawDuadelapan        = $this->jawaban->kondisiJawaban(54,$item->id)->value('isi');
// $jawDuasembilan       = $this->jawaban->kondisiJawaban(55,$item->id)->value('isi');
// $jawTigapuluh         = $this->jawaban->kondisiJawaban(56,$item->id)->value('isi');
