@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Kreteria</h1>
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
              <th>ID</th>
              <th>Kreteria</th>
              <th>Atribut</th>
              <th>Bobot</th>
              <th class="action">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>kdsf</td>
              <td>jksdf</td>
              <td>kdsf</td>
              <td>jksdf</td>
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
