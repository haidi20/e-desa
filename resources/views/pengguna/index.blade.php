@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Pengguna Admin</h1>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('pengguna.create')}}" class="btn btn-md btn-success tombol-atas">Tambah</a>
      </div>
    </div>
    <hr>
    <div class="row">
      <form action="{{route('pengguna.index')}}" method="get">
        <div class="col-md-3 col-md-offset-5">
          <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <select name="kecamatan" id="kecamatan" class="form-control">
              <option value="">Semua kecamatan</option>
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
    @include('pengguna.table')
  </div>
@endsection
