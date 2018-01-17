<template lang="html">
  <div class="col-md-3 col-md-offset-8">
    <div class="form-group">
      <label for="kecamatan">Kecamatan</label>
      <select name="kecamatan" id="kecamatan" class="form-control">
        <option value=''>Semua kecamatan</option>
        <option v-for="kecamatan in kecamatans" v-bind:value="kecamatan.id">{{kecamatan.nama}}</option>
      </select>
    </div>
  </div>
</template>

<script>
export default {
  props:['old'],
  data(){
    return{
      kecamatans:''
    }
  },
  mounted(){
    this.bacaKecamatan()
  },
  methods:{
    bacaKecamatan: function(){
      axios.get('kecamatan/vue').then(response => {
        this.kecamatans = response.data;
      })
    },
  }
}
</script>

<style lang="css">
</style>
