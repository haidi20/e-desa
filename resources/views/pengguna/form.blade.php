@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Form Pengguna</h1>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('pengguna.index')}}" class="btn btn-success btn-md tombol-atas">Kembali</a>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-4 m">
        <form action="{{$action}}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="{{$method}}">
          <kecamatansekolah></kecamatansekolah>
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="nama">Username</label>
                <input type="text" name="nama" id="nama" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-1 col-md-offset-9">
              <button type="submit" class="btn btn-md btn-success">Oke</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <br>
    @include('pengguna.table')
  </div>
@endsection
