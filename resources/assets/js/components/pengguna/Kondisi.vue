<template lang="html">
  <div>
    <div class="col-md-3 col-md-offset-5">
      <div class="form-group">
        <label for="kecamatan">Kecamatan</label>
        <select v-on:change="pilihKecamatan" v-model="item.id" name="kecamatan" id="kecamatan" class="form-control">
          <option value=''>Semua kecamatan</option>
          <option v-for="item in kecamatans" v-bind:value="item.id">{{item.nama}}</option>
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="sekolah">Sekolah</label>
        <select name="sekolah" id="sekolah" v-if="sekolahs.length" class="form-control">
          <option v-for="sekolah in sekolahs" v-bind:value="sekolah.id">{{sekolah.nama}}</option>
        </select>
        <select v-else class="form-control">
          <option value="">Data Kosong</option>
        </select>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      sekolahs: [],
      kecamatans: [],
      item: {
        id: ''
      }
    }
  },
  mounted(){
    this.bacaKecamatan();
  },
  methods: {
    bacaKecamatan: function(){
      axios.get('kecamatan/vue').then(response => {
        this.kecamatans = response.data;
      })
    },
    pilihKecamatan:function(){
      const data = this.item.id
      axios.get('sekolah/vue?kecamatan_id='+data).then(response => {
        // console.log(response.data);
        this.sekolahs = response.data;
      })
    }
  }
}
</script>

<style lang="css">
</style>
