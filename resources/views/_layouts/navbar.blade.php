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
      <ul class="nav navbar-nav ukuran-huruf">
        <li class="{{session()->get('aktif') == 'dashboard'?'active':''}}"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="dropdown {{session()->get('aktiff') == 'dasar'?'active':''}}">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Data Dasar <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li class="{{session()->get('aktif') == 'alternatif'?'active':''}}"><a href="{{route('alternatif.index')}}">Alternatif</a></li>
            <li class="{{session()->get('aktif') == "sekolah"?'active':''}}"><a href="{{route('sekolah.index')}}">Sekolah</a></li>
            <li class="{{session()->get('aktif') == 'kreteria'?'active':''}}"><a href="{{route('kreteria.index')}}">Kreteria</a></li>
          </ul>
        </li>
        <li class="{{session()->get('aktif') == 'analisa'?'active':''}}"><a href="{{route('analisa.index')}}">Hasil Analisa</a></li>
        <li class="{{session()->get('aktif') == 'normalisasi'?'active':''}}"><a href="{{route('normalisasi.index')}}">Normalisasi</a></li>
        <li class="{{session()->get('aktif') == 'kinerja'?'active':''}}"><a href="{{route('kinerja.index')}}">Penilaian Kinerja</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right ukuran-huruf">
        <li><a href="#">Keluar</a></li>
      </ul>
    </div>
  </div>
</nav>
