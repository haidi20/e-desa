@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Konfirmasi Reset Pengguna</h1>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('pengguna.index')}}" class="btn btn-md btn-success">Kembali</a>
      </div>
    </div>
    <hr class="dashed mt20 mb20">
    <div class="row">
      <div class="col-md-8 m">
        <div class="jumbotron">
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
            <tr>
              <td height="30px"></td>
            </tr>
            <tr>
              <td><h4>Username</h4></td>
              <td>&nbsp;:&nbsp;</td>
              <td><h4>kj23432</h4></td>
            </tr>
            <tr>
              <td><h4>Password</h4></td>
              <td>&nbsp;:&nbsp;</td>
              <td><h4>kj23432</h4></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
