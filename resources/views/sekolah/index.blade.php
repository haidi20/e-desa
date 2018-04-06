@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Data Sekolah</h1>
      </div>
    </div>
    <hr class="dashed mb20 mt20">
    <br>
    <div class="row">
      <div class="col-md-offset-2 col-md-8">
        <table class="table table-bordered text-center">
          <thead >
            <tr>
              <th class="no">No</th>
              <th>Nama Sekolah</th>
              <th>Jumlah Ruang Kelas</th>
              <th>Jumlah Murid</th>
              <th>Jumlah Guru</th>
              <th class="action">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>kdsf</td>
              <td>kdsjf</td>
              <td>kdjf</td>
              <td>ksdjf</td>
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
