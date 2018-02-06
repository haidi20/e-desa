@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Input Data</h1>
      </div>
    </div>
    <hr class="dashed mt20 mb20">
    <div class="row">
      {{-- <form action="{{route('kuisioner.pertanyaan')}}" method="get"> --}}
        {{-- <kondisikuisioner></kondisikuisioner> --}}
      {{-- </form> --}}
    </div>
    {{-- @include('kuisioner.info') --}}
    <br>
    <kuisioner></kuisioner>
  </div>
@endsection
