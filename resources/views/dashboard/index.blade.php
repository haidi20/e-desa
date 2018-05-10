@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="jumbotron">
          <h1>Selamat Datang</h1>
          <br>
          @if (\Auth::user()->nama == 'saw')
            <p>
              Di Sistem Pendukung Keputusan Metode SAW untuk Penilaian Kinerja
              Standar Pelayanan Minimal
              Pada Pendidikan Dasar Kota Samarinda
            </p>
          @elseif(\Auth::user()->nama == 'topsis')
            <p>
              Di Sistem Pendukung Keputusan Metode TOPSIS untuk Penilaian Kinerja
              Standar Pelayanan Minimal
              Pada Pendidikan Dasar Kota Samarinda
            </p>
          @endif
          <br>
        </div>
      </div>
    </div>
  </div>
@endsection
