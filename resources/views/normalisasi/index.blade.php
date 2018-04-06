@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Normalisasi</h1>
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
              <th class="action">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>kdsf</td>
              <td>jksdf</td>
              <td>98.45</td>
              <td>80.34</td>
              <td>94.23</td>
              <td>90.23</td>
              <td>88.33</td>
              <td>
                <a href="#" class="btn btn-info btn-sm ">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Delete</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
