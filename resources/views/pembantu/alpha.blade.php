@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Pembagi</h1>
      </div>
    </div>
    <hr class="dashed mb20 mt20">
    <br>
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <table class="table table-bordered text-center">
          <thead >
            <tr>
              <th rowspan="2" class="no pembantu">No</th>
              <th rowspan="2" class="pembantu">Kode</th>
              <th colspan="2">Nilai</th>
            </tr>
            <tr>
              <th>A+</th>
              <th>A-</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pembantu as $index => $item)
              <tr>
                <td>{{$index + 1}}</td>
                <td>{{$item->kreteria->kode}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
