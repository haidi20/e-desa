@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Hasil Analisa</h1>
      </div>
    </div>
    <hr class="dashed mb20 mt20">
    <br>
    @include('analisa.table')
  </div>
@endsection
