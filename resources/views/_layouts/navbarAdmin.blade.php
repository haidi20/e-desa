@extends('_layouts.basic')

@section('tubuh')
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      {{-- <a class="navbar-brand brand" href="#">Standar Pelayanan Minimal</a> --}}
      <a href="" class="navbar-brand brand">SPM</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav ukuranHuruf">
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Daftar Sekolah</a></li>
        <li><a href="#">Kuisioner</a></li>
        {{-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Pengaturan <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li> --}}
      </ul>
      <ul class="nav navbar-nav navbar-right ukuranHuruf">
        <li class="dropdown active">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Pengaturan <span class="caret"></span></a>
          <ul class="dropdown-menu ukuranHuruf" role="menu">
            <li><a href="#">Kunci</a></li>
            <li class="active"><a href="#">Pengguna</a></li>
            <li><a href="#">Keluar</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <a href="" class="btn btn-primary btn-lg">kirim</a>
      </div>
    </div>
  </div>
</div>
@endsection
