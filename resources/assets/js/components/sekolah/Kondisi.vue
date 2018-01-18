<template lang="html">
  <div>
    <div class="col-md-3 col-md-offset-2">
      <div class="form-group">
        <label for="pendidikan">Jenjang Pendidikan</label>
        <select name="pendidikan" v-on:change="pilihSekolah" v-model="item.pendidikan_id" id="pendidikan" class="form-control">
          <option value="">Semua Jenjang Pendidikan</option>
          <option v-for="pendidikan in pendidikans" v-bind:value="pendidikan.id">{{pendidikan.nama}}</option>
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="kecamatan">Kecamatan</label>
        <select name="kecamatan" v-on:change="pilihSekolah" v-model="item.kecamatan_id" id="kecamatan" class="form-control">
          <option value="">Semua Kecamatan</option>
          <option v-for="kecamatan in kecamatans" v-bind:value="kecamatan.id">{{kecamatan.nama}}</option>
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="sekolah">Sekolah</label>
        <select name="sekolah" id="sekolah" class="form-control">
          <option value="">Semua Sekolah</option>
          <option
            v-for="sekolah in sekolahs"
            v-bind:value="sekolah.id">{{sekolah.nama}}
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
      sekolahs: ''
    }
  },
  mounted(){
    this.bacaPendidikan(),
    this.bacaKecamatan(),
    this.bacaSekolah()
  },
  methods:{
    bacaPendidikan: function(){
      axios.get('pendidikan/vue').then(response => {
        // console.log(response.data);
        this.pendidikans = response.data;
      })
    },
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
    pilihSekolah: function(){
      const pen   = this.item.pendidikan_id;
      const kec   = this.item.kecamatan_id;
      const sek   = this.item.sekolah_id;
      console.log(pen);
      axios.get('sekolah/vue?pendidikan='+pen+'&&kecamatan='+kec+'&&sekolah='+sek).then(response => {
        this.sekolahs = response.data;
        // console.log(response.data);
      })
    }
  }
}
</script>

<style lang="css">
</style>
