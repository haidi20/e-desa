@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Table Lowongan</h1>
      </div>
      <div class="col-md-6 text-right tombol-atas">
        <a href="{{route('lowongan.create')}}" class="btn btn-success btn-md button-top">Tambah</a>
      </div>
    </div>
    <hr class="dashed mt20 mb20">
    {{-- <div class="row">
      <form action="{{route('lowongan.index')}}" method="get">
        <div class="col-md-1 oke">
          <button type="submit" class="btn btn-success btn-md">Oke</button>
        </div>
      </form>
    </div> --}}
    <br>
    <div class="row">
  <div class="col-md-12">
    <table class="table table-bordered table-custom">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Perusahaan</th>
          <th>Nama Bidang</th>
          <th width="200px">Action</th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
    {{-- {!! $sekolah->appends(Request::input()); !!} --}}
  </div>
</div>

  </div>
@endsection
