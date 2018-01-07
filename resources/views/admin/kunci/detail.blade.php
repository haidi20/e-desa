@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Detail Kunci</h1>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('kunci.index')}}" class="btn btn-md btn-success tombol-atas">Kembali</a>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-custome">
          <thead>
            <tr>
              <th class="no">No</th>
              <th>Nama Sekolah</th>
              <th width="20px">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>SD Muhammadiyah 2 Samarinda</td>
              <td id="app">
                {{-- <onoff></onoff> --}}
                <button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-original-title="" title="">Left</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
