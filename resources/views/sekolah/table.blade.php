<div class="row">
  <div class="col-md-12">
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
        @forelse ($sekolah as $index => $item)
          @if ($item->alternatif)
            <tr>
              <td>{{$index + 1}}</td>
              <td>{{$item->alternatif->nama}}</td>
              @foreach ($kreteria as $key => $value)
                <td>{{array_get($nilai[$item->alternatif_id],$value->id)}}</td>
              @endforeach
              <td>
                <a href="{{route('sekolah.edit',$item->alternatif_id)}}" class="btn btn-info btn-sm ">Edit</a>
                <a href="{{route('sekolah.destroy',$item->id)}}"
                  data-method="DELETE" data-confirm="Anda yakin akan menghapus data ini?"
                  class="btn btn-sm btn-danger" title="Hapus Data">
                  Delete
                </a>
              </td>
            </tr>
          @endif
        @empty
          <tr>
            <td colspan="{{3 + count($kreteria)}}" align="center">Data Tidak Ada</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
