@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Reset Pengguna</h1>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('pengguna.index')}}" class="btn btn-md btn-success tombol-atas">Kembali</a>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-8 m">
        <div class="jumbotron">
          <h2>Apakah anda ingin reset akun sekolah ini :</h2><br>
          <table align="center">
            <tr>
              <td><h4>Nama Sekolah</h4></td>
              <td> &nbsp;:&nbsp;</td>
              <td><h4>SD Muhammadiyah 2 Samarinda</h4></td>
            </tr>
            <tr>
              <td><h4>Kecamatan </h4></td>
              <td>: &nbsp;</td>
              <td><h4>Samarinda Ulu</h4></td>
            </tr>
            <tr>
              <td><h4>Alamat </h4></td>
              <td>: &nbsp;</td>
              <td><h4>jl. telok lerong</h4></td>
            </tr>
            <tr>
              <td><h4>Operator </h4></td>
              <td>:</td>
              <td><h4>Jamal</h4></td>
            </tr>
          </table>
          <div class="row">
            <div class="col-md-12 text-right">
              <a href="{{route('pengguna.konfirmasi')}}" class="btn btn-md btn-success">Oke</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
