@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Form Sekolah</h1>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('sekolah.index')}}" class="btn btn-success btn-md buat">Kembali</a>
      </div>
    </div>
    <hr class="dashed mb20 mt20">
    <br>
    <div class="row">
      <div class="col-md-4 m">
        <form action="{{$action}}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="{{$method}}">
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="alternatif">Alternatif</label>
                <select name="alternatif" id="alternatif" class="form-control">
                  <option value="">Pilih Alternatif</option>
                  @foreach ($alternatif as $index => $item)
                    <option value="{{$item->id}}" {{old('alternatif_id') == $item->id?'selected':''}}>{{$item->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="kreteria">Kreteria</label>
                <select name="kreteria" id="kreteria" class="form-control">
                  <option value="">Pilih Kreteria</option>
                  @foreach ($kreteria as $index => $item)
                    <option value="{{$item->id}}">{{$item->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group">
                <label for="nilai">Nilai</label>
                <input type="text" name="nilai" id="nilai" class="form-control" value="{{old('nilai')}}">
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
  </div>
@endsection
