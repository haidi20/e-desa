@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Dashboard Admin</h1>
      </div>
    </div>
    <hr class="dashed mb20 mt20">
    <div class="row">
      <div class="col-md-3">
        <a href="#">Download Panduan Aplikasi</a>
      </div>
      <div class="col-md-3">
        <a href="#">Penjelasan Indikator Pencapaian</a>
      </div>
      <div class="col-md-4">
        <p><a href="#">Jumlah Sekolah</a> 36</p>
      </div>
    </div>
    <br>
    <dashboard></dashboard>
  </div>
@endsection
