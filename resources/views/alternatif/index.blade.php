@extends('_layouts.default')

@section('konten')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Data Alternatif</h1>
      </div>
      <div class="col-md-6 text-right">
        <a href="{{route('alternatif.create')}}" class="btn btn-success btn-md buat" >Buat</a>
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
              <th>Kode Sekolah</th>
              <th>Nama Sekolah</th>
              <th class="action">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($alternatif as $index => $item)
              <tr>
                <td>{{$index + 1}}</td>
                <td>{{$item->kode}}</td>
                <td>{{$item->nama}}</td>
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
                <td colspan="4">Data Tidak Ada</td>
              </tr>
            @endforelse
            {{-- <tr>
              <td>1</td>
              <td>kdsf</td>
              <td>jksdf</td>
              <td>
                <a href="#" class="btn btn-info btn-sm ">Edit</a>
                <a href="#" class="btn btn-danger btn-sm">Delete</a>
              </td>
            </tr> --}}
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
