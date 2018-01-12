<template lang="html">
  <div>
    <div class="col-md-3 col-md-offset-5">
      <div class="form-group">
        <label for="kecamatan">Kecamatan</label>
        <select v-on:change="pilihKecamatan" v-model="item.id" name="kecamatan" id="kecamatan" class="form-control">
          <option value=''>Semua kecamatan</option>
          <option v-for="kecamatan in kecamatans" v-bind:value="kecamatan.id">{{kecamatan.nama}}</option>
        </select>
      </div>
    </div>
    <sekolah :item="item"></sekolah>
  </div>
</template>

<script>
import sekolah from './Sekolah.vue'
export default {
  components:{sekolah},
  data: () => ({
    kecamatans : [],
    item: {
      id : '',
    },

  }),
  mounted(){
    this.muncul()
  },
  methods: {
    muncul: function (){
      axios.get('kecamatan/vue').then(response => {
        this.kecamatans = response.data;
      })
    },
    pilihKecamatan: function(){
      // console.log('id kecamatan '+ this.item.id );
    }
  }
}
</script>

<style lang="css">
</style>
