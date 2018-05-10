@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Data Kriteria</h1>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('kreteria.create')}}" class="btn btn-md btn-success buat">Buat</a>
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
              <th>Attribut</th>
              <th>Bobot</th>
              <th class="action">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($kreteria as $index => $item)
              <tr>
                <td>{{$index + 1}}</td>
                <td>{{$item->kode}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->attribute}}</td>
                <td>{{$item->bobot}}</td>
                <td>
                  <a href="{{route('kreteria.edit',$item->id)}}" class="btn btn-info btn-sm ">Edit</a>
                  <a href="{{route('kreteria.destroy',$item->id)}}"
                    data-method="DELETE" data-confirm="Anda yakin akan menghapus data ini?"
                    class="btn btn-sm btn-danger" title="Hapus Data">
                    Delete
                  </a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6">Data Tidak Ada</td>
              </tr>
            @endforelse

          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
