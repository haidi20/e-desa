<template>
  <div>
    <a class="btn btn-sm btn-info" v-if="status" v-on:click="cek">On</a>
    <a class="btn btn-sm btn-danger" v-else="!status" v-on:click="cek">Off</a>
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
