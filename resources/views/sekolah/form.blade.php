@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Form Daftar Sekolah</h1>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('sekolah.index')}}" class="btn btn-success btn-md tombol-atas">Kembali</a>
      </div>
    </div>
    <hr class="dashed m mt20 mb20">
    <div class="row">
      <div class="col-md-4 m">
        <form action="{{$action}}" method="post" class="form-horizontal">
          <input type="hidden" name="_method" value="{{$method}}">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md">
              <div class="form-group {{kondisi_error($errors,'kecamatan_id')}}">
                <label for="kecamatan_id" class="control-label">Kecamatan</label>
                <select name="kecamatan_id" id="kecamatan_id" class="form-control" >
                  <option value="">Pilih Kecamatan</option>
                  @foreach ($kecamatan as $index => $item)
                    <option value="{{$item->id}}" {{old('kecamatan_id') == $item->id?'selected':''}}>{{$item->nama}}</option>
                  @endforeach
                </select>
                <p class="tulisan-error">{{kondisi_tulisan_error($errors,'kecamatan_id')}}</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group {{kondisi_error($errors,'pendidikan_id')}}">
                <label for="pendidikan_id">Jenjang Pendidikan</label>
                <select name="pendidikan_id" id="pendidikan_id" class="form-control">
                  <option value="">Pilih Jenjang Pendidikan</option>
                  @foreach ($pendidikan as $index => $item)
                    <option value="{{$item->id}}" {{old('pendidikan_id') == $item->id?'selected':''}}>{{$item->nama}}</option>
                  @endforeach
                </select>
                <p class="tulisan-error">{{kondisi_tulisan_error($errors,'pendidikan_id')}}</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group {{kondisi_error($errors,'nama')}}">
                <label for="nama">Nama Sekolah</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{old('nama')}}">
                <p class="tulisan-error">{{kondisi_tulisan_error($errors,'nama')}}</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group {{kondisi_error($errors,'hp')}}">
                <label for="hp">Nomor Tlp/HP</label>
                <input type="text" name="hp" id="hp" class="form-control" value="{{old('hp')}}">
                <p class="tulisan-error">{{kondisi_tulisan_error($errors,'hp')}}</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group {{kondisi_error($errors,'operator')}}">
                <label for="operator">Nama Operator</label>
                <input type="text" id="operator" name="operator" class="form-control" value="{{old('operator')}}">
                <p class="tulisan-error">{{kondisi_tulisan_error($errors,'operator')}}</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md">
              <div class="form-group {{kondisi_error($errors,'alamat')}}">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="{{old('alamat')}}">
                <p class="tulisan-error">{{kondisi_tulisan_error($errors,'alamat')}}</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-offset-10">
              <button class="btn btn-success btn-md">Kirim</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
