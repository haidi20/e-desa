<template lang="html">
  <div>
    <div class="row">
      <div class="form-group">
        <label for="kecamatan">Kecamatan</label>
        <select name="kecamatan" v-on:change="pilihSekolah" v-model="item.kecamatan_id" id="kecamatan" class="form-control">
          <option value="">Semua Kecamatan</option>
          <option v-for="kecamatan in kecamatans" v-bind:value="kecamatan.id">{{kecamatan.nama}}</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="form-group">
        <label for="sekolah">Sekolah</label>
        <select name="sekolah" id="sekolah" class="form-control">
          <option value="">Semua Sekolah</option>
          <option
            v-for="sekolah in sekolahs"
            v-bind:value="sekolah.id">
            {{sekolah.nama}}
          </option>
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
        pendidikan_id: '',
        kecamatan_id: '',
        sekolah_id: ''
      },
      pendidikans: '',
      kecamatans: '',
      sekolahs: '',
      tempatKecamatan: window.location.origin + '/kecamatan/vue',
      tempatSekolah: window.location.origin + '/sekolah/vue'
    }
  },
  mounted(){
    this.bacaKecamatan()
  },
  methods:{
    bacaKecamatan: function(){
      axios.get(this.tempatKecamatan).then(response => {
        this.kecamatans = response.data;
      })
    },
    pilihSekolah: function(){
      const kec   = this.item.kecamatan_id;
      axios.get(this.tempatSekolah+'?kecamatan='+kec).then(response => {
        this.sekolahs = response.data;
      })
    }
  }
}
</script>

<style lang="css">
</style>
