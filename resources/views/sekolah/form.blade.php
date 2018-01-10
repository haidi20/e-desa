@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Form Daftar Sekolah</h1>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('sekolah.index')}}" class="btn btn-success btn-md tombol-atas">Kembali</a>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-4 m">
        <form action="#" method="post" class="form-horizontal">
          <input type="hidden" name="_method" value="">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md">
              <div class="form-group error">
                <label for="kecamatan" class="control-label">Kecamatan</label>
                <select name="kecamatan" id="kecamatan" class="form-control" >
                  <option value="">Pilih Kecamatan</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="pendidikan">Jenjang Pendidikan</label>
                <select name="pendidikan" id="pendidikan" class="form-control">
                  <option value="">Pilih Jenjang Pendidikan</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="sekolah">Nama Sekolah</label>
                <input type="text" id="sekolah" name="sekolah" class="form-control" value="{{old('name')}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group error">
                <label for="hp">Nomor Tlp/HP</label>
                <input type="text" name="hp" id="hp" class="form-control" value="{{old('hp')}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="operator">Nama Operator</label>
                <input type="text" id="operator" name="operator" class="form-control" value="{{old('operator')}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="{{old('alamat')}}">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-offset-10">
              <button class="btn btn-success btn-md">Kirim</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
