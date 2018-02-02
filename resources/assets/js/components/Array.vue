<template lang="html">
  <div class="container-fluid">
    <br>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <button type="submit" class="btn btn-success btn-md" v-on:click="tmbh">Tambah</button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group" v-for="item in items">
          <input type="text" class="form-control" v-model="items.nama" placeholder="nama">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <pre>
          {{items.nama}}
        </pre>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      items: [{
        nama: ''
      }]
    }
  },
  methods:{
    tmbh: function(){
      this.items.push({
        nama: ''
      });
    }
  }
}
</script>

<style lang="css">
</style>
