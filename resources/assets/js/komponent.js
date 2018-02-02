//paginate
Vue.component('vue-pagination', require('laravel-vue-pagination'));

//kunci
Vue.component('onoff', require('./components/kunci/OnOff.vue'));

//sekolah
Vue.component('modalsekolah', require('./components/sekolah/Modal.vue'));
Vue.component('kondisisekolah', require('./components/sekolah/Kondisi.vue'));

//dashboard
Vue.component('modaldashboard',require('./components/dashboard/Modal.vue'));
Vue.component('dashboard',require('./components/dashboard/Index.vue'));

//kuisioner
Vue.component('kondisikuisioner',require('./components/kuisioner/Kondisi.vue'));
Vue.component('kuisioner',require('./components/kuisioner/Index.vue'));

//pengguna
Vue.component('kondisipengguna',require('./components/pengguna/Kondisi.vue'));

//kunci
Vue.component('kondisikunci',require('./components/kunci/Kondisi.vue'));

// array
Vue.component('banyak',require('./components/Array.vue'));
