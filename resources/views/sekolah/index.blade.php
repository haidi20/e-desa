@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Data Sekolah</h1>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('sekolah.create')}}" class="btn btn-md btn-success buat">Buat</a>
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
              @forelse ($kreteria as $index => $item)
                <th>{{$item->nama}}</th>
              @empty

              @endforelse
              <th class="action">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($hasil as $index => $item)
              <tr>
                <td>{{$index + 1}}</td>
                <td>{{$item->alternatif->nama}}</td>
                @foreach ($kreteria as $index => $item)
                  <td>{{array_get($sekolah,$item->id)}}</td>
                @endforeach
                <td>
                  <a href="{{route('alternatif.edit',$item->id)}}" class="btn btn-info btn-sm ">Edit</a>
                  <a href="{{route('alternatif.destroy',$item->id)}}"
                    data-method="DELETE" data-confirm="Anda yakin akan menghapus data ini?"
                    class="btn btn-sm btn-danger" title="Hapus Data">
                    Delete
                  </a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="{{3 + count($kreteria)}}" align="center">Data Tidak Ada</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
