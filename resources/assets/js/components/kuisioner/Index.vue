<template lang="html">
  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#satu" data-toggle="tab" aria-expanded="true" v-on:click="bacaKuisioner('','1')">
          Pelayanan Pendidikan oleh Pemerintah Kota
        </a></li>
        <li class=""><a href="#dua" data-toggle="tab" aria-expanded="false" v-on:click="bacaKuisioner('','2')">
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
                <td class="form" v-if="kuisioner.pilihan == '0'">
                  <input type="text" class="form-control" v-model="item.isi">
                </td>
                <td v-else-if="kuisioner.pilihan == '1'">
                  <select class="form-control" v-model="item.isi">
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                  </select>
                </td>
                <td v-else></td>
              </tr>
              <tr v-else>
                <td>{{index + 1}}</td>
                <td colspan="2" class="form">{{kuisioner.keterangan}}</td>
              </tr>
            </tbody>
            <tbody v-else><tr><td colspan="3">Data Kosong / loading</td></tr></tbody>
          </table>
          <div align="right"><vue-pagination :data="kuisionerData" v-on:pagination-change-page="bacaKuisioner"></vue-pagination></div>
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
                <td class="form" v-if="kuisioner.pilihan == '0'">
                  <input type="text" class="form-control" v-model="isi" >
                </td>
                <td v-else-if="kuisioner.pilihan == '1'">
                  <select class="form-control" v-model="isi">
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                  </select>
                </td>
                <td v-else></td>
              </tr>
              <tr v-else>
                <td colspan="3" class="form">{{kuisioner.keterangan}}</td>
              </tr>
            </tbody>
            <tbody v-else><tr><td colspan="3">Data Kosong / loading</td></tr></tbody>
          </table>
          <div align="right"><vue-pagination :data="kuisionerData" v-on:pagination-change-page="bacaKuisioner"></vue-pagination></div>
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
      kuisionerData: {},
      refresh: false,
      item: [{
        isi: ''
      }],
      noTab: ''
    }
  },
  mounted(){
    this.bacaKuisioner()
  },
  methods:{
    bacaKuisioner: function(page,tab){
      if (typeof page === 'undefined') {
				page = 1;
			}
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
        // console.log('ini no tab pakai session = '+this.noTab);
      }
      // console.log('session no = '+this.$session.get('no'));
      axios.get('kuisioner/vue?page='+page+'&tab='+this.noTab).then(response => {
        this.kuisioners = response.data.data;
        this.kuisionerData = response.data;
      })
      .catch(() => {
        console.log('server bermasalah');
      });
    },
    kirimKuisioner: function(){
      // axios.post('kuisioner/vue/store',this.isi).then(response =>{
      //   // console.log('berhasil kirim data');
      //   console.log(response.data);
      // })
      // .catch(resp => {
      //   console.log(resp.response.data.errors);
      // })
    }
  }
}
</script>

<style lang="css">
</style>
