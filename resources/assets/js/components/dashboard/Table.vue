<template lang="html">
  <table class="table table-bordered table-custom">
    <thead>
      <tr>
        <th class="no">No</th>
        <th>Indikator Pencapaian (IP)</th>
        <th class="action">Persen</th>
      </tr>
    </thead>
    <tbody>
        <tr align="center" v-for="i in 10">
          <td>{{i}}</td>
          <td id="modal" data-toggle="modal" data-target="#myIp">IP {{i}}</td>
          <td
            id="modal" data-toggle="modal" data-target="#myPersen"
            v-on:click="nilaiIp(i)" >{{hitung()}}%</td>
            <modaldashboard v-bind:ip="ip"></modaldashboard>
        </tr>
    </tbody>
  </table>
</template>

<script>
import modaldashboard from './Modal.vue'
export default {
  component: ['modaldashboard'],
  data(){
    return{
      ip: '',
    }
  },
  mounted(){
    this.hitung(),
    this.nilaiIp()
  },
  methods:{
    hitung:function(){
      return Math.floor(Math.random() * (100 - 80 + 1)) + 80;
    },
    nilaiIp: function(id){
      this.ip = id ;
    }
  }
}
</script>

<style lang="css">
</style>
