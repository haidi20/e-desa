@extends('_layouts.basic')

@section('tubuh')
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="" class="navbar-brand brand">SPM</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav ukuranHuruf">
          <li><a href="#">Dashboard</a></li>
          <li><a href="#">Input Data</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right ukuranHuruf">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Pengaturan <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Pengguna</a></li>
              <li><a href="#">Keluar</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
@endsection
