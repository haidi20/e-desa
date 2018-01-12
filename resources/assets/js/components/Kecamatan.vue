<template lang="html">
<div>
  <div class="col-md-3 col-md-offset-5">
    <div class="form-group">
      <label for="kecamatan">Kecamatan</label>
      <select v-model="item.id" name="kecamatan" id="kecamatan" class="form-control">
        <option value=''>Semua kecamatan</option>
        <option v-for="kecamatan in kecamatans" v-bind:value="kecamatan.id">{{kecamatan.nama}}</option>
      </select>
    </div>
  </div>
  <sekolah :item="item" class="sekolah"></sekolah>
</div>
</template>

<script>
import sekolah from './sekolah.vue'
export default {
  components:{sekolah},
  data: () => ({
    kecamatans : [],
    item: {
      id : '',
      nama: ''
    },
  }),
  mounted(){
    this.baca()
  },
  methods: {
    baca: function (){
      axios.get('kecamatan/vue').then(response => {
        this.kecamatans = response.data;
      })
    },
    // pilihKecamatan: function(){
    //   const data = this.item.id
    //   axios.get('sekolah/vue?kecamatan_id='+data).then(response => {
    //     console.log(response.data);
    //   })
    // }
    // v-on:change="pilihKecamatan"
  }
}
</script>

<style lang="css">
  .sekolah{
    display:none
  }
</style>
