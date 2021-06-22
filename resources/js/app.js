import Vue from 'vue';
import App from './index';

import router from './router/router' //add vue
import './bootstrap-vue';





window.Vue = require('vue');
require('./bootstrap');
const app = new Vue({
    el : '#app',
    render : h => h(App),
    router //add vue
})

