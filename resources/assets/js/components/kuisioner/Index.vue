<template lang="html">
  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#satu" data-toggle="tab" aria-expanded="true" v-model="tab" v-on:click="bacaKuisioner(page,'satu')">
          Pelayanan Pendidikan oleh Pemerintah Kota
        </a></li>
        <li class=""><a href="#dua" data-toggle="tab" aria-expanded="false" v-model="tab" v-on:click="bacaKuisioner(page,'dua')">
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
                <td>{{kuisioner.id}}</td>
                <td>{{kuisioner.keterangan.nama}}</td>
                <td class="form" v-if="kuisioner.pilihan == '0'">
                  <input type="text" class="form-control" >
                </td>
                <td v-else-if="kuisioner.pilihan == '1'">
                  <select class="form-control">
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                  </select>
                </td>
                <td v-else></td>
              </tr>
              <tr v-else>
                <td>{{kuisioner.id}}</td>
                <td colspan="2" class="form">{{kuisioner.keterangan.nama}}</td>
              </tr>
            </tbody>
            <tbody v-else><tr><td colspan="3">Data Kosong / loading</td></tr></tbody>
          </table>
          <div align="center"> <vue-pagination :data="kuisionerData" v-on:pagination-change-page="bacaKuisioner"></vue-pagination> </div>
        </div>
      </div>
      <div class="col-md-1 col-md-offset-11">
        <button type="submit" class="btn btn-md btn-success">Kirim</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      kuisioners: [],
      kuisionerData: {},
      tab: ''
    }
  },
  mounted(){
    this.bacaKuisioner()
  },
  methods:{
    bacaKuisioner: function(page, tab){
      if (typeof page === 'undefined') {
        page = 1;
      }
      console.log(tab);
      axios.get('kuisioner/vue?page='+page).then(response => {
        this.kuisioners = response.data.data;
        this.kuisionerData = response.data;
      })
      .catch(response =>{
        console.log(response);
      });
    }
  }
}
</script>

<style lang="css">
</style>
