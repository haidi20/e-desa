<template lang="html">
  <div id="myIp2" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Penjelasan Indikator Pencapaian (IP)</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered table-custom">
            <thead>
              <tr>
                <th class="no">No</th>
                <th>Indikator Pencapaian (IP)</th>
                <th>Persen</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="i in 10" align="center">
                <td>{{i}}</td>
                <td>IP {{i}}</td>
                <td>{{hitung()}}%</td>
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
</template>

<script>
export default {
  mounted(){
    this.hitung()
  },
  methods:{
    hitung:function(){
      return Math.floor(Math.random() * (100-80+1)) + 80;
    }
  }
}
</script>

<style lang="css">
</style>
