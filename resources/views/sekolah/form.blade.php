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
                    <option value="{{$item->id}}" {{$alternatif_id == $item->id?'selected':''}}>{{$item->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          {{-- @forelse ($hasil as $index => $item) --}}
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  @forelse ($kreteria as $index => $item)
                    <label for="nilai">{{$item->nama}}</label>
                    <input type="text" name="nilai[{{$item->id}}]" id="nilai" class="form-control" value="{{array_get($nilai,$item->id)}}">
                    <input type="hidden" name="kreteria[]" value="{{$item->kreteria_id}}">
                    <input type="hidden" name="konfirm" value="true">
                  @empty

                  @endforelse
                </div>
              </div>
            </div>
          {{-- @empty --}}
            {{-- <div class="row">
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
                  <label for="nilai">nilai</label>
                  <input type="text" name="nilai" id="nilai" class="form-control" value="{{old('nilai')}}">
                </div>
              </div>
            </div> --}}
          {{-- @endforelse --}}
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
