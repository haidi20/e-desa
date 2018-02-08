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

  public $rumus     = [];
  public $hasil     = [];
  public $jawSatu   = [];
  public $jawDua    = [];
  public $data      = [];

  function __construct(Jawaban $jawaban,Rumus $rumus, Sekolah $sekolah){
      $this->rumus    = $rumus;
      $this->jawaban  = $jawaban;
      $this->sekolah  = $sekolah::kondisi()->get();
  }

  public function duaSatu (){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(2,$item->id)->value('isi'));
          $jawDua[$item->id]            = kondisi_null($this->jawaban->kondisiJawaban(3,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->duaSatu($jawSatu[$item->id],$jawDua[$item->id]));
      }

      $hasil = kondisi_jumlah_data($rumus);

      return $hasil;

  }

  public function duaDua(){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(9,$item->id)->value('isi'));
          $jawDua[$item->id]            = kondisi_null($this->jawaban->kondisiJawaban(10,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->duaDua($jawSatu[$item->id],$jawDua[$item->id]));
      }

      $hasil = kondisi_jumlah_data($rumus);

      return $hasil;

  }

  public function empat(){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(11,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->empat($jawSatu[$item->id]));
      }

      $hasil = kondisi_jumlah_data($rumus);

      return $rumus;

  }

  public function limaSatu(){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(12,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->limaSatu($jawSatu[$item->id]));
      }

      $hasil = kondisi_jumlah_data($rumus);

      return $hasil;

  }

  public function limaDua(){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(13,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->limaDua($jawSatu[$item->id]));
      }

      $hasil = kondisi_jumlah_data($rumus);

      return $hasil;
  }

  public function tujuhSatu(){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(14,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->tujuhSatu($jawSatu[$item->id]));
      }

      $hasil = kondisi_jumlah_data($rumus);

      return $rumus;

  }

  public function tujuhDua(){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(15,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->tujuhDua($jawSatu[$item->id]));
      }

      $hasil = kondisi_jumlah_data($rumus);

      return $hasil;

  }

  public function sepuluh(){

    foreach ($this->sekolah as $index => $item) {
        $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(16,$item->id)->value('isi'));
        $jawDua[$item->id]            = kondisi_null($this->jawaban->kondisiJawaban(17,$item->id)->value('isi'));

        $rumus[$item->id]             = number_format($this->rumus->sepuluh($jawSatu[$item->id],$jawDua[$item->id]));
    }

    $hasil = kondisi_jumlah_data($rumus);

    return $hasil;

  }

  public function empatBelas(){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(18,$item->id)->value('isi'));
          $jawDua[$item->id]            = kondisi_null($this->jawaban->kondisiJawaban(19,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->empatBelas($jawSatu[$item->id],$jawDua[$item->id]));
      }

      $hasil = kondisi_jumlah_data($rumus);

      return $hasil;

  }

  public function limaBelas(){

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

      foreach ($this->sekolah as $index => $item) {
          for ($i=1; $i <= 6 ; $i++) {
              $id = $i + 57 ;
              $data[$item->id][$i]      = $this->jawaban->kondisiJawaban($id,$item->id)->value('isi');
          }
      }
      $rumus       = $this->rumus->tujuhBelas($data);
      $hasil       = kondisi_jumlah_data($rumus);

      return $hasil;

  }

  public function delapanBelas(){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(65,$item->id)->value('isi'));
          $jawDua[$item->id]            = kondisi_null($this->jawaban->kondisiJawaban(67,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->delapanBelas($jawSatu[$item->id],$jawDua[$item->id]));
      }

      $hasil = kondisi_jumlah_data($rumus);

      return $hasil;

  }

  public function sembilanBelas(){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(68,$item->id)->value('isi'));
          $jawDua[$item->id]            = kondisi_null($this->jawaban->kondisiJawaban(69,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->sembilanBelas($jawSatu[$item->id],$jawDua[$item->id]));
      }

      $hasil = kondisi_jumlah_data($rumus);

      return $hasil;
  }

  public function duaPuluh(){

      foreach ($this->sekolah as $index => $item) {
          for ($i=1; $i <= 6 ; $i++) {
              $id = $i + 71 ;
              $data[$item->id][$i]      = $this->jawaban->kondisiJawaban($id,$item->id)->value('isi');
          }
      }
      $rumus       = $this->rumus->duaPuluh($data);
      $hasil       = kondisi_jumlah_data($rumus);

      return $hasil;
  }

  public function duaPuluhSatu(){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(78,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->duaPuluhSatu($jawSatu[$item->id]));
      }

      $hasil = kondisi_jumlah_data($rumus);

      return $rumus;

}
