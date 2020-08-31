window.Vue = require('vue');
import VueRouter from 'vue-router'
import Vuex from 'vuex'
import VueNoty from 'vuejs-noty'
import Vuelidate from 'vuelidate'
import axios from 'axios'
import VueAxios from 'vue-axios'
import 'vuejs-noty/dist/vuejs-noty.css'

import router from './routes'
import store from './store'

Vue.use(require('vue-moment'));
Vue.prototype.$http = axios;
Vue.use(VueAxios, axios);
Vue.use(VueNoty);
Vue.use(Vuex);
Vue.use(VueRouter);
Vue.use(Vuelidate);
Vue.use(VueNoty, {
    timeout: 4000,
    progressBar: true,
    layout: 'topRight'
});

new Vue({
    el: '#app',
    router,
    store
});
