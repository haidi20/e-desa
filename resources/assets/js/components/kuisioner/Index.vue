<template lang="html">
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
                <td class="form" v-for="jawaban in jawabans" v-if="jawaban.id == kuisioner.id && kuisioner.pilihan == '0'">
                  <input type="text" class="form-control input-kuisioner" v-model="jawaban.isi">
                </td>
                <td class="form" v-else-if="jawaban.id == kuisioner.id && kuisioner.pilihan == '1'">
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
</template>

<script>
export default {
  data() {
    return{
      kuisioners: [],
      jawabans: [],
      kuisionerData: {},
      refresh: false,
      pindah: false,
      noTab: ''
    }
  },
  mounted(){
    this.pertanyaan()
  },
  methods:{
    pertanyaan: function(page,tab){
      if (typeof page === 'undefined') {
				page = 1;
			}
      this.kondisiJawaban(page,tab); // jawban fieldnya di hapus jika pindah tempat
      this.kondisiTabulasi(tab);     // data berganti sesuai tab dan paginate
      axios.get('kuisioner/pertanyaan/vue?page='+page+'&tab='+this.noTab).then(response => {
        this.kuisioners       = response.data.data;
        this.kuisionerData    = response.data;
        this.jawaban(this.kuisioners);
      })
      .catch(() => {
        alert('server pertanyaan bermasalah');
      });
    },
    jawaban: function(data){
      if (this.pindah) {
        this.jawabans.splice(0,10);
      }
      for (var i = 0; i < data.length; i++) {
        if (!data[i].jawaban.length) {
          this.jawabans.push({
            id: data[i].id,
            isi: ''
          })
        }else{
          this.jawabans.push({
            id: data[i].id,
            isi: data[i].jawaban[0].isi
          })
        }
      }
    },
    kirimKuisioner: function(){
      const data = this.jawabans ;
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
    kondisiJawaban: function(page,tab){
      if (typeof tab !== 'undefined' || typeof page) {
        this.pindah = true;
      }
    }
  }
}
</script>

<style lang="css">
</style>
