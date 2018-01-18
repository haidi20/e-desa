<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#satu" data-toggle="tab" aria-expanded="true">
        Pelayanan Pendidikan oleh Pemerintah Kota
      </a></li>
      <li class=""><a href="#dua" data-toggle="tab" aria-expanded="false">
        Pelayanan Pendidikan Dasar oleh Satuan Pendidikan
      </a></li>
    </ul>
    <form action="{{route('kuisioner.store')}}" method="post">
      {{ csrf_field() }}
      <input type="hidden" name="_method" value="post">
      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="satu">
          <table class="table table-bordered table-custom">
            <thead>
              <tr>
                <th class="no">No</th>
                <th>Penjelasan</th>
                <th>Isi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($pertanyaan as $index => $item)
                <tr>
                  <td>{{$index + 1}}</td>
                  <td {{$item->tanya == '0'?'colspan=2':''}}>{{$item->keterangan->nama}}</td>
                  @if ($item->pilihan == '1' && $item->tanya == '1' && $item->penyedia_id == '1')
                    <td>
                      <select name="isi" class="form-control">
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                      </select>
                    </td>
                  @elseif($item->pilihan == '0' && $item->tanya == '1' && $item->penyedia_id == '1')
                    <td class="form">
                      <input type="text" name="isi" value="{{old('isi')}}" class="form-control">
                    </td>
                  @endif
                </tr>
              @empty
                <tr>
                  <td colspan="3">Data Tidak Ada</td>
                </tr>
              @endforelse
            </tbody>
          </table>
          {{$pertanyaan->links()}}
        </div>
        <div class="tab-pane fade in" id="dua">
          <table class="table table-bordered table-custom">
            <thead>
              <tr>
                <th class="no">No</th>
                <th>Penjelasan</th>
                <th>Isi</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($pertanyaan as $index => $item)
                <tr>
                  <td>{{$index + 1}}</td>
                  <td {{$item->tanya == '0'?'colspan=2':''}}>{{$item->keterangan->nama}}</td>
                  @if ($item->pilihan == '1' && $item->tanya == '1' && $item->penyedia_id == '2')
                    <td>
                      <select name="isi" class="form-control">
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                      </select>
                    </td>
                  @elseif($item->pilihan == '0' && $item->tanya == '1' && $item->penyedia_id == '2')
                    <td class="form">
                      <input type="text" name="isi" value="{{old('isi')}}" class="form-control">
                    </td>
                  @endif
                </tr>
              @empty
                <tr>
                  <td colspan="3">Data Tidak Ada</td>
                </tr>
              @endforelse
            </tbody>
          </table>
          {{$pertanyaan->links()}}
        </div>
      </div>
      <div class="col-md-1 col-md-offset-11">
        <button type="submit" class="btn btn-md btn-success">Kirim</button>
      </div>
    </form>
  </div>
</div>
