<template lang="html">
  <div class="col-md-3">
    <div class="form-group">
      <label for="sekolah">Sekolah</label>
      <select name="sekolah" id="sekolah" class="form-control">
        <option value="">Semua Sekolah</option>
        <option v-for="sekolah in sekolahs" v-bind:value="sekolah.id">{{sekolah.nama}}</option>
      </select>
    </div>
  </div>
</template>

<script>
export default {
  props:['item'],
  data: () => ({
    sekolahs: [],
    item:{
      id: ''
    }
  }),
  mounted(){
    this.baca();
  },
  methods: {
    baca: function(){
      const data = this.item.id
      axios.get('sekolah/vue?kecamatan_id='+data).then(response => {
        this.sekolahs = response.data;
      });
    }
  }
}
</script>

<style lang="css">
</style>
