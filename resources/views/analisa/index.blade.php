@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Hasil Analisa</h1>
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
              @for ($i=1; $i <= 5; $i++)
                <th>C{{$i}}</th>
              @endfor
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>kdsf</td>
              <td>jksdf</td>
              <td>10</td>
              <td>13</td>
              <td>45</td>
              <td>46</td>
              <td>34</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
