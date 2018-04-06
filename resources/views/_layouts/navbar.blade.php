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
      <a href="" class="navbar-brand brand">
        {{-- Sistem Pendukung Keputusan Metode SAW --}}
      </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav ukuranHuruf">
        <li class="{{session()->get('aktif') == 'dashboard'?'active':''}}"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="{{session()->get('aktif') == "sekolah"?'active':''}}"><a href="{{route('sekolah.index')}}">Data Sekolah</a></li>
        <li class="{{session()->get('aktif') == 'alternatif'?'active':''}}"><a href="{{route('alternatif.index')}}">Data Alternatif</a></li>
        <li><a href="#">Informasi Kreteria</a></li>
        <li><a href="#">Hasil Analisa</a></li>
        <li><a href="#">Berprestasi</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right ukuranHuruf">
        <li><a href="#">Keluar</a></li>
      </ul>
    </div>
  </div>
</nav>
