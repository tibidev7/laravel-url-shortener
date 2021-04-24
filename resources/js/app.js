require('./bootstrap');

import Vue from 'vue'

Vue.component('navbar', () => import("./components/Navbar.vue"));

Vue.config.devtools = false
Vue.config.debug = false
Vue.config.silent = true
Vue.config.productionTip = false

new Vue({
    el: '#app'
});
