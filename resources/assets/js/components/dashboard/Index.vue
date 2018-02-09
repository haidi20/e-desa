<template lang="html">
  <div class="row">
    <div class="col-md-4">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="tahun" class="form-label">Tahun</label>
            <select name="tahun" id="tahun" class="form-control">
              <option value="">Pilih Tahun</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="periode" class="form-label">Periode</label>
            <select name="periode" id="periode" class="form-control">
              <option value="">Pilih Periode</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="pendidikan" class="form-label">Jenjang Pendidikan</label>
            <select name="pendidikan" v-on:change="bacaSekolah" v-model="item.pendidikan_id" id="pendidikan" class="form-control">
              <option value="">Semua Jenjang Pendidikan</option>
              <option v-for="pendidikan in pendidikans" v-bind:value="pendidikan.id">{{pendidikan.nama}}</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="kecamatan" class="form-label">Kecamatan</label>
            <select name="kecamatan" v-on:change="bacaSekolah" v-model="item.kecamatan_id" id="kecamatan" class="form-control">
              <option value="">Kota Samarinda</option>
              <option v-for="kecamatan in kecamatans" v-bind:value="kecamatan.id">{{kecamatan.nama}}</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="sekolah" class="form-label">Sekolah</label>
            <select name="sekolah" id="sekolah" v-if="sekolahs.length" v-model="item.sekolah_id" class="form-control">
              <option value="">Semua Sekolah</option>
              <option v-for="sekolah in sekolahs"  v-bind:value="sekolah.id">{{sekolah.nama}}</option>
            </select>
            <select v-else name="" id="" class="form-control">
              <option value="" >Data Kosong</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-1 col-md-offset-9">
          <button v-on:click="klikTombol" class="btn btn-md btn-success">Oke</button>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered table-custom">
        <thead>
          <tr>
            <th class="no">No</th>
            <th>Indikator Pencapaian (IP)</th>
            <th class="action">Persen</th>
          </tr>
        </thead>
        <tbody v-if="ip.length">
          <tr v-for="(ip, index) in ip" align="center">
            <td>{{index + 1}}</td>
            <td id="modal" data-toggle="modal" data-target="#myIp">{{ip.nama}}</td>
            <td v-on:click="bacaPencapaian(ip.nama)">
              <div id="modal" data-toggle="modal" data-target="#myPersen"
                   v-for="persen in persen" v-if="persen.nama == ip.nama">
                {{persen.isi}} %
              </div>
            </td>
            <modaldashboard v-bind:modal="modal"></modaldashboard>
          </tr>
        </tbody>
      </table>
      <!-- <div align="right"><vue-pagination :data="kuisionerData" v-on:pagination-change-page="pertanyaan"></vue-pagination></div> -->
    </div>
  </div>
</template>

<script>
import modaldashboard from './Modal.vue'
export default {
  component: ['modaldashboard'],
  data(){
    return{
      item:{
        kecamatan_id: '',
        pendidikan_id:'',
        sekolah_id: ''
      },
      modal: {
        pencapaians: [],
      },
      ip: [],
      persen: [],
      sekolahs: '',
      kecamatans: '',
      pendidikans:'',
    }
  },
  mounted(){
    this.bacaKecamatan(),
    this.bacaPendidikan(),
    this.bacaSekolah(),
    this.bacaIp()
  },
  methods:{
    bacaPencapaian: function(){
      const kec = this.item.kecamatan_id;
      axios.get('dashboard/pencapaian/vue?kecamatan='+kec).then(response => {
        this.modal.pencapaians = response.data;
      });
    },
    bacaIp: function(){
      axios.get('dashboard/ip/vue').then(response => {
        this.ip = response.data;
      });
    },
    bacaPendidikan:function(){
      axios.get('pendidikan/vue').then(response =>{
        this.pendidikans = response.data;
      })
    },
    bacaKecamatan: function(){
      axios.get('kecamatan/vue').then(response =>{
        this.kecamatans = response.data;
      })
    },
    bacaSekolah: function(){
      const kec = this.item.kecamatan_id;
      const pend = this.item.pendidikan_id;
      axios.get('sekolah/vue?kecamatan='+kec+'&&pendidikan='+pend).then(response => {
        this.sekolahs = response.data;
      })
    },
    klikTombol:function(){
      const sekolah     = this.item.sekolah_id;
      const kecamatan   = this.item.kecamatan_id;
      const pendidikan  = this.item.pendidikan_id;
      axios.get('dashboard/persen/vue?sekolah='+sekolah+'&pendidikan='+pendidikan+'&kecamatan='+kecamatan).then(response => {
        this.persen = response.data;
      });
    }
  }
}
</script>

<style lang="css">
</style>
