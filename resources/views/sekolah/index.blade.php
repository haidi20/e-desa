@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Data Sekolah</h1>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('sekolah.create')}}" class="btn btn-md btn-success buat">Buat</a>
      </div>
    </div>
    <hr class="dashed mb20 mt20">
    <br>
    @include('sekolah.table')
  </div>
@endsection
