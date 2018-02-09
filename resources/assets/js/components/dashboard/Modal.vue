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
            <h4 class="modal-title">Penjelasan Jumlah sekolah pada IP :</h4>
          </div>
          <div class="modal-body">
            <table class="table" style="border:none">
              <tbody>
                <tr>
                  <td id="modal" data-toggle="modal" data-target="#myDetailLolos">Jumlah sekolah sudah memenuhi IP 1</td>
                  <td>:</td>
                  <td v-for="data in modal">{{data.lolos}}</td>
                </tr>
                <tr>
                  <td id="modal" data-toggle="modal" data-target="#myDetailTidak">Jumlah sekolah belum memenuhi IP 1</td>
                  <td>:</td>
                  <td v-for="data in modal">{{data.tidak}}</td>
                </tr>
                <tr>
                  <td>Jumlah sekolah di Kota Samarinda</td>
                  <td>:</td>
                  <td></td>
                  <!-- <td v-for="item in data">{{item.lolos}}</td> -->
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

    <div id="myDetailLolos" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">
              Daftar sekolah sudah memenuhi syarat IP :
            </h4>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-custom">
              <thead>
                <tr>
                  <th class="no">No</th>
                  <th>Nama Sekolah</th>
                </tr>
              </thead>
              <tbody v-for="data in modal">
                <tr v-for="(item, index) in data.sekolahlolos">
                  <td>{{index}}</td>
                  <td>{{item.nama}}</td>
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

    <div id="myDetailTidak" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">
              Daftar sekolah belum memenuhi syarat IP :
            </h4>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-custom">
              <thead>
                <tr>
                  <th class="no">No</th>
                  <th>Nama Sekolah</th>
                </tr>
              </thead>
              <tbody v-for="data in modal">
                <tr v-for="(item, index) in data.sekolahtidak">
                  <td>{{index}}</td>
                  <td>{{item.nama}}</td>
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
  props:['modal'],
  methods:{
    nomor: function(item){
      for (var i = 0; i < item.length; i++) {
        this.no = i + 1;
      }
      return this.no;
    }
  }
}
</script>

<style lang="css">
</style>
