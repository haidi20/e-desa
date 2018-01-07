<template>
    <div>
      <a class="btn btn-sm btn-info" v-if="status" v-on:click="cek"
        data-toggle="modal" data-target="#myModal">On</a>
      <a class="btn btn-sm btn-danger" v-else="!status" v-on:click="cek"
        data-toggle="modal" data-target="#myModal">Off</a>
      <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pemberitahuan</h4>
      </div>
      <div class="modal-body">
        <p>Bahwa Kecamatan atau sekolah ini telah on/off input data</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    </div>
</template>

<script>
export default {
  data(){
    return{
      status: true
    }
  },
  methods:{
    cek: function(){
      if (this.status == true) {
        this.status = false;
      }else{
        this.status = true;
      }
      console.log(this.status);
    }
  }
}
</script>

<style lang="css">
  .on{
    padding:0px auto;
  }
</style>
