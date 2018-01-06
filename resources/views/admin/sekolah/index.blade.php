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
      <div class="col-md-1 oke">
        <button type="button" class="btn btn-success btn-md">Oke</button>
      </div>
    </div>
    <br>
    @include('admin.sekolah.table')
  </div>
@endsection
