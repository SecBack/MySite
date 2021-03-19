import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from './views/Home.vue'
import Nn from './views/Nn.vue'

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home,
        },
        {
            path: '/nn',
            name: 'nn',
            component: Nn,
        },
    ],
})
