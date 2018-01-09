<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab" aria-expanded="true">
        Pelayanan Pendidikan oleh Pemerinda Kota
      </a></li>
      <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">
        Pelayanan Pendidikan Dasar oleh Satuan Pendidikan
      </a></li>
    </ul>
    <form action="{{route('kuisioner.store')}}" method="post">
      {{ csrf_field() }}
      <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="home">
          <table class="table table-bordered table-custom">
            <thead>
              <tr>
                <th class="no">No</th>
                <th>Penjelasan</th>
                <th>Isi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Berapa Jumlah siswa di sekolah ini ?</td>
                <td class="form"><input type="text" class="form-control" name="isi" value="{{old('isi')}}"></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="tab-pane fade" id="profile">
          <table class="table table-bordered table-custom">
            <thead>
              <tr>
                <th class="no">No</th>
                <th>Penjelasan</th>
                <th>Isi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Berapa jumlah rombongan belajar sekolah ini ?</td>
                <td class="form"><input type="text" class="form-control" name="isi" value="{{old('isi')}}12"></td>
              </tr>
              <tr>
                <td>2</td>
                <td>Apakah jumlah rombongan belajar yang jumlah siswanya tidak melebihi 32 siswa ?
                </td>
                <td class="form">
                  <select name="isi" class="form-control">
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-1 col-md-offset-11">
        <button type="submit" class="btn btn-md btn-success">Kirim</button>
      </div>
    </form>
  </div>
</div>
