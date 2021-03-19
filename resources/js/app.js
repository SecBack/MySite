import Vue from 'vue'
import router from './router'
import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue'
import VueParticlesBg from "particles-bg-vue";
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import App from '../App.vue'
import Home from './views/Home.vue'
import Nn from './views/Nn.vue'

Vue.use(BootstrapVue)
Vue.use(BootstrapVueIcons)
Vue.use(VueParticlesBg);
Vue.config.productionTip = false

new Vue({
  el: '#app',
  components: {
    App,
    Home,
    Nn,
  },
  router
});
