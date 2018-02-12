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
    <hr class="dashed mt20 mb20">
    <div class="row">
      <form action="{{route('kunci.detail')}}" method="get">
        <div class="col-md-3 col-md-offset-8">
          <div class="form-group">
            <label for="sekolah">Sekolah</label>
            <select name="sekolah" id="sekolah" class="form-control">
              <option value="">Semua Sekolah</option>
              @foreach ($d_sekolah as $index => $item)
                <option value="{{$item->id}}" {{request('sekolah') == $item->id?'selected':''}}>{{$item->nama}}</option>
              @endforeach
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
              <th>Nama Sekolah</th>
              <th width="150px">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($t_sekolah as $index => $item)
              <tr>
                <td>{{$index + 1}}</td>
                <td>{{$item->nama}}</td>
                <td>
                  <onoff></onoff>
                </td>
              </tr>
            @empty
              <tr>
                <td align="center" colspan="3">Data Tidak Ada</td>
              </tr>
            @endforelse
          </tbody>
        </table>
        {!! $t_sekolah->appends(Request::input()) !!}
      </div>
    </div>
  </div>
@endsection
