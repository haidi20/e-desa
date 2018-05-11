@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Terbobot</h1>
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
              @forelse ($kreteria as $index => $item)
                <th>{{$item->kode}}</th>
              @empty

              @endforelse
            </tr>
          </thead>
          <tbody>
            @foreach ($kinerja as $index => $item)
              <tr>
                <td>{{$index + 1}}</td>
                <td>{{$item->alternatif->kode}}</td>
                <td>{{$item->alternatif->nama}}</td>
                @foreach ($kreteria as $key => $value)
                  <td>{{array_get($terbobot[$item->alternatif_id],$value->id)}}</td>
                @endforeach
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
