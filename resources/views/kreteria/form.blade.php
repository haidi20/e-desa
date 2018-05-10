@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Form Kriteria</h1>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('kreteria.index')}}" class="btn btn-success btn-md buat">Kembali</a>
      </div>
    </div>
    <hr class="dashed mb20 mt20">
    <br>
    <div class="row">
      <div class="col-md-4 m">
        <form action="{{$action}}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="{{$method}}">
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="kode">ID</label>
                <input type="text" name="kode" id="kode" class="form-control" value="{{old('kode')}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="nama">Nama Kriteria</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{old('nama')}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="attribute">Attribute</label>
                <input type="text" name="attribute" id="attribute" class="form-control" value="{{old('attribute')}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="bobot">Bobot</label>
                <input type="text" name="bobot" id="bobot" class="form-control" value="{{old('bobot')}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-1 col-md-offset-9">
              <button type="submit" class="btn btn-md btn-success">Oke</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
