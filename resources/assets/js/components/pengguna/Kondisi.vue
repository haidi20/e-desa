<template lang="html">
  <div>
    <div class="col-md-3 col-md-offset-5">
      <div class="form-group">
        <label for="kecamatan">Kecamatan</label>
        <select v-on:change="pilihKecamatan" v-model="item.kecamatan_id" name="kecamatan" id="kecamatan" class="form-control">
          <option value=''>Semua kecamatan</option>
          <option v-for="kecamatan in kecamatans" v-bind:value="kecamatan.id">{{kecamatan.nama}}</option>
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="sekolah">Semua Sekolah</label>
        <select name="sekolah" id="sekolah" v-model="item.sekolah_id" class="form-control">
          <option value="">Semua Sekolah</option>
          <option v-for="sekolah in sekolahs" v-bind:value="sekolah.id">{{sekolah.nama}}</option>
        </select>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      item: {
        kecamatan_id:'',
        sekolah_id:''
      },
      sekolahs: '',
      kecamatans: '',
    }
  },
  mounted(){
    this.bacaKecamatan(),
    this.bacaSekolah()
  },
  methods: {
    bacaKecamatan: function(){
      axios.get('kecamatan/vue').then(response => {
        this.kecamatans = response.data;
      })
    },
    bacaSekolah: function(){
      axios.get('sekolah/vue').then(response => {
        this.sekolahs = response.data;
      })
    },
    pilihKecamatan:function(){
      const kec = this.item.kecamatan_id;
      axios.get('sekolah/vue?kecamatan='+kec).then(response => {
        // console.log(response.data);
        this.sekolahs = response.data;
      })
    }
  }
}
</script>

<style lang="css">
</style>
