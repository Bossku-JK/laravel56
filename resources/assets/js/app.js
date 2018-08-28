
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import store from './store'

import BootstrapVue from 'bootstrap-vue'
Vue.use(BootstrapVue);
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';


import locale from 'element-ui/lib/locale/lang/th'

Vue.use(ElementUI, { locale })
import ElSearchTablePagination from 'el-search-table-pagination'
Vue.use(ElSearchTablePagination)

Vue.use(require('vue-moment'));
const moment = require('moment')
require('moment/locale/th')

Vue.use(require('vue-moment'), {
    moment
})



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('pass-exam', require('./components/Gongtham/passexam.vue'));
Vue.component('editpass', require('./components/editpass/index.vue'));
Vue.component('editpass-create', require('./components/editpass/create.vue'));
Vue.component('posts-create', require('./components/Gongtham/posts/create.vue'));
Vue.component('card-frontend', require('./components/Gongtham/card.vue'));

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
     store, 
    el: '#app'
});
