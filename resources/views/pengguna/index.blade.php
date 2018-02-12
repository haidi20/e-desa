@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Pengguna</h1>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('pengguna.create')}}" class="btn btn-md btn-success tombol-atas">Tambah</a>
      </div>
    </div>
    <hr class="dashed mt20 mb20">
    <div class="row">
      <form action="{{route('pengguna.index')}}" method="get">
        <kondisipengguna></kondisipengguna>
        <div class="col-md-1 text-right">
          <button type="submit" class="btn btn-md btn-success oke">Oke</button>
        </div>
      </form>
    </div>
    @include('pengguna.table')
  </div>
@endsection
