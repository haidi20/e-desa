<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered table-custom">
      <thead>
        <tr>
          <th class="no">No</th>
          <th>Operator</th>
          <th>Username</th>
          <th>Nama Sekolah</th>
          <th>Kecamatan</th>
          <th>Alamat</th>
          <th width="140px">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($pengguna as $index => $item)
          <tr>
            <td>{{$index + 1}}</td>
            <td>{{$item->sekolah->operator}}</td>
            <td>{{$item->nama}}</td>
            <td>{{$item->sekolah->nama}}</td>
            <td>{{$item->sekolah->kecamatan->nama}}</td>
            <td>{{$item->sekolah->alamat}}</td>
            <td>
              <a href="{{route('pengguna.reset')}}" class="btn btn-sm btn-info">Reset</a>
              <a href="#" class="btn btn-sm btn-danger">Delete</a>
            </td>
          </tr>
        @empty
          <tr>
            <td align="center" colspan="7">Data Tidak Ada</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
