import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import Form from './core/Form';
import VS2 from 'vue-script2';

// set up vue
window.Vue = Vue;
Vue.use(VueRouter);
Vue.use(VS2);

// set up axios
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

// set up form
window.Form = Form;