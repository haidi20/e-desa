@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Dashboard Admin</h1>
      </div>
    </div>
    <hr class="dashed mb20 mt20">
    <div class="row">
      <div class="col-md-3">
        <a href="#">Download Panduan Aplikasi</a>
      </div>
      <div class="col-md-3">
        <a href="#">Penjelasan Indikator Pencapaian</a>
      </div>
      <div class="col-md-4">
        <p><a href="#">Jumlah Sekolah</a> 36</p>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-4">
        <form action="{{route('dashboard.index')}}" method="get">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="tahun" class="form-label">Tahun</label>
                <select name="tahun" id="tahun" class="form-control">
                  <option value="">Pilih Tahun</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="periode" class="form-label">Periode</label>
                <select name="periode" id="periode" class="form-control">
                  <option value="">Pilih Periode</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <select name="kecamatan" id="kecamatan" class="form-control">
                  <option value="">Pilih Kecamatan</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="pendidikan" class="form-label">Jenjang Pendidikan</label>
                <select name="pendidikan" id="pendidikan" class="form-control">
                  <option value="">Pilih Jenjang Pendidikan</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label for="sekolah" class="form-label">Sekolah</label>
                <select name="sekolah" id="sekolah" class="form-control">
                  <option value="">Pilih Sekolah</option>
                </select>
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
      <div class="col-md-8">
        <table class="table table-bordered table-custom">
          <thead>
            <tr>
              <th class="no">No</th>
              <th>Indikator Pencapaian (IP)</th>
              <th class="action">Persen</th>
            </tr>
          </thead>
          <tbody>
            @for ($i=1; $i <=10 ; $i++)
              <tr align="center">
                <td>{{$i}}</td>
                <td>IP {{$i}}</td>
                <td>{{rand(80,100)}}%</td>
              </tr>
            @endfor
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
