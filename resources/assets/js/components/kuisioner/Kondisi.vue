<template lang="html">
  <div>
    <div class="col-md-3 col-md-offset-2">
      <div class="form-group">
        <label for="pendidikan" class="form-label">Jenjang Pendidikan</label>
        <select name="pendidikan" v-on:change="bacaSekolah" v-model="item.pendidikan_id" id="pendidikan" class="form-control">
          <option value="">Pilih Jenjang Pendidikan</option>
          <option v-for="pendidikan in pendidikans" v-bind:value="pendidikan.id">{{pendidikan.nama}}</option>
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="kecamatan" class="form-label">Kecamatan</label>
        <select name="kecamatan" v-on:change="bacaSekolah" v-model="item.kecamatan_id" id="kecamatan" class="form-control">
          <option value="">Pilih Kecamatan</option>
          <option v-for="kecamatan in kecamatans" v-bind:value="kecamatan.id">{{kecamatan.nama}}</option>
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="sekolah" class="form-label">Sekolah</label>
        <select name="sekolah" id="sekolah" v-if="sekolahs.length" v-model="item.sekolah_id" class="form-control">
          <option v-for="sekolah in sekolahs" v-bind:value="1">{{sekolah.nama}}</option>
        </select>
        <select v-else name="" id="" class="form-control">
          <option value="" >Data Kosong</option>
        </select>
      </div>
    </div>
    <div class="col-md-1 text-right">
      <button type="submit" class="btn btn-md btn-success oke" v-on:click="kirim">Oke</button>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      item:{
        kecamatan_id: '',
        pendidikan_id: '',
        sekolah_id: ''
      },
      sekolahs: '',
      kecamatans:'',
      pendidikans:''
    }
  },
  mounted(){
    this.bacaKecamatan(),
    this.bacaPendidikan()
  },
  methods:{
    bacaKecamatan:function(){
      axios.get('kecamatan/vue').then(response =>{
        this.kecamatans = response.data;
      })
    },
    bacaPendidikan:function(){
      axios.get('pendidikan/vue').then(response =>{
        this.pendidikans = response.data;
      })
    },
    bacaSekolah:function(){
      const kec = this.item.kecamatan_id;
      const pen = this.item.pendidikan_id;
      axios.get('sekolah/vue?kecamatan='+kec+'&&pendidikan='+pen+'&&kuisioner="true"').then(response =>{
        this.sekolahs = response.data;
      })
    },
    kirim:function(){
      const sek = this.item.sekolah_id;
      axios.get('kuisioner/pertanyaan/vue?sekolah='+sek).then(response =>{
        
      })
    }
  }
}
</script>

<style lang="css">
</style>
