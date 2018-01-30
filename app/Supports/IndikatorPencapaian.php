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
      $hasil                      = $rumus == 1?1:0 ;
      return $hasil;
  }

  public function duaDua(){
      $jawSatu              = $this->jawaban->kondisi(9,1);
      $jawDua               = $this->jawaban->kondisi(10,1);
      $rumus                = $this->rumus->DuaDua($jawSatu,$jawDua);
      $rumus                == 1?1:0;
  }

  public function empat(){
      $jawSatu              = $this->jawaban->kondisi(11,1);
      $rumus                = $jawSatu;
      $rumus                == 1?1:0;
  }

  public function limaSatu(){
      $jawSatu              = $this->jawaban->kondisi(12,1);
      $rumus                = $jawSatu;
      $rumus                == 1?1:0;
  }

  public function limaDua(){
      $jawSatu              = $this->jawaban->kondisi(13,1);
      $rumus                = $this->rumus->LimaDua($jawSatu);
      $rumus                == 1?1:0;
  }

  public function tujuhSatu(){
      $jawSatu              = $this->jawaban->kondisi(14,1);
      $rumus                = $this->rumus->TujuhSatu($jawSatu);
      $rumus                == 1?1:0;
  }

  public function tujuhDua(){
      $jawSatu              = $this->jawaban->kondisi(15,1);
      $rumus                = $this->rumus->TujuhDua($jawSatu);
      $rumus                == 1?1:0;
  }

  public function sepuluh(){
      $jawSatu              = $this->jawaban->kondisi(16,1);
      $jawDua               = $this->jawaban->kondisi(17,1);
      $rumus                = $this->$rumus->Sepuluh($jawSatu,$jawDua);
      $rumus                == 1?1:0;
  }

  public function empatBelas(){
      $jawSatu              = $this->jawaban->kondisi(18,1);
      $jawDua               = $this->jawaban->kondisi(19,1);
      $rumus                = $this->rumus->empatBelas($jawSatu,$jawDua);
      $rumus                == 1?1:0;
  }

  public function limaBelas(){
      $jawSatu              =
  }

}
