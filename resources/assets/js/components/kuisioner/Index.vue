<template lang="html">
  <div>
    <div class="row">
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
          <select name="sekolah" id="sekolah" v-if="sekolahs.length" v-model="item.sekolah_id" v-on:click="bacaInfo" class="form-control">
            <option v-for="sekolah in sekolahs" v-bind:value="sekolah.id">{{sekolah.nama}}</option>
          </select>
          <select v-else name="" id="" class="form-control">
            <option value="" >Data Kosong</option>
          </select>
        </div>
      </div>
      <div class="col-md-1 text-right">
        <button type="submit" class="btn btn-md btn-success oke" v-on:click="pertanyaan">Oke</button>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-md-12">
        <table>
          <tr>
            <td><h5>Nama Sekolah</h5></td>
            <td> &nbsp;:&nbsp;</td>
            <td  v-for="info in info">
              <h5>{{info.nama}}</h5>
            </td>
          </tr>
          <tr>
            <td><h5>Alamat </h5></td>
            <td>: &nbsp;</td>
            <td v-for="info in info">
              <h5>{{info.alamat}}</h5>
            </td>
          </tr>
          <tr>
            <td><h5>Kecamatan </h5></td>
            <td>: &nbsp;</td>
            <td v-for="info in info">
              <h5>{{info.kecamatan.nama}}</h5>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#satu" data-toggle="tab" v-on:click="pertanyaan('','1')">
            Pelayanan Pendidikan oleh Pemerintah Kota
          </a></li>
          <li class=""><a href="#dua" data-toggle="tab" v-on:click="pertanyaan('','2')">
            Pelayanan Pendidikan Dasar oleh Satuan Pendidikan
          </a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade active in" id="satu">
            <table class="table table-bordered table-custom">
              <thead>
                <tr>
                  <th class="no">No</th>
                  <th>Penjelasan</th>
                  <th>Isi</th>
                </tr>
              </thead>
              <tbody v-if="kuisioners.length">
                <tr v-for="(kuisioner, index) in kuisioners" v-if="kuisioner.tanya == '1'">
                  <td>{{index + 1}}</td>
                  <td>{{kuisioner.keterangan}}</td>
                  <td class="form" v-for="jawaban in jawabans" v-if="jawaban.pertanyaan == kuisioner.id && kuisioner.pilihan == '0'">
                    <input type="text" class="form-control input-kuisioner" v-model="jawaban.isi">
                  </td>
                  <td class="form" v-else-if="jawaban.pertanyaan == kuisioner.id && kuisioner.pilihan == '1'">
                    <select class="form-control" v-model="jawaban.isi">
                      <option value="1">Ya</option>
                      <option value="0">Tidak</option>
                    </select>
                  </td>
                </tr>
                <tr v-else>
                  <!-- <td>{{index + 1}}</td> -->
                  <td colspan="3" class="form">{{kuisioner.keterangan}}</td>
                </tr>
              </tbody>
              <tbody v-else><tr><td colspan="3">Data Kosong / loading</td></tr></tbody>
            </table>
            <div align="right"><vue-pagination :data="kuisionerData" v-on:pagination-change-page="pertanyaan"></vue-pagination></div>
          </div>
          <!-- <div class="tab-pane fade in" id="dua">
            <table class="table table-bordered table-custom">
              <thead>
                <tr>
                  <th class="no">No</th>
                  <th>Penjelasan</th>
                  <th>Isi</th>
                </tr>
              </thead>
              <tbody v-if="kuisioners.length">
                <tr v-for="(kuisioner, index) in kuisioners" v-if="kuisioner.tanya == '1'">
                  <td>{{index + 1}}</td>
                  <td>{{kuisioner.keterangan}}</td>
                  <td v-for="jawaban in jawabans" v-if="jawaban.id == kuisioner.id && kuisioner.pilihan == '0'">
                    <input type="text" class="form-control input-kuisioner" v-model="jawaban.isi">
                  </td>
                  <td v-else-if="jawaban.id == kuisioner.id && kuisioner.pilihan == '1'">
                    <select class="form-control select-kuisioner" v-model="jawaban.isi">
                      <option value="1">Ya</option>
                      <option value="0">Tidak</option>
                    </select>
                  </td>
                </tr>
                <tr v-else>
                  <td colspan="3" class="form">{{kuisioner.keterangan}}</td>
                </tr>
              </tbody>
              <tbody v-else><tr><td colspan="3">Data Kosong / loading</td></tr></tbody>
            </table>
            <div align="right"><vue-pagination :data="kuisionerData" v-on:pagination-change-page="pertanyaan"></vue-pagination></div>
          </div> -->
        </div>
        <div class="col-md-1 col-md-offset-11">
          <button type="submit" v-on:click="kirimKuisioner()" class="btn btn-md btn-success">Kirim</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return{
      item:{
        kecamatan_id: '',
        pendidikan_id: '',
        sekolah_id: ''
      },
      info:[],
      sekolahs: '',
      kecamatans:'',
      pendidikans:'',
      kuisioners: [],
      jawabans: [],
      kuisionerData: {},
      refresh: false,
      pindah: false,
      noTab: ''
    }
  },
  mounted(){
    this.bacaKecamatan(),
    this.bacaPendidikan(),
    this.pertanyaan()
  },
  methods:{
    bacaKecamatan: function(){
      axios.get('kecamatan/vue').then(response =>{
        this.kecamatans = response.data;
      })
    },
    bacaPendidikan: function(){
      axios.get('pendidikan/vue').then(response =>{
        this.pendidikans = response.data;
      })
    },
    bacaSekolah: function(){
      const kec = this.item.kecamatan_id;
      const pen = this.item.pendidikan_id;
      axios.get('sekolah/vue?kecamatan='+kec+'&&pendidikan='+pen+'&&kuisioner="true"').then(response =>{
        this.sekolahs = response.data;
      })
    },
    bacaInfo: function(){
      axios.get('kuisioner/info/vue?sekolah='+this.item.sekolah_id).then(response => {
        this.info = response.data;
      });
    },
    pertanyaan: function(page,tab){
      if (typeof page === 'undefined') {
				page = 1;
			}
      this.kondisiPindah(page,tab); // jawban fieldnya di hapus jika pindah tempat
      this.kondisiTabulasi(tab);     // data berganti sesuai tab dan paginate
      axios.get('kuisioner/pertanyaan/vue?page='+page+'&tab='+this.noTab).then(response => {
        this.kuisioners       = response.data.data;
        this.kuisionerData    = response.data;
        console.log(this.kuisionerData);
      })
      .catch(() => {
        alert('server pertanyaan bermasalah');
      });
      axios.get('kuisioner/jawaban/vue?sekolah='+this.item.sekolah_id).then(response =>{
        this.kondisiJawaban(response.data);
      });
    },
    kondisiJawaban: function(data){
      if (this.pindah) {
        this.jawabans.splice(0,data.length);
      }
      // console.log(data[1].jawaban[0].length);
      for (var i = 0; i < data.length; i++) {
        if (!data[i].jawaban[0]) {
          this.jawabans.push({
            pertanyaan: data[i].id,
            sekolah: this.item.sekolah_id,
            isi: ''
          })
        }else{
          this.jawabans.push({
            pertanyaan: data[i].id,
            sekolah: data[i].jawaban[0].sekolah_id,
            isi: data[i].jawaban[0].isi
          })
        }
      }
    },
    kirimKuisioner: function(){
      const data = {jawaban : this.jawabans} ;
      axios.post('kuisioner/vue/store',data).then(response =>{
        console.log('return value dari kuisioner store = '+response.data);
      })
      .catch(resp => {
        console.log(resp.response.data.errors);
      })
    },
    kondisiTabulasi: function(tab){
      if (typeof tab === 'undefined' && !this.$session.has('no') || !this.refresh) {
        this.$session.clear();
        this.noTab = 1;
        this.refresh = true;
        // console.log('no tab yang tab kosong dan tidak ada session = '+this.noTab);
      }else if(typeof tab === 'undefined' && this.$session.has('no')){
        this.noTab = this.$session.get('no');
        // console.log('no tab kosong dan ada session no =' + this.noTab);
      }else{
        this.$session.set('no',tab);
        this.noTab = this.$session.get('no');
        this.pindah = true;
        // console.log('ini no tab pakai session = '+this.noTab);
      }
    },
    kondisiPindah: function(page,tab){
      if (typeof tab !== 'undefined' || typeof page) {
        this.pindah = true;
      }
    }
  }
}
</script>

<style lang="css">
</style>
