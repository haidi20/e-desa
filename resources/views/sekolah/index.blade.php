@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Daftar Sekolah</h1>
      </div>
      <div class="col-md-6 text-right tombol-atas">
        <a href="{{route('sekolah.create')}}" class="btn btn-success btn-md">Tambah</a>
      </div>
    </div>
    <hr>
    <div class="row">
      <form action="{{route('sekolah.index')}}" method="get">
        <div id="app">
          <kondisiLengkap></kondisiLengkap>
        </div>
        <div class="col-md-1 oke">
          <button type="submit" class="btn btn-success btn-md">Oke</button>
        </div>
      </form>
    </div>
    <br>
    @include('sekolah.table')
  </div>
@endsection
