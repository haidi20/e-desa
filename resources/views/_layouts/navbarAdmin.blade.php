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
        <li><a href="{{route('dashboard.index')}}">Dashboard</a></li>
        <li><a href="{{route('sekolah.index')}}">Daftar Sekolah</a></li>
        <li><a href="{{route('kuisioner.index')}}" >Input Data</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right ukuranHuruf">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Pengaturan <span class="caret"></span></a>
          <ul class="dropdown-menu ukuranHuruf" role="menu">
            <li><a href="{{route('kunci.index')}}">Kunci</a></li>
            <li><a href="{{route('pengguna.index')}}">Pengguna</a></li>
            <li><a href="#">Keluar</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
