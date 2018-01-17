<template lang="html">
  <div>
    <div id="myIp" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Penjelasan Indikator Pencapaian (IP)</h4>
          </div>
          <div class="modal-body">
            <p>Jumlah Kelompok permukiman permanen yang sudah dilayani SD/MI dalam jarak kurang dari 3 KM.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Oke</button>
          </div>
        </div>
      </div>
    </div>

    <div id="myPersen" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Penjelasan Jumlah sekolah pada IP {{ip}} :</h4>
          </div>
          <div class="modal-body">
            <table class="table" style="border:none">
              <tbody>
                <tr>
                  <td id="modal" data-toggle="modal" data-target="#myDetail">Jumlah sekolah sudah memenuhi IP 1</td>
                  <td>:</td>
                  <td>6</td>
                </tr>
                <tr>
                  <td id="modal" data-toggle="modal" data-target="#myDetail">Jumlah sekolah belum memenuhi IP 1</td>
                  <td>:</td>
                  <td>7</td>
                </tr>
                <tr>
                  <td>Jumlah sekolah di Kota Samarinda</td>
                  <td>:</td>
                  <td>13</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Oke</button>
          </div>
        </div>
      </div>
    </div>

    <div id="myDetail" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Daftar sekolah sudah/belum memenuhi syarat IP :</h4>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-custom">
              <thead>
                <tr>
                  <th class="no">No</th>
                  <th>Nama Sekolah</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>SD Muh 2</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>SMP Muh 2</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Oke</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props:['ip'],
}
</script>

<style lang="css">
</style>
