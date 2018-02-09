<?php

namespace App\Supports;

//models
use App\Models\Jawaban;
use App\Models\Sekolah;

// supports
use App\Supports\Rumus;
use App\Supports\DetailIP;

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

  function __construct(Jawaban $jawaban,Rumus $rumus, Sekolah $sekolah, DetailIP $dip){
      $this->dip      = $dip;
      $this->rumus    = $rumus;
      $this->jawaban  = $jawaban;
      $this->sekolah  = $sekolah::kondisi()->get();
  }

  public function duaSatu ($pilihan = null){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(2,$item->id)->value('isi'));
          $jawDua[$item->id]            = kondisi_null($this->jawaban->kondisiJawaban(3,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->duaSatu($jawSatu[$item->id],$jawDua[$item->id]));

          $detail[$index]               = $this->dip->kondisiSekolah($rumus[$item->id],$item->nama);
      }

      $hasil        = kondisi_jumlah_data($rumus);
      $jumlahDetail = $this->dip->kondisiJumlah($detail);

      if ($pilihan == 1) {
          return $hasil;
      }elseif($pilihan == 2){
          return $jumlahDetail;
      }

  }

  public function duaDua($pilihan = null){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(9,$item->id)->value('isi'));
          $jawDua[$item->id]            = kondisi_null($this->jawaban->kondisiJawaban(10,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->duaDua($jawSatu[$item->id],$jawDua[$item->id]));

          $detail[$index]               = $this->dip->kondisiSekolah($rumus[$item->id],$item->nama);
      }

      $hasil        = kondisi_jumlah_data($rumus);
      $jumlahDetail = $this->dip->kondisiJumlah($detail);

      if ($pilihan == 1) {
          return $hasil;
      }elseif($pilihan == 2){
          return $jumlahDetail;
      }

  }

  public function empat($pilihan = null){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(11,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->empat($jawSatu[$item->id]));

          $detail[$index]               = $this->dip->kondisiSekolah($rumus[$item->id],$item->nama);
      }

      $hasil        = kondisi_jumlah_data($rumus);
      $jumlahDetail = $this->dip->kondisiJumlah($detail);

      if ($pilihan == 1) {
          return $hasil;
      }elseif($pilihan == 2){
          return $jumlahDetail;
      }

  }

  public function limaSatu($pilihan = null){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(12,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->limaSatu($jawSatu[$item->id]));

          $detail[$index]               = $this->dip->kondisiSekolah($rumus[$item->id],$item->nama);
      }

      $hasil        = kondisi_jumlah_data($rumus);
      $jumlahDetail = $this->dip->kondisiJumlah($detail);

      if ($pilihan == 1) {
          return $hasil;
      }elseif($pilihan == 2){
          return $jumlahDetail;
      }

  }

  public function limaDua($pilihan = null){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(13,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->limaDua($jawSatu[$item->id]));

          $detail[$index]               = $this->dip->kondisiSekolah($rumus[$item->id],$item->nama);
      }

      $hasil        = kondisi_jumlah_data($rumus);
      $jumlahDetail = $this->dip->kondisiJumlah($detail);

      if ($pilihan == 1) {
          return $hasil;
      }elseif($pilihan == 2){
          return $jumlahDetail;
      }
  }

  public function tujuhSatu($pilihan = null){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(14,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->tujuhSatu($jawSatu[$item->id]));

          $detail[$index]               = $this->dip->kondisiSekolah($rumus[$item->id],$item->nama);
      }

      $hasil        = kondisi_jumlah_data($rumus);
      $jumlahDetail = $this->dip->kondisiJumlah($detail);

      if ($pilihan == 1) {
          return $hasil;
      }elseif($pilihan == 2){
          return $jumlahDetail;
      }

  }

  public function tujuhDua($pilihan = null){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(15,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->tujuhDua($jawSatu[$item->id]));

          $detail[$index]               = $this->dip->kondisiSekolah($rumus[$item->id],$item->nama);
      }

      $hasil        = kondisi_jumlah_data($rumus);
      $jumlahDetail = $this->dip->kondisiJumlah($detail);

      if ($pilihan == 1) {
          return $hasil;
      }elseif($pilihan == 2){
          return $jumlahDetail;
      }

  }

  public function sepuluh($pilihan = null){

    foreach ($this->sekolah as $index => $item) {
        $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(16,$item->id)->value('isi'));
        $jawDua[$item->id]            = kondisi_null($this->jawaban->kondisiJawaban(17,$item->id)->value('isi'));

        $rumus[$item->id]             = number_format($this->rumus->sepuluh($jawSatu[$item->id],$jawDua[$item->id]));

        $detail[$index]               = $this->dip->kondisiSekolah($rumus[$item->id],$item->nama);
    }

    $hasil = kondisi_jumlah_data($rumus);

    return $hasil;

  }

  public function empatBelas($pilihan = null){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(18,$item->id)->value('isi'));
          $jawDua[$item->id]            = kondisi_null($this->jawaban->kondisiJawaban(19,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->empatBelas($jawSatu[$item->id],$jawDua[$item->id]));

          $detail[$index]               = $this->dip->kondisiSekolah($rumus[$item->id],$item->nama);
      }

      $hasil        = kondisi_jumlah_data($rumus);
      $jumlahDetail = $this->dip->kondisiJumlah($detail);

      if ($pilihan == 1) {
          return $hasil;
      }elseif($pilihan == 2){
          return $jumlahDetail;
      }

  }

  public function limaBelas($pilihan = null){

      foreach ($this->sekolah as $index => $item) {
          for ($i=1; $i <= 30 ; $i++) {
              $id = $i + 26 ;
              $data[$item->id][$i]      = $this->jawaban->kondisiJawaban($id,$item->id)->value('isi');
          }
          $nama[$index] = ['nama'=>$item->nama];
      }
      $rumus       = $this->rumus->limaBelas($data);
      $detail      = $this->dip->kondisiSekolahBanyak($rumus,$nama);

      $hasil        = kondisi_jumlah_data($rumus);
      $jumlahDetail = $this->dip->kondisiJumlah($detail);

      if ($pilihan == 1) {
          return $hasil;
      }elseif($pilihan == 2){
          return $jumlahDetail;
      }

  }

  public function tujuhBelas($pilihan = null){

      foreach ($this->sekolah as $index => $item) {
          for ($i=1; $i <= 6 ; $i++) {
              $id = $i + 57 ;
              $data[$item->id][$i]      = $this->jawaban->kondisiJawaban($id,$item->id)->value('isi');
          }
          $nama[$index] = ['nama'=>$item->nama];
      }
      $rumus       = $this->rumus->tujuhBelas($data);
      $detail      = $this->dip->kondisiSekolahBanyak($rumus,$nama);

      $hasil        = kondisi_jumlah_data($rumus);
      $jumlahDetail = $this->dip->kondisiJumlah($detail);

      if ($pilihan == 1) {
          return $hasil;
      }elseif($pilihan == 2){
          return $jumlahDetail;
      }

  }

  public function delapanBelas($pilihan = null){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(65,$item->id)->value('isi'));
          $jawDua[$item->id]            = kondisi_null($this->jawaban->kondisiJawaban(67,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->delapanBelas($jawSatu[$item->id],$jawDua[$item->id]));

          $detail[$index]               = $this->dip->kondisiSekolah($rumus[$item->id],$item->nama);
      }

      $hasil        = kondisi_jumlah_data($rumus);
      $jumlahDetail = $this->dip->kondisiJumlah($detail);

      if ($pilihan == 1) {
          return $hasil;
      }elseif($pilihan == 2){
          return $jumlahDetail;
      }

  }

  public function sembilanBelas($pilihan = null){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(68,$item->id)->value('isi'));
          $jawDua[$item->id]            = kondisi_null($this->jawaban->kondisiJawaban(69,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->sembilanBelas($jawSatu[$item->id],$jawDua[$item->id]));

          $detail[$index]               = $this->dip->kondisiSekolah($rumus[$item->id],$item->nama);
      }

      $hasil        = kondisi_jumlah_data($rumus);
      $jumlahDetail = $this->dip->kondisiJumlah($detail);

      if ($pilihan == 1) {
          return $hasil;
      }elseif($pilihan == 2){
          return $jumlahDetail;
      }

  }

  public function duaPuluh($pilihan = null){

      foreach ($this->sekolah as $index => $item) {
          for ($i=1; $i <= 6 ; $i++) {
              $id = $i + 71 ;
              $data[$item->id][$i]      = $this->jawaban->kondisiJawaban($id,$item->id)->value('isi');
          }
          $nama[$index] = ['nama'=>$item->nama];
      }
      $rumus       = $this->rumus->duaPuluh($data);
      $detail      = $this->dip->kondisiSekolahBanyak($rumus,$nama);

      $hasil        = kondisi_jumlah_data($rumus);
      $jumlahDetail = $this->dip->kondisiJumlah($detail);

      if ($pilihan == 1) {
          return $hasil;
      }elseif($pilihan == 2){
          return $jumlahDetail;
      }

  }

  public function duaPuluhSatu($pilihan = null){

      foreach ($this->sekolah as $index => $item) {
          $jawSatu[$item->id]           = kondisi_null($this->jawaban->kondisiJawaban(78,$item->id)->value('isi'));

          $rumus[$item->id]             = number_format($this->rumus->duaPuluhSatu($jawSatu[$item->id]));

          $detail[$index]               = $this->dip->kondisiSekolah($rumus[$item->id],$item->nama);
      }

      $hasil        = kondisi_jumlah_data($rumus);
      $jumlahDetail = $this->dip->kondisiJumlah($detail);

      if ($pilihan == 1) {
          return $hasil;
      }elseif($pilihan == 2){
          return $jumlahDetail;
      }

  }

}
