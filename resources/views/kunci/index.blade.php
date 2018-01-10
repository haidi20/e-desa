@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Kunci Admin</h1>
      </div>
      <div class="col-md-6 text-right">
        {{-- <a href="{{route('kunci.create')}}" class="btn btn-success btn-md tombol-atas">Tambah</a> --}}
      </div>
    </div>
    <hr>
    <div class="row">
      <form action="{{route('kunci.index')}}" method="get">
        <div class="col-md-3 col-md-offset-8">
          <div class="form-group">
            <label for="kecamatan" class="control-label">Kecamatan</label>
            <select name="kecamatan" id="kecamatan" class="form-control">
              <option value="">Semua Kecamatan</option>
            </select>
          </div>
        </div>
        <div class="col-md-1 text-right oke">
          <button type="submit" class="btn btn-md btn-success">Oke</button>
        </div>
      </form>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered table-custom">
          <thead>
            <tr>
              <th class="no">No</th>
              <th>Nama Kecamatan</th>
              <th class="action">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Samarinda Ulu</td>
              <td>
                <table width="100%">
                  <tr>
                    <td><a href="{{route('kunci.detail')}}" class="btn btn-sm btn-warning">Detail</a></td>
                    <td>
                      <div id="app">
                        <onoff></onoff>
                      </div>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
