@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Penilaian Kinerja</h1>
      </div>
    </div>
    <hr class="dashed mb20 mt20">
    <br>
    <div class="row">
      <div class="col-md-offset-2 col-md-8">
        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th class="no">No</th>
              <th>Kode Sekolah</th>
              <th>Nama Sekolah</th>
              <th>Nilai</th>
              <th>Ranking</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kinerja as $index => $item)
              <tr>
                <td>{{$index + 1}}</td>
                <td>{{$item->alternatif->kode}}</td>
                <td>{{$item->alternatif->nama}}</td>
                <td>{{$item->nilai}}</td>
                <td>{{$item->peringkat}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
