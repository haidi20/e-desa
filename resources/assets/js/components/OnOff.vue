<template>
  <div>
    <!-- <a class="btn btn-sm btn-info" v-if="status" v-on:click="cek"
      data-toggle="modal" data-target="#myModal">On</a>
    <a class="btn btn-sm btn-danger" v-else="!status" v-on:click="cek"
      data-toggle="modal" data-target="#myModal">Off</a> -->
      <div class="btn-group btn-group-justified m" >
        <a href="#" class="btn btn-sm" data-toggle="modal" data-target="#myModal" v-bind:class="[on]" v-on:click="cek('on')">On</a>
        <a href="#" class="btn btn-sm" data-toggle="modal" data-target="#myModal" v-bind:class="[off]" v-on:click="cek('off')">Off</a>
      </div>

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
              <button type="button" class="btn btn-success" data-dismiss="modal">Oke</button>
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
      status: true,
      on: 'btn-success',
      off: 'btn-default'
    }
  },
  methods:{
    cek: function(data){
      if (data == 'off') {
        this.on = 'btn-default';
        this.off= 'btn-danger';
        this.status = false;
      }else{
        this.on='btn-success';
        this.off='btn-default';
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
