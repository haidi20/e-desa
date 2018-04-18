<div class="row">
  <div class="col-md-offset-2 col-md-8">
    <table class="table table-bordered text-center">
      <thead >
        <tr>
          <th class="no">No</th>
          <th>Kode Sekolah</th>
          <th>Nama Sekolah</th>
          @forelse ($kreteria as $index => $item)
            <th>{{$item->kode}}</th>
          @empty

          @endforelse
        </tr>
      </thead>
      <tbody>
        @forelse ($sekolah as $index => $item)
          @if ($item->alternatif)
            <tr>
              <td>{{$index + 1}}</td>
              <td>{{$item->alternatif->kode}}</td>
              <td>{{$item->alternatif->nama}}</td>
              @foreach ($kreteria as $key => $value)
                <td>{{array_get($nilai[$item->alternatif_id],$value->id)}}</td>
              @endforeach
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
