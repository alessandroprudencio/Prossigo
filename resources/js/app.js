
require('./bootstrap');
import Vue from 'vue'

import VueIziToast from 'izitoast';
import 'izitoast/dist/css/iziToast.css';
Vue.use(VueIziToast);

import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

import Pagination from 'laravel-vue-pagination'
Vue.component('pagination', Pagination);


window.iziToast = require('izitoast')

iziToast.settings({
    transitionIn: "fadeInDown",
    position: "topCenter",
})

import VueTheMask from 'vue-the-mask'
Vue.use(VueTheMask)

Vue.component('index', require('./components/index').default);

import router from '../js/routes/index'

import store from '../js/store/index'

new Vue({
    el: '#app',
    router,
    store
});
