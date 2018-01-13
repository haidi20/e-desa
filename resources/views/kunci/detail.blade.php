@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Detail Kunci</h1>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('kunci.index')}}" class="btn btn-md btn-success tombol-atas">Kembali</a>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-3 col-md-offset-8">
        <div class="form-group">
          <label for="sekolah">Sekolah</label>
          <select name="sekolah" id="sekolah" class="form-control">
            <option value="">Semua Sekolah</option>
          </select>
        </div>
      </div>
      <div class="col-md-1 text-right oke">
        <a href="{{route('kunci.detail')}}" class="btn btn-md btn-success">Oke</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-custome">
          <thead>
            <tr>
              <th class="no">No</th>
              <th>Nama Sekolah</th>
              <th width="150px">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>SD Muhammadiyah 2 Samarinda</td>
              <td id="app">
                <onoff></onoff>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
