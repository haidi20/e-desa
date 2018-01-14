<template>
  <div>
      <div class="btn-group btn-group-justified m" >
        <a href="#"
          class="btn btn-sm" data-toggle="modal" data-target="#myModal"
          v-bind:class="[on]" v-on:click="pilih('on')" v-bind:value="nomor" ref="hidup">On
        </a>
        <a href="#"
          class="btn btn-sm" data-toggle="modal" data-target="#myModal"
          v-bind:class="[off]" v-on:click="pilih('off')" v-bind:value="nomor" ref="mati">Off
        </a>
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
  props:{
    nomor: {
      default: 'true',
      type: String
    }
  },
  data(){
    return{
      status: true,
      on: 'btn-success',
      off: 'btn-default',
    }
  },
  mounted(){
    this.cek()
  },
  methods:{
    pilih: function(data){
      if (data == 'off') {
        this.on = 'btn-default';
        this.off= 'btn-danger';
        this.status = false;
      }else{
        this.on='btn-success';
        this.off='btn-default';
        this.status = true;
      }
      console.log(this.nomor);
    },
    cek: function(){
      if (this.nomor == 'true') {
        this.on = 'btn-default';
        this.off= 'btn-danger';
        this.status = false;
      }
      if(this.nomor == 'false'){
        this.on='btn-success';
        this.off='btn-default';
        this.status = true;
      }
    }
  }
}
</script>

<style lang="css">
  .on{
    padding:0px auto;
  }
</style>
