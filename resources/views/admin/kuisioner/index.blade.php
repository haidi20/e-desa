@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Input Data</h1>
      </div>
    </div>
    <hr>
    <div class="row">
      <form action="{{route('kuisioner.index')}}" method="get">
        <div class="col-md-3 col-md-offset-2">
          <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <select name="kecamatan" id="kecamatan" class="form-control">
              <option value="">Semua Kecamatan</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="pendidikan">Jenjang Pendidikan</label>
            <select name="pendidikan" id="pendidikan" class="form-control">
              <option value="">Semua Jenjang Pendidikan</option>
            </select>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="sekolah">Sekolah</label>
            <select name="sekolah" id="sekolah" class="form-control">
              <option value="">Semua Sekolah</option>
            </select>
          </div>
        </div>
        <div class="col-md-1 text-right">
          <button type="submit" class="btn btn-md btn-success oke">Oke</button>
        </div>
      </form>
    </div>
    @include('admin.kuisioner.info')
    <br>
    @include('admin.kuisioner.table')
  </div>
@endsection
