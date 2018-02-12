@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Form Pengguna</h1>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('pengguna.index')}}" class="btn btn-success btn-md tombol-atas">Kembali</a>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-4 m">
        <form action="#" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="">
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <select name="kecamatan" id="kecamatan" class="form-control">
                  <option value="">Pilih Kecamatan</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="sekolah">Sekolah</label>
                <select name="sekolah" id="sekolah" class="form-control">
                  <option value="">Pilih Sekolah</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-1 col-md-offset-9">
              <button type="button" class="btn btn-md btn-success">Oke</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <br>
    @include('pengguna.table')
  </div>
@endsection
